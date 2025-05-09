<form wire:submit="save" method="POST">
    <h2 class="text-base/7 font-medium text-zinc-800">Full name</h2>

    <p class="mt-2 text-sm/6 text-zinc-500">Change the name shown to other users</p>

    <div class="mt-6 space-y-6">
        <div class="flex w-full max-w-sm gap-x-2">
            <x-ui.input wire:model="name" type="text" name="name" id="name" autocomplete="name" />
            <x-ui.button wire:loading.class="loading" type="submit">Change</x-ui.button>
        </div>
    </div>
</form>
