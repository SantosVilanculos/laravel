<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class PasswordController
{
    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::default(), 'confirmed'],
        ]);

        $request->user()->update(['password' => $request->string('password')]);

        return back()->with('status', 'password-updated');
    }
}
