<!DOCTYPE html>
<html class="h-full bg-gray-100 font-sans" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>{{ config('app.name') }}</title>

        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

        <link rel="stylesheet" href="{{ asset('vendor/inter/4.1/inter.min.css') }}" />

        @livewireStyles

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        @stack('assets')
    </head>

    <body class="h-full">
        {{ $slot }}

        @livewireScripts

        @stack('scripts')
    </body>
</html>
