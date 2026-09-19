<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

// Halaman Utama langsung ke Transaksi Kasir
Route::get('/', [TransactionController::class, 'index']);

// Route Manajemen Produk (Tambah, Edit, Hapus)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

// Route Transaksi Kasir & Cetak Struk Nota
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('/transactions/{id}/print', [TransactionController::class, 'printStruk'])->name('transactions.print');