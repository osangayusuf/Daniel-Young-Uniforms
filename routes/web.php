<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactMessagesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

require __DIR__.'/admin.php';


Route::get('', function () {
    return view('pages.index');
})->name('home');

Route::get('about', function () {
    return view('pages.about');
})->name('about');


Route::get('/product/{product}', [ProductController::class, 'productInfo'])->name('view-product');

//    Route::get('/products/import', [ProductController::class, 'importProducts'])->name('import-products');

Route::get('pre-shop', [ProductController::class, 'preShop'])->name('pre-shop');

Route::get('shop', [ProductController::class, 'shop'])->name('shop');

Route::get('contact-us', [ContactMessagesController::class, 'create'])->name('contact-messages.create');

Route::post('contact-us', [ContactMessagesController::class, 'store'])->name('contact-messages.store');

Route::middleware('auth:web')->group(function () {

    Route::prefix('cart')->group(function () {
        Route::get('', [CartController::class, 'index'])->name('cart.index');
        Route::post('', [CartController::class, 'store'])->name('cart.store');
        Route::get('update/{cart}', [CartController::class, 'updateForm'])->name('cart.update-view');
        Route::put('update/{cart}', [CartController::class, 'update'])->name('cart.update');
        Route::get('delete/{cart}', [CartController::class, 'destroy'])->name('cart.delete');
    });

    Route::prefix('order')->group(function () {
        Route::get('checkout', [OrderController::class, 'create'])->name('order.checkout');
        Route::post('store', [OrderController::class, 'store'])->name('order.store');
        Route::get('set-address', [OrderController::class, 'setAddress'])->name('order.set-address');
        Route::get('placed', [OrderController::class, 'orderPlaced'])->name('order.placed');
    });

    Route::prefix('profile')->group(function () {
        Route::get('', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('orders', [ProfileController::class, 'myOrders'])->name('profile.orders');
        Route::get('orders/{order}', [ProfileController::class, 'viewSingleOrder'])->name('profile.order');
        Route::get('manage-password', [ProfileController::class, 'managePassword'])->name('profile.manage-password');
        Route::post('manage-password', [PasswordController::class, 'update'])->name('profile.update-password');
        Route::get('manage-address', [ProfileController::class, 'viewAddress'])->name('profile.view-address');
        Route::post('manage-address', [ProfileController::class, 'updateAddress'])->name('profile.update-address');
    });
});



require __DIR__.'/auth.php';
Route::fallback(function () {
    return redirect()->route('home');
});


