<?php

declare(strict_types=1);

namespace App\Livewire\Settings;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Propaganistas\LaravelPhone\PhoneNumber;
use Propaganistas\LaravelPhone\Rules\Phone;

class ProfileInformation extends Component
{
    public ?string $first_name = null;

    public ?string $last_name = null;

    public ?string $email = null;

    public ?string $country = 'MZ';

    public ?string $phone = null;

    public function save(): void
    {
        /**
         * @var User
         */
        $user = Auth::user();

        $this->authorize('update', $user);

        $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:254', Rule::unique(User::class)->ignoreModel($user)],
            'country' => ['required_with:phone', 'string', Rule::in(['MZ', 'ZA'])],
            'phone' => ['nullable', 'string', (new Phone)->countryField('country')],
        ]);

        $user->fill([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
        ]);

        if ($this->phone !== null) {
            $user->country = $this->country;
            $user->phone = (new PhoneNumber($this->phone, $this->country))->formatNational();
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        if ($user->wasChanged('email') && $user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail) {
            $user->sendEmailVerificationNotification();

            Session::flash('status', __('auth.verification_link_sent'));
        }

        $this->dispatch('message', text: __('Changes saved.'), icon: 'success');
    }

    public function sendEmailVerificationNotification(): void
    {
        /**
         * @var User
         */
        $user = Auth::user();

        if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();
        }

        $this->dispatch('message', text: __('auth.verification_link_sent'), icon: 'success');
    }

    public function mount(): void
    {
        /**
         * @var User
         */
        $user = Auth::user();

        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->country = $user->country;
        $this->phone = $user->phone;
    }

    public function render(): Factory|View
    {
        /**
         * @var User
         */
        $user = Auth::user();

        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->country ??= $user->country;
        $this->phone = $user->phone;

        return view('livewire.settings.profile-information', ['user' => $user]);
    }
}
