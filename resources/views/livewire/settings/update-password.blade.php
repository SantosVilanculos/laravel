<form wire:submit="save">
    <h2 class="font-semibold text-gray-900 text-base/7">{{ __('Reset password') }}</h2>
    <p class="mt-1 text-gray-600 text-sm/6">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </p>

    <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-12">
        <div class="sm:col-span-6">
            <x-ui.label for="current_password">{{ __('Current password') }}</x-ui.label>
            <div class="mt-2">
                <x-ui.input wire:model="current_password" type="password" name="current_password" id="current_password"
                    autocomplete="current-password" required />
            </div>
            @error('current_password')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="sm:col-span-6 sm:col-start-1">
            <x-ui.label for="password">{{ __('New password') }}</x-ui.label>
            <p class="mt-2 text-gray-600 text-sm/6">
                {{ __('At least 8 characters.') }}
            </p>
            <div class="mt-2">
                <x-ui.input wire:model="password" type="password" name="password" id="password"
                    autocomplete="new-password" required />
            </div>
            @error('password')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="sm:col-span-6 sm:col-start-1">
            <x-ui.label for="password_confirmation">{{ __('Confirm new password') }}</x-ui.label>
            <div class="mt-2">
                <x-ui.input wire:model="password_confirmation" type="password" name="password_confirmation"
                    id="password_confirmation" autocomplete="new-password" required />
            </div>
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
