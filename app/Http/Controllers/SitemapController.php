<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Guide;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $pages = Page::where('is_active', true)->get();
        $guides = Guide::where('is_active', true)->get();

        return response()
            ->view('sitemap.index', compact('pages', 'guides'))
            ->header('Content-Type', 'application/xml');
    }
}
