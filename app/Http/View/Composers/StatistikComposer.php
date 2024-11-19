<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Statistik; // Pastikan ini sesuai dengan model yang kamu miliki

class StatistikComposer
{
    public function compose(View $view)
    {
        // Ambil data statistik pengunjung

        $totalPengunjung = Statistik::count();
        $pengunjungHariIni = Statistik::whereDate('waktu_kunjungan', '=', now()->format('Y-m-d'))
            ->count();
        $pengunjungBulanIni = Statistik::whereMonth('waktu_kunjungan', '=', now()->format('m'))
            ->count();

        // Bagikan variabel ke semua view
        $view->with(compact('totalPengunjung', 'pengunjungHariIni', 'pengunjungBulanIni'));
    }
}
