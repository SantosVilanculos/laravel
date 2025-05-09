<x-layouts.default>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="grid place-content-center sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="/">
                <img class="h-12 w-auto" src="{{ asset('favicon.svg') }}" alt="{{ config('app.name') }}" />
            </a>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            @session('status')
                <div class="mb-6 rounded-lg bg-blue-50 p-4 text-slate-900 ring-1 ring-blue-600">
                    <p class="text-sm text-gray-600">{{ $value }}</p>
                </div>
            @endsession

            <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
                @csrf

                <p class="text-sm/6 text-zinc-500">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>

                <div>
                    <x-ui.label for="email">{{ __('Email address') }}</x-ui.label>
                    <div class="mt-3">
                        <x-ui.input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email') }}"
                            autofocus
                            autocomplete="email"
                            required
                        />
                    </div>
                    @error('email')
                        <p class="mt-3 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-ui.button class="w-full" type="submit" variant="primary">
                        {{ __('Email password reset link') }}
                    </x-ui.button>
                </div>
            </form>
        </div>

        <p class="mt-10 text-center text-sm/6 text-zinc-500">
            {{ __('Or, return to') }}
            <a href="{{ route('login') }}" class="text-zaffre-600 hover:text-zaffre-500 font-medium">
                {{ __('Log in') }}
            </a>
        </p>
    </div>
</x-layouts.default>
