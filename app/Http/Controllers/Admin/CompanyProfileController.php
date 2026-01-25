<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyProfileController extends Controller
{

    public function edit()
    {
        return view('admin.company-profile.edit', [
            'profile' => CompanyProfile::first()
        ]);
    }

    public function update(Request $request)
{
    $data = $request->validate([
        'company_name' => 'required|string|max:255',
        'about' => 'nullable|string',
        'email' => 'nullable|email',
        'phone' => 'nullable|string',
        'address' => 'nullable|string',
        'logo' => 'nullable|image|max:2048',
        'banner' => 'nullable|image|max:4096',
        'facebook' => 'nullable|url',
        'instagram' => 'nullable|url',
        'linkedin' => 'nullable|url',
        'youtube' => 'nullable|url',
    ]);

    $profile = CompanyProfile::first();

    if ($request->hasFile('logo')) {
        $data['logo'] = $request->file('logo')
            ->store('company-profile', 'public');
    }

    if ($request->hasFile('banner')) {
        $data['banner'] = $request->file('banner')
            ->store('company-profile', 'public');
    }


    $profile->update($data);

    return back()->with('success', 'Company profile updated successfully.');


}

}
