<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Guides' }}</title>

    <meta name="description"
          content="{{ $description ?? 'Panduan dan artikel bermanfaat' }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- Navbar --}}
    <header class="border-b bg-white">
        <div class="mx-auto max-w-6xl px-6 py-4">
            <a href="/" class="text-xl font-bold">
                Company Profile
            </a>
        </div>
    </header>

    {{-- Content --}}
    <main>
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="mt-16 border-t bg-white">
        <div class="mx-auto max-w-6xl px-6 py-6 text-sm text-gray-500">
            © {{ date('Y') }} Company Profile
        </div>
    </footer>

</body>
</html>
