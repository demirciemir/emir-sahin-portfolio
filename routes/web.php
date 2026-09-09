<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $clients = \App\Models\Client::orderBy('order', 'asc')->latest()->get();
    $activeCv = \App\Models\Cv::where('is_active', true)->first();
    return view('welcome', compact('clients', 'activeCv'));
});

// ==========================================
// ADMIN PANEL ROUTES (/emirhantakva)
// ==========================================
Route::prefix('emirhantakva')->group(function () {
    // Guest Routes (Login)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('admin.login');
        Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
    });

    // Authenticated Admin Routes
    Route::middleware('auth')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('admin.logout');
        
        // Modules
        Route::post('clients/reorder', [App\Http\Controllers\Admin\ClientController::class, 'reorder'])->name('admin.clients.reorder');
        Route::resource('clients', App\Http\Controllers\Admin\ClientController::class)->names('admin.clients');
        
        Route::post('projects/reorder', [App\Http\Controllers\Admin\ProjectController::class, 'reorder'])->name('admin.projects.reorder');
        Route::resource('projects', App\Http\Controllers\Admin\ProjectController::class)->names('admin.projects');
        
        Route::post('cv/{cv}/make-active', [App\Http\Controllers\Admin\CvController::class, 'makeActive'])->name('admin.cv.makeActive');
        Route::resource('cv', App\Http\Controllers\Admin\CvController::class)->only(['index', 'store', 'destroy'])->names('admin.cv');
        
        Route::resource('users', App\Http\Controllers\Admin\UserController::class)->except(['show'])->names('admin.users');
        
        Route::post('social-media/reorder', [App\Http\Controllers\Admin\SocialMediaController::class, 'reorder'])->name('admin.social-media.reorder');
        Route::post('social-media/{socialMedia}/toggle', [App\Http\Controllers\Admin\SocialMediaController::class, 'toggleActive'])->name('admin.social-media.toggle');
        Route::resource('social-media', App\Http\Controllers\Admin\SocialMediaController::class)->parameters([
            'social-media' => 'socialMedia'
        ])->except(['show'])->names('admin.social-media');

        Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.settings.index');
        Route::post('settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.settings.update');
    });
});

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'tr'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

Route::get('/work/{slug}', function ($slug) {
    $client = \App\Models\Client::where('slug', $slug)->firstOrFail();
    $projects = \App\Models\Project::where('client_id', $client->id)->orderBy('order', 'asc')->latest()->get();
    
    return view('work-detail', compact('client', 'projects'));
})->name('work.detail');

Route::get('/sitemap.xml', function () {
    $clients = \App\Models\Client::all();
    $content = '<?xml version="1.0" encoding="UTF-8"?>';
    $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    
    // Ana Sayfa
    $content .= '<url>';
    $content .= '<loc>https://emirvisuals.com/</loc>';
    $content .= '<lastmod>' . now()->toAtomString() . '</lastmod>';
    $content .= '<changefreq>weekly</changefreq>';
    $content .= '<priority>1.0</priority>';
    $content .= '</url>';
    
    // Marka Sayfaları
    foreach ($clients as $client) {
        $content .= '<url>';
        $content .= '<loc>https://emirvisuals.com/work/' . $client->slug . '</loc>';
        $content .= '<lastmod>' . $client->updated_at->toAtomString() . '</lastmod>';
        $content .= '<changefreq>monthly</changefreq>';
        $content .= '<priority>0.8</priority>';
        $content .= '</url>';
    }
    
    $content .= '</urlset>';
    
    return response($content, 200)->header('Content-Type', 'text/xml');
});
