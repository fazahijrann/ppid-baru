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
        ]);

        $pemohonData = $request->except(['file_ktp', 'sk_badanhukum', 'password']);
        $pemohonData['file_ktp'] = $request->file('file_ktp')->store('ktp', 'public');
        $pemohonData['password'] = Hash::make($request->password);

        if ($request->id_kategori == 2) {
            $request->validate([
                'nama_kuasa' => ['required', 'string', 'max:30'],
                'alamat_kuasa' => ['required', 'string', 'max:100'],
                'no_tlp_kuasa' => ['required', 'string', 'max:15'],
                'sk_badanhukum' => ['required', 'file', 'mimes:pdf', 'max:2048'],
            ]);

            $pemohonData['sk_badanhukum'] = $request->file('sk_badanhukum')->store('sk_badanhukum', 'public');
            $pemohonData += $request->only(['nama_kuasa', 'alamat_kuasa', 'no_tlp_kuasa']);
        }

        $pemohon = Pemohon::create($pemohonData);
        event(new Registered($pemohon));
        Auth::login($pemohon);

        return redirect(route('dashboard'))->with('success', 'Registrasi berhasil!');
    }
}
