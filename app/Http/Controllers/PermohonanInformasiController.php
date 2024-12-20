<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pemohon;
use Illuminate\Http\Request;
use App\Models\KategoriSalinan;
use App\Models\KategoriMemperoleh;
use Illuminate\Support\Facades\DB;
use App\Models\PermohonanInformasi;
use App\Http\Controllers\Controller;
use App\Models\TandaBuktiPenerimaan;
use Illuminate\Support\Facades\Auth;

class PermohonanInformasiController extends Controller
{
    // public function create()
    // {
    //     // Ambil data pemohon berdasarkan user yang sedang login
    //     $pemohon = Pemohon::first();

    //     // Periksa apakah pemohon ditemukan
    //     if (!$pemohon) {
    //         return redirect()->back()->with('error', 'Data pemohon tidak ditemukan.');
    //     }

    //     // Ambil kategori memperoleh dan salinan informasi untuk view
    //     $kategori_memperoleh = KategoriMemperoleh::all(); // Sesuaikan dengan model
    //     $kategori_salinan = KategoriSalinan::all(); // Sesuaikan dengan model

    //     // Mendapatkan nomor pendaftaran terakhir dari bulan dan tahun yang sama
    //     $currentMonth = Carbon::now()->format('m'); // Mendapatkan bulan sekarang
    //     $currentYear = Carbon::now()->format('Y');  // Mendapatkan tahun sekarang

    //     // Cari nomor pendaftar terakhir yang memiliki format sama di bulan dan tahun ini
    //     $lastPermohonan = PermohonanInformasi::whereYear('created_at', $currentYear)
    //         ->whereMonth('created_at', $currentMonth)
    //         ->orderBy('no_permohonan_informasi', 'desc')
    //         ->first();


    //     // Menentukan nomor urut baru
    //     $noUrut = $lastPermohonan ? (int)substr($lastPermohonan->no_permohonan_informasi, -4) + 1 : 1;;

    //     // Format nomor pendaftaran: "reg-bulan-tahun-noUrut"
    //     $newPermohonanInformasi = sprintf('ppid-informasi-%02d-%s-%04d', $currentMonth, $currentYear, $noUrut);

    //     // Kirim data pemohon dan kategori ke view
    //     return view('permohonaninformasi', compact('pemohon', 'kategori_memperoleh', 'kategori_salinan', 'newPermohonanInformasi'));
    // }

    public function create()
    {
        // Ambil data pemohon berdasarkan user yang sedang login
        $pemohon = Pemohon::first();

        if (!$pemohon) {
            return redirect()->back()->with('error', 'Data pemohon tidak ditemukan.');
        }

        // Ambil kategori memperoleh dan salinan informasi untuk view
        $kategori_memperoleh = KategoriMemperoleh::all();
        $kategori_salinan = KategoriSalinan::all();

        // Mendapatkan nomor pendaftaran terakhir dari bulan dan tahun yang sama
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');

        $lastPermohonan = PermohonanInformasi::whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->orderBy('no_permohonan_informasi', 'desc')
            ->first();

        // Menentukan nomor urut baru
        $noUrut = $lastPermohonan ? (int)substr($lastPermohonan->no_permohonan_informasi, -4) + 1 : 1;

        // Format nomor pendaftaran: "ppid-informasi-bulan-tahun-noUrut"
        $newPermohonanInformasi = sprintf('ppid-informasi-%02d-%s-%04d', $currentMonth, $currentYear, $noUrut);

        // Kirim data pemohon dan kategori ke view
        return view('permohonaninformasi', compact('pemohon', 'kategori_memperoleh', 'kategori_salinan', 'newPermohonanInformasi'));
    }


    // public function store(Request $request)
    // {
    //     // Validasi data dari form
    //     $validatedData = $request->validate([
    //         'no_permohonan_informasi' =>  'required',
    //         'rincian_informasi' => 'required|string',
    //         'tujuan_informasi' => 'required|string',
    //         'id_kategori_memperoleh' => 'required|exists:kategori_memperoleh,id', // foreign key dari tabel kategori_memperoleh
    //         'id_kategori_salinan' => 'required|exists:kategori_salinan,id', // foreign key dari tabel kategori_salinan
    //         'pernyataan' => 'required|boolean', // Validasi checkbox (boolean)
    //     ]);

