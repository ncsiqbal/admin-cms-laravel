<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Guide;

class GuideController extends Controller
{
    public function index()
    {
        $guides = Guide::latest()->paginate(6);

        return view('frontend.guides.index', compact('guides'));
    }

    public function show(string $slug)
    {
        $guide = Guide::where('slug', $slug)->firstOrFail();

        return view('frontend.guides.show', compact('guide'));
    }
}
