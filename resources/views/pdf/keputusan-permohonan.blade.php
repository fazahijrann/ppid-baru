<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <title>Permohonan Informasi-{{ $data->no_permohonan_informasi }}</title>

    <style>
        /* add body to center in dompdf */
        body {
            margin: 0 auto;
            width: 800px;
        }
    </style>
</head>

<body>
    <center>
        <table width="535">
            <tr>
                <!-- Kolom untuk Teks -->
                <td
                    style="width: 100%; vertical-align: middle; text-align: center; font-family: 'Times New Roman', Times, serif; font-size: 13px;">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/logo-pemkot-bogor.png'))) }}"
                        alt="Logo" width="90" height="120" style="position: absolute; z-index: 10; top: -10">
                    <center style="margin-left: 20">
                        <font size="4"><b>PEMERINTAH KOTA BOGOR</b> </font><br />
                        <font size="4"><b>DINAS KOMUNIKASI DAN INFORMATIKA</b></font><br />
                        <font size="3">Jl. Ir. H. Juanda No. 10, Bogor Tengah, Kota Bogor, Jawa Barat 16121</font>
                        <br />
                        <font size="3">Telp. (0251) 8321075 Faksimile (0251) 8326530</font><br />
                        <font size="3">https://kominfo.kotabogor.go.id/
                        </font><br />
                    </center>
                </td>
            </tr>
            <td colspan="2">
                <hr style="border: 1px solid" />
            </td>
            </tr>
        </table>
        <table width="540">
            <tr>
                <td style="font-family: 'Times New Roman', Times, serif; font-size: 18px; text-align: center; font-weight: bold"
                    class="text">
                    <u>PEMBERITAHUAN TERTULIS</u>
                </td>
            </tr>
        </table>
        <br />
        <table width="530" style="text-align: justify">
            <tr>
                <td>Berdasarkan permohonan Informasi pada {{ $tanggal }} dengan
                    nomor permohonan informasi <strong>{{ $data->no_permohonan_informasi }}</strong>, Kami menyampaikan
                    kepada Saudara/i:
                </td>
            </tr>
        </table>
        <table width="540" style="font-weight: bold">
            <tr>
                <td width="180">Nama</td>
                <td width="20">:</td>
                <td width="335">{{ $data->pemohon->nama }}</td>
            </tr>
            <tr>
                <td width="180">Alamat</td>
                <td width="20">:</td>
                <td width="335">{{ $data->pemohon->alamat }}</td>
            </tr>
            <tr>
                <td width="180">No. Telepon / Email</td>
                <td width="20">:</td>
                <td width="335">{{ $data->pemohon->no_tlp }} / {{ $data->pemohon->email }}</td>
            </tr>
        </table>
        <br />
        <table width="530" style="text-align: justify">
            <tr>
                <td>Pemberitahuan sebagai berikut:</td>
            </tr>
        </table>


        <table width="" style="font-weight: bold">
            <tr>
                <td>A. </td>
                <td>Informasi Dapat Diberikan</td>
            </tr>
        </table>

        <table width="540" style="border: 1px solid black; border-collapse: collapse;">
            <tr style="font-weight: bold; text-align: center">
                <td width="5" style="border: 1px solid black; padding: 5px;">No.</td>
                <td width="90" style="border: 1px solid black; padding: 5px;">Hal-hal Terkait Informasi Publik
                </td>
                <td width="130" style="border: 1px solid black; padding: 5px;">Keterangan</td>
            </tr>
            <tr>
                <td width="5" style="border: 1px solid black; padding: 5px; text-align: center">1.</td>
                <td width="90" style="border: 1px solid black; padding: 5px;">Penugasan Informasi Publik</td>
                <td width="130" style="border: 1px solid black; padding: 5px;">
                    {{ $data->tandaBuktiPenerimaan->tandaKeputusan->sumberInformasi?->jenis_sumber }}</td>
            </tr>
            <tr>
                <td width="5" style="border: 1px solid black; padding: 5px; text-align: center">2.</td>
                <td width="90" style="border: 1px solid black; padding: 5px;">Bentuk Fisik Yang Tersedia</td>
                <td width="130" style="border: 1px solid black; padding: 5px;">
                    {{ $data->tandaBuktiPenerimaan->tandaKeputusan->jenisInformasi?->jenis_informasi }}</td>
            </tr>
            <tr>
                <td width="5" style="border: 1px solid black; padding: 5px; text-align: center">3.</td>
                <td width="90" style="border: 1px solid black; padding: 5px;">Biaya yang Dibutuhkan</td>
                <td width="130" style="border: 1px solid black; padding: 5px;">
                    @if ($data->tandaBuktiPenerimaan->tandaKeputusan->status === 'Diterima')
                        Rp.
                        {{ number_format($data->tandaBuktiPenerimaan->tandaKeputusan->biayaInformasi?->biaya, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            <tr>
                <td width="5" style="border: 1px solid black; padding: 5px; text-align: center">4.</td>
                <td width="90" style="border: 1px solid black; padding: 5px;">Waktu Penyediaan</td>
                <td width="130" style="border: 1px solid black; padding: 5px;">
                    @if ($data->tandaBuktiPenerimaan->tandaKeputusan->status === 'Diterima')
                        {{ $data->tandabuktipenerimaan->tandakeputusan?->waktu }} Hari
                    @endif
                </td>
            </tr>
            <tr>
                <td width="5" style="border: 1px solid black; padding: 5px; text-align: center">5.</td>
                <td width="90" style="border: 1px solid black; padding: 5px;">Penjelasan</td>
                <td width="130" style="border: 1px solid black; padding: 5px;">
                    @if ($data->tandaBuktiPenerimaan->tandaKeputusan->status === 'Diterima')
                        {{ $data->tandabuktipenerimaan->tandaKeputusan?->keterangan }}
                    @endif
                </td>
            </tr>
        </table>
        <br />
        <table width="" style="font-weight: bold">
            <tr>
                <td>B. </td>
                <td>Informasi Tidak Dapat Diberikan</td>
            </tr>
        </table>
        <table>
            @foreach ($checks as $code => $description)
                <tr>
                    <td style="vertical-align: middle; padding: 3px;">
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/icon/' . ($data->tandabuktipenerimaan->tandaKeputusan?->keterangan === $code ? 'check' : 'square') . '.png'))) }}"
                            style="width: 15px; height: 15px;">
                    </td>
                    <td style="padding: 3px;">{{ $description }}</td>
                </tr>
            @endforeach
        </table>
        <table width="540">
            <tr>
                <td>Penyediaan informasi yang belum didokumentasikan dilakukan dalam jangka waktu
                    @if (in_array($data->tandabuktipenerimaan->tandaKeputusan?->keterangan ?? '', ['01101011', '01100100']))
                        {{ $data->tandabuktipenerimaan->tandakeputusan?->waktu ?? '' }}.
                    @endif
                </td>
            </tr>
        </table>

        <table style="">
            <tr>
                <td style="">
                    <table style="">
                        <tr>
                            <td style="">
                                <p>Bogor, {{ \Carbon\Carbon::parse($data->tgl_permohonan)->translatedFormat('d F Y') }}
                                </p>
                                <p>
                                    <strong>
                                        Pejabat Pengelola Informasi dan Dokumentasi
                                    </strong>
                                </p>
                                <p style="margin-top: 120px">
                                    {{ $data->tandabuktipenerimaan->tandaKeputusan->pejabatPenerima->name }}
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>
