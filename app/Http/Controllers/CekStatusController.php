<?php

namespace App\Http\Controllers;

use App\Models\Pemohon;
use Illuminate\Http\Request;
use App\Models\KeberatanInformasi;
use App\Models\KeputusanInformasi;
use App\Models\PermohonanInformasi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CekStatusController extends Controller
{
    public function cekStatus()
    {
        // Ambil data pemohon yang login
        $pemohon = Auth::user();

        // Cek apakah pemohon ditemukan
        if (!$pemohon) {
            return redirect()->back()->with('error', 'Pemohon tidak ditemukan.');
        }

        // Ambil data permohonan informasi dan keberatan informasi
        // $permohonan_informasi = PermohonanInformasi::where('id_pemohon', $pemohon->id)
        //     ->select('no_permohonan_informasi', 'rincian_informasi', 'tgl_permohonan', 'created_at')
        //     ->get();

        $keputusanInformasi = KeputusanInformasi::with('tandabukti', 'tandabukti.permohonaninformasibukti')
            ->whereIn('status', ['Ditolak', 'Diterima'])
            ->get();

        $permohonan_informasi = PermohonanInformasi::with([
            'kategoriMemperoleh',
            'kategoriSalinan',
            'tandaBuktiPenerimaan',
            'tandaBuktiPenerimaan.tandaKeputusan'
        ])
            ->where('id_pemohon', $pemohon->id)
            ->get();


        $keberatan_informasi = KeberatanInformasi::where('id_pemohon', $pemohon->id)
            ->select('no_keberatan_informasi', 'status', 'keterangan', 'tgl_keberatan', 'created_at')
            ->get();

        // Kirim data ke view
        return view('cek', compact('pemohon', 'permohonan_informasi', 'keberatan_informasi', 'keputusanInformasi'));
    }

    public function showCekStatus()
    {
        return view('cekstatus');
    }
}
