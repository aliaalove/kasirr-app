<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kasir - Transaksi Penjualan</title>
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
                <a href="/products" class="btn btn-outline-light rounded-pill px-4"><i class="bi bi-box-seam me-1"></i> Kelola Produk</a>
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
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card card-custom p-4 mb-4">
            <h5 class="fw-bold text-success mb-3"><i class="bi bi-cash-coin me-2"></i>Input Transaksi Kasir</h5>
            <form action="{{ route('transactions.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-5">
                        <label class="form-label text-muted small fw-bold">PILIH PRODUK</label>
                        <select name="product_id" class="form-select form-select-lg fs-6" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach($products as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_produk }} (Rp {{ number_format($p->harga,0,',','.') }}) - Stok: {{ $p->stok }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label text-muted small fw-bold">JUMLAH</label>
                        <input type="number" name="jumlah" class="form-control form-control-lg fs-6" placeholder="Qty" min="1" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label text-muted small fw-bold">UANG BAYAR (Rp)</label>
                        <input type="number" name="bayar" class="form-control form-control-lg fs-6" placeholder="Masukkan Nominal" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button class="btn btn-success btn-lg w-100 rounded-3 shadow-sm"><i class="bi bi-check-circle me-1"></i> Bayar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card card-custom p-4">
            <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-receipt me-2"></i>Riwayat Transaksi</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No. TRX</th>
                            <th>Tanggal</th>
                            <th>Produk</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Bayar</th>
                            <th>Kembalian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $t)
                        <tr>
                            <td><span class="badge bg-primary-subtle text-primary font-monospace">{{ $t->kode_transaksi }}</span></td>
                            <td class="small text-muted">{{ $t->created_at->format('d/m/Y H:i') }}</td>
                            <td class="fw-semibold">{{ $t->product->nama_produk ?? 'Produk Dihapus' }}</td>
                            <td>{{ $t->jumlah }}</td>
                            <td class="fw-bold text-dark">Rp {{ number_format($t->total_harga, 0, ',', '.') }}</td>
                            <td class="text-muted">Rp {{ number_format($t->bayar, 0, ',', '.') }}</td>
                            <td class="text-success fw-bold">Rp {{ number_format($t->kembalian, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('transactions.print', $t->id) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-printer"></i> Struk
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">Belum ada riwayat transaksi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>