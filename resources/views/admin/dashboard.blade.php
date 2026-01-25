<x-admin-layout>
    <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow p-6">
            <div class="text-gray-400 text-sm">Total Guides</div>
            <div class="text-3xl font-bold">{{ $guideCount }}</div>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <div class="text-gray-400 text-sm">Users</div>
            <div class="text-3xl font-bold">{{ $userCount }}</div>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <div class="text-gray-400 text-sm">Company Profile</div>
            <div class="text-3xl font-bold">{{ $companyProfileCount }}</div>
        </div>
    </div>
</x-admin-layout>
