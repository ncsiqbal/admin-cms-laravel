<x-admin-layout>
    <h1 class="text-2xl font-bold mb-4">Company Profile</h1>

    @if(session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.company-profile.update') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Company Name</label>
            <input type="text" name="company_name"
                   value="{{ old('company_name', $profile->company_name ?? '') }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">About</label>
            <textarea name="about" rows="5"
                      class="w-full border rounded px-3 py-2">{{ old('about', $profile->about ?? '') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Email</label>
            <input type="email" name="email"
                   value="{{ old('email', $profile->email ?? '') }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Phone</label>
            <input type="text" name="phone"
                   value="{{ old('phone', $profile->phone ?? '') }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Address</label>
            <input type="text" name="address"
                   value="{{ old('address', $profile->address ?? '') }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Save
        </button>

          <input type="text" name="company_name"
                value="{{ old('company_name', $profile->company_name) }}"
                class="w-full border rounded-lg p-3 mb-4">

            <textarea name="about"
                    class="w-full border rounded-lg p-3 h-40">
                {{ old('about', $profile->about) }}
            </textarea>

            <button class="mt-4 bg-blue-600 text-white px-6 py-3 rounded-xl">
                Simpan
            </button>
        </form>

        <!-- PREVIEW -->
        <div class="bg-gray-50 rounded-2xl p-6">
            <h2 class="text-2xl font-bold">{{ $profile->company_name }}</h2>
            <p class="mt-4 text-gray-600">{{ $profile->about }}</p>
        </div>

    </div>

    </form>
</x-admin-layout>
