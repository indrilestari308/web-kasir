@extends('layouts.app')

@push('styles')
<style>
    .card-gradient {
        border: 0;
        border-radius: 12px;
        overflow: hidden;
    }
    .stat-value {
        font-size: 1.6rem;
        font-weight: 700;
    }
    .small-muted {
        color: #6c757d;
        font-size: 0.9rem;
    }
</style>
@endpush

@section('content')
<div class="row g-3 mb-3">
    <div class="col-md-6">
        <div class="card card-gradient shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="mb-1">Pendapatan (7 hari)</h6>
                        <div class="stat-value text-success">Rp <span id="revTotal">-</span></div>
                        <div class="small-muted mt-1">Performa pendapatan harian</div>
                    </div>
                    <div class="text-end">
                        <i class="fa fa-wallet fa-2x text-success"></i>
                    </div>
                </div>

                <div class="mt-3">
                    <canvas id="revenueChart" height="120"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-gradient shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="mb-1">Jumlah Transaksi (7 hari)</h6>
                        <div class="stat-value text-primary" id="transTotal">-</div>
                        <div class="small-muted mt-1">Jumlah transaksi harian</div>
                    </div>
                    <div class="text-end">
                        <i class="fa fa-receipt fa-2x text-primary"></i>
                    </div>
                </div>

                <div class="mt-3">
                    <canvas id="transChart" height="120"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Ringkasan cepat --}}
<div class="row g-3">
    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <h6 class="mb-2">Total Pendapatan Minggu</h6>
            <div class="h4 fw-bold text-success" id="weeklyRevenue">Rp -</div>
            <div class="small-muted">Perbandingan vs minggu lalu (coming soon)</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <h6 class="mb-2">Total Transaksi Minggu</h6>
            <div class="h4 fw-bold text-primary" id="weeklyTrans">-</div>
            <div class="small-muted">Rata-rata transaksi / hari</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <h6 class="mb-2">Rata-rata Nilai Transaksi</h6>
            <div class="h4 fw-bold" id="avgValue">Rp -</div>
            <div class="small-muted">Estimasi rata-rata per transaksi</div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Data dari controller
    const labels = @json($labels);
    const revenue = @json($revenue);
    const transactions = @json($transactions);

    // Hitung ringkasan sederhana
    const totalRevenue = revenue.reduce((a,b) => a + b, 0);
    const totalTrans = transactions.reduce((a,b) => a + b, 0);
    const avgValue = totalTrans > 0 ? Math.round(totalRevenue / totalTrans) : 0;

    document.getElementById('revTotal').innerText = totalRevenue.toLocaleString('id-ID');
    document.getElementById('transTotal').innerText = totalTrans;
    document.getElementById('weeklyRevenue').innerText = totalRevenue.toLocaleString('id-ID');
    document.getElementById('weeklyTrans').innerText = totalTrans;
    document.getElementById('avgValue').innerText = avgValue.toLocaleString('id-ID');

    // Gradient helper
    function createGradient(ctx, colorStart, colorEnd) {
        const gradient = ctx.createLinearGradient(0, 0, 0, 200);
        gradient.addColorStop(0, colorStart);
        gradient.addColorStop(1, colorEnd);
        return gradient;
    }

    // Revenue (Line Chart)
    (function () {
        const ctx = document.getElementById('revenueChart').getContext('2d');
        const gradient = createGradient(ctx, 'rgba(34,197,94,0.35)', 'rgba(34,197,94,0.05)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Revenue',
                    data: revenue,
                    fill: true,
                    backgroundColor: gradient,
                    borderColor: 'rgba(34,197,94,0.9)',
                    tension: 0.35,
                    pointRadius: 3,
                    pointBackgroundColor: 'rgba(34,197,94,1)'
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: {
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        },
                        grid: { display: true, drawBorder: false }
                    },
                    x: { grid: { display: false } }
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        });
    })();

    // Transactions (Bar Chart)
    (function () {
        const ctx = document.getElementById('transChart').getContext('2d');
        const gradient = createGradient(ctx, 'rgba(59,130,246,0.35)', 'rgba(59,130,246,0.05)');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Transaksi',
                    data: transactions,
                    backgroundColor: gradient,
                    borderColor: 'rgba(59,130,246,0.9)',
                    borderWidth: 1,
                    hoverBackgroundColor: 'rgba(59,130,246,0.45)',
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { display: true, drawBorder: false }
                    },
                    x: { grid: { display: false } }
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.parsed.y + ' transaksi';
                            }
                        }
                    }
                }
            }
        });
    })();
</script>
@endpush
