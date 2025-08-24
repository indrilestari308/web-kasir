<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Kasir</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="p-5">
    <div class="container">
        <h2>💰 Transaksi Kasir</h2>
        <form method="POST" action="{{ route('transaksi.hitung') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Harga Satuan</label>
                <input type="number" name="harga" step="0.01" min="0" 
                       class="form-control" value="{{ old('harga', $harga ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Barang</label>
                <input type="number" name="jumlah" min="1" 
                       class="form-control" value="{{ old('jumlah', $jumlah ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Diskon (%)</label>
                <input type="number" name="diskon" min="0" max="100" step="0.01" 
                       class="form-control" value="{{ old('diskon', $diskonPersen ?? 0) }}">
            </div>
            <button type="submit" class="btn btn-primary">Hitung</button>
        </form>

        @isset($totalBayar)
        <hr>
        <h4>💡 Hasil Perhitungan:</h4>
        <ul class="list-group">
            <li class="list-group-item">
                Total Sebelum Diskon: <strong>Rp {{ number_format($totalSebelumDiskon, 0, ',', '.') }}</strong>
            </li>
            <li class="list-group-item">
                Potongan Diskon: <strong>Rp {{ number_format($potongan, 0, ',', '.') }}</strong>
            </li>
            <li class="list-group-item bg-success text-white">
                Total Bayar: <strong>Rp {{ number_format($totalBayar, 0, ',', '.') }}</strong>
            </li>
        </ul>
        @endisset
    </div>
</body>
</html>
=======
@extends('layouts.app')

@section('content')
<div class="card shadow border-0">
    <div class="card-header text-white" style="background: linear-gradient(90deg, #0d6efd, #5a9bff);">
        <h5 class="mb-0"><i class="fa fa-shopping-cart"></i> Transaksi Penjualan</h5>
    </div>
    <div class="card-body">
        <form class="row g-3 mb-3" method="POST" action="#">
            @csrf
            <div class="col-md-6">
                <label class="form-label">Nama Produk</label>
                <input type="text" class="form-control" placeholder="Cari produk..." name="nama_produk">
            </div>
            <div class="col-md-3">
                <label class="form-label">Qty</label>
                <input type="number" class="form-control" name="qty" value="1" min="1">
            </div>
            <div class="col-md-3">
                <label class="form-label">Aksi</label>
                <button type="submit" class="btn btn-primary w-100"><i class="fa fa-plus"></i> Tambah</button>
            </div>
        </form>

        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="daftarProduk">
                <tr>
                    <td>1</td>
                    <td>Indomie Goreng</td>
                    <td>2</td>
                    <td data-harga="3500">Rp 3.500</td>
                    <td class="total-item">Rp 7.000</td>
                    <td><button type="button" class="btn btn-danger btn-sm hapus-produk"><i class="fa fa-trash"></i></button></td>
                </tr>
            </tbody>
        </table>

        {{-- Input Diskon --}}
        <div class="row g-3 mt-3">
            <div class="col-md-3 ms-auto">
                <label class="form-label">Diskon (%)</label>
                <input type="number" id="diskon" class="form-control" value="0" min="0" max="100">
            </div>
        </div>

        {{-- Total --}}
        <div class="text-end mt-3">
            <h5>Subtotal: <span id="subtotal" class="text-dark">Rp 7.000</span></h5>
            <h5>Potongan: <span id="potongan" class="text-danger">Rp 0</span></h5>
            <h4>Total Bayar: <span id="totalBayar" class="text-success">Rp 7.000</span></h4>
            <button class="btn btn-success mt-2"><i class="fa fa-check"></i> Selesai</button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function formatRupiah(angka) {
        return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function hitungTotal() {
        let subtotal = 0;
        document.querySelectorAll('.total-item').forEach(function (el) {
            subtotal += parseInt(el.textContent.replace(/\D/g, "")) || 0;
        });

        let diskonPersen = parseInt(document.getElementById('diskon').value) || 0;
        let potongan = subtotal * diskonPersen / 100;
        let total = subtotal - potongan;

        document.getElementById('subtotal').textContent = formatRupiah(subtotal);
        document.getElementById('potongan').textContent = formatRupiah(potongan);
        document.getElementById('totalBayar').textContent = formatRupiah(total);
    }

    document.getElementById('diskon').addEventListener('input', hitungTotal);

    document.addEventListener('click', function (e) {
        if (e.target.closest('.hapus-produk')) {
            e.target.closest('tr').remove();
            hitungTotal();
        }
    });
</script>
@endpush
@endsection
>>>>>>> c7f5b70f69e5438743d8036533b785eaf716b2ea
