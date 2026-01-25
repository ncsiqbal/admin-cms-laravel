<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-100">
                Dashboard
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Ringkasan aktivitas sistem hari ini
            </p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- STATS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <!-- CARD -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow
                            hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="text-gray-400 text-sm mb-2">Total Guides</div>
                    <div class="flex justify-between items-center">
                        <div class="text-3xl font-bold">12</div>
                        <div class="text-3xl">📘</div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow
                            hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="text-gray-400 text-sm mb-2">Users</div>
                    <div class="flex justify-between items-center">
                        <div class="text-3xl font-bold">5</div>
                        <div class="text-3xl">👤</div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow
                            hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="text-gray-400 text-sm mb-2">Company Profile</div>
                    <div class="flex justify-between items-center">
                        <div class="text-3xl font-bold">1</div>
                        <div class="text-3xl">🏢</div>
                    </div>
                </div>
            </div>

            <!-- WELCOME BOX -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow">
                <h3 class="text-xl font-semibold mb-2">Welcome Back 👋</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Kamu sudah berhasil login ke CMS Admin.
                    Gunakan sidebar untuk mengelola konten dan data sistem.
                </p>
            </div>

        </div>
    </div>
</x-app-layout>
