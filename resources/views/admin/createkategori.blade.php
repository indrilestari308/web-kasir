{{-- resources/views/admin/tambahkategori.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container-fluid px-4"> {{-- lebar penuh --}}
    <div class="card shadow border-0">
        <div class="card-header text-white" style="background: linear-gradient(90deg, #6f42c1, #8e63e3);">
            <h5 class="mb-0"><i class="fa fa-plus"></i> Tambah Kategori</h5>
        </div>
        <div class="card-body">
            {{-- Tampilkan pesan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kategori</label>
                    <input type="text" name="nama" id="nama"
                           class="form-control"
                           value="{{ old('nama') }}"
                           placeholder="Masukkan nama kategori" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi"
                              class="form-control" rows="3"
                              placeholder="Masukkan deskripsi kategori">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.kategori') }}" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
