<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Company Profile')</title>
    <title>@yield('title', 'Guides')</title>
    <meta name="description" content="@yield('description', 'Panduan dan artikel bermanfaat')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <h1 class="text-xl font-bold">
                {{ $company->company_name ?? 'Company' }}
            </h1>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-10">
        @yield('content')
    </main>

    <footer class="bg-gray-100 mt-20 py-6 text-center text-sm text-gray-500">
        © {{ date('Y') }} {{ $company->company_name ?? 'Company' }}
    </footer>

</body>
</html>
