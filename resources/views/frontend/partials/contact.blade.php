<section class="py-16">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-2xl font-semibold mb-6">Kontak</h2>

        <ul class="space-y-2 text-gray-700">
            <li>Email: {{ $company->email }}</li>
            <li>Phone: {{ $company->phone }}</li>
            <li>Address: {{ $company->address }}</li>
        </ul>
    </div>
</section>

<li>Email: {{ $company?->email ?? '-' }}</li>
<li>Phone: {{ $company?->phone ?? '-' }}</li>
<li>Address: {{ $company?->address ?? '-' }}</li>

