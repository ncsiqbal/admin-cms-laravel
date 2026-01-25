<!DOCTYPE html>
<html lang="en"
x-data="{
    dark: localStorage.getItem('dark') === 'true',
    toggle() {
        this.dark = !this.dark
        localStorage.setItem('dark', this.dark)
    }
}"
:class="{ 'dark': dark }"
>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Admin') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite('resources/css/app.css')

    <!-- Alpine -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white dark:bg-gray-800 border-r dark:border-gray-700">
        <div class="p-5 font-bold text-xl border-b dark:border-gray-700">
            CMS Admin
        </div>

        @php
            $active = 'bg-gray-200 dark:bg-gray-700 font-semibold';
        @endphp

        <nav class="p-4 space-y-2 text-sm">
            <a href="{{ route('admin.dashboard') }}"
               class="block px-4 py-2 rounded transition
               {{ request()->routeIs('admin.dashboard') ? $active : '' }}">
                📊 Dashboard
            </a>

            <a href="{{ route('admin.guides.index') }}"
               class="block px-4 py-2 rounded transition
               {{ request()->routeIs('admin.guides.*') ? $active : '' }}">
                📚 Guides
            </a>
        </nav>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-6">

        <!-- TOP BAR -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold">@yield('title', 'Dashboard')</h1>

            <button
                @click="toggle"
                class="px-3 py-1 rounded bg-gray-200 dark:bg-gray-700 transition"
            >
                🌙
            </button>
        </div>

        <!-- CONTENT -->
        <div data-aos="fade-up">
            @yield('content')
        </div>
    </main>

</div>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 700,
        once: true
    });
</script>

</body>
</html>
