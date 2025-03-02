<x-layouts.settings>
    <div class="space-y-12">
        {{-- date_and_time --}}
        <form>
            <h2 class="text-base/7 font-semibold text-gray-900">Date & time</h2>
            <p class="mt-1 text-sm/6 text-gray-600">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12">
                <div class="sm:col-span-6">
                    <x-ui.label for="first_name">Time zone</x-ui.label>
                    <div class="mt-2">
                        <x-ui.select name="timezone" id="timezone" required>
                            <option value="" selected>―</option>
                            @foreach (timezone_identifiers_list() as $timezone)
                                <option @selected(Str::of($timezone)->is(''))>{{ $timezone }}</option>
                            @endforeach
                        </x-ui.select>
                    </div>
                    @error('timezone')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-full">
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-md bg-white px-3 py-2 text-sm font-medium text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
                    >
                        Save
                    </button>

                    {{--
                        <button type="reset"
                        class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-gray-900 rounded-md hover:bg-gray-50">
                        Reset
                        </button>
                    --}}
                </div>
            </div>
        </form>
    </div>
</x-layouts.settings>
