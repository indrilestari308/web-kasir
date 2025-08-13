@extends('layouts.app')

@section('content')
<div class="card shadow border-0 p-4 text-center">
    <h4>Selamat Datang, {{ Auth::user()->name }}</h4>
    <p>Siap melayani transaksi hari ini!</p>
    <a href="{{ route('kasir.transaksi') }}" class="btn btn-primary">
        <i class="fa fa-cash-register"></i> Mulai Transaksi
    </a>
</div>
@endsection
