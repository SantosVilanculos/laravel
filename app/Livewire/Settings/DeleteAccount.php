<?php

declare(strict_types=1);

namespace App\Livewire\Settings;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeleteAccount extends Component
{
    public ?string $password = null;

    public function destroy(): void
    {
        /**
         * @var \App\Models\User
         */
        $user = Auth::user();

        $this->authorize('delete', $user);

        $this->validate([
            'password' => ['required', 'string', 'current_password', 'exclude'],
        ]);

        // TODO: rm user image
        $user->delete();

        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        $this->redirectRoute('login');
    }

    public function render(): Factory|View
    {
        return view('livewire.settings.delete-account');
    }
}
