<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class PasswordController
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        /**
         * @var User
         */
        $user = $request->user();

        if (Hash::check((string) $request->string('password'), $user->password)) {
            throw ValidationException::withMessages([
                'password' => __('passwords.same'),
            ]);
        }

        $user->update([
            'password' => Hash::make((string) $request->string('password')),
        ]);

        Auth::logoutOtherDevices((string) $request->string('password'));

        return back()->with('status', __('passwords.reset'));
    }
}
