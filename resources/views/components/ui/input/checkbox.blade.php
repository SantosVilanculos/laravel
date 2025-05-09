<div class="group grid size-4 grid-cols-1">
    <input
        type="checkbox"
        {{ $attributes->except(['type'])->merge(['class' => 'col-start-1 row-start-1 appearance-none rounded border border-gray-300 bg-white checked:border-zaffre-600 checked:bg-zaffre-600 indeterminate:border-zaffre-600 indeterminate:bg-zaffre-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-inherit disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto']) }}
    />

    <svg
        class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-[:disabled]:stroke-gray-950/25"
        viewBox="0 0 14 14"
        fill="none"
    >
        <path
            class="opacity-0 group-has-[:checked]:opacity-100"
            d="M3 8L6 11L11 3.5"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        ></path>
        <path
            class="opacity-0 group-has-[:indeterminate]:opacity-100"
            d="M3 7H11"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        ></path>
    </svg>
</div>
