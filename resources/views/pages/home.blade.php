<x-layouts.guest>
    <div class="flex h-full flex-col items-center justify-center gap-y-6 text-sm text-gray-600">
        <img class="h-12 w-auto" src="{{ asset('favicon.svg') }}" alt="{{ config('app.name') }}" />

        <p class="text-sm font-medium text-gray-900">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </p>

        @guest
            <p>
                <a
                    class="rounded-md underline hover:text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-hidden"
                    href="{{ route('login') }}"
                >
                    Log in
                </a>
                <span>·</span>
                <a
                    class="rounded-md underline hover:text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-hidden"
                    href="{{ route('register') }}"
                >
                    Register
                </a>
            </p>
        @endguest

        @auth
            <p>
                <a
                    class="rounded-md underline hover:text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-hidden"
                    href="{{ route('dashboard') }}"
                >
                    Dashboard
                </a>
            </p>
        @endauth

        <p>
            Crafted with
            <svg
                class="inline size-4 text-red-600"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 16 16"
                fill="currentColor"
                aria-hidden="true"
                data-slot="icon"
            >
                <path
                    d="M2 6.342a3.375 3.375 0 0 1 6-2.088 3.375 3.375 0 0 1 5.997 2.26c-.063 2.134-1.618 3.76-2.955 4.784a14.437 14.437 0 0 1-2.676 1.61c-.02.01-.038.017-.05.022l-.014.006-.004.002h-.002a.75.75 0 0 1-.592.001h-.002l-.004-.003-.015-.006a5.528 5.528 0 0 1-.232-.107 14.395 14.395 0 0 1-2.535-1.557C3.564 10.22 1.999 8.558 1.999 6.38L2 6.342Z"
                />
            </svg>
            by
            <a
                class="rounded-md underline hover:text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-hidden"
                href="http://github.com/SantosVilanculos"
                target="_blank"
                rel="noopener noreferrer"
            >
                Santos Vilanculos
            </a>
        </p>
    </div>
</x-layouts.guest>
