<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    public function dashboard()
    {
        // Contoh data 7 hari terakhir (bisa diambil dari DB)
        $labels = [];
        $revenue = [];
        $transactions = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i)->format('Y-m-d');
            $labels[] = Carbon::parse($date)->format('d M');

            // contoh angka random, ganti dengan query DB
            $revenue[] = rand(500000, 2000000);
            $transactions[] = rand(10, 60);
        }

        // Jika mau ambil langsung dari DB (contoh, sesuaikan nama tabel & kolom):
        // $start = Carbon::today()->subDays(6)->startOfDay();
        // $end = Carbon::today()->endOfDay();
        // $data = DB::table('transaksis')
        //     ->select(DB::raw('date(created_at) as date'),
        //              DB::raw('COUNT(*) as total_trans'),
        //              DB::raw('SUM(total_harga) as total_revenue'))
        //     ->whereBetween('created_at', [$start, $end])
        //     ->groupBy('date')
        //     ->orderBy('date')
        //     ->get();
        // Prepare arrays from $data...

        return view('pemilik.dashboard', [
            'labels' => $labels,
            'revenue' => $revenue,
            'transactions' => $transactions,
        ]);
    }

    public function laporan()
    {
        return view('pemilik.laporan');
    }
}
