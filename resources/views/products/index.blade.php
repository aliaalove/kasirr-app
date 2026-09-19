<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kasir - Manajemen Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar-custom { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); }
        .card-custom { border: none; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"><i class="bi bi-cart-check-fill me-2"></i>KASIR APP</a>
            <div class="d-flex">
                <a href="/transactions" class="btn btn-outline-light rounded-pill px-4"><i class="bi bi-cash-stack me-1"></i> Transaksi Kasir</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card card-custom p-4">
                    <h5 class="fw-bold mb-3 text-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Produk</h5>
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">KODE PRODUK</label>
                            <input type="text" name="kode_produk" class="form-control" placeholder="PRD-001" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">NAMA PRODUK</label>
                            <input type="text" name="nama_produk" class="form-control" placeholder="Nama Barang" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">HARGA (Rp)</label>
                            <input type="number" name="harga" class="form-control" placeholder="15000" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">STOK</label>
                            <input type="number" name="stok" class="form-control" placeholder="50" required>
                        </div>
                        <button class="btn btn-primary w-100 rounded-3"><i class="bi bi-save me-1"></i> Simpan Produk</button>
                    </form>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card card-custom p-4">
                    <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-box-seam me-2"></i>Daftar Produk</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                <tr>
                                    <td><span class="badge bg-secondary font-monospace">{{ $product->kode_produk }}</span></td>
                                    <td class="fw-semibold">{{ $product->nama_produk }}</td>
                                    <td class="text-success fw-bold">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                                    <td>{{ $product->stok }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning me-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $product->id }}"><i class="bi bi-pencil"></i></button>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                        </form>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit {{ $product->nama_produk }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label class="form-label">Nama Produk</label>
                                                                <input type="text" name="nama_produk" class="form-control" value="{{ $product->nama_produk }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Harga</label>
                                                                <input type="number" name="harga" class="form-control" value="{{ $product->harga }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Stok</label>
                                                                <input type="number" name="stok" class="form-control" value="{{ $product->stok }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="text-center py-4 text-muted">Belum ada produk.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>