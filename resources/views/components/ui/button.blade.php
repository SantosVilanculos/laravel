@props(['variant' => 'secondary'])

<button
    {{
        $attributes
            ->class([
                'group relative isolate inline-flex items-center justify-center rounded-md px-3 h-9 text-sm font-medium',
                'bg-zaffre-600 text-white shadow-sm hover:bg-zaffre-500' => $variant === 'primary',
                'bg-white text-gray-900 shadow-xs border border-zinc-300 disabled:border-zinc-200  hover:bg-gray-50' => $variant === 'secondary',
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
