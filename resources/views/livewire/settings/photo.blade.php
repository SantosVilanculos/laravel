<form x-data="{}">
    <h2 class="font-semibold text-gray-900 text-base/7">Lorem ipsum</h2>

    <p class="mt-1 text-gray-600 text-sm/6">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

    <div class="grid grid-cols-1 mt-10 gap-x-6 gap-y-8 sm:grid-cols-12">
        <div class="col-span-full">
            <x-ui.label for="image">Photo</x-ui.label>

            <p class="mt-2 text-gray-600 text-sm/6">
                It's recommended that you use a square picture that's at least 192x192 pixels and 2 MB or less.
                Use
                a
                PNG or JPG file.
            </p>

            <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress;"
                class="flex items-center mt-2 gap-x-3">
                <img class="rounded-full size-12" src="{{ $user->image }}" alt="{{ $user->name }}" />

                <input wire:model="image" x-ref="input" type="file" id="image" class="sr-only"
                    accept="image/png,image/jpeg" />

                <div
                    class="relative bg-white rounded-md shadow-xs overflow-clip ring-1 ring-gray-300 ring-inset hover:bg-gray-50 isolate">
                    <button x-on:click="$refs.input.click()" type="button"
                        class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-gray-900">
                        Upload a file
                    </button>

                    <progress x-show="uploading" class="absolute inset-0 bg-transparent -z-1" value="0"
                        min="0" max="100" x-bind:value="progress"></progress>
                </div>

                @isset($user->image_path)
                    <button wire:click="destroy" type="button"
                        class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-red-600 bg-white rounded-md shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50">
                        Remove
                    </button>
                @endisset
            </div>
            @error('image')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
</form>
