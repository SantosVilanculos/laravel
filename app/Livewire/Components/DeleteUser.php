<?php

declare(strict_types=1);

namespace App\Livewire\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DeleteUser extends Component
{
    public ?string $password = null;

    public function destroy(): void
    {
        /** @var \App\Models\User */
        $user = Auth::user();

        $this->authorize('delete', $user);

        $this->validate([
            'password' => ['required', 'string', 'current_password', 'exclude'],
        ]);

        Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();

        $user->delete();

        $this->redirectRoute('login');
    }

    public function render(): View
    {
        return view('livewire.components.delete-user');
    }
}
