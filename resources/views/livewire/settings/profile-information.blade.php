<form wire:submit="save">
    <h2 class="font-semibold text-gray-900 text-base/7">{{ __('Personal information') }}</h2>
    <p class="mt-1 text-gray-600 text-sm/6">
        {{ __("Update your account's personal information.") }}
    </p>

    <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-12">
        <div class="sm:col-span-6">
            <x-ui.label for="first_name">{{ __('First name') }}</x-ui.label>
            <div class="mt-2">
                <x-ui.input wire:model="first_name" type="text" name="first_name" id="first_name"
                    autocomplete="given-name" required />
            </div>
            @error('first_name')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="sm:col-span-6">
            <x-ui.label for="last_name">{{ __('Last name') }}</x-ui.label>
            <div class="mt-2">
                <x-ui.input wire:model="last_name" type="text" name="last_name" id="last_name"
                    autocomplete="family-name" required />
            </div>
            @error('last_name')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="sm:col-span-6">
            <x-ui.label for="email">{{ __('Email address') }}</x-ui.label>
            <div class="mt-2">
                <x-ui.input wire:model="email" id="email" name="email" type="email" autocomplete="email"
                    required />
            </div>
            @error('email')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <p class="mt-2 text-sm text-gray-600">
                    {{ __('Your email address is unverified.') }}
                    <button type="button" wire:click="sendEmailVerificationNotification"
                        class="text-sm underline rounded-md hover:text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-hidden">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>
            @endif

            @session('status')
                <p class="mt-2 text-sm text-green-600">{{ $value }}</p>
            @endsession
        </div>

        <div class="sm:col-span-6">
            <x-ui.label for="phone">{{ __('Phone number (Optional)') }}</x-ui.label>
            <div class="mt-2">
                <div
                    class="flex rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                    <div class="grid grid-cols-1 shrink-0 focus-within:relative">
                        <select wire:model="country" id="country" name="country" autocomplete="country"
                            aria-label="Country"
                            class="w-full col-start-1 row-start-1 py-2 pl-3 text-base text-gray-500 rounded-md appearance-none pr-7 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            <option value="">―</option>
                            <option value="MZ" @selected($user->country === 'MZ')>MZ (+258)</option>
                            <option value="ZA" @selected($user->country === 'ZA')>ZA (+27)</option>
                        </select>
                        <svg class="self-center col-start-1 row-start-1 mr-2 text-gray-500 pointer-events-none size-5 justify-self-end sm:size-4"
                            viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input wire:model="phone" type="tel" name="phone" id="phone" autocomplete="tel-local"
                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-0 sm:text-sm/6" />
                </div>
            </div>
            @error('country')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror

            @error('phone')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-span-full">
            <button type="submit"
                class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-gray-900 bg-white rounded-md shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50">
                <svg wire:loading wire:target="save" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" style="display: none" class="mr-3 text-gray-300 size-4 animate-spin">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                {{ __('Save') }}
            </button>
        </div>
    </div>
</form>
