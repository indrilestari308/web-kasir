@extends('layouts.app')

@section('content')
<div class="card shadow border-0">
    <div class="card-header text-white" style="background: linear-gradient(90deg, #6f42c1, #8e63e3);">
        <h5 class="mb-0">
            <i class="fa fa-box"></i>
            {{ isset($produk) ? 'Edit Produk' : 'Tambah Produk' }}
        </h5>
    </div>
    <div class="card-body">
        <form
            action="{{ isset($produk) ? route('produk.update', $produk->id) : route('produk.store') }}"
            method="POST"
        >
            @csrf
            @if(isset($produk))
                @method('PUT')
            @endif

            {{-- Kategori --}}
            <div class="mb-3">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategori as $kategori)
                        <option value="{{ $kategori->id }}"
                            {{ isset($produk) && $produk->kategori_id == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nama Barang --}}
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" name="nama" id="nama" class="form-control"
                       value="{{ old('nama', $produk->nama ?? '') }}" required>
            </div>

            {{-- Kode Barang --}}
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Barang</label>
                <input type="text" name="kode" id="kode" class="form-control"
                       value="{{ old('kode', $produk->kode ?? '') }}" required>
            </div>

            {{-- Stok --}}
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" id="stok" class="form-control"
                       value="{{ old('stok', $produk->stok ?? 0) }}" required>
            </div>

            {{-- Harga Beli --}}
            <div class="mb-3">
                <label for="harga_beli" class="form-label">Harga Beli</label>
                <input type="number" name="harga_beli" id="harga_beli" class="form-control"
                       value="{{ old('harga_beli', $produk->harga_beli ?? 0) }}" required>
            </div>

            {{-- Harga Jual --}}
            <div class="mb-3">
                <label for="harga_jual" class="form-label">Harga Jual</label>
                <input type="number" name="harga_jual" id="harga_jual" class="form-control"
                       value="{{ old('harga_jual', $produk->harga_jual ?? 0) }}" required>
            </div>

            {{-- Status --}}
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="aktif" {{ old('status', $produk->status ?? '') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status', $produk->status ?? '') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-between">
                <a href="{{ route('produk.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
