<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('admin.home');

    Route::get('login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout')->middleware('auth:web');

    Route::middleware('admin')->group(function () {

        Route::get('pre-products', [AdminController::class, 'preProducts'])->name('admin.pre-products');

        Route::get('edit-products', [AdminController::class, 'editProductsbyCategory'])->name('admin.edit-products');

        Route::get('products', [AdminController::class, 'adminViewProducts'])->name('admin.products');

        Route::get('add-product', [AdminController::class, 'addProduct'])->name('admin.add-product');
        Route::post('add-product', [AdminController::class, 'storeProduct'])->name('admin.add-product');

        Route::get('view-product/{product}', [AdminController::class, 'productInfo'])->name('admin.view-product');
        Route::get('edit-product/{product}', [AdminController::class, 'showEditProductPage'])->name('admin.edit-product');

        Route::post('edit-product/{product}', [AdminController::class, 'editProduct'])->name('admin.edit-product');

        Route::get('delete-product/{product}', [AdminController::class, 'deleteProduct'])->name('admin.delete-product');

        Route::get('customers', [AdminController::class, 'showCustomers'])->name('admin.customers');

        Route::get('orders', [AdminController::class, 'showOrders'])->name('admin.orders');
        Route::get('orders/{order}', [AdminController::class, 'showOrder'])->name('admin.order');
        Route::get('orders/{order}/view-item/{order_item}', [AdminController::class, 'viewOrderItem'])->name('admin.view-order-item');
        Route::get('orders/{order}/mark-complete', [AdminController::class, 'markOrderComplete'])->name('admin.order.complete');

    });

    Route::fallback(function () {
        return redirect()->route('admin.home');
    });
});
