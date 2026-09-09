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
