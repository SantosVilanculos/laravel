<x-layouts.default>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="grid place-content-center sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="/">
                <img class="h-12 w-auto" src="{{ asset('favicon.svg') }}" alt="{{ config('app.name') }}" />
            </a>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('password.confirm') }}" method="POST">
                @csrf

                <p class="text-sm text-gray-600">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </p>

                <div>
                    <x-ui.label for="password">{{ __('Password') }}</x-ui.label>
                    <div class="mt-1.5">
                        <x-ui.input
                            type="password"
                            name="password"
                            id="password"
                            autofocus
                            autocomplete="current-password"
                            required
                        />
                    </div>
                    @error('password')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-ui.button class="w-full" type="submit" variant="accent">
                        {{ __('Confirm') }}
                    </x-ui.button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.default>
