@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
    <div class="max-w-6xl mx-auto px-6 py-24 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">
            {{ $companyProfile->company_name ?? 'Company Name' }}
        </h1>
        <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto">
            {{ $companyProfile->tagline ?? 'Solusi digital modern untuk kebutuhan bisnis Anda.' }}
        </p>

        <div class="mt-8 flex justify-center gap-4">
            <a href="#about"
               class="bg-white text-blue-700 px-6 py-3 rounded-xl font-semibold hover:bg-blue-100 transition">
                Tentang Kami
            </a>
            <a href="#contact"
               class="border border-white px-6 py-3 rounded-xl font-semibold hover:bg-white hover:text-blue-700 transition">
                Kontak
            </a>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section id="about" class="py-20 bg-gray-50">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-6">Tentang Kami</h2>
        <p class="text-gray-600 leading-relaxed max-w-3xl mx-auto">
            {{ $companyProfile->about ?? 'Deskripsi tentang perusahaan belum tersedia.' }}
        </p>
    </div>
</section>

<!-- GUIDES / SERVICES -->
<section class="py-20">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">
            Artikel & Panduan
        </h2>

        <div class="grid md:grid-cols-3 gap-8">
            @forelse ($guides as $guide)
                <div class="bg-white rounded-2xl shadow hover:shadow-lg transition p-6">
                    <h3 class="text-xl font-semibold mb-3">
                        {{ $guide->title }}
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        {{ Str::limit(strip_tags($guide->content), 100) }}
                    </p>
                    <a href="{{ route('guides.show', $guide->slug) }}"
                       class="text-blue-600 font-semibold hover:underline">
                        Baca selengkapnya →
                    </a>
                </div>
            @empty
                <p class="text-center col-span-3 text-gray-500">
                    Belum ada artikel.
                </p>
            @endforelse
        </div>
    </div>
</section>

<!-- CONTACT -->
<section id="contact" class="py-20 bg-gray-900 text-white">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-6">Kontak</h2>

        <div class="space-y-3 text-gray-300">
            <p>Email: {{ $companyProfile->email ?? '-' }}</p>
            <p>Phone: {{ $companyProfile->phone ?? '-' }}</p>
            <p>Address: {{ $companyProfile->address ?? '-' }}</p>
        </div>
    </div>
</section>

@endsection
