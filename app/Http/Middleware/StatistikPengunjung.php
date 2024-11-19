<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class StatistikPengunjung
{
    public function handle($request, Closure $next)
    {
        // Simpan data pengunjung
        DB::table('pengunjung')->insert([
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'waktu_kunjungan' => now(),
        ]);

        // Ambil statistik pengunjung
        $totalPengunjung = DB::table('pengunjung')->count();
        $pengunjungHariIni = DB::table('pengunjung')
            ->whereDate('waktu_kunjungan', '=', now()->format('Y-m-d'))
            ->count();
        $pengunjungBulanIni = DB::table('pengunjung')
            ->whereMonth('waktu_kunjungan', '=', now()->format('m'))
            ->count();

        // Bagikan data ke semua view
        view()->share('totalPengunjung', $totalPengunjung);
        view()->share('pengunjungHariIni', $pengunjungHariIni);
        view()->share('pengunjungBulanIni', $pengunjungBulanIni);

        return $next($request);
    }
}
