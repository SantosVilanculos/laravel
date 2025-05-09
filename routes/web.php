<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.dashboard')
    ->middleware(['auth'])
    ->name('dashboard');

Route::prefix('settings')
    ->middleware(['auth'])
    ->group(function (): void {
        Route::view('profile', 'pages.settings.profile')
            ->name('settings.profile');

        Route::view('security', 'pages.settings.security')
            ->name('settings.security');
    });

require __DIR__.'/auth.php';
