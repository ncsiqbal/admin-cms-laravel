<x-layouts.app>

    {{-- HERO --}}
    <section class="bg-gradient-to-r from-blue-600 to-indigo-600">
        <div class="mx-auto max-w-7xl px-6 py-20 text-center text-white">
            <h1 class="text-4xl font-extrabold mb-4">
                Guides & Artikel
            </h1>
            <p class="max-w-2xl mx-auto text-lg text-blue-100">
                Kumpulan panduan, artikel, dan insight terbaru yang bisa kamu pelajari
            </p>
        </div>
    </section>

    {{-- CONTENT --}}
    <section class="mx-auto max-w-7xl px-6 py-16">

        @if ($guides->count())
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

                @foreach ($guides as $guide)
                    <article
                        class="group rounded-2xl border bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg"
                    >
                        {{-- Title --}}
                        <h2 class="mb-3 text-xl font-semibold text-gray-800 group-hover:text-blue-600">
                            {{ $guide->title }}
                        </h2>

                        {{-- Excerpt --}}
                        <p class="mb-4 text-sm text-gray-600">
                            {{ Str::limit(strip_tags($guide->content), 120) }}
                        </p>

                        {{-- Action --}}
                        <a
                            href="{{ route('guides.show', $guide->slug) }}"
                            class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline"
                        >
                            Baca selengkapnya
                            <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </article>
                @endforeach

            </div>

            {{-- PAGINATION --}}
            <div class="mt-12">
                {{ $guides->links() }}
            </div>
        @else
            <div class="text-center text-gray-500">
                Belum ada guide yang tersedia.
            </div>
        @endif

    </section>

</x-layouts.app>
