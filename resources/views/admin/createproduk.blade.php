@extends('layouts.app')

@section('content')
<div class="card shadow border-0">
    <div class="card-header text-white" style="background: linear-gradient(90deg, #6f42c1, #8e63e3);">
        <h5 class="mb-0"><i class="fa fa-plus"></i> Tambah Produk</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.produkstore') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="kode" class="form-label">Kode Produk</label>
                <input type="text" name="kode" id="kode" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" id="stok" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" name="harga_beli" id="harga_beli" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="number" name="harga_jual" id="harga_jual" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <a href="{{ route('admin.produk') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
