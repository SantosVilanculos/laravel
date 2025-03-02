<x-layouts.guest>
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
                    <x-ui.label for="first_name">{{ __('First name') }}</x-ui.label>
                    <div class="mt-1.5">
                        <x-ui.input
                            type="text"
                            name="first_name"
                            id="first_name"
                            autocomplete="given-name"
                            required
                            value="{{ old('first_name') }}"
                        />
                    </div>
                    @error('first_name')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-ui.label for="last_name">{{ __('Last name') }}</x-ui.label>
                    <div class="mt-1.5">
                        <x-ui.input
                            type="text"
                            name="last_name"
                            id="last_name"
                            autocomplete="family-name"
                            required
                            value="{{ old('last_name') }}"
                        />
                    </div>
                    @error('last_name')
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
                            autocomplete="email"
                            required
                            value="{{ old('email') }}"
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
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            autocomplete="new-password"
                            required
                        />
                    </div>
                </div>

                {{-- TODO --}}
                <div class="">
                    <p class="text-sm text-gray-600">
                        By clicking "Agree and sign up" I agree to the
                        <span class="underline">Terms of Service</span>
                        and
                        <span class="underline">Privacy Policy</span>
                        .
                    </p>
                </div>

                <div>
                    <button
                        type="submit"
                        class="inline-flex w-full items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        {{ __('Agree and sign up') }}
                    </button>
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
</x-layouts.guest>
