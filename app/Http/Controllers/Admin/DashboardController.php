<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use App\Models\User;
use App\Models\CompanyProfile;

class DashboardController extends Controller
{
    public function index()
    {
        $guideCount = Guide::count();
        $userCount = User::count();
        $companyProfileCount = CompanyProfile::count();

        return view('admin.dashboard', compact(
            'guideCount',
            'userCount',
            'companyProfileCount'
        ));
    }
}
