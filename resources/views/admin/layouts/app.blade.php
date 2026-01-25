<x-app-layout
    x-data="{
        dark: localStorage.getItem('theme') === 'dark'
    }"
    x-init="
        if (dark) document.documentElement.classList.add('dark')
    "
>
    <!-- TOP BAR -->
    <header data-aos="fade-down"
        class="bg-white dark:bg-gray-900 border-b dark:border-gray-700 sticky top-0 z-40">
        <div class="max-w-full px-6 py-3 flex justify-between items-center">

            <!-- DARK TOGGLE -->
            <button
                @click="
                    dark = !dark;
                    document.documentElement.classList.toggle('dark');
                    localStorage.setItem('theme', dark ? 'dark' : 'light');
                "
                class="p-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 transition"
                title="Toggle Dark Mode"
            >
                <span x-show="!dark">🌙</span>
                <span x-show="dark">☀️</span>
            </button>

            <!-- LEFT -->
            <div class="flex items-center gap-4">
                <span class="text-xl font-bold text-blue-600 dark:text-blue-400">
                    {{ config('app.name', 'Company Profile CMS') }}
                </span>

                <span class="text-sm text-gray-400 hidden md:block">
                    Admin Panel
                </span>
            </div>

            <!-- RIGHT -->
            <div class="flex items-center gap-4">

                <a href="/" target="_blank"
                   class="text-sm text-gray-600 dark:text-gray-300 hover:text-blue-600">
                    🌐 View Website
                </a>

                @auth
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="text-sm font-medium">
                            {{ auth()->user()->name }}
                        </span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <div x-show="open" @click.outside="open = false"
                         class="absolute right-0 mt-2 w-40 bg-white dark:bg-gray-800 rounded-xl shadow border dark:border-gray-700 overflow-hidden">
                        <a href="{{ route('profile.edit') }}"
                           class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                            Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-700 text-red-600">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                @endauth

            </div>
        </div>
    </header>

    <!-- MOBILE NOTICE -->
    <div class="md:hidden bg-yellow-100 text-yellow-800 px-4 py-3 text-sm">
        Admin panel optimal di desktop 💻
    </div>

    <div class="flex min-h-screen bg-gray-100 dark:bg-gray-900">

        <!-- SIDEBAR -->
        <aside data-aos="fade-right"
            class="w-64 bg-white dark:bg-gray-800 border-r dark:border-gray-700 hidden md:block">
            <div class="p-5 font-bold text-lg border-b dark:border-gray-700 text-gray-800 dark:text-gray-100">
                CMS Navigation
            </div>

            <nav class="px-4 py-6 space-y-1 text-sm">

                @php
                    $menu = 'flex items-center gap-3 px-3 py-2 rounded-lg transition';
                    $active = 'bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 font-semibold';
                    $inactive = 'text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700';
                @endphp

                <a href="{{ route('admin.dashboard') }}"
                   class="{{ $menu }} {{ request()->routeIs('admin.dashboard') ? $active : $inactive }}">
                    📊 Dashboard
                </a>

                <a href="{{ route('admin.guides.index') }}"
                   class="{{ $menu }} {{ request()->routeIs('admin.guides.*') ? $active : $inactive }}">
                    📝 Guides
                </a>

                <div class="pt-4 mt-4 border-t dark:border-gray-700 text-xs text-gray-400 uppercase">
                    Content
                </div>

                <a href="#" class="{{ $menu }} {{ $inactive }}">
                    📄 Pages
                </a>

                <a href="#" class="{{ $menu }} {{ $inactive }}">
                    📰 Blog
                </a>

                <a href="#" class="{{ $menu }} {{ $inactive }}">
                    💼 Portfolio
                </a>

            </nav>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-6">

            <!-- FLASH SUCCESS -->
            @if (session('success'))
                <div data-aos="zoom-in"
                    x-data="{ show: true }"
                    x-init="setTimeout(() => show = false, 3000)"
                    x-show="show"
                    x-transition
                    class="mb-4 flex items-center justify-between rounded-lg border border-green-300 bg-green-100 px-4 py-3 text-green-800"
                >
                    <span>{{ session('success') }}</span>
                    <button @click="show = false"
                            class="ml-4 text-lg font-bold">
                        ×
                    </button>
                </div>
            @endif

            <!-- CONTENT -->
            <div class="max-w-7xl mx-auto">
                <div data-aos="fade-up"
                    class="bg-white dark:bg-gray-800 dark:text-gray-100 rounded-2xl shadow-sm p-6">
                    {{ $slot }}
                </div>
            </div>

        </main>
    </div>

    <!-- ALPINE -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                duration: 700,
                easing: 'ease-out-cubic',
                once: true,
            });
        });
    </script>

</x-app-layout>
