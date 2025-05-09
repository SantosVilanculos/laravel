<div x-data="{ open: false }">
    <h2 class="text-base/7 font-medium">Delete user</h2>

    <p class="mt-2 text-sm/6 text-zinc-500">
        Deleting your user will permanently delete all user data. You should download any data that you wish to retain
    </p>

    <div class="mt-6 space-y-6">
        <div>
            <button
                x-on:click="open = true"
                type="submit"
                class="grid h-9 place-content-center rounded-md bg-white px-3 text-sm font-medium text-red-600 shadow-xs ring-1 ring-gray-300 hover:bg-gray-50"
            >
                Delete
            </button>
        </div>
    </div>

    @teleport('body')
        <x-modal>
            <form wire:submit="destroy" method="POST">
                <div
                    x-on:click.outside="open = false"
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md"
                >
                    <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h3 class="text-base/7 font-medium text-zinc-800">Delete account</h3>

                        <p class="mt-2 text-sm/6 text-zinc-500">
                            Are you sure you want to delete your account? All of your data will be permanently removed.
                            This action cannot be undone.
                        </p>

                        <div class="mt-6">
                            <x-ui.label for="password">
                                {{ __('Password') }}
                            </x-ui.label>
                            <div class="mt-2">
                                <x-ui.input
                                    wire:model="password"
                                    type="password"
                                    name="password"
                                    id="password"
                                    autocomplete="current-password"
                                />
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div
                        class="grid grid-cols-2 items-center justify-start gap-x-6 bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"
                    >
                        <button
                            type="submit"
                            class="grid h-9 place-content-center rounded-md bg-white px-3 text-sm font-medium text-red-600 shadow-xs ring-1 ring-gray-300 hover:bg-gray-50"
                        >
                            Delete
                        </button>

                        <button
                            x-on:click="open = false"
                            type="button"
                            class="grid h-9 place-content-center rounded-md px-3 text-sm font-medium text-gray-900"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
        </x-modal>
    @endteleport
</div>
