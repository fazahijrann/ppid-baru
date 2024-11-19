<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Pemohon; // Pastikan Anda mengimpor model Pemohon
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // Mengambil data pemohon berdasarkan ID pengguna yang sedang login
        $pemohon = Pemohon::find(Auth::id());

        return view('profile.edit', [
            'pemohon' => $pemohon, // Menggunakan pemohon
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $pemohon = Pemohon::find(Auth::id()); // Mengambil data pemohon

        // Memperbarui field nama dan email
        $pemohon->nama = $request->input('nama'); // Menggunakan 'nama' dari tabel pemohon
        $pemohon->email = $request->input('email');

        // Jika email diubah, reset verifikasi email
        if ($pemohon->isDirty('email')) {
            $pemohon->email_verified_at = null; // Jika perlu menambahkan verifikasi email
        }

        $pemohon->save(); // Simpan perubahan

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $pemohon = Pemohon::find(Auth::id()); // Mengambil pemohon yang sedang login

        Auth::logout(); // Logout pengguna

        $pemohon->delete(); // Hapus data pemohon

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
