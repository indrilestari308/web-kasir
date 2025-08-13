@extends('layouts.app')

@section('content')
<div class="card shadow border-0">
    <div class="card-header text-white" style="background: linear-gradient(90deg, #6f42c1, #8e63e3);">
        <h5 class="mb-0"><i class="fa fa-box"></i> Data Produk</h5>
    </div>
    <div class="card-body">
        <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">
            <i class="fa fa-plus"></i> Tambah Produk
        </a>
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Nama Barang</th>
                    <th>Kode</th>
                    <th>Stok</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produks as $index => $produk)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $produk->kategori->nama ?? '-' }}</td>
                    <td>{{ $produk->nama }}</td>
                    <td>{{ $produk->kode }}</td>
                    <td>{{ $produk->stok }}</td>
                    <td>Rp {{ number_format($produk->harga_beli, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}</td>
                    <td>{{ $produk->status }}</td>
                    <td>
                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus produk ini?')" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="9" class="text-center">Data produk tidak ditemukan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
