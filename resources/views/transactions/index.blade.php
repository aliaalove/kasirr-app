<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kasir Supermarket</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f6fa;
            color: #172033;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            height: 72px;
            background: linear-gradient(90deg, #1976d2, #0d47a1);
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
        }

        .brand {
            font-size: 24px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            font-size: 28px;
        }

        .btn-product {
            background: white;
            color: #172033;
            text-decoration: none;
            padding: 13px 25px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 500;
        }

        /* =========================
           CONTAINER
        ========================= */

        .container {
            max-width: 1600px;
            margin: auto;
            padding: 30px;
        }

        .grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        /* =========================
           CARD
        ========================= */

        .card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .card-title {
            font-size: 25px;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* =========================
           BARCODE
        ========================= */

        .barcode-box {
            display: flex;
            width: 100%;
        }

        .barcode-input {
            flex: 1;
            height: 78px;
            border: 3px solid #b7d4ff;
            border-right: none;
            border-radius: 15px 0 0 15px;
            padding: 0 20px;
            font-size: 22px;
            outline: none;
        }

        .barcode-input:focus {
            border-color: #1976d2;
        }

        .btn-search {
            width: 140px;
            border: none;
            background: #1976d2;
            color: white;
            border-radius: 0 10px 10px 0;
            font-size: 18px;
            cursor: pointer;
        }

        .barcode-info {
            margin-top: 15px;
            color: #555;
            font-size: 16px;
        }

        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f5f7fa;
            padding: 16px;
            text-align: left;
            font-size: 16px;
        }

        td {
            padding: 16px;
            border-top: 1px solid #eeeeee;
            font-size: 16px;
        }

        .product-name {
            font-weight: 600;
        }

        .barcode-text {
            font-family: monospace;
        }

        /* =========================
           QTY
        ========================= */

        .qty-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .qty-btn {
            width: 40px;
            height: 40px;
            border: 1px solid #1976d2;
            background: white;
            color: #1976d2;
            border-radius: 8px;
            font-size: 22px;
            cursor: pointer;
        }

        .qty-number {
            min-width: 25px;
            text-align: center;
            font-weight: bold;
        }

        .delete-btn {
            width: 42px;
            height: 42px;
            border: 1px solid #ff4d4d;
            background: white;
            color: #ff4d4d;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
        }

        /* =========================
           EMPTY CART
        ========================= */

        .empty-cart {
            text-align: center;
            padding: 40px;
            color: #888;
        }

        .clear-btn {
            float: right;
            border: 1px solid #ff4d4d;
            background: white;
            color: #ff4d4d;
            padding: 10px 18px;
            border-radius: 25px;
            cursor: pointer;
        }

        /* =========================
           PAYMENT
        ========================= */

        .total-box {
            background: #e3f2fd;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 30px;
        }

        .total-label {
            font-size: 17px;
            color: #555;
        }

        .total-value {
            font-size: 42px;
            font-weight: 800;
            color: #0d47a1;
            margin-top: 8px;
        }

        .payment-label {
            font-size: 18px;
            font-weight: 700;
            display: block;
            margin-bottom: 10px;
        }

        .payment-input {
            width: 100%;
            height: 58px;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 0 20px;
            font-size: 22px;
            outline: none;
        }

        .payment-input:focus {
            border-color: #1976d2;
        }

        .change-label {
            margin-top: 25px;
            font-size: 18px;
            font-weight: 700;
        }

        .change-value {
            font-size: 35px;
            color: #159447;
            font-weight: 800;
            margin-top: 8px;
            margin-bottom: 25px;
        }

        .process-btn {
            width: 100%;
            height: 62px;
            border: none;
            border-radius: 12px;
            background: #62b58d;
            color: white;
            font-size: 21px;
            font-weight: 600;
            cursor: pointer;
        }

        .process-btn:hover {
            background: #4fa77d;
        }

        .process-btn:disabled {
            background: #b8c8c0;
            cursor: not-allowed;
        }

        /* =========================
           SUCCESS
        ========================= */

        .success-box {
            background: #e8f8ef;
            border: 1px solid #72c996;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .success-title {
            color: #18834b;
            font-size: 21px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .print-btn {
            display: block;
            width: 100%;
            background: #1976d2;
            color: white;
            text-decoration: none;
            text-align: center;
            padding: 16px;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 700;
            margin-top: 12px;
        }

        .new-transaction-btn {
            display: block;
            width: 100%;
            background: white;
            color: #1976d2;
            border: 1px solid #1976d2;
            text-decoration: none;
            text-align: center;
            padding: 14px;
            border-radius: 10px;
            font-size: 16px;
            margin-top: 10px;
        }

        /* =========================
           ERROR / SUCCESS MESSAGE
        ========================= */

        .alert {
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .alert-success {
            background: #e8f8ef;
            color: #187a46;
            border: 1px solid #9adbb5;
        }

        .alert-error {
            background: #fff0f0;
            color: #c62828;
            border: 1px solid #ffb3b3;
        }

        /* =========================
           HISTORY
        ========================= */

        .history-card {
            margin-top: 5px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1000px) {

            .grid {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 600px) {

            .navbar {
                padding: 0 15px;
            }

            .brand {
                font-size: 18px;
            }

            .btn-product {
                padding: 10px 15px;
                font-size: 13px;
            }

            .container {
                padding: 15px;
            }

            .barcode-input {
                font-size: 17px;
            }

            .btn-search {
                width: 90px;
            }

            .total-value {
                font-size: 32px;
            }

        }

    </style>

</head>

<body>

<!-- =========================
     NAVBAR
========================= -->

<div class="navbar">

    <div class="brand">

        <span class="brand-icon">🏪</span>

        <span>KASIR SUPERMARKET</span>

    </div>

    <a href="{{ route('products.index') }}" class="btn-product">
        📦 Kelola Produk
    </a>

</div>


<div class="container">

    <!-- =========================
         ALERT
    ========================= -->

    @if(session('success'))

        <div class="alert alert-success">
            ✅ {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div class="alert alert-error">
            ❌ {{ session('error') }}
        </div>

    @endif


    <div class="grid">


        <!-- =========================
             BAGIAN KIRI
        ========================= -->

        <div>


            <!-- SCAN BARCODE -->

            <div class="card">

                <div class="card-title">
                    🔎 Scan Barcode Produk
                </div>

                <div class="barcode-box">

                    <input
                        type="text"
                        id="barcodeInput"
                        class="barcode-input"
                        placeholder="Arahkan scanner ke barcode..."
                        autocomplete="off"
                    >

                    <button
                        type="button"
                        class="btn-search"
                        onclick="cariBarcode()"
                    >
                        🔍 CARI
                    </button>

                </div>

                <div class="barcode-info">
                    🔫 Scanner barcode USB akan otomatis mengetikkan kode barcode lalu tekan Enter.
                </div>

            </div>


            <!-- =========================
                 KERANJANG
            ========================= -->

            <div class="card">

                <div class="card-title">

                    🛒 Keranjang Belanja

                    <button
                        type="button"
                        class="clear-btn"
                        onclick="kosongkanKeranjang()"
                    >
                        🗑 Kosongkan
                    </button>

                </div>


                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Produk</th>

                                <th>Barcode</th>

                                <th>Harga</th>

                                <th>Qty</th>

                                <th>Subtotal</th>

                                <th></th>

                            </tr>

                        </thead>

                        <tbody id="cartBody">

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- =========================
                 RIWAYAT TRANSAKSI
            ========================= -->

            <div class="card history-card">

                <div class="card-title">
                    📋 Riwayat Transaksi
                </div>

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Tanggal</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($transactions as $index => $transaction)

                                <tr>

                                    <td>
                                        {{ $index + 1 }}
                                    </td>

                                    <td>
                                        {{ $transaction->kode_transaksi }}
                                    </td>

                                    <td>
                                        {{ $transaction->product->nama_produk ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $transaction->jumlah }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        {{ $transaction->created_at->format('d/m/Y H:i') }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" style="text-align:center; padding:30px;">
                                        Belum ada transaksi.
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


        </div>


        <!-- =========================
             BAGIAN KANAN
        ========================= -->

        <div>

            <!-- =========================
                 HASIL TRANSAKSI BERHASIL
            ========================= -->

            @if(session('print_transaction_id'))

                <div class="success-box">

                    <div class="success-title">
                        ✅ Transaksi Berhasil!
                    </div>

                    <div>
                        Pembayaran telah berhasil disimpan.
                    </div>

                    <a
                        href="{{ route('transactions.print', session('print_transaction_id')) }}"
                        class="print-btn"
                    >
                        🧾 CETAK STRUK
                    </a>

                    <a
                        href="{{ route('transactions.index') }}"
                        class="new-transaction-btn"
                    >
                        ➕ TRANSAKSI BARU
                    </a>

                </div>

            @endif


            <!-- =========================
                 PEMBAYARAN
            ========================= -->

            @if(!session('print_transaction_id'))

                <div class="card">

                    <div class="card-title">
                        💳 Pembayaran
                    </div>


                    <div class="total-box">

                        <div class="total-label">
                            TOTAL BELANJA
                        </div>

                        <div
                            class="total-value"
                            id="totalDisplay"
                        >
                            Rp 0
                        </div>

                    </div>


                    <form
                        action="{{ route('transactions.store') }}"
                        method="POST"
                        id="paymentForm"
                    >

                        @csrf


                        <!-- Hidden cart akan dibuat lewat JavaScript -->

                        <div id="cartInputs"></div>


                        <label class="payment-label">
                            Uang Pembayaran
                        </label>

                        <input
                            type="number"
                            name="bayar"
                            id="bayarInput"
                            class="payment-input"
                            min="0"
                            placeholder="Masukkan uang pembayaran"
                        >


                        <div class="change-label">
                            Kembalian
                        </div>

                        <div
                            class="change-value"
                            id="changeDisplay"
                        >
                            Rp 0
                        </div>


                        <button
                            type="submit"
                            class="process-btn"
                            id="processBtn"
                            disabled
                        >
                            ✓ PROSES PEMBAYARAN
                        </button>

                    </form>

                </div>

            @endif

        </div>

    </div>

</div>


<script>

    // ==========================================
    // KERANJANG
    // ==========================================

    let keranjang = [];


    // ==========================================
    // FORMAT RUPIAH
    // ==========================================

    function formatRupiah(angka) {

        return new Intl.NumberFormat('id-ID').format(angka);

    }


    // ==========================================
    // HITUNG TOTAL
    // ==========================================

    function hitungTotal() {

        let total = 0;

        keranjang.forEach(item => {

            total += item.harga * item.jumlah;

        });

        const totalDisplay = document.getElementById('totalDisplay');

        if (totalDisplay) {

            totalDisplay.innerText =
                'Rp ' + formatRupiah(total);

        }

        hitungKembalian();

        return total;

    }


    // ==========================================
    // CARI BARCODE
    // ==========================================

    async function cariBarcode() {

        const input = document.getElementById('barcodeInput');

        const barcode = input.value.trim();

        if (!barcode) {

            return;

        }


        try {

            const response = await fetch(
                `/transactions/product/barcode/${encodeURIComponent(barcode)}`
            );


            const data = await response.json();


            if (!response.ok || !data.success) {

                alert(
                    data.message ||
                    'Produk tidak ditemukan.'
                );

                input.focus();

                input.select();

                return;

            }


            tambahKeKeranjang(data.product);


            input.value = '';

            input.focus();


        } catch (error) {

            console.error(error);

            alert(
                'Terjadi kesalahan saat mencari produk.'
            );

            input.focus();

        }

    }


    // ==========================================
    // TAMBAH PRODUK KE KERANJANG
    // ==========================================

    function tambahKeKeranjang(product) {

        const index = keranjang.findIndex(
            item => item.id === product.id
        );


        if (index !== -1) {

            if (
                keranjang[index].jumlah >=
                product.stok
            ) {

                alert(
                    'Jumlah melebihi stok produk.'
                );

                return;

            }

            keranjang[index].jumlah++;

        } else {

            keranjang.push({

                id: product.id,

                barcode: product.barcode,

                nama_produk: product.nama_produk,

                harga: Number(product.harga),

                stok: Number(product.stok),

                jumlah: 1

            });

        }


        renderKeranjang();

    }


    // ==========================================
    // RENDER KERANJANG
    // ==========================================

    function renderKeranjang() {

        const cartBody =
            document.getElementById('cartBody');

        cartBody.innerHTML = '';


        if (keranjang.length === 0) {

            cartBody.innerHTML = `

                <tr>

                    <td
                        colspan="7"
                        class="empty-cart"
                    >
                        🛒 Keranjang masih kosong
                    </td>

                </tr>

            `;

            hitungTotal();

            buatInputCart();

            return;

        }


        keranjang.forEach((item, index) => {

            const subtotal =
                item.harga * item.jumlah;


            cartBody.innerHTML += `

                <tr>

                    <td>
                        ${index + 1}
                    </td>

                    <td class="product-name">
                        ${item.nama_produk}
                    </td>

                    <td class="barcode-text">
                        ${item.barcode}
                    </td>

                    <td>
                        Rp ${formatRupiah(item.harga)}
                    </td>

                    <td>

                        <div class="qty-box">

                            <button
                                type="button"
                                class="qty-btn"
                                onclick="kurangiQty(${index})"
                            >
                                −
                            </button>

                            <span class="qty-number">
                                ${item.jumlah}
                            </span>

                            <button
                                type="button"
                                class="qty-btn"
                                onclick="tambahQty(${index})"
                            >
                                +
                            </button>

                        </div>

                    </td>

                    <td>
                        <strong>
                            Rp ${formatRupiah(subtotal)}
                        </strong>
                    </td>

                    <td>

                        <button
                            type="button"
                            class="delete-btn"
                            onclick="hapusItem(${index})"
                        >
                            🗑
                        </button>

                    </td>

                </tr>

            `;

        });


        hitungTotal();

        buatInputCart();

    }


    // ==========================================
    // TAMBAH QTY
    // ==========================================

    function tambahQty(index) {

        if (
            keranjang[index].jumlah >=
            keranjang[index].stok
        ) {

            alert('Stok produk tidak mencukupi.');

            return;

        }


        keranjang[index].jumlah++;

        renderKeranjang();

    }


    // ==========================================
    // KURANGI QTY
    // ==========================================

    function kurangiQty(index) {

        if (keranjang[index].jumlah > 1) {

            keranjang[index].jumlah--;

        } else {

            keranjang.splice(index, 1);

        }

        renderKeranjang();

    }


    // ==========================================
    // HAPUS ITEM
    // ==========================================

    function hapusItem(index) {

        keranjang.splice(index, 1);

        renderKeranjang();

    }


    // ==========================================
    // KOSONGKAN KERANJANG
    // ==========================================

    function kosongkanKeranjang() {

        keranjang = [];

        renderKeranjang();

        const barcodeInput =
            document.getElementById('barcodeInput');

        if (barcodeInput) {

            barcodeInput.focus();

        }

    }


    // ==========================================
    // BUAT INPUT CART UNTUK LARAVEL
    // ==========================================

    function buatInputCart() {

        const cartInputs =
            document.getElementById('cartInputs');

        if (!cartInputs) {

            return;

        }

        cartInputs.innerHTML = '';


        keranjang.forEach((item, index) => {

            cartInputs.innerHTML += `

                <input
                    type="hidden"
                    name="cart[${index}][product_id]"
                    value="${item.id}"
                >

                <input
                    type="hidden"
                    name="cart[${index}][jumlah]"
                    value="${item.jumlah}"
                >

            `;

        });

    }


    // ==========================================
    // HITUNG KEMBALIAN
    // ==========================================

    function hitungKembalian() {

        const bayarInput =
            document.getElementById('bayarInput');

        const changeDisplay =
            document.getElementById('changeDisplay');

        const processBtn =
            document.getElementById('processBtn');


        if (
            !bayarInput ||
            !changeDisplay ||
            !processBtn
        ) {

            return;

        }


        const total = keranjang.reduce(
            (sum, item) =>
                sum + (item.harga * item.jumlah),
            0
        );


        const bayar =
            Number(bayarInput.value) || 0;


        const kembalian =
            bayar - total;


        if (kembalian >= 0 && total > 0) {

            changeDisplay.innerText =
                'Rp ' + formatRupiah(kembalian);

            changeDisplay.style.color =
                '#159447';

            processBtn.disabled = false;

        } else {

            changeDisplay.innerText =
                'Rp 0';

            changeDisplay.style.color =
                '#c62828';

            processBtn.disabled = true;

        }

    }


    // ==========================================
    // EVENT UANG PEMBAYARAN
    // ==========================================

    const bayarInput =
        document.getElementById('bayarInput');

    if (bayarInput) {

        bayarInput.addEventListener(
            'input',
            hitungKembalian
        );

    }


    // ==========================================
    // ENTER PADA BARCODE
    // ==========================================

    const barcodeInput =
        document.getElementById('barcodeInput');


    if (barcodeInput) {

        barcodeInput.focus();


        barcodeInput.addEventListener(
            'keydown',
            function(event) {

                if (event.key === 'Enter') {

                    event.preventDefault();

                    cariBarcode();

                }

            }
        );

    }


    // ==========================================
    // CEGAH SUBMIT JIKA CART KOSONG
    // ==========================================

    const paymentForm =
        document.getElementById('paymentForm');


    if (paymentForm) {

        paymentForm.addEventListener(
            'submit',
            function(event) {

                if (keranjang.length === 0) {

                    event.preventDefault();

                    alert(
                        'Keranjang masih kosong.'
                    );

                    return;

                }


                const total = keranjang.reduce(
                    (sum, item) =>
                        sum +
                        (item.harga * item.jumlah),
                    0
                );


                const bayar =
                    Number(
                        document.getElementById(
                            'bayarInput'
                        ).value
                    ) || 0;


                if (bayar < total) {

                    event.preventDefault();

                    alert(
                        'Uang pembayaran masih kurang.'
                    );

                }

            }
        );

    }


    // ==========================================
    // JALANKAN SAAT HALAMAN DIBUKA
    // ==========================================

    renderKeranjang();

</script>

</body>

</html>