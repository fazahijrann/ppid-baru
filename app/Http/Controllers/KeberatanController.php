<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pemohon;
use Illuminate\Http\Request;
use App\Models\KategoriKeberatan;
use App\Models\KeberatanInformasi;
use App\Models\KeputusanInformasi;
use Illuminate\Routing\Controller;
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

        // $keputusanInformasi = KeputusanInformasi::with('tandaBukti')->get();
        // dd($keputusanInformasi->tandaBukti);

        // $keputusanInformasi = KeputusanInformasi::get();

        $keputusanInformasi = KeputusanInformasi::with('tandaBukti', 'tandaBukti.permohonaninformasibukti')
            ->whereIn('status', ['Diterima', 'Ditolak'])
            ->get();
        // dd($keputusanInformasi);

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



        return view('keberataninformasi', compact('pemohon', 'kategori_keberatan', 'newKeberatanInformasi', 'keputusanInformasi'));
    }

    public function store(Request $request)
    {
        // Validasi form
        $request->validate([
            'kategori_keberatan_id' => 'required|exists:kategori_keberatan,id',
            'id_permohonan_informasi' => 'required|exists:keputusan_informasi,id', // Validasi id_keputusan
        ]);

        // Ambil keputusan berdasarkan ID yang dipilih
        $keputusan = KeputusanInformasi::find($request->id_permohonan_informasi);

        // Pastikan keputusan ditemukan
        if (!$keputusan) {
            return redirect()->back()->with('error', 'Keputusan informasi tidak ditemukan.');
        }

        // Ambil data pemohon berdasarkan user yang sedang login
        $pemohon = Auth::user();
        if (!$pemohon) {
            return redirect()->back()->with('error', 'Data pemohon tidak ditemukan.');
        }

        // Simpan data keberatan_informasi
        KeberatanInformasi::create([
            'no_keberatan_informasi' => $request->no_keberatan_informasi,
            'id_pemohon' => $pemohon->id,
            'keputusan_informasi_id' => $keputusan->id, // Simpan ID keputusan
            'kategori_keberatan_id' => $request->input('kategori_keberatan_id'),
            'status' => 'Menunggu',
            'keterangan' => $request->input('keterangan'),
            'tgl_keberatan' => Carbon::now(),
        ]);

        // dd($request->all()); // Memeriksa data yang diterima


        // Redirect setelah sukses
        return redirect()->route('cek')->with('success', 'Keberatan berhasil diajukan!');
    }
}
