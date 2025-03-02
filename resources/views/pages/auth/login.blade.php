<x-layouts.guest>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="grid place-content-center sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="/">
                <img class="h-12 w-auto" src="{{ asset('favicon.svg') }}" alt="{{ config('app.name') }}" />
            </a>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            @session('status')
                <div
                    class="mb-6 rounded-lg bg-[rgba(66,153,225,0.04)] p-4 text-slate-900 ring-1 ring-[rgb(66,153,225)]"
                >
                    <p class="text-sm text-gray-600">{{ $value }}</p>
                </div>
            @endsession

            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf

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
                    <div class="flex items-center justify-between">
                        <x-ui.label for="password">{{ __('Password') }}</x-ui.label>
                        <div class="text-sm">
                            <a
                                href="{{ route('password.request') }}"
                                class="font-medium text-indigo-600 hover:text-indigo-500"
                            >
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    </div>
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
                    <x-ui.label for="remember_me" class="inline-flex w-full items-center gap-x-1.5">
                        <x-ui.input.checkbox name="remember_me" id="remember_me" />
                        {{ __('Remember me') }}
                    </x-ui.label>
                </div>

                <div>
                    <button
                        type="submit"
                        class="inline-flex w-full items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>

        <p class="mt-10 text-center text-sm text-gray-500">
            {{ __('Don\'t have an account?') }}
            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                {{ __('Sign up') }}
            </a>
        </p>
    </div>
</x-layouts.guest>
