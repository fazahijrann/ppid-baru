<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pemohon;
use App\Models\KategoriPemohon; // Import model KategoriPemohon
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // Ambil data kategori dari tabel kategori_pemohon
        $kategori_pemohon = KategoriPemohon::all();

        // Mendapatkan nomor pendaftaran terakhir dari bulan dan tahun yang sama
        $currentMonth = Carbon::now()->format('m'); // Mendapatkan bulan sekarang
        $currentYear = Carbon::now()->format('Y');  // Mendapatkan tahun sekarang

        // Cari nomor pendaftar terakhir yang memiliki format sama di bulan dan tahun ini
        $lastPemohon = Pemohon::whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->orderBy('no_pendaftaran', 'desc')
            ->first();

        // Menentukan nomor urut baru
        $noUrut = $lastPemohon ? (int)substr($lastPemohon->no_pendaftaran, -4) + 1 : 1;

        // Format nomor pendaftaran: "reg-bulan-tahun-noUrut"
        $newNoPendaftaran = sprintf('reg-ppid-%02d-%s-%04d', $currentMonth, $currentYear, $noUrut);

        // Kirimkan data kategori ke view registrasi
        return view('auth.register', compact('kategori_pemohon', 'newNoPendaftaran'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'no_pendaftaran' => ['required'],
            'nama' => ['required', 'string', 'max:30'],
            'nik' => ['required', 'string', 'max:16', 'unique:pemohon'],
            'alamat' => ['required', 'string', 'max:100'],
            'no_tlp' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:30'],
            'pekerjaan' => ['required', 'string', 'max:30'],
            'file_ktp' => ['required', 'file', 'mimes:pdf,png', 'max:2048'],
            'password' => ['required', Rules\Password::defaults()],
            'id_kategori' => ['required', 'exists:kategori_pemohon,id_kategori'],

            // Validasi tambahan untuk kategori "Badan Hukum"
            'nama_kuasa' => ['nullable', 'string', 'max:30'], // Optional jika bukan badan hukum
            'alamat_kuasa' => ['nullable', 'string', 'max:100'],
            'no_tlp_kuasa' => ['nullable', 'string', 'max:15'],
            'sk_badanhukum' => ['nullable', 'file', 'mimes:pdf', 'max:2048'], // File PDF untuk SK Badan Hukum
        ]);

        // Simpan file KTP ke folder 'public/ktp'
        if ($request->hasFile('file_ktp')) {
            $fileKtp = $request->file('file_ktp');
            $fileKtpName = time() . '_' . $fileKtp->getClientOriginalName();
            $fileKtp->move(public_path('ktp'), $fileKtpName); // Simpan ke folder 'ktp'
        }

        // Siapkan data pemohon yang bersifat umum
        $pemohonData = [
            'no_pendaftaran' => $request->no_pendaftaran,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
            'pekerjaan' => $request->pekerjaan,
            'file_ktp' => 'ktp/' . $fileKtpName,  // Simpan path file KTP
            'password' => Hash::make($request->password),
            'id_kategori' => $request->id_kategori,
        ];

        // Jika kategori adalah Badan Hukum (ID 2), tambahkan data kuasa dan simpan file SK Badan Hukum
        if ($request->id_kategori == 2) { // Asumsi ID 2 adalah untuk "Badan Hukum"
            if ($request->hasFile('sk_badanhukum')) {
                $fileSkBadanHukum = $request->file('sk_badanhukum');
                $fileSkBadanHukumName = time() . '_' . $fileSkBadanHukum->getClientOriginalName();
                $fileSkBadanHukum->move(public_path('sk_badanhukum'), $fileSkBadanHukumName); // Simpan ke folder 'sk_badanhukum'
            }

            $pemohonData['keputusan_informsi'] = '1';


            $pemohonData['nama_kuasa'] = $request->nama_kuasa;
            $pemohonData['alamat_kuasa'] = $request->alamat_kuasa;
            $pemohonData['no_tlp_kuasa'] = $request->no_tlp_kuasa;
            $pemohonData['sk_badanhukum'] = 'sk_badanhukum/' . $fileSkBadanHukumName;
        }

        // Buat pemohon baru dengan data yang sudah disiapkan
        $pemohon = Pemohon::create($pemohonData);

        // Kirimkan event bahwa pemohon baru telah terdaftar
        event(new Registered($pemohon));

        // Login pemohon setelah berhasil registrasi (hapus baris ini jika tidak ingin login otomatis)
        Auth::login($pemohon);

        // Redirect ke halaman login setelah registrasi sukses
        return redirect(route('dashboard'));
    }
}
