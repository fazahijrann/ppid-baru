<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <title>Tanda Bukti Penerimaan Permohonan - {{ $data->no_permohonan_informasi }}</title>

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
                    <center style="margin-left: 20;">
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
        <table width="530" style="text-align: right">
            <tr>
                <td>No. : {{ $data->no_permohonan_informasi }}
                </td>
            </tr>
        </table>
        <br />
        <table width="540">
            <tr>
                <td style="font-family: 'Times New Roman', Times, serif; font-size: 18px; text-align: center; font-weight: bold;"
                    class="text">
                    <u>TANDA BUKTI PENERIMAAN</u> <br />
                    <u>TANGGAPAN PERMOHONAN INFORMASI PUBLIK</u>
                </td>
            </tr>
        </table>
        <br /><br />
        <table width="530" style="text-align: justify">
            <tr>
                <td>Telah diterima dari Pejabat Pengelola Informasi dan Dokumentasi (PPID) berupa :
                </td>
            </tr>
        </table>
        <table width="540" style="">
            <tr>
                <td>.................................................................................................................................................................................
                </td>
            </tr>
            <tr>
                <td>.................................................................................................................................................................................
                </td>
            </tr>
            <tr>
                <td>.................................................................................................................................................................................
                </td>
            </tr>
            <tr>
                <td>.................................................................................................................................................................................
                </td>
            </tr>
            <tr>
                <td>.................................................................................................................................................................................
                </td>
            </tr>
            <tr>
                <td>.................................................................................................................................................................................
                </td>
            </tr>
            <tr>
                <td>.................................................................................................................................................................................
                </td>
            </tr>
        </table>
        <table width="540" style="">
            <tr>
                <td width="120">Nama Penerima Informasi</td>
                <td width="20">:</td>
                <td width="335">{{ $data->pemohon->nama }}</td>
            </tr>
            <tr>
                <td width="120">Alamat</td>
                <td width="20">:</td>
                <td width="335">{{ $data->pemohon->alamat }}</td>
            </tr>
            <tr>
                <td width="120">Waktu</td>
                <td width="20">:</td>
                <td width="335">{{ $waktu }} WIB</td>
            </tr>
        </table>
        <br /><br /><br />
        <table width="540" style="text-align: right;">
            <tr>
                <td style="">
                    <p>Diterima Oleh : {{ $data->penerima->name }}</p>
                    <p>Pada tanggal : {{ \Carbon\Carbon::parse($data->tgl_permohonan)->translatedFormat('d F Y') }}
                    </p>
                </td>
            </tr>
        </table>
    </center>
</body>
