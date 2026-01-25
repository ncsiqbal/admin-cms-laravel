<nav class="bg-white border-b">
    <div class="mx-auto max-w-7xl px-6 py-4 flex items-center justify-between">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800">
            {{ config('app.name') }}
        </a>

        {{-- Menu --}}
        <ul class="flex space-x-6">
            <li>
                <a href="{{ route('home') }}"
                   class="text-gray-700 hover:text-blue-600">
                    Home
                </a>
            </li>

            @foreach ($pages as $page)
                <li>
                    <a href="{{ route('pages.show', $page->slug) }}"
                       class="text-gray-700 hover:text-blue-600">
                        {{ $page->title }}
                    </a>
                </li>
            @endforeach

            <li>
                <a href="{{ route('guides.index') }}"
                   class="text-gray-700 hover:text-blue-600">
                    Guides
                </a>
            </li>
        </ul>

    </div>
</nav>
