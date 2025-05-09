<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.dashboard')
    ->middleware(['auth'])
    ->name('dashboard');

Route::view('/profile', 'pages.profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
