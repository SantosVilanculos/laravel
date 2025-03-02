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

            <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
                @csrf

                <p class="text-sm text-gray-600">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>

                <div>
                    <x-ui.label for="email">{{ __('Email address') }}</x-ui.label>
                    <div class="mt-1.5">
                        <x-ui.input type="email" name="email" id="email" autocomplete="email" required />
                    </div>
                    @error('email')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button
                        type="submit"
                        class="inline-flex w-full items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        {{ __('Email password reset link') }}
                    </button>
                </div>
            </form>
        </div>

        <p class="mt-10 text-center text-sm text-gray-500">
            {{ __('Or, return to') }}
            <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                {{ __('Log in') }}
            </a>
        </p>
    </div>
</x-layouts.guest>
