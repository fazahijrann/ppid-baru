<?php

namespace App\Http\Controllers;

use App\Models\KeberatanInformasi;
use App\Models\KategoriKeberatan;
use App\Models\Pemohon;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class KeberatanController extends Controller
{
    public function create()
    {
        // Ambil data pemohon berdasarkan user yang sedang login
        $pemohon = Auth::user();

        // Periksa apakah pemohon ditemukan
        if (!$pemohon) {
            return redirect()->back()->with('error', 'Data pemohon tidak ditemukan.');
        }

        // Ambil data kategori untuk ditampilkan di form
        $kategori_keberatan = KategoriKeberatan::all();

        // Mendapatkan nomor pendaftaran terakhir dari bulan dan tahun yang sama
        $currentMonth = Carbon::now()->format('m'); // Mendapatkan bulan sekarang
        $currentYear = Carbon::now()->format('Y');  // Mendapatkan tahun sekarang

        // Cari nomor pendaftar terakhir yang memiliki format sama di bulan dan tahun ini
        $lastKeberatan = KeberatanInformasi::whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->orderBy('no_keberatan_informasi', 'desc')
            ->first();


        // Menentukan nomor urut baru
        $noUrut = $lastKeberatan ? (int)substr($lastKeberatan->no_keberatan_informasi, -4) + 1 : 1;;

        // Format nomor pendaftaran: "reg-bulan-tahun-noUrut"
        $newKeberatanInformasi = sprintf('ppid-keberatan-%02d-%s-%04d', $currentMonth, $currentYear, $noUrut);

        // Debugging: Cek apakah kategori keberatan berhasil diambil
        // if ($kategori_keberatan->isEmpty()) {
        //     dd('Kategori keberatan tidak ditemukan.');
        // }

        return view('keberataninformasi', compact('pemohon', 'kategori_keberatan', 'newKeberatanInformasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_keberatan_id' => 'required|exists:kategori_keberatan,id', // Validasi sebagai single value, bukan array
        ]);

        // Ambil data pemohon berdasarkan user yang sedang login
        $pemohon = Auth::user();
        // Periksa apakah pemohon ditemukan
        if (!$pemohon) {
            return redirect()->back()->with('error', 'Data pemohon tidak ditemukan.');
        }

        // Simpan data ke tabel keberatan_informasi untuk setiap kategori yang dipilih
        KeberatanInformasi::create([
            'no_keberatan_informasi' => $request->no_keberatan_informasi,
            'id_pemohon' => $pemohon->id,
            'keputusan_informasi_id' => null, // Set nilai otomatis menjadi 1
            'kategori_keberatan_id' => $request->input('kategori_keberatan_id'),
            'keterangan' => $request->input('keterangan'),
            'tgl_keberatan' => Carbon::now(),
        ]);

        // Redirect ke halaman cek setelah data tersimpan
        return redirect()->route('cek')->with('success', 'Keberatan berhasil diajukan!');
    }
}
