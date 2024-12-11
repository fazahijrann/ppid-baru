<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermohonanInformasiController;
use App\Http\Controllers\KeberatanController;
use App\Http\Controllers\CekStatusController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\StatistikPengunjung;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Terapkan middleware ke semua route
Route::middleware(StatistikPengunjung::class)->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/regulasi', function () {
        return view('regulasi');
    })->name('regulasi');

    Route::get('/informasi-publik', function () {
        return view('informasipublik');
    })->name('informasipublik');

    Route::get('/daftar-informasi-publik', function () {
        return view('daftarinformasipublik');
    })->name('daftarinformasipublik');

    Route::get('/pengajuan', function () {
        return view('pengajuan');
    })->name('pengajuan');

    Route::get('/permohonan-informasi', function () {
        return view('permohonaninformasi');
    })->name('permohonaninformasi');

    Route::get('/cek', function () {
        return view('cek');
    })->name('cek');

    Route::get('/cekstatus', function () {
        return view('cekstatus');
    })->name('cekstatus');
});
// Route::get('/keberatan-informasi', function () {
//     return view('keberataninformasi');
// })->name('keberataninformasi');

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware('auth')->group(
    function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Route untuk Permohonan Informasi
        Route::get('/permohonaninformasi', [PermohonanInformasiController::class, 'create'])->name('permohonaninformasi.create'); // Tambahkan ini
        Route::post('/permohonaninformasi', [PermohonanInformasiController::class, 'store'])->name('permohonan.store');

        Route::get('/keberataninformasi', [KeberatanController::class, 'create'])->name('keberataninformasi.create');
        Route::post('/keberataninformasi', [KeberatanController::class, 'store'])->name('keberatan.store');

        Route::get('/cek', [CekStatusController::class, 'cekStatus'])->name('cek')->middleware('auth');
    }
);

// Route::get('/cek', [CekStatusController::class, 'cekStatus'])->name('cek.status');
Route::get('/cekstatus', [CekStatusController::class, 'showCekStatus'])->name('cekstatus');


// Route::get('/cek', function () {
//     return view('cek');
// });

Route::get('/profileppid', function () {
    return view('profileppid');
})->name('profileppid');

Route::get('/ppidutama', function () {
    return view('ppidutama');
});

Route::get('/ppidpembantu', function () {
    return view('ppidpembantu');
});

Route::get('/regulasi', function () {
    return view('regulasi');
});
Route::get('/informasipublik', function () {
    return view('informasipublik');
});
Route::get('/daftarinformasipublik', function () {
    return view('daftarinformasipublik');
});
Route::get('/pengajuan', function () {
    return view('pengajuan');
});

Route::get('/cekstatus', function () {
    return view('cekstatus');
})->name('cekstatus');


Route::get('/permohonan/{no_permohonan_informasi}/pdf', [PdfController::class, 'permohonan'])->name('permohonan.pdf');

Route::get('/bukti/{no_permohonan_informasi}/pdf', [PdfController::class, 'bukti'])->name('bukti.pdf');

Route::get('/keputusan-permohonan/{no_permohonan_informasi}/pdf', [PdfController::class, 'keppermohonan'])->name('keppermohonan.pdf');

Route::get('/keberatan/{no_keberatan_informasi}/pdf', [PdfController::class, 'keberatan'])->name('keberatan.pdf');

Route::get('/tanggapan-keberatan/{no_keberatan_informasi}/pdf', [PdfController::class, 'tanggkeberatan'])->name('tanggapan.pdf');


// Authentication routes
require __DIR__ . '/auth.php';
