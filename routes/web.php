<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

// ========================================
// HALAMAN UTAMA
// ========================================

Route::get('/', [TransactionController::class, 'index']);


// ========================================
// MANAJEMEN PRODUK
// ========================================

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::post('/products', [ProductController::class, 'store'])
    ->name('products.store');

Route::put('/products/{id}', [ProductController::class, 'update'])
    ->name('products.update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])
    ->name('products.destroy');


// ========================================
// TRANSAKSI KASIR
// ========================================

Route::get('/transactions', [TransactionController::class, 'index'])
    ->name('transactions.index');

Route::post('/transactions', [TransactionController::class, 'store'])
    ->name('transactions.store');


// ========================================
// SCANNER BARCODE
// ========================================

Route::get('/transactions/product/barcode/{barcode}', [TransactionController::class, 'findByBarcode'])
    ->name('transactions.product.barcode');


// ========================================
// CETAK STRUK
// ========================================

Route::get('/transactions/{id}/print', [TransactionController::class, 'printStruk'])
    ->name('transactions.print');