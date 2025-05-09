<x-layouts.default>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="grid place-content-center sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="/">
                <img class="h-12 w-auto" src="{{ asset('favicon.svg') }}" alt="{{ config('app.name') }}" />
            </a>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 rounded-lg bg-blue-50 p-4 text-slate-900 ring-1 ring-blue-600">
                    <p class="text-sm text-gray-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </p>
                </div>
            @endif

            <div class="space-y-6">
                @csrf

                <p class="text-sm/6 text-zinc-500">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </p>

                <div class="flex flex-col gap-y-3">
                    <form action="{{ route('verification.send') }}" method="POST">
                        @csrf

                        <x-ui.button class="w-full" type="submit" variant="primary">
                            {{ __('Resend verification email') }}
                        </x-ui.button>
                    </form>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <x-ui.button class="w-full" type="submit">
                            {{ __('Log out') }}
                        </x-ui.button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.default>
