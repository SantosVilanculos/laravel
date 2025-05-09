<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController
{
    public function store(Request $request): RedirectResponse
    {
        /** @var \App\Models\User */
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        $user->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
