<x-admin.layouts.app>
    <h1 class="mb-6 text-2xl font-bold">Create Guide</h1>

    <form
        method="POST"
        action="{{ route('admin.guides.store') }}"
        class="space-y-4"
    >
        @csrf

        {{-- TITLE --}}
        <div>
            <label class="mb-1 block font-medium">Title</label>
            <input
                id="title"
                type="text"
                name="title"
                value="{{ old('title') }}"
                class="w-full rounded border px-3 py-2 @error('title') border-red-500 @enderror"
                required
            >
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- SLUG --}}
        <div>
            <label class="mb-1 block font-medium">Slug</label>
            <input
                id="slug"
                type="text"
                name="slug"
                value="{{ old('slug') }}"
                class="w-full rounded border px-3 py-2 @error('slug') border-red-500 @enderror"
                required
            >
            @error('slug')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- CONTENT --}}
        <div>
            <label class="mb-1 block font-medium">Content</label>
            <textarea
                name="content"
                rows="6"
                class="w-full rounded border px-3 py-2 @error('content') border-red-500 @enderror"
            >{{ old('content') }}</textarea>
            @error('content')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button
            type="submit"
            class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700"
        >
            Save
        </button>
    </form>

    {{-- SLUG AUTO --}}
    <script>
        const titleInput = document.getElementById('title');
        const slugInput  = document.getElementById('slug');

        titleInput.addEventListener('input', function () {
            slugInput.value = titleInput.value
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/(^-|-$)/g, '');
        });
    </script>
</x-admin.layouts.app>
