<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Pembayaran #{{ $transaction->kode_transaksi }}</title>
    <style>
        body { font-family: 'Courier New', Courier, monospace; width: 280px; margin: auto; padding: 10px; }
        .text-center { text-align: center; }
        .line { border-top: 1px dashed #000; margin: 8px 0; }
        .flex { display: flex; justify-content: space-between; }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body onload="window.print()">
    <div class="text-center">
        <h3 style="margin:0;">TOKO KASIR APP</h3>
        <small>Jl. Raya Kasir No. 123</small><br>
        <small>{{ $transaction->created_at->format('d/m/Y H:i') }}</small>
    </div>
    <div class="line"></div>
    <div><strong>No: {{ $transaction->kode_transaksi }}</strong></div>
    <div class="line"></div>
    <div class="flex">
        <span>{{ $transaction->product->nama_produk ?? 'Barang' }} x{{ $transaction->jumlah }}</span>
        <span>Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</span>
    </div>
    <div class="line"></div>
    <div class="flex">
        <span>TOTAL:</span>
        <strong>Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</strong>
    </div>
    <div class="flex">
        <span>BAYAR:</span>
        <span>Rp {{ number_format($transaction->bayar, 0, ',', '.') }}</span>
    </div>
    <div class="flex">
        <span>KEMBALI:</span>
        <span>Rp {{ number_format($transaction->kembalian, 0, ',', '.') }}</span>
    </div>
    <div class="line"></div>
    <div class="text-center">
        <p>-- Terima Kasih --<br><small>Barang yang dibeli tidak dapat ditukar</small></p>
        <button class="no-print" onclick="window.print()">Cetak Struk</button>
        <a href="/transactions" class="no-print">Kembali</a>
    </div>
</body>
</html>