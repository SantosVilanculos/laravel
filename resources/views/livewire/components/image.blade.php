<form enctype="multipart/form-data" method="POST">
    <h2 class="text-base/7 font-medium text-zinc-800">Avatar</h2>

    <p class="mt-2 text-sm/6 text-zinc-500">Use a square PNG or JPG, at least 192x192 pixels and under 2 MB.</p>

    <div class="mt-6 space-y-6">
        <div>
            <div class="flex items-center gap-x-2">
                @unless (is_null($user->image))
                    <img
                        src="{{ Storage::disk('public')->url($user->image) }}"
                        alt=""
                        class="size-12 rounded-full object-cover"
                    />
                @else
                    <img src="{{ asset('default.svg') }}" alt="" class="size-12 rounded-full object-cover" />
                @endunless

                <input
                    x-ref="input"
                    wire:model="image"
                    class="hidden"
                    type="file"
                    name="image"
                    id="image"
                    accept="image/jpeg,image/png"
                    aria-hidden="true"
                />

                <button
                    x-on:click="$refs.input.click()"
                    type="button"
                    class="grid h-9 place-content-center rounded-md bg-white px-3 text-sm font-medium text-gray-900 shadow-xs ring-1 ring-gray-300 hover:bg-gray-50"
                >
                    Change
                </button>

                @unless (is_null($user->image))
                    <button
                        wire:click="destroy"
                        type="button"
                        class="grid h-9 place-content-center rounded-md px-3 text-sm font-medium text-gray-900"
                    >
                        Remove
                    </button>
                @endunless
            </div>

            @error('image')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
</form>
