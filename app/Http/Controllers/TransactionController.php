<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Menampilkan halaman transaksi kasir
    public function index()
    {
        $products = Product::where('stok', '>', 0)->get();
        $transactions = Transaction::with('product')->latest()->get();
        return view('transactions.index', compact('products', 'transactions'));
    }

    // Memproses transaksi penjualan
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'jumlah'     => 'required|integer|min:1',
            'bayar'      => 'required|numeric',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stok < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi!');
        }

        $totalHarga = $product->harga * $request->jumlah;

        if ($request->bayar < $totalHarga) {
            return redirect()->back()->with('error', 'Uang pembayaran kurang!');
        }

        $kembalian = $request->bayar - $totalHarga;

        // Simpan Transaksi
        Transaction::create([
            'kode_transaksi' => 'TRX-' . time(),
            'product_id'     => $product->id,
            'jumlah'         => $request->jumlah,
            'total_harga'    => $totalHarga,
            'bayar'          => $request->bayar,
            'kembalian'      => $kembalian,
        ]);

        // Kurangi Stok Produk
        $product->decrement('stok', $request->jumlah);

        return redirect()->back()->with('success', 'Transaksi berhasil disimpan!');
    }

    // Fitur Cetak Struk Nota
    public function printStruk($id)
    {
        $transaction = Transaction::with('product')->findOrFail($id);
        return view('transactions.print', compact('transaction'));
    }
}