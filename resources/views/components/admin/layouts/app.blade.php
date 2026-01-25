<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Admin CMS' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<script src="//unpkg.com/alpinejs" defer></script>
<body class="bg-gray-100 text-gray-800">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r">
        <div class="p-4 font-bold text-lg">
            CMS Admin
        </div>

        <nav class="px-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}"
               class="block px-3 py-2 rounded hover:bg-gray-200">
                Dashboard
            </a>

            <a href="{{ route('admin.guides.index') }}"
               class="block px-3 py-2 rounded hover:bg-gray-200">
                Guides
            </a>
        </nav>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-6">
        {{ $slot }}
    </main>

    <!-- DELETE CONFIRM MODAL -->
<div
    x-data="{ open: false, action: '' }"
    x-show="open"
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
>
    <div
        @click.away="open = false"
        class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg"
    >
        <h2 class="mb-2 text-lg font-semibold text-gray-800">
            Konfirmasi Hapus
        </h2>

        <p class="mb-4 text-gray-600">
            Data yang dihapus tidak bisa dikembalikan. Lanjutkan?
        </p>

        <div class="flex justify-end gap-2">
            <button
                @click="open = false"
                class="rounded bg-gray-200 px-4 py-2 hover:bg-gray-300"
            >
                Batal
            </button>

            <form :action="action" method="POST">
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="rounded bg-red-600 px-4 py-2 text-white hover:bg-red-700"
                >
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>

</div>
</body>
</html>
