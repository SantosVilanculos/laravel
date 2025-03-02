<x-layouts.settings>
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            @livewire('settings.photo')
        </div>

        <div class="border-b border-gray-900/10 pb-12">
            @livewire('settings.profile-information')
        </div>

        <div class="">
            <p class="text-sm/6 text-gray-600">
                This account was created {{ Auth::user()->created_at->diffForHumans() }} and the last login was
                {{ Auth::user()->last_logged_in_at->diffForHumans() }}.
            </p>
        </div>
    </div>
</x-layouts.settings>
