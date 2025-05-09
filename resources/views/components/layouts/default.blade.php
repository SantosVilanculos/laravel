<!DOCTYPE html>
<html
    class="h-full bg-zinc-50 **:overscroll-contain focus-within:scroll-smooth motion-reduce:focus-within:scroll-auto"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="48x48 32x32 16x16" type="image/x-icon" />
        <link rel="icon" href="{{ asset('favicon.svg') }}" sizes="any" type="image/svg+xml" />

        <title>{{ config('app.name') }}</title>
        <meta name="description" content="" />

        <meta name="og:title" content="{{ config('app.name') }}" />
        <meta name="og:description" content="" />
        <meta name="og:type" content="website" />
        <meta name="og:url" content="{{ config('app.url') }}" />
        <meta name="og:image" content="{{ url('og.png') }}" />
        <meta name="og:image:type" content="image/png" />
        <meta name="og:image:width" content="1200" />
        <meta name="og:image:height" content="630" />

        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="" />
        <meta name="twitter:creator" content="" />

        <link rel="stylesheet" href="{{ asset('vendor/inter/4.1/inter.min.css') }}" />

        @livewireStyles

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        @stack('head')
    </head>

    <body class="h-full font-sans text-sm/6 text-gray-900 antialiased">
        {{ $slot }}

        @livewireScripts

        @stack('body')
    </body>
</html>
