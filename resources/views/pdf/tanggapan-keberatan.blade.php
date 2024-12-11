<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keberatan Informasi-{{ $data->no_keberatan_informasi }}</title>


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
        </table>
        <table width="540">
            <tr>
                <td style="font-family: 'Times New Roman', Times, serif; font-size: 18px; text-align: center; font-weight: bold"
                    class="text">
                    <u>TANGGAPAN ATASAN PPID ATAS KEBERATAN</u>
                </td>
            </tr>
        </table>
        <table width="" style="font-weight: bold; padding-top: 6">
            <tr>
                <td>I. </td>
                <td style="margin-left: 8">Identitas Pemohon</td>
            </tr>
        </table>
        <table width="540" style="padding-left: 15;">
            <tr>
                <td width="130">Nama</td>
                <td width="10">:</td>
                <td width="335">
                    {{ $data->pemohon->nama }}
                </td>
            </tr>
            <tr>
                <td width="130">No. Register Keberatan</td>
                <td width="10">:</td>
                <td width="335">
                    {{ $data->no_keberatan_informasi }}
                </td>
            </tr>
            <tr>
                <td width="130">Alamat</td>
                <td width="10">:</td>
                <td width="335">
                    {{ $data->pemohon->alamat }}
                </td>
            </tr>
            <tr>
                <td width="130">Pekerjaan</td>
                <td width="10">:</td>
                <td width="335">
                    {{ $data->pemohon->pekerjaan }}

                </td>
            </tr>
            <tr>
                <td width="130">No. Telp / Email</td>
                <td width="10">:</td>
                <td width="335">
                    {{ $data->pemohon->no_tlp }} / {{ $data->pemohon->email }}
                </td>
            </tr>
            <tr>
                <td width="130">Rincian Informasi yang Dimohonkan </td>
                <td width="10">:</td>
                <td width="335">
                    {{ $data->keputusanInformasi->tandaBukti->permohonaninformasibukti->rincian_informasi }}

                </td>
            </tr>
        </table>
        <table width="" style="font-weight: bold; padding-top: 6">
            <tr>
                <td>II. </td>
                <td>Tanggapan Atasan PPID atas Keberatan
                </td>
            </tr>
        </table>
        <table width="540" style="padding-left: 15;">
            <tr>
                <td>Bahwa berdasarkan permohonan informasi pemohon dan surat jawaban PPID,
                    maka atasan PPID memberikan tanggapan sebagai berikut:</td>
            </tr>
        </table>
        <table width="540">
            <tr style="text-align: center; font-size: 15; font-weight: bold;">
                <td>
                    {{ $data->tanggapanKeberatan->keterangan }}
                </td>
            </tr>
        </table>
        <table width="" style="font-weight: bold; padding-top: 6">
            <tr>
                <td>III. </td>
                <td>Keputusan Atasan PPID
                </td>
            </tr>
        </table>
        <table width="540" style="padding-left: 15;">
            <tr>
                <td>Bahwa berdasarkan tanggapan atasan PPID atas keberatan pemohon
                    disampaikan keputusan sebagai berikut:</td>
            </tr>
        </table>
        @foreach ($circles as $code => $description)
            <table>
                <tr>
                    <td style="text-align: middle; padding: 3px; padding-left: 15">
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/icon/' . ($data->tanggapanKeberatan?->keputusan_atasan === $code ? 'dark' : 'circle') . '.png'))) }}"
                            style="width: 15px; height: 15px;">
                    </td>
                    <td style="padding: 3px;">{{ $description }}</td>
                </tr>
            </table>
        @endforeach
        @if (!in_array($data->tanggapanKeberatan->keputusan_atasan, ['01110100', '01110011', '01100010']))
            <table>
                <tr>
                    <td style="text-align: middle; padding: 3px; padding-left: 15">
                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/icon/dark.png'))) }}"
                            style="width: 15px; height: 15px;">
                    </td>
                    <td>
                        {{ $data->tanggapanKeberatan->keputusan_atasan }}
                    </td>
                </tr>
            </table>
        @endif

        <table width="" style="font-weight: bold; padding-top: 6">
            <tr>
                <td>IV. </td>
                <td>Jangka Waktu</td>
            </tr>
        </table>

        <table width="540" style="padding-left: 15;">
            <tr>
                <td>
                    Berdasarkan keputusan atasan PPID, dengan ini memerintahkan kepada PPID untuk memberikan sebagaian
                    atau seluruh informasi yang diminta
                    pada {{ $waktu }}.
                </td>
            </tr>
        </table>

        <table style="width: 540; text-align: center; margin-top: 12">
            <tr>
                <td style="width: 50%; vertical-align: middle;">
                    <table style="width: 90%; margin: auto; text-align: center;">
                        <tr>
                            <td style="vertical-align: middle;">

                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width: 50%; vertical-align: middle;">
                    <table style="width: 90%; margin: auto; text-align: center;">
                        <tr>
                            <td style="vertical-align: middle;">
                                <p>Atasan Pejabat Pengelola Informasi Publik</p>
                                <p style="margin-top: 100px">nama pejabat</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>






    </center>
</body>

</html>
