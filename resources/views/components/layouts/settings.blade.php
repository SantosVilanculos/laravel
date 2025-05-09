<x-layouts.app>
    <div class="grid grid-cols-1 gap-x-12 gap-y-8 md:grid-cols-[16rem_1fr]">
        <nav>
            <ul class="-mx-3 space-y-1">
                <li>
                    <a
                        href="{{ route('settings.profile') }}"
                        @class(['flex h-9 items-center gap-x-3 rounded-md px-3 py-0 text-sm font-medium text-zinc-500 hover:bg-zinc-800/5 hover:text-zinc-800', 'bg-zinc-800/5 text-zinc-800' => Route::is('settings.profile')])
                    >
                        <div class="size-4">
                            {{-- user-circle --}}
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
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
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                />
                            </svg>
                        </div>
                        <div class="leading-none font-medium whitespace-nowrap">Profile</div>
                    </a>
                </li>

                <li>
                    <a
                        href="{{ route('settings.security') }}"
                        @class(['flex h-9 items-center gap-x-3 rounded-md px-3 py-0 text-sm font-medium text-zinc-500 hover:bg-zinc-800/5 hover:text-zinc-800', 'bg-zinc-800/5 text-zinc-800' => Route::is('settings.security')])
                    >
                        <div class="size-4">
                            {{-- security-exclamation --}}
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
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
                                    d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z"
                                />
                            </svg>
                        </div>
                        <div class="leading-none font-medium whitespace-nowrap">Security</div>
                    </a>
                </li>
            </ul>
        </nav>

        <main>
            {{ $slot }}
        </main>
    </div>
</x-layouts.app>
