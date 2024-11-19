<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function simpanPengunjung()
    {
        $ip_address = request()->ip();
        $user_agent = request()->header('User-Agent');

        // Simpan data ke tabel pengunjung
        DB::table('pengunjung')->insert([
            'ip_address' => $ip_address,
            'user_agent' => $user_agent,
            'waktu_kunjungan' => now(),  // Pastikan ada kolom waktu_kunjungan
        ]);
    }

    public function index()
    {
        // Simpan data pengunjung
        $this->simpanPengunjung();

        // Ambil statistik pengunjung
        $totalPengunjung = DB::table('pengunjung')->count();
        $pengunjungHariIni = DB::table('pengunjung')
            ->whereDate('waktu_kunjungan', '=', now()->format('Y-m-d'))
            ->count();
        $pengunjungBulanIni = DB::table('pengunjung')
            ->whereMonth('waktu_kunjungan', '=', now()->format('m'))
            ->count();

        // Pastikan data dikirim ke view dengan format yang benar
        return view('welcome', [
            'totalPengunjung' => $totalPengunjung,
            'pengunjungHariIni' => $pengunjungHariIni,
            'pengunjungBulanIni' => $pengunjungBulanIni,
        ]);
    }
}
