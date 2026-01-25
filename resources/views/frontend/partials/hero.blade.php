<section class="bg-white py-20 text-center">
    <h1 class="text-4xl font-bold mb-4">
        {{ $company->company_name }}
    </h1>

    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
        {{ $company->about }}
    </p>
</section>

<h1>{{ $company?->company_name ?? 'Nama Perusahaan' }}</h1>
<p>{{ $company?->about ?? 'Deskripsi perusahaan belum tersedia.' }}</p>