    //     // Ambil data pemohon dari database
    //     $pemohon = Pemohon::where('id', Auth::id())->first();
    //     if (!$pemohon) {
    //         return redirect()->back()->with('error', 'Pemohon tidak ditemukan.');
    //     }

    //     // Tambahkan data id_pemohon dan tanggal permohonan
    //     $validatedData['id_pemohon'] = $pemohon->id;
    //     $validatedData['tgl_permohonan'] = now(); // Set tanggal permohonan sekarang

    //     // Simpan data ke dalam tabel permohonan_informasi dengan id_penerima null
    //     $permohonanInformasi = PermohonanInformasi::create($validatedData);

    //     // Redirect ke halaman cek setelah data tersimpan
    //     return redirect()->route('cek')->with('success', 'Permohonan informasi berhasil disimpan.');
    // }

    public function store(Request $request)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            'no_permohonan_informasi' =>  'required',
            'rincian_informasi' => 'required|string|max:100',
            'tujuan_informasi' => 'required|string|max:100',
            'id_kategori_memperoleh' => 'required|exists:kategori_memperoleh,id',
            'id_kategori_salinan' => 'required|exists:kategori_salinan,id',
            'pernyataan' => 'required|boolean',
        ]);
        // Ambil data pemohon berdasarkan user yang sedang login
        $pemohon = Pemohon::find(Auth::id()); // Menggunakan Eloquent untuk mengambil data pemohon
        if (!$pemohon) {
            return redirect()->back()->with('error', 'Pemohon tidak ditemukan.');
        }

        // Tambahkan data id_pemohon dan tanggal permohonan ke dalam validatedData
        $validatedData['id_pemohon'] = $pemohon->id;
        $validatedData['tgl_permohonan'] = now();

        // Mulai transaksi menggunakan Eloquent

        // Simpan data ke dalam tabel permohonan_informasi
        $permohonanInformasi = PermohonanInformasi::create($validatedData);

        // Simpan data ke dalam tabel tanda_buktipenerimaan
        $permohonanInformasi->tandaBuktiPenerimaan()->create([
            'permohonan_id', // Ambil ID pemohon yang benar
            'waktu' => now(),
            'tgl_penerimaan' => null,
            'status' => 'Menunggu', // Status default
        ]);

        return redirect()->route('cek')->with('success', 'Permohonan informasi berhasil disimpan.');
    }


    public function updatePenerima(Request $request, $id)
    {
        // Cari permohonan informasi berdasarkan id
        $permohonanInformasi = PermohonanInformasi::find($id);
        if (!$permohonanInformasi) {
            return redirect()->back()->with('error', 'Permohonan informasi tidak ditemukan.');
        }

        // Validasi data dari form
        $validatedData = $request->validate([
            'id_penerima' => 'required|exists:penerima,id', // foreign key dari tabel penerima
        ]);

        // Perbarui data id_penerima
        $permohonanInformasi->update($validatedData);

        // Redirect setelah data tersimpan
        return redirect()->back()->with('success', 'Permohonan informasi berhasil diperbarui');
    }

    public function terimaKeputusan(Request $request, $id)
    {
        $data = PermohonanInformasi::with(['tandaBuktiPenerimaan.tandaKeputusan.buktiPenerimaan'])->findOrFail($id);

        $tanda = $data->tandaBuktiPenerimaan;
        $keputusan = $tanda->tandaKeputusan;
        // $bukti = $keputusan->buktiPenerimaan;
        if ($request->input('action') === 'terima') {
            $keputusan->buktiPenerimaan()->create([
                'keputusan_informasi_id' => $keputusan->id,
                'waktu' => now(),
                'tgl_penerimaan' => now(),
            ]);
        }

        // dd($request->all());
        return redirect()->route('cek');
    }
}
