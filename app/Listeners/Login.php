<?php

declare(strict_types=1);

namespace App\Listeners;

use Illuminate\Auth\Events\Login as LoginEvent;

class Login
{
    public function __construct()
    {
        //
    }

    public function handle(LoginEvent $event): void
    {
        /**
         * @var \App\Models\User
         */
        $user = $event->user;

        $user->update(['last_logged_in_at' => now()]);
    }
}
