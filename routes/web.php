<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactMessagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/product/{product?}', [ProductController::class, 'productInfo'])->name('view-product');

//Route::get('/products/import', [ProductController::class, 'importProducts'])->name('import-products');

Route::get('/shop', [ProductController::class, 'shop'])->name('shop');

Route::get('/contact-us', [ContactMessagesController::class, 'create'])->name('contact-messages.create');

Route::post('/contact-us', [ContactMessagesController::class, 'store'])->name('contact-messages.store');

Route::middleware('auth:web')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::get('/cart/update/{cart}', [CartController::class, 'updateForm'])->name('cart.update-view');
    Route::put('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/delete/{cart}', [CartController::class, 'destroy'])->name('cart.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback(function () {
    return redirect()->route('home');
});

require __DIR__.'/auth.php';
