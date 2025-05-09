<x-layouts.default>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="grid place-content-center sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="/">
                <img class="h-12 w-auto" src="{{ asset('favicon.svg') }}" alt="{{ config('app.name') }}" />
            </a>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('register') }}" method="POST">
                @csrf

                <div>
                    <x-ui.label for="name">{{ __('Name') }}</x-ui.label>
                    <div class="mt-1.5">
                        <x-ui.input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name') }}"
                            autofocus
                            autocomplete="name"
                            required
                        />
                    </div>
                    @error('name')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-ui.label for="email">{{ __('Email address') }}</x-ui.label>
                    <div class="mt-1.5">
                        <x-ui.input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email')  }}"
                            autocomplete="email"
                            required
                        />
                    </div>
                    @error('email')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-ui.label for="password">{{ __('Password') }}</x-ui.label>
                    <div class="mt-1.5">
                        <x-ui.input
                            type="password"
                            name="password"
                            id="password"
                            autocomplete="current-password"
                            minlength="8"
                            required
                        />
                    </div>
                    @error('password')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-ui.label for="password_confirmation">{{ __('Confirm password') }}</x-ui.label>
                    <div class="mt-1.5">
                        <x-ui.input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            autocomplete="new-password"
                            required
                        />
                    </div>
                </div>

                <div>
                    <x-ui.button class="w-full" type="submit" variant="accent">
                        {{ __('Sign up') }}
                    </x-ui.button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                {{ __('Already have an account?') }}
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    {{ __('Log in') }}
                </a>
            </p>
        </div>
    </div>
</x-layouts.default>
