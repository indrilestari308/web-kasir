@extends('layouts.app')

@section('content')
<div class="card shadow border-0">
    <div class="card-header text-white" style="background: linear-gradient(90deg, #ff6f61, #ff9671);">
        <h5 class="mb-0"><i class="fa fa-chart-line"></i> Laporan Penjualan</h5>
    </div>
    <div class="card-body">
        <form class="row g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label">Dari Tanggal</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Sampai Tanggal</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Aksi</label>
                <button class="btn btn-primary w-100"><i class="fa fa-search"></i> Cari</button>
            </div>
        </form>

        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total Transaksi</th>
                    <th>Total Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2025-08-10</td>
                    <td>25</td>
                    <td>Rp 1.250.000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
