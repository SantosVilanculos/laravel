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
        <div class="min-h-full">
            <nav x-data="{ open: false }" class="bg-gray-800">
                <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 items-center justify-between">
                        <div class="flex items-center">
                            <div class="shrink-0">
                                <img class="size-8" src="{{ asset('favicon.svg') }}" alt="{{ config('app.name') }}" />
                            </div>
                            <div class="hidden md:block">
                                <div class="ml-10 flex items-baseline space-x-4">
                                    {{-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" --}}
                                    <a
                                        href="#"
                                        @class([
                                            'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white',
                                            'bg-gray-900 text-white' => true,
                                        ])
                                        aria-current="page"
                                    >
                                        Dashboard
                                    </a>
                                    <a
                                        href="#"
                                        @class([
                                            'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white',
                                            'bg-gray-900 text-white' => false,
                                        ])
                                    >
                                        Lorem, ipsum.
                                    </a>
                                    <a
                                        href="#"
                                        @class([
                                            'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white',
                                            'bg-gray-900 text-white' => false,
                                        ])
                                    >
                                        Lorem, ipsum.
                                    </a>
                                    <a
                                        href="#"
                                        @class([
                                            'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white',
                                            'bg-gray-900 text-white' => false,
                                        ])
                                    >
                                        Lorem, ipsum.
                                    </a>
                                    <a
                                        href="#"
                                        @class([
                                            'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white',
                                            'bg-gray-900 text-white' => false,
                                        ])
                                    >
                                        Lorem, ipsum.
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-4 flex items-center md:ml-6">
                                <button
                                    type="button"
                                    class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-none"
                                >
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">View notifications</span>
                                    <svg
                                        class="size-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        aria-hidden="true"
                                        data-slot="icon"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                                        />
                                    </svg>
                                </button>

                                {{-- Profile dropdown --}}
                                <div x-data="{ open: false }" class="relative ml-3">
                                    <div>
                                        <button
                                            x-on:click="open =! open"
                                            type="button"
                                            class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-none"
                                            id="user-menu-button"
                                            aria-expanded="false"
                                            aria-haspopup="true"
                                        >
                                            <span class="absolute -inset-1.5"></span>
                                            <span class="sr-only">Open user menu</span>
                                            <img
                                                class="size-8 rounded-full"
                                                src="{{ Storage::disk('public')->url('0450249b131eec36dc8333b7cf847bc4.png') }}"
                                                alt=""
                                            />
                                        </button>
                                    </div>

                                    {{--
                                        Dropdown menu, show/hide based on menu state.
                                        
                                        Entering: "transition ease-out duration-100"
                                        From: "transform opacity-0 scale-95"
                                        To: "transform opacity-100 scale-100"
                                        Leaving: "transition ease-in duration-75"
                                        From: "transform opacity-100 scale-100"
                                        To: "transform opacity-0 scale-95"
                                    --}}
                                    <div
                                        x-cloak
                                        x-show="open"
                                        x-on:click.outside="open = false"
                                        x-transition:enter="transition duration-100 ease-out"
                                        x-transition:enter-start="scale-95 transform opacity-0"
                                        x-transition:enter-end="scale-100 transform opacity-100"
                                        x-transition:leave="transition duration-75 ease-in"
                                        x-transition:leave-start="scale-100 transform opacity-100"
                                        x-transition:leave-end="scale-95 transform opacity-0"
                                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
                                        role="menu"
                                        aria-orientation="vertical"
                                        aria-labelledby="user-menu-button"
                                        tabindex="-1"
                                    >
                                        {{-- Active: "bg-gray-100 outline-none", Not Active: "" --}}
                                        <a
                                            href="#"
                                            @class([
                                                'block px-4 py-2 text-sm text-gray-700',
                                                'bg-gray-100 outline-none' => true,
                                            ])
                                            role="menuitem"
                                            tabindex="-1"
                                        >
                                            Dashboard
                                        </a>
                                        <a
                                            href="#"
                                            @class([
                                                'block px-4 py-2 text-sm text-gray-700',
                                                'bg-gray-100 outline-none' => false,
                                            ])
                                            tabindex="-1"
                                        >
                                            Lorem, ipsum.
                                        </a>

                                        <form action="#" method="POST">
                                            @csrf

                                            <button
                                                type="submit"
                                                @class([
                                                    'block px-4 py-2 text-sm text-gray-700',
                                                    'bg-gray-100 outline-none' => false,
                                                ])
                                                role="menuitem"
                                                tabindex="-1"
                                            >
                                                Sign out
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="-mr-2 flex md:hidden">
                            {{-- Mobile menu button --}}
                            <button
                                x-on:click="open =! open"
                                type="button"
                                class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-none"
                                aria-controls="mobile-menu"
                                aria-expanded="false"
                            >
                                <span class="absolute -inset-0.5"></span>
                                <span class="sr-only">Open main menu</span>
                                {{-- Menu open: "hidden", Menu closed: "block" --}}
                                <svg
                                    class="block size-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                    data-slot="icon"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                    />
                                </svg>
                                {{-- Menu open: "block", Menu closed: "hidden" --}}
                                <svg
                                    class="hidden size-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                    data-slot="icon"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Mobile menu, show/hide based on menu state. --}}
                <div x-cloak x-bind:class="{ 'block': open, 'hidden': ! open }" class="md:hidden" id="mobile-menu">
                    <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                        {{-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" --}}
                        <a
                            href="#"
                            class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                            aria-current="page"
                        >
                            Dashboard
                        </a>
                        <a
                            href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                        >
                            Lorem, ipsum.
                        </a>
                        <a
                            href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                        >
                            Lorem, ipsum.
                        </a>
                        <a
                            href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                        >
                            Lorem, ipsum.
                        </a>
                        <a
                            href="#"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                        >
                            Lorem, ipsum.
                        </a>
                    </div>
                    <div class="border-t border-gray-700 pt-4 pb-3">
                        <div class="flex items-center px-5">
                            <div class="shrink-0">
                                <img
                                    class="size-10 rounded-full"
                                    src="{{ Storage::disk('public')->url('0450249b131eec36dc8333b7cf847bc4.png') }}"
                                    alt=""
                                />
                            </div>
                            <div class="ml-3">
                                <div class="text-base/5 font-medium text-white">Test User</div>
                                <div class="text-sm font-medium text-gray-400">test@example.com</div>
                            </div>
                            <button
                                type="button"
                                class="relative ml-auto shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-none"
                            >
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">View notifications</span>
                                <svg
                                    class="size-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                    data-slot="icon"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                                    />
                                </svg>
                            </button>
                        </div>
                        <div class="mt-3 space-y-1 px-2">
                            <a
                                href="#"
                                class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                            >
                                Lorem, ipsum.
                            </a>
                            <a
                                href="#"
                                class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                            >
                                Lorem, ipsum.
                            </a>

                            <form action="#" method="POST">
                                @csrf

                                <button
                                    type="submit"
                                    class="block w-full rounded-md px-3 py-2 text-left text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white"
                                >
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            @isset($header)
                <header class="bg-white shadow">
                    <div class="mx-auto max-w-6xl px-4 py-6 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                <div class="mx-auto max-w-6xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>

        @livewireScripts

        @stack('scripts')
    </body>
</html>
