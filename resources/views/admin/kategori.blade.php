@extends('layouts.app')

@section('content')
<div class="container-fluid px-4"> {{-- lebar penuh --}}
    <div class="card shadow border-0">
        <div class="card-header text-white" style="background: linear-gradient(90deg, #6f42c1, #8e63e3);">
            <h5 class="mb-0"><i class="fa fa-tags"></i> Data Kategori</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">
                <i class="fa fa-plus"></i> Tambah Kategori
            </a>

            <table class="table table-hover table-bordered w-100">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($adminkategori as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus kategori ini?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
