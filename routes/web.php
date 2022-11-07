<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\{CategoryController, CustomerController, SupplierController, OrderPurchaseController, HomeController, OrderSaleController, ProductController};


Route::get('login', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout',  [LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {    
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('customers', CustomerController::class)->only('index');
    Route::delete('orders/sales/{orderDetail}', [OrderSaleController::class, 'destroySales'])->name('sales.destroy');    
    // Produk Modul
    Route::middleware('admin')->group(function () {
        Route::get('orders/sales', [OrderSaleController::class, 'sales'])->name('sales.index');
        Route::get('orders/sales/create', [OrderSaleController::class, 'create'])->name('sales.create');
        Route::post('orders/sales/create', [OrderSaleController::class, 'storeSales'])->name('sales.store');
        Route::post('orders/sales', [OrderSaleController::class, 'updateSales'])->name('sales.update');
        Route::get('orders/sales/{id}', [OrderSaleController::class, 'showSales'])->name('sales.show');
    });
    // Order Penjualan
    /** Customer */
});
