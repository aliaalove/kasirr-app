<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Produk - Kasir Supermarket</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            color: #172033;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            height: 64px;
            background: linear-gradient(90deg, #1976d2, #0d47a1);

            color: white;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 28px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 9px;

            font-size: 21px;
            font-weight: 700;
        }

        .brand-icon {
            font-size: 24px;
        }

        .btn-transaksi {
            background: transparent;

            border: 1px solid rgba(255,255,255,0.8);

            color: white;

            text-decoration: none;

            padding: 8px 18px;

            border-radius: 22px;

            font-size: 14px;

            transition: 0.2s;
        }

        .btn-transaksi:hover {
            background: white;
            color: #1458a0;
        }


        /* =========================
           CONTAINER
        ========================= */

        .container {
            max-width: 1500px;

            margin: auto;

            padding: 22px 25px;
        }


        /* =========================
           GRID
        ========================= */

        .grid {
            display: grid;

            grid-template-columns: 350px 1fr;

            gap: 18px;

            align-items: start;
        }


        /* =========================
           CARD
        ========================= */

        .card {
            background: white;

            border-radius: 14px;

            padding: 18px;

            box-shadow: 0 3px 14px rgba(0,0,0,0.06);
        }


        .card-title {
            display: flex;

            align-items: center;

            gap: 8px;

            font-size: 20px;

            font-weight: 700;

            margin-bottom: 18px;
        }

        .card-title .icon {
            color: #1677ff;

            font-size: 22px;
        }


        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 13px;
        }

        .form-label {
            display: block;

            margin-bottom: 6px;

            font-size: 12px;

            font-weight: 700;

            color: #4d5968;
        }

        .form-input {
            width: 100%;

            height: 40px;

            border: 1px solid #d8dee7;

            border-radius: 8px;

            padding: 0 11px;

            font-size: 13px;

            color: #303946;

            outline: none;
        }

        .form-input:focus {
            border-color: #1976d2;

            box-shadow: 0 0 0 3px rgba(25,118,210,0.08);
        }

        .form-help {
            margin-top: 4px;

            color: #7b8490;

            font-size: 11px;
        }


        /* =========================
           TAMBAH
        ========================= */

        .btn-tambah {
            width: 100%;

            height: 42px;

            border: none;

            border-radius: 8px;

            background: #1976d2;

            color: white;

            font-size: 14px;

            font-weight: 700;

            cursor: pointer;

            margin-top: 3px;
        }

        .btn-tambah:hover {
            background: #1266bc;
        }


        /* =========================
           ALERT
        ========================= */

        .alert {
            padding: 10px 14px;

            border-radius: 8px;

            margin-bottom: 15px;

            font-size: 13px;
        }

        .alert-success {
            background: #e8f7ee;

            color: #197443;

            border: 1px solid #b4e0c5;
        }

        .alert-error {
            background: #fff0f0;

            color: #c62828;

            border: 1px solid #ffbcbc;
        }


        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            width: 100%;

            overflow: hidden;
        }

        table {
            width: 100%;

            border-collapse: collapse;

            table-layout: fixed;
        }


        /* =========================
           UKURAN KOLOM
        ========================= */

        table th:nth-child(1),
        table td:nth-child(1) {
            width: 12%;
        }

        table th:nth-child(2),
        table td:nth-child(2) {
            width: 19%;
        }

        table th:nth-child(3),
        table td:nth-child(3) {
            width: 25%;
        }

        table th:nth-child(4),
        table td:nth-child(4) {
            width: 12%;
        }

        table th:nth-child(5),
        table td:nth-child(5) {
            width: 8%;
        }

        table th:nth-child(6),
        table td:nth-child(6) {
            width: 24%;
        }


        /* =========================
           HEADER TABLE
        ========================= */

        th {
            background: #f6f7f9;

            padding: 10px 6px;

            text-align: left;

            font-size: 11px;

            color: #172033;

            white-space: nowrap;
        }


        /* =========================
           ISI TABLE
        ========================= */

        td {
            padding: 9px 6px;

            border-top: 1px solid #edf0f3;

            font-size: 11px;

            vertical-align: middle;

            overflow: hidden;
        }

        tbody tr:hover {
            background: #fafcff;
        }


        /* =========================
           KODE
        ========================= */

        .kode-badge {
            display: inline-block;

            max-width: 100%;

            background: #e9edf2;

            color: #53606e;

            padding: 5px 6px;

            border-radius: 5px;

            font-size: 10px;

            font-weight: 700;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }


        /* =========================
           BARCODE
        ========================= */

        .barcode-badge {
            display: inline-block;

            max-width: 100%;

            background: #202832;

            color: white;

            padding: 5px 6px;

            border-radius: 5px;

            font-family: monospace;

            font-size: 9px;

            font-weight: 600;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }


        /* =========================
           NAMA PRODUK
        ========================= */

        .product-name {
            font-size: 12px;

            font-weight: 600;

            line-height: 1.25;

            overflow: hidden;

            text-overflow: ellipsis;

            white-space: nowrap;
        }


        /* =========================
           HARGA
        ========================= */

        .price {
            color: #1677ff;

            font-size: 11px;

            font-weight: 700;

            white-space: nowrap;
        }


        /* =========================
           STOK
        ========================= */

        .stock {
            display: inline-block;

            background: #dff2e8;

            color: #248456;

            padding: 4px 6px;

            border-radius: 5px;

            font-size: 10px;

            font-weight: 700;
        }


        /* =========================
           AKSI
        ========================= */

        .action-wrapper {
            display: flex;

            gap: 4px;

            align-items: center;

            flex-wrap: nowrap;
        }


        .btn-edit,
        .btn-hapus {
            height: 29px;

            padding: 0 7px;

            border-radius: 15px;

            background: white;

            font-size: 10px;

            cursor: pointer;

            white-space: nowrap;

            display: inline-flex;

            align-items: center;

            justify-content: center;
        }


        .btn-edit {
            border: 1px solid #f2a900;

            color: #e99a00;
        }

        .btn-edit:hover {
            background: #fff8e8;
        }


        .btn-hapus {
            border: 1px solid #ff5b5b;

            color: #ed3b3b;
        }

        .btn-hapus:hover {
            background: #fff1f1;
        }


        /* =========================
           FORM HAPUS
        ========================= */

        .delete-form {
            margin: 0;
            padding: 0;
        }


        /* =========================
           EMPTY
        ========================= */

        .empty {
            text-align: center;

            padding: 30px;

            color: #888;
        }


        /* =========================
           MODAL
        ========================= */

        .modal {
            display: none;

            position: fixed;

            z-index: 999;

            left: 0;

            top: 0;

            width: 100%;

            height: 100%;

            background: rgba(0,0,0,0.45);

            align-items: center;

            justify-content: center;

            padding: 15px;
        }

        .modal.active {
            display: flex;
        }


        .modal-content {
            width: 100%;

            max-width: 470px;

            max-height: 90vh;

            overflow-y: auto;

            background: white;

            border-radius: 15px;

            padding: 22px;

            box-shadow: 0 15px 50px rgba(0,0,0,0.2);
        }


        .modal-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 18px;
        }


        .modal-title {
            font-size: 19px;

            font-weight: 700;
        }


        .close {
            width: 32px;

            height: 32px;

            border: none;

            background: #f0f2f5;

            border-radius: 50%;

            font-size: 20px;

            cursor: pointer;
        }


        .modal-actions {
            display: flex;

            gap: 8px;

            margin-top: 18px;
        }


        .btn-batal,
        .btn-simpan {
            flex: 1;

            height: 40px;

            border-radius: 8px;

            font-size: 13px;

            cursor: pointer;
        }


        .btn-batal {
            background: white;

            border: 1px solid #ccd3dc;

            color: #555;
        }


        .btn-simpan {
            background: #1976d2;

            border: none;

            color: white;

            font-weight: 700;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1000px) {

            .grid {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 650px) {

            .navbar {
                padding: 0 14px;
            }

            .brand {
                font-size: 17px;
            }

            .brand-icon {
                font-size: 20px;
            }

            .btn-transaksi {
                padding: 7px 11px;

                font-size: 11px;
            }

            .container {
                padding: 15px 12px;
            }

            .card {
                padding: 15px;
            }

            .table-wrapper {
                overflow-x: auto;
            }

            table {
                min-width: 650px;
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

        <span class="brand-icon">
            🏪
        </span>

        <span>
            KASIR SUPERMARKET
        </span>

    </div>


    <a
        href="{{ route('transactions.index') }}"
        class="btn-transaksi"
    >
        🛒 Transaksi Kasir
    </a>

</div>



<div class="container">


    <!-- =========================
         ALERT SUCCESS
    ========================= -->

    @if(session('success'))

        <div class="alert alert-success">

            ✅ {{ session('success') }}

        </div>

    @endif


    <!-- =========================
         ALERT ERROR
    ========================= -->

    @if(session('error'))

        <div class="alert alert-error">

            ❌ {{ session('error') }}

        </div>

    @endif



    <div class="grid">


        <!-- =========================
             TAMBAH PRODUK
        ========================= -->

        <div class="card">

            <div class="card-title">

                <span class="icon">
                    ＋
                </span>

                <span>
                    Tambah Produk
                </span>

            </div>


            <form
                action="{{ route('products.store') }}"
                method="POST"
            >

                @csrf


                <!-- KODE -->

                <div class="form-group">

                    <label class="form-label">
                        KODE PRODUK
                    </label>

                    <input
                        type="text"
                        name="kode_produk"
                        class="form-input"
                        placeholder="Contoh: PRD-001"
                        value="{{ old('kode_produk') }}"
                        required
                    >

                </div>


                <!-- BARCODE -->

                <div class="form-group">

                    <label class="form-label">
                        BARCODE
                    </label>

                    <input
                        type="text"
                        name="barcode"
                        class="form-input"
                        placeholder="Scan / masukkan barcode"
                        value="{{ old('barcode') }}"
                        autocomplete="off"
                        required
                    >

                    <div class="form-help">
                        Barcode untuk scanner kasir.
                    </div>

                </div>


                <!-- NAMA -->

                <div class="form-group">

                    <label class="form-label">
                        NAMA PRODUK
                    </label>

                    <input
                        type="text"
                        name="nama_produk"
                        class="form-input"
                        placeholder="Contoh: Indomie Goreng"
                        value="{{ old('nama_produk') }}"
                        required
                    >

                </div>


                <!-- HARGA -->

                <div class="form-group">

                    <label class="form-label">
                        HARGA (Rp)
                    </label>

                    <input
                        type="number"
                        name="harga"
                        class="form-input"
                        placeholder="Contoh: 3500"
                        value="{{ old('harga') }}"
                        min="0"
                        required
                    >

                </div>


                <!-- STOK -->

                <div class="form-group">

                    <label class="form-label">
                        STOK
                    </label>

                    <input
                        type="number"
                        name="stok"
                        class="form-input"
                        placeholder="Contoh: 30"
                        value="{{ old('stok') }}"
                        min="0"
                        required
                    >

                </div>


                <!-- BUTTON -->

                <button
                    type="submit"
                    class="btn-tambah"
                >
                    ＋ TAMBAH PRODUK
                </button>


            </form>

        </div>



        <!-- =========================
             DAFTAR PRODUK
        ========================= -->

        <div class="card">

            <div class="card-title">

                <span class="icon">
                    📦
                </span>

                <span>
                    Daftar Produk
                </span>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>
                                Kode
                            </th>

                            <th>
                                Barcode
                            </th>

                            <th>
                                Nama Produk
                            </th>

                            <th>
                                Harga
                            </th>

                            <th>
                                Stok
                            </th>

                            <th>
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($products as $product)

                            <tr>


                                <!-- KODE -->

                                <td>

                                    <span class="kode-badge">
                                        {{ $product->kode_produk }}
                                    </span>

                                </td>


                                <!-- BARCODE -->

                                <td>

                                    <span class="barcode-badge">
                                        {{ $product->barcode }}
                                    </span>

                                </td>


                                <!-- NAMA -->

                                <td>

                                    <div class="product-name">
                                        {{ $product->nama_produk }}
                                    </div>

                                </td>


                                <!-- HARGA -->

                                <td>

                                    <span class="price">
                                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                                    </span>

                                </td>


                                <!-- STOK -->

                                <td>

                                    <span class="stock">
                                        {{ $product->stok }}
                                    </span>

                                </td>


                                <!-- AKSI -->

                                <td>

                                    <div class="action-wrapper">


                                        <!-- EDIT -->

                                        <button
                                            type="button"
                                            class="btn-edit"
                                            onclick="openEditModal(
                                                {{ $product->id }},
                                                @js($product->kode_produk),
                                                @js($product->barcode),
                                                @js($product->nama_produk),
                                                {{ $product->harga }},
                                                {{ $product->stok }}
                                            )"
                                        >
                                            ✏️ Edit
                                        </button>


                                        <!-- HAPUS -->

                                        <form
                                            action="{{ route('products.destroy', $product->id) }}"
                                            method="POST"
                                            class="delete-form"
                                            onsubmit="return confirm('Yakin ingin menghapus produk ini?')"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn-hapus"
                                            >
                                                🗑️ Hapus
                                            </button>

                                        </form>


                                    </div>

                                </td>


                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="empty"
                                >
                                    Belum ada produk.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


    </div>

</div>



<!-- =========================
     MODAL EDIT PRODUK
========================= -->

<div
    id="editModal"
    class="modal"
>

    <div class="modal-content">


        <div class="modal-header">

            <div class="modal-title">
                ✏️ Edit Produk
            </div>

            <button
                type="button"
                class="close"
                onclick="closeEditModal()"
            >
                ×
            </button>

        </div>


        <form
            id="editForm"
            method="POST"
        >

            @csrf

            @method('PUT')


            <!-- KODE -->

            <div class="form-group">

                <label class="form-label">
                    KODE PRODUK
                </label>

                <input
                    type="text"
                    id="editKode"
                    name="kode_produk"
                    class="form-input"
                    required
                >

            </div>


            <!-- BARCODE -->

            <div class="form-group">

                <label class="form-label">
                    BARCODE
                </label>

                <input
                    type="text"
                    id="editBarcode"
                    name="barcode"
                    class="form-input"
                    required
                >

            </div>


            <!-- NAMA -->

            <div class="form-group">

                <label class="form-label">
                    NAMA PRODUK
                </label>

                <input
                    type="text"
                    id="editNama"
                    name="nama_produk"
                    class="form-input"
                    required
                >

            </div>


            <!-- HARGA -->

            <div class="form-group">

                <label class="form-label">
                    HARGA (Rp)
                </label>

                <input
                    type="number"
                    id="editHarga"
                    name="harga"
                    class="form-input"
                    min="0"
                    required
                >

            </div>


            <!-- STOK -->

            <div class="form-group">

                <label class="form-label">
                    STOK
                </label>

                <input
                    type="number"
                    id="editStok"
                    name="stok"
                    class="form-input"
                    min="0"
                    required
                >

            </div>


            <!-- BUTTON MODAL -->

            <div class="modal-actions">

                <button
                    type="button"
                    class="btn-batal"
                    onclick="closeEditModal()"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="btn-simpan"
                >
                    💾 Simpan
                </button>

            </div>


        </form>

    </div>

</div>



<script>

    // =========================
    // BUKA MODAL EDIT
    // =========================

    function openEditModal(
        id,
        kode,
        barcode,
        nama,
        harga,
        stok
    ) {

        document.getElementById('editForm').action =
            '/products/' + id;


        document.getElementById('editKode').value =
            kode;


        document.getElementById('editBarcode').value =
            barcode;


        document.getElementById('editNama').value =
            nama;


        document.getElementById('editHarga').value =
            harga;


        document.getElementById('editStok').value =
            stok;


        document
            .getElementById('editModal')
            .classList.add('active');

    }


    // =========================
    // TUTUP MODAL
    // =========================

    function closeEditModal() {

        document
            .getElementById('editModal')
            .classList.remove('active');

    }


    // =========================
    // KLIK DI LUAR MODAL
    // =========================

    document
        .getElementById('editModal')
        .addEventListener('click', function(event) {

            if (event.target === this) {

                closeEditModal();

            }

        });

</script>


</body>

</html>