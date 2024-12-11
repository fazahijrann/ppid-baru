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

        $checks = [
            '01101011' => 'Informasi yang diminta belum dikuasai',
            '01100100' => 'Informasi yang diminta belum didokumentasikan'
        ];

        $pdf = PDF::loadview('pdf.keputusan-permohonan', compact('data', 'tanggal', 'checks'))->setPaper('f4', 'potrait');
        return $pdf->stream('Permohonan Informasi - ' . $data->no_permohonan_informasi . '.pdf');

        // return view('pdf.permohonan', compact('data', 'tanggal'));
    }

    public function keberatan($no_keberatan_informasi)
    {
        $data = KeberatanInformasi::where('no_keberatan_informasi', $no_keberatan_informasi)->firstOrFail();

        $kategorikeb = [
            1 => 'Permohonan Informasi di tolak.',
            2 => 'Informasi berkala tidak disediakan',
            3 => 'Permintaan informasi tidak ditanggapi',
            4 => 'Permintaan informasi ditanggapi tidak sebagaimana yang diminta',
            5 => 'Permintaan informasi tidak dipenuhi',
            6 => 'Biaya yang dikenakan tidak wajar',
            7 => 'Informasi disampaikan melebihi jangka waktu yang ditentukan',
        ];



        $pdf = PDF::loadview('pdf.form-keber', compact('data', 'kategorikeb'))->setPaper('f4', 'potrait');
        return $pdf->stream('Keberatan Informasi - ' . $data->no_keberatan_informasi . '.pdf');
    }

    public function tanggkeberatan($no_keberatan_informasi)
    {
        $data = KeberatanInformasi::where('no_keberatan_informasi', $no_keberatan_informasi)->firstOrFail();

        $circles = [
            '01110100' => 'Menolak keberatan pemohon',
            '01110011' => 'Memberikan sebagaian informasi yang dimohonkan',
            '01100010' => 'Memberikan informasi yang dimohonkan pemohon',
        ];

        $waktu = 'tanggal ' . Carbon::parse($data->jangka_waktu)->translatedFormat('d') . ' bulan ' . Carbon::parse($data->jangka_waktu)->translatedFormat('F') . ' tahun ' . Carbon::parse($data->jangka_waktu)->translatedFormat('Y');

        $pdf = PDF::loadview('pdf.tanggapan-keberatan', compact('data', 'circles', 'waktu'))->setPaper('f4', 'potrait');
        return $pdf->stream('Keberatan Informasi - ' . $data->no_keberatan_informasi . '.pdf');
    }
}
