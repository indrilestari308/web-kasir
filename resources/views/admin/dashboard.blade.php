@extends('admin.navbar')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Selamat Datang </h2>

    <div class="row">
        <!-- Statistik 1 -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Total Pendapatan</h6>
                    <h4 class="text-primary">Rp12.628.000</h4>
                    <small class="text-success">+28.5% dari bulan lalu</small>
                </div>
            </div>
        </div>

        <!-- Statistik 2 -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Total Penjualan</h6>
                    <h4 class="text-success">Rp4.679.000</h4>
                    <small class="text-success">+16.2% dari bulan lalu</small>
                </div>
            </div>
        </div>

        <!-- Statistik 3 -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Pembayaran</h6>
                    <h4 class="text-warning">Rp2.468.000</h4>
                    <small class="text-danger">-5.4% dari bulan lalu</small>
                </div>
            </div>
        </div>

        <!-- Statistik 4 -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Jumlah Transaksi</h6>
                    <h4 class="text-info">87 Transaksi</h4>
                    <small class="text-success">+7.2% dari bulan lalu</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Penjualan -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="mb-3">Grafik Penjualan Bulanan</h5>
            <canvas id="salesChart" height="100"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Penjualan',
                data: [1200000, 1500000, 1800000, 2000000, 1700000, 2100000],
                backgroundColor: '#0d6efd'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
