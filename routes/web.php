<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $featuredProducts = Product::where('is_published', true)
        ->where('is_featured', true)
        ->latest()
        ->take(5)
        ->get();

    if ($featuredProducts->isEmpty()) {
        $featuredProducts = Product::where('is_published', true)->latest()->take(5)->get();
    }

    return view('home', compact('featuredProducts'));
})->name('home');

Route::get('/shop', function () {
    $products = Product::where('is_published', true)->latest()->paginate(9);

    return view('shop', compact('products'));
})->name('shop');

Route::get('/shop/{product:slug}', function (Product $product) {
    return view('shop-single', compact('product'));
})->name('shop.show');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// TEMPORARY diagnostic route — remove once the APP_KEY issue is resolved.
Route::get('/debug-env', function () {
    return response()->json([
        'config_app_key' => config('app.key') ? substr(config('app.key'), 0, 15).'...' : 'EMPTY',
        'getenv_app_key' => getenv('APP_KEY') ? substr(getenv('APP_KEY'), 0, 15).'...' : 'EMPTY',
        'env_helper_app_key' => env('APP_KEY') ? substr(env('APP_KEY'), 0, 15).'...' : 'EMPTY',
        'app_env' => config('app.env'),
        'cached_config_exists' => file_exists(base_path('bootstrap/cache/config.php')),
        'env_file_exists' => file_exists(base_path('.env')),
    ]);
});
