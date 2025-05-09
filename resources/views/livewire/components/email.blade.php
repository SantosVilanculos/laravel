<form wire:submit="save" method="POST">
    <h2 class="text-base/7 font-medium text-zinc-800">Email address</h2>

    <p class="mt-2 text-sm/6 text-zinc-500">Change the email address used for account notifications and sign-in.</p>

    <div class="mt-6 space-y-6">
        <div>
            <div class="flex w-full max-w-sm gap-x-2">
                <x-ui.input wire:model="email" type="email" name="email" id="email" autocomplete="email" />
                <x-ui.button wire:target="save" wire:loading.class="loading" type="submit">Change</x-ui.button>
            </div>
            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="col-span-full">
                <p class="text-sm/6 text-amber-600">
                    {{ __('Your email address is unverified. Please check your inbox for a verification email and click the link to confirm your email. If you didn\'t receive the email, we will gladly send you another') }}
                </p>

                <div class="mt-2">
                    <button
                        wire:click="sendEmailVerificationNotification"
                        type="button"
                        class="focus-visible:outline-zaffre-600 grid h-9 place-content-center rounded-md bg-white px-3 text-sm font-medium text-amber-600 shadow-xs ring-1 ring-gray-300 hover:bg-gray-50 focus-visible:ring-0 focus-visible:outline-2 focus-visible:-outline-offset-2"
                    >
                        {{ __('Resend the erification email') }}
                    </button>
                </div>
            </div>
        @endif
    </div>
</form>
