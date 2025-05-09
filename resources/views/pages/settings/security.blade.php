<x-layouts.settings>
    <div class="space-y-12">
        <section>
            @livewire('components.password')
        </section>

        <div class="my-8 h-px w-full border-0 bg-zinc-800/5 [print-color-adjust:exact]"></div>

        <section class="pb-10">
            @livewire('components.delete-user')
        </section>
    </div>
</x-layouts.settings>
