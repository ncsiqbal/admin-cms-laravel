<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    {{-- Home --}}
    <url>
        <loc>{{ url('/') }}</loc>
        <priority>1.0</priority>
    </url>

    {{-- Pages --}}
    @foreach ($pages as $page)
        <url>
            <loc>{{ url($page->slug) }}</loc>
            <priority>0.8</priority>
        </url>
    @endforeach

    {{-- Guides --}}
    @foreach ($guides as $guide)
        <url>
            <loc>{{ route('guides.show', $guide->slug) }}</loc>
            <priority>0.7</priority>
        </url>
    @endforeach

</urlset>
