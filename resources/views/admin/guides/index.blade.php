<x-admin.layouts.app>

    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Guides</h1>

        <a
            href="{{ route('admin.guides.create') }}"
            class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
        >
            + Create Guide
        </a>
    </div>

    <!-- Search -->
    <form method="GET" class="mb-4">
        <div class="flex items-center gap-2">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari guide..."
                class="w-64 rounded border px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-blue-200"
            >

            <button
                type="submit"
                class="rounded bg-gray-800 px-4 py-2 text-sm text-white hover:bg-gray-900"
            >
                Search
            </button>

            @if (request('search'))
                <a
                    href="{{ route('admin.guides.index') }}"
                    class="text-sm text-gray-600 hover:underline"
                >
                    Reset
                </a>
            @endif
        </div>
    </form>

    <!-- Table -->
    <div class="overflow-x-auto rounded border bg-white">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Slug</th>
                    <th class="border px-4 py-2 w-40">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($guides as $guide)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $guide->title }}</td>
                        <td class="border px-4 py-2 text-gray-600">{{ $guide->slug }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex gap-2">
                                <a
                                    href="{{ route('admin.guides.edit', $guide) }}"
                                    class="rounded bg-yellow-500 px-3 py-1 text-white hover:bg-yellow-600"
                                >
                                    Edit
                                </a>

                                <form
                                    method="POST"
                                    action="{{ route('admin.guides.destroy', $guide) }}"
                                    x-data
                                >
                                    @csrf
                                    @method('DELETE')

                                    @can('delete', $guide)
                                    <button
                                        type="button"
                                        onclick="openDeleteModal({{ $guide->id }})"
                                        class="rounded bg-red-600 px-3 py-1 text-white hover:bg-red-700"
                                    >
                                        Delete
                                    </button>
                                    @endcan
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                            Belum ada guide.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $guides->links() }}
    </div>

    <!-- DELETE MODAL -->
    <div
        x-data="{ open: false, form: null }"
        x-on:open-delete-modal.window="
            open = true;
            form = $event.detail.form;
        "
        x-show="open"
        x-transition
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
    >
        <div
            class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg"
            @click.outside="open = false"
        >
            <h2 class="mb-3 text-lg font-semibold text-gray-800">
                Konfirmasi Hapus
            </h2>

            <p class="mb-6 text-sm text-gray-600">
                Apakah kamu yakin ingin menghapus guide ini?
                <span class="font-semibold text-red-600">
                    Tindakan ini tidak bisa dibatalkan.
                </span>
            </p>

            <div class="flex justify-end gap-3">
                <button
                    type="button"
                    @click="open = false"
                    class="rounded border px-4 py-2 text-gray-600 hover:bg-gray-100"
                >
                    Batal
                </button>

                <button
                    type="button"
                    @click="form.submit()"
                    class="rounded bg-red-600 px-4 py-2 text-white hover:bg-red-700"
                >
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>

</x-admin.layouts.app>
