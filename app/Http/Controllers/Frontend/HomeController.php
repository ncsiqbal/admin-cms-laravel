<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\Guide;

class HomeController extends Controller
{
    public function index()
    {
        $companyProfile = CompanyProfile::first();
        $guides = Guide::latest()->take(3)->get();

        return view('frontend.home', compact('companyProfile', 'guides'));
    }
}
