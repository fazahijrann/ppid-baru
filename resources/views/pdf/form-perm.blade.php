<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <br />
        <table width="540">
            <tr>
                <td style="font-family: 'Times New Roman', Times, serif; font-size: 18px; text-align: center; font-weight: bold"
                    class="text">
                    <u>FORMULIR PERMOHONAN INFORMASI PUBLIK</u>
                </td>
            </tr>
            <tr>
                <td style="text-align: center">No. Pendaftaran : {{ $data->pemohon->no_pendaftaran }}</td>
            </tr>
        </table>

        <br /><br />
        <table width="540">
            <tr>
                <td width="180">No. Permohonan Informasi</td>
                <td width="10">:</td>
                <td width="335">{{ $data->no_permohonan_informasi }}</td>
            </tr>
            <tr>
                <td width="180">Nama</td>
                <td width="10">:</td>
                <td width="335">{{ $data->pemohon->nama }}</td>
            </tr>
            <tr>
                <td width="180">Alamat</td>
                <td width="10">:</td>
                <td width="335">{{ $data->pemohon->alamat }}</td>
            </tr>
            <tr>
                <td width="180">Nomor KTP (Sesuai KTP)</td>
                <td width="10">:</td>
                <td width="335">{{ $data->pemohon->nik }}</td>
            </tr>
            <tr>
                <td width="180">No. Telepon / Email</td>
                <td width="10">:</td>
                <td width="335">{{ $data->pemohon->no_tlp }} / {{ $data->pemohon->email }}</td>
            </tr>
            <tr>
                <td width="180">Rincian Informasi yang Dibutuhkan</td>
                <td width="10">:</td>
                <td width="100">{{ $data->rincian_informasi }}</td>
            </tr>
            <tr>
                <td width="180">Tujuan Penggunaan Informasi</td>
                <td width="10">:</td>
                <td width="335">{{ $data->tujuan_informasi }}</td>
            </tr>
            <tr>
                <td width="180">Cara Memperoleh Informasi</td>
                <td width="10">:</td>
                <td width="335">{{ $data->kategoriMemperoleh->jenis_memperoleh }}</td>
            </tr>
            <tr>
                <td width="180">Cara Mendapatkan Salinan Informasi</td>
                <td width="10">:</td>
                <td width="335">{{ $data->kategoriSalinan->jenis_salinan }}</td>
            </tr>
        </table>
        <br /><br />
        <table style="width: 540; text-align: center;">
            <tr>
                <td style="width: 50%; vertical-align: middle;">
                    <table style="width: 90%; height: 150px; margin: auto; text-align: center;">
                        <tr>
                            <td style="vertical-align: middle;">
                                <p style="padding-top: 30px">Petugas Penerima Informasi</p>
                                <p style="margin-top: 100px">
                                    {{ $data->penerima->name ?? 'Belum Diterima Oleh Petugas' }}
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 50%; vertical-align: middle;">
                    <table style="width: 90%; height: 150px; margin: auto; text-align: center;">
                        <tr>
                            <td style="vertical-align: middle;">
                                <p>Bogor, {{ \Carbon\Carbon::parse($data->tgl_permohonan)->translatedFormat('d F Y') }}
                                </p>
                                <p>Pemohon Informasi</p>
                                <p style="margin-top: 100px">{{ $data->pemohon->nama }}</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

    </center>
</body>

</html>
