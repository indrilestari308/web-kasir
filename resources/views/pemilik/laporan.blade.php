@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Pemilik</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card p-3">
                <h4>Omzet Bulan Ini</h4>
                <p>Rp 25.000.000</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3">
                <h4>Laporan Penjualan</h4>
                <a href="/laporan" class="btn btn-outline-primary">Lihat Laporan</a>
            </div>
        </div>
    </div>
</div>
@endsection
