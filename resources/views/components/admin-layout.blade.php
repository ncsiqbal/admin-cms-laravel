@include('layouts.admin')

<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">

        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r">
            <div class="p-4 font-bold text-lg">
                CMS Admin
            </div>

            <nav class="px-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                   class="block px-3 py-2 rounded hover:bg-gray-200">
                    Dashboard
                </a>

                <a href="#" class="block px-3 py-2 rounded hover:bg-gray-200">
                    Pages
                </a>

                <a href="#" class="block px-3 py-2 rounded hover:bg-gray-200">
                    Blog
                </a>

                <a href="#" class="block px-3 py-2 rounded hover:bg-gray-200">
                    Portfolio
                </a>
                <a href="{{ route('admin.company-profile.edit') }}"
                    class="block px-3 py-2 rounded hover:bg-gray-200">
                    Company Profile
                </a>
            </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>

    @section('content')
        {{ $slot }}
    @endsection
    </div>
</x-app-layout>
