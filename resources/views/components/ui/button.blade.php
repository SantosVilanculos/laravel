@props(['variant' => 'default'])

<button
    {{
        $attributes
            ->class([
                'group relative isolate inline-flex items-center justify-center rounded-md px-3 py-2 text-sm font-semibold',
                'bg-indigo-600 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600' => $variant === 'accent',
                'bg-red-600 text-white shadow-xs hover:bg-red-500' => $variant === 'danger',
                'bg-white text-gray-900 shadow-xs ring-1 ring-gray-300 hover:bg-gray-50' => $variant === 'default' || ! in_array($variant, ['accent', 'default', 'ghost', 'danger']),
            ])
            ->merge(['type' => 'submit'])
    }}
>
    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-[.loading]:opacity-100">
        <svg
            class="size-4 shrink-0 animate-spin"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            aria-hidden="true"
        >
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path
                class="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
            ></path>
        </svg>
    </div>
    <span class="group-[.loading]:opacity-0">{{ $slot }}</span>
</button>
