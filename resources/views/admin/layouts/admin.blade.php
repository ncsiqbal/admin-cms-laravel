<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} – Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">

<div
    x-data="{ dark: localStorage.getItem('theme') === 'dark' }"
    x-init="if(dark) document.documentElement.classList.add('dark')"
    class="min-h-screen flex"
>

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r hidden md:flex flex-col">
        <div class="p-5 font-bold text-lg border-b">
            CMS Admin
        </div>

        <nav class="flex-1 px-4 py-4 space-y-1 text-sm">
            <a href="{{ route('admin.dashboard') }}"
               class="block px-3 py-2 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
                📊 Dashboard
            </a>

            <a href="{{ route('admin.guides.index') }}"
               class="block px-3 py-2 rounded-lg {{ request()->routeIs('admin.guides.*') ? 'bg-blue-50 text-blue-600 font-semibold' : 'hover:bg-gray-100' }}">
                📝 Guides
            </a>

            <div class="mt-6 pt-4 border-t text-xs text-gray-400 uppercase">
                Content
            </div>

            <a href="{{ route('admin.company-profile.edit') }}"
               class="block px-3 py-2 rounded-lg hover:bg-gray-100">
                🏢 Company Profile
            </a>
        </nav>
    </aside>

    <!-- MAIN -->
    <div class="flex-1 flex flex-col">

        <!-- TOPBAR -->
        <header class="bg-white border-b px-6 py-3 flex justify-between items-center">
            <div class="font-semibold">
                Admin Panel
            </div>

            <div class="flex items-center gap-4">

                <button
                    @click="
                        dark = !dark;
                        document.documentElement.classList.toggle('dark');
                        localStorage.setItem('theme', dark ? 'dark' : 'light');
                    "
                    class="p-2 rounded hover:bg-gray-100"
                >
                    <span x-show="!dark">🌙</span>
                    <span x-show="dark">☀️</span>
                </button>

                <span class="text-sm">{{ auth()->user()->name }}</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm text-red-600 hover:underline">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>
</div>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
