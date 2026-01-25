<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    /**
     * List guides (search + pagination)
     */
    public function index(Request $request)
    {
        $query = Guide::query();

        // SEARCH
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $guides = $query
            ->latest()
            ->paginate(6)
            ->withQueryString();

        return view('admin.guides.index', compact('guides'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.guides.create');
    }

    /**
     * Store new guide
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'     => 'required|string|max:255',
            'slug'      => 'required|string|max:255|unique:guides,slug',
            'content'   => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        Guide::create([
            'title'     => $data['title'],
            'slug'      => $data['slug'],
            'content'   => $data['content'] ?? null,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.guides.index')
            ->with('success', 'Guide berhasil ditambahkan');
    }

    /**
     * Show edit form
     */
    public function edit(Guide $guide)
    {
        return view('admin.guides.edit', compact('guide'));
    }

    /**
     * Update guide
     */
    public function update(Request $request, Guide $guide)
    {
        $data = $request->validate([
            'title'     => 'required|string|max:255',
            'slug'      => 'required|string|max:255|unique:guides,slug,' . $guide->id,
            'content'   => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $guide->update([
            'title'     => $data['title'],
            'slug'      => $data['slug'],
            'content'   => $data['content'] ?? null,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.guides.index')
            ->with('success', 'Guide berhasil diperbarui');
    }


    /**
     * Delete guide
     */
    public function destroy(Guide $guide)
    {
        $guide->delete();

        return redirect()
            ->route('admin.guides.index')
            ->with('success', 'Guide berhasil dihapus');
    }

        public function __construct()
    {
        $this->authorizeResource(Guide::class, 'guide');
    }


}
