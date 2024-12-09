<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\KeberatanInformasi;
use App\Models\PermohonanInformasi;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{

    public function permohonan($no_permohonan_informasi)
    {
        $data = PermohonanInformasi::where('no_permohonan_informasi', $no_permohonan_informasi)->firstOrFail();

        $pdf = PDF::loadview('pdf.form-perm', compact('data'))->setPaper('f4', 'potrait');
        return $pdf->stream('Permohonan Informasi - ' . $data->no_permohonan_informasi . '.pdf');
    }

    public function bukti($no_permohonan_informasi)
    {
        $data = PermohonanInformasi::where('no_permohonan_informasi', $no_permohonan_informasi)->firstOrFail();
        $waktu = Carbon::parse($data->tandaBuktiPenerimaan->waktu)->format('H:i');

        $pdf = PDF::loadview('pdf.bukti', compact('data', 'waktu'))->setPaper('f4', 'potrait');
        return $pdf->stream('Tanda Bukti Penerimaan Informasi-' . $data->no_permohonan_informasi . '.pdf');
    }

    public function keppermohonan($no_permohonan_informasi)
    {
        $data = PermohonanInformasi::where('no_permohonan_informasi', $no_permohonan_informasi)->firstOrFail();
        $tanggal = 'tanggal ' . Carbon::parse($data->tgl_permohonan)->translatedFormat('d') . ' bulan ' . Carbon::parse($data->tgl_permohonan)->translatedFormat('F') . ' tahun ' . Carbon::parse($data->tgl_permohonan)->translatedFormat('Y');

        $pdf = PDF::loadview('pdf.keputusan-permohonan', compact('data', 'tanggal'))->setPaper('f4', 'potrait');
        return $pdf->stream('Permohonan Informasi - ' . $data->no_permohonan_informasi . '.pdf');

        // return view('pdf.permohonan', compact('data', 'tanggal'));
    }
}
