<div x-data="{ open: false }">
    <h2 class="text-base/7 font-semibold text-gray-900">{{ __('Account termination') }}</h2>
    <p class="mt-1 text-sm/6 text-gray-600">
        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
    </p>

    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12">
        <div class="col-span-full">
            <button
                x-on:click="open = true"
                type="button"
                class="inline-flex items-center justify-center rounded-md bg-white px-3 py-2 text-sm font-medium text-red-600 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
            >
                {{ __('Delete account') }}
            </button>
        </div>
    </div>

    <template x-teleport="body">
        <div class="relative z-10" aria-x-labelledby="modal-title" role="dialog" aria-modal="true">
            <div
                x-cloak
                x-show="open"
                x-transition:enter="duration-300 ease-out"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="duration-200 ease-in"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-gray-500/75 transition-opacity"
                x-bind:aria-hidden="open ? 'false' : 'true'"
            ></div>

            <div
                x-cloak
                x-show="open"
                x-transition:enter="duration-300 ease-out"
                x-transition:enter-start="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="translate-y-0 opacity-100 sm:scale-100"
                x-transition:leave="duration-200 ease-in"
                x-transition:leave-start="translate-y-0 opacity-100 sm:scale-100"
                x-transition:leave-end="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
                class="fixed inset-0 z-10 w-screen overflow-y-auto"
            >
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <form
                        wire:submit="destroy"
                        x-on:click.outside="open = false"
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-md"
                    >
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="text-center sm:text-left">
                                <h3 class="text-base font-semibold text-gray-900" id="modal-title">
                                    {{ __('Are you sure you want to delete your account?') }}
                                </h3>
                                <div class="mt-[0.375rem]">
                                    <p class="text-sm text-gray-500">
                                        {{ __('All your personal data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your user.') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-3 sm:px-6">
                            <x-ui.label for="password">{{ __('Current password') }}</x-ui.label>
                            <div class="mt-2">
                                <x-ui.input
                                    wire:model="password"
                                    type="password"
                                    id="password"
                                    autocomplete="current-password"
                                    required
                                />
                            </div>
                            @error('password')
                                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-x-2 bg-gray-50 px-4 py-3 sm:px-6">
                            <button
                                x-on:click="open = false"
                                type="reset"
                                class="inline-flex items-center justify-center rounded-md px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50"
                            >
                                {{ __('Cancel') }}
                            </button>

                            <button
                                type="submit"
                                class="inline-flex items-center justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500"
                            >
                                <svg
                                    wire:loading
                                    wire:target="destroy"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    style="display: none"
                                    class="mr-3 size-4 animate-spin text-gray-300"
                                >
                                    <circle
                                        class="opacity-25"
                                        cx="12"
                                        cy="12"
                                        r="10"
                                        stroke="currentColor"
                                        stroke-width="4"
                                    ></circle>
                                    <path
                                        class="opacity-75"
                                        fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                    ></path>
                                </svg>
                                {{ __('Delete account') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </template>
</div>
