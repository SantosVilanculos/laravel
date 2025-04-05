<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.dashboard')->name('dashboard');
