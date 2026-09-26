<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_produk' => 'required|unique:products,kode_produk',
            'barcode'     => 'required|unique:products,barcode',
            'nama_produk' => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer|min:0',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();

        // Upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');

            $namaFoto = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('images'), $namaFoto);

            $data['foto'] = $namaFoto;
        }

        Product::create($data);

        return redirect()
            ->back()
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    // Mengubah produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'kode_produk' => 'required|unique:products,kode_produk,' . $id,
            'barcode'     => 'required|unique:products,barcode,' . $id,
            'nama_produk' => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer|min:0',
            'foto'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();

        // Kalau upload foto baru
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if (
                $product->foto &&
                file_exists(public_path('images/' . $product->foto))
            ) {
                unlink(public_path('images/' . $product->foto));
            }

            $file = $request->file('foto');

            $namaFoto = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('images'), $namaFoto);

            $data['foto'] = $namaFoto;
        }

        $product->update($data);

        return redirect()
            ->back()
            ->with('success', 'Produk berhasil diperbarui!');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus foto
        if (
            $product->foto &&
            file_exists(public_path('images/' . $product->foto))
        ) {
            unlink(public_path('images/' . $product->foto));
        }

        $product->delete();

        return redirect()
            ->back()
            ->with('success', 'Produk berhasil dihapus!');
    }
}