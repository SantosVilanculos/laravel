<form wire:submit="save" method="POST">
    <h2 class="text-base/7 font-medium text-zinc-800">Update password</h2>

    <p class="mt-2 text-sm/6 text-zinc-500">Ensure your account is using a long, random password to stay secure</p>

    <div class="mt-6 space-y-6">
        <div class="">
            <x-ui.label for="current_password">Current password</x-ui.label>
            <div class="mt-3">
                <x-ui.input
                    wire:model="current_password"
                    type="password"
                    name="current_password"
                    id="current_password"
                    autocomplete="current-password"
                />
            </div>
            @error('current_password')
                <p class="mt-3 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="">
            <x-ui.label for="password">New password</x-ui.label>
            <div class="mt-3">
                <x-ui.input
                    wire:model="password"
                    type="password"
                    name="password"
                    id="password"
                    autocomplete="new-password"
                />
            </div>
            @error('password')
                <p class="mt-3 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="">
            <x-ui.label for="password_confirmation">Confirm new password</x-ui.label>
            <div class="mt-3">
                <x-ui.input
                    wire:model="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    autocomplete="password_confirmation"
                />
            </div>
        </div>

        <div class="flex items-center">
            <x-ui.button wire:loading.class="loading" type="submit">Save</x-ui.button>
        </div>
    </div>
</form>
