<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEO --}}
    <title>
        @hasSection('title')
            @yield('title') – {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>

    <meta name="description"
          content="@yield('description', 'Website resmi ' . config('app.name'))">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800">

    {{-- Frontend Navbar --}}
    <x-frontend-navbar />

    {{-- Content --}}
    <main class="mx-auto max-w-7xl px-6 py-10">
        @yield('content')
    </main>

@auth
    @if(auth()->user()->isAdmin())
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.company-profile.edit') }}">Company Profile</a>
        <a href="{{ route('admin.guides.index') }}">Manage Guides</a>
    @endif
@endauth

</body>
</html>
