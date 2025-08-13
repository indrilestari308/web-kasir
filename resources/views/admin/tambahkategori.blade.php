@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="card shadow border-0">
        <div class="card-header text-white" style="background: linear-gradient(90deg, #6f42c1, #8e63e3);">
            <h5 class="mb-0"><i class="fa fa-plus"></i> Tambah Kategori</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kategori</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama kategori" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" placeholder="Masukkan deskripsi kategori" required></textarea>
                </div>

                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <a href="{{ route('admin.kategori') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
