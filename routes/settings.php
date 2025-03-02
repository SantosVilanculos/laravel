<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'settings',
        'middleware' => ['auth'],
    ],
    function (): void {
        Route::view('/', 'pages.settings.general')->name('settings.general');
        Route::view('/password', 'pages.settings.security')->name('settings.security');
    });
