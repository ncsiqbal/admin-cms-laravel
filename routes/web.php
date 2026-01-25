<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\GuideController as AdminGuideController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\GuideController as FrontGuideController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\SitemapController;

/*
|--------------------------------------------------------------------------
| FRONTEND
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/guides', [FrontGuideController::class, 'index'])
    ->name('guides.index');

Route::get('/guides/{slug}', [FrontGuideController::class, 'show'])
    ->name('guides.show');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ADMIN CMS
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

        // 🔐 ADMIN ONLY
        Route::middleware('role:admin')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])
                ->name('dashboard');

            Route::get('/company-profile', [CompanyProfileController::class, 'edit'])
                ->name('company-profile.edit');

            Route::post('/company-profile', [CompanyProfileController::class, 'update'])
                ->name('company-profile.update');
        });

        // 🔐 ADMIN & EDITOR
        Route::middleware('role:admin,editor')->group(function () {
            Route::resource('guides', AdminGuideController::class);
        });
    });

/*
|--------------------------------------------------------------------------
| SITEMAP
|--------------------------------------------------------------------------
*/

Route::get('/sitemap.xml', [SitemapController::class, 'index'])
    ->name('sitemap');

/*
|--------------------------------------------------------------------------
| FRONTEND PAGES (WAJIB PALING BAWAH)
|--------------------------------------------------------------------------
*/

Route::get('/{slug}', [PageController::class, 'show'])
    ->where('slug', 'about|contact')
    ->name('pages.show');

require __DIR__.'/auth.php';
