<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $products = Product::where('stok', '>', 0)->get();

        $transactions = Transaction::with('product')
            ->latest()
            ->get();

        return view('transactions.index', compact('products', 'transactions'));
    }

    // ==========================================
    // CARI PRODUK BERDASARKAN BARCODE
    // ==========================================
    public function findByBarcode($barcode)
    {
        $product = Product::where('barcode', $barcode)
            ->where('stok', '>', 0)
            ->first();

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan atau stok habis.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'product' => [
                'id' => $product->id,
                'barcode' => $product->barcode,
                'kode_produk' => $product->kode_produk,
                'nama_produk' => $product->nama_produk,
                'harga' => $product->harga,
                'stok' => $product->stok,
                'foto' => $product->foto,
            ]
        ]);
    }

    // ==========================================
    // PROSES PEMBAYARAN
    // ==========================================
    public function store(Request $request)
    {
        $request->validate([
            'cart' => 'required|array|min:1',
            'bayar' => 'required|numeric|min:0',
        ]);

        $cart = $request->cart;

        $totalHargaSemua = 0;

        // ------------------------------------------
        // CEK PRODUK DAN STOK
        // ------------------------------------------
        foreach ($cart as $item) {

            $product = Product::findOrFail($item['product_id']);

            $jumlah = (int) $item['jumlah'];

            if ($jumlah <= 0) {
                return redirect()
                    ->back()
                    ->with('error', 'Jumlah produk tidak valid.');
            }

            if ($product->stok < $jumlah) {
                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'Stok ' . $product->nama_produk . ' tidak mencukupi!'
                    );
            }

            $totalHargaSemua += $product->harga * $jumlah;
        }

        // ------------------------------------------
        // CEK UANG PEMBAYARAN
        // ------------------------------------------
        if ($request->bayar < $totalHargaSemua) {
            return redirect()
                ->back()
                ->with('error', 'Uang pembayaran kurang!');
        }

        $kembalian = $request->bayar - $totalHargaSemua;

        // ------------------------------------------
        // BUAT KODE TRANSAKSI
        // ------------------------------------------
        $kodeTransaksi = 'TRX-' . date('YmdHis') . '-' . strtoupper(substr(uniqid(), -4));

        $lastTransaction = null;

        // ------------------------------------------
        // SIMPAN SEMUA PRODUK
        // ------------------------------------------
        foreach ($cart as $item) {

            $product = Product::findOrFail($item['product_id']);

            $jumlah = (int) $item['jumlah'];

            $totalHargaItem = $product->harga * $jumlah;

            $lastTransaction = Transaction::create([
                'kode_transaksi' => $kodeTransaksi,
                'product_id' => $product->id,
                'jumlah' => $jumlah,
                'total_harga' => $totalHargaItem,
                'bayar' => $request->bayar,
                'kembalian' => $kembalian,
            ]);

            // Kurangi stok
            $product->decrement('stok', $jumlah);
        }

        // ------------------------------------------
        // KEMBALI KE HALAMAN KASIR
        // + SIMPAN ID TRANSAKSI UNTUK CETAK STRUK
        // ------------------------------------------
        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaksi berhasil diproses!')
            ->with('print_transaction_id', $lastTransaction->id);
    }

    // ==========================================
    // CETAK STRUK
    // ==========================================
    public function printStruk($id)
    {
        $transaction = Transaction::findOrFail($id);

        // Ambil semua barang dalam transaksi yang sama
        $transactions = Transaction::with('product')
            ->where('kode_transaksi', $transaction->kode_transaksi)
            ->get();

        return view('transactions.print', compact(
            'transaction',
            'transactions'
        ));
    }
}