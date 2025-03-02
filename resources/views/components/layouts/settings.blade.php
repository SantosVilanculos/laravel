<x-layouts.app>
    <div class="flex flex-col gap-12 md:flex-row">
        <aside class="md:w-60">
            <nav>
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('settings.general') }}" @class([
                            'hover:bg-gray-200 inline-flex items-center justify-left rounded-md  px-3 py-2 text-sm font-medium text-gray-900 w-full',
                            'bg-gray-200' => Request::routeIs('settings.general'),
                        ])>
                            General
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('settings.security') }}" @class([
                            'inline-flex items-center justify-left rounded-md hover:bg-gray-200 px-3 py-2 text-sm font-medium text-gray-900 w-full',
                            'bg-gray-200' => Request::routeIs('settings.security'),
                        ])>
                            Security
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="border-b border-gray-900/10 md:hidden"></div>

        <div class="md:flex-1">
            {{ $slot }}
        </div>
    </div>
</x-layouts.app>
