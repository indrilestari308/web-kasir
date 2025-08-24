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
