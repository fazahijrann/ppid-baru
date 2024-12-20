<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PPID KOTA BOGOR</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Ubuntu:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top navbar-transparent">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <a href="index" class="navbar-brand d-flex align-items-center">
                    <img src="img/logo-ppid.png" alt="Logo" width="50" height="50" class="me-2 img-fluid"
                        style="max-width: 50px;">
                    <div>
                        <h5 class="text-white mb-0" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">PPID<br>
                            <span class="text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">KOTA
                                BOGOR</span>
                        </h5>
                    </div>
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto align-items-center">
                        <!-- Conditionally set the home link -->
                        @if (Auth::check())
                            <a href="{{ route('dashboard') }}" class="nav-item nav-link">Home</a>
                        @else
                            <a href="{{ route('welcome') }}" class="nav-item nav-link">Home</a>
                        @endif
                        <a href="profileppid" class="nav-item nav-link">Profile</a>
                        <a href="regulasi" class="nav-item nav-link">Regulasi</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Layanan &
                                Informasi Publik</a>
                            <div class="dropdown-menu bg-light mt-2">
                                <a href="informasipublik" class="dropdown-item">Informasi Publik</a>
                                <a href="pengajuan" class="dropdown-item">Permohonan Informasi</a>
                                @guest
                                    <a href="{{ route('cekstatus') }}" class="dropdown-item">Cek Status Permohonan</a>
                                @else
                                    <a href="{{ route('cek') }}" class="dropdown-item">Cek Status Permohonan</a>
                                @endguest
                            </div>
                        </div>
                        <a href="daftarinformasipublik" class="nav-item nav-link">Daftar Informasi Publik</a>
                        <a href="https://sibadra.kotabogor.go.id/#/"
                            class="nav-item nav-link btn btn-md border rounded-pill text-white px-3">SIBADRA</a>
                    </div>

                    @if (Auth::check())
                        <!-- Profile Dropdown -->
                        <div class="nav-item dropdown d-flex align-items-center justify-content-center">
                            <a href="#"
                                class="nav-link dropdown-toggle text-white d-flex align-items-center justify-content-center">
                                <i class="fa fa-user-circle fa-2x text-white"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#profileModal">Info Profil</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">Ubah Password</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endif

                    <button type="button" class="nav-item nav-link btn btn-sm text-white p-0" data-bs-toggle="modal"
                        data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <h1 class="display-4 text-white mb-4 animated slideInRight"
                        style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">KEBERATAN INFORMASI</h1>
                    <h3 class="text-white mb-4 animated slideInRight"
                        style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Form Pengajaun Keberatan Informasi Publik
                    </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            @if (Auth::check())
                                <li class="breadcrumb-item">
                                    <a class="text-white" href="{{ route('dashboard') }}">Home</a>
                                </li>
                            @else
                                <li class="breadcrumb-item">
                                    <a class="text-white" href="{{ route('welcome') }}">Home</a>
                                </li>
                            @endif
                            <li class="breadcrumb-item"><a class="text-white" href="keberataninformasi">Keberatan
                                    Informasi</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 align-self-center text-center text-lg-end">
                    <img class="img-fluid me-3  animated slideInRight" src="img/logo-pemkot-bogor.png" alt=""
                        style="max-width: 80px;">
                    <img class="img-fluid animated slideInRight" src="img/logo-ppid.png" alt=""
                        style="max-width: 100px;">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Profil Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (Auth::check())
                        <!-- Tampilkan informasi pemohon jika masuk -->
                        <p><strong>Nama :</strong> {{ Auth::user()->nama }}</p>
                        <p><strong>No. Pendaftaran :</strong> {{ Auth::user()->no_pendaftaran }}</p>
                        <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
                    @else
                        <!-- Pesan jika tidak ada pengguna yang masuk -->
                        <p>Tidak ada pengguna yang masuk.</p>
                    @endif
                </div>
                <div class="modal-footer">
                    @if (Auth::check())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                    @endif
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(20, 24, 62, 0.7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn btn-square bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-light p-3"
                            placeholder="Type search keyword">
                        <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Form Pengajuan Keberatan Start -->
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="text-white">PENGAJUAN KEBERATAN INFORMASI PUBLIK</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="text-center mb-4">Silahkan isi form berikut dengan baik dan lengkap</h5>
                        <div class="container form-container">
                            <form action="{{ route('keberatan.store') }}" method="POST">
                                @csrf
                                <!-- Hidden Field: ID Pemohon -->
                                <input type="hidden" name="id_pemohon" value="{{ $pemohon->id ?? '' }}">

                                <x-text-input id="no_keberatan_informasi" class="block mt-1 w-full" type="hidden"
                                    name="no_keberatan_informasi" :value="$newKeberatanInformasi" required readonly />

                                <fieldset class="border p-4 mb-4 rounded">
                                    <legend class="w-auto p-2 text-white bg-primary rounded">NOMOR PERMOHONAN INFORMASI
                                        *</legend>
                                    <div class="form-group mb-3">
                                        <label for="keputusan_informasi_id" class="text-dark fw-bold">Nomor
                                            Permohonan Informasi</label>
                                        <select name="keputusan_informasi_id" class="form-control bg-white"
                                            id="keputusan_informasi_id">
                                            <option value="">Pilih Salah Satu</option>
                                            @foreach ($keputusanInformasi as $data)
                                                @if ($data->tandaBukti->permohonaninformasibukti->id_pemohon === Auth::id())
                                                    <option value="{{ $data->id }}"
                                                        {{ $data->id == $idPermohonanInformasi ? 'selected' : '' }}>

                                                        {{ $data->tandaBukti->permohonaninformasibukti->no_permohonan_informasi }},
                                                        Status
                                                        {{ $data->status }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('id_permohonan_informasi')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </fieldset>


                                <!-- Alasan Pengajuan Keberatan -->
                                <fieldset class="border p-4 mb-4 rounded">
                                    <legend class="w-auto p-2 text-white bg-primary rounded">ALASAN PENGAJUAN KEBERATAN
                                        *</legend>
                                    <div class="checkbox-group">
                                        <!-- Pastikan variabel $kategori_keberatan diterima -->
                                        @if (isset($kategori_keberatan) && $kategori_keberatan->isNotEmpty())
                                            @foreach ($kategori_keberatan as $kategori)
                                                <div class="form-check">
                                                    <!-- Ganti checkbox menjadi radio button -->
                                                    <input type="radio" id="check_{{ $kategori->id }}"
                                                        name="kategori_keberatan_id" value="{{ $kategori->id }}"
                                                        class="form-check-input">
                                                    <label for="check_{{ $kategori->id }}"
                                                        class="form-check-label">{{ $kategori->jenis_keberatan }}</label>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>Kategori keberatan belum tersedia.</p>
                                        @endif
                                        <p class="text-muted mt-2">(Sesuai dengan Pasal 35 UU KIP, dipilih oleh pengaju
                                            keberatan sesuai dengan alasan keberatan yang diajukan)</p>
                                    </div>
                                </fieldset>


                                <!-- Kasus Posisi -->
                                <fieldset class="border p-4 mb-4 rounded">
                                    <legend class="w-auto p-2 text-white bg-primary rounded">KASUS POSISI</legend>
                                    <div class="mb-3">
                                        <textarea id="keterangan" name="keterangan" class="form-control" placeholder="Masukkan kasus" required></textarea>
                                    </div>
                                </fieldset>

                                <!-- Tanggal Tanggapan -->
                                <fieldset class="border p-4 mb-4 rounded">
                                    <legend class="w-auto p-2 text-white bg-primary rounded">HARI/TANGGAL TANGGAPAN
                                        ATAS KEBERATAN AKAN DIBERIKAN</legend>
                                    <p class="text-muted">Tanggapan atas keberatan pemohon informasi publik akan
                                        disampaikan dalam jangka waktu paling lambat 30 (tiga puluh) hari kerja sejak
                                        diterimanya keberatan.</p>
                                    <p class="text-muted">Demikian keberatan ini saya sampaikan, atas perhatian dan
                                        tanggapannya, saya ucapkan terimakasih.</p>
                                </fieldset>

                                <!-- Persetujuan -->
                                <div class="form-check mb-4">
                                    <input type="checkbox" class="form-check-input" id="check"
                                        name="persetujuan" value="1" required>
                                    <label class="form-check-label text-dark fw-bold" for="check">Dengan ini, saya
                                        menyatakan data yang saya isi adalah benar dan dapat
                                        dipertanggungjawabkan</label>
                                </div>

                                <!-- Tombol Kirim -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form Pengajuan Keberatan End -->

    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: "<?php echo session()->get('success'); ?>",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5">
        <div class="container py-5">
            <div class="row d-flex justify-content-around g-5">
                <div class="col-md-4 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <!-- Column 1: Logo and Image -->
                    <a href="index.html" class="d-inline-block mb-3">
                        <h1 class="text-white">PPID<span class="text-primary"><br></span>Kota Bogor</h1>
                    </a>
                    <img class="img-fluid me-3" src="img/logo-pemkot-bogor.png" alt=""
                        style="max-width: 80px;">
                    <img class="img-fluid" src="img/logo-ppid.png" alt="" style="max-width: 100px;">
                </div>
                <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
                    <!-- Column 2: Contact Info -->
                    <h5 class="text-white text-center mb-4">Hubungi Kami</h5>
                    <div class="contact-info text-white mb-2 d-flex align-items-center">
                        <i class="fa fa-map-marker-alt"></i>
                        <span>Komplek Balaikota Bogo Jl. Ir. H. Juanda No 10 Bogor Jawa Barat - Indonesia</span>
                    </div>
                    <div class="contact-info text-white mb-2 d-flex align-items-center">
                        <i class="fa fa-phone-alt"></i>
                        <span>+ 62251- 8321075 Ext. 287</span>
                    </div>
                    <div class="contact-info text-white mb-2 d-flex align-items-center">
                        <i class="fa fa-envelope"></i>
                        <span>kominfo@kotabogor.go.id</span>
                    </div>
                    <div class="d-flex text-white justify-content-center pt-2">
                        <a class="btn btn-outline-light btn-social mx-1" href="https://x.com/kominfobogor"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href=""><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-4 text-white wow fadeIn text-center" data-wow-delay="0.5s">
                    <!-- Column 3: Statistics -->
                    <h5 class="text-white mb-4">Statistik Pengunjung</h5>
                    <p>Total Pengunjung: {{ $totalPengunjung }}</p>
                    <p>Pengunjung Hari Ini: {{ $pengunjungHariIni }}</p>
                    <p>Pengunjung Bulan Ini: {{ $pengunjungBulanIni }}</p>
                </div>
            </div>
        </div>
        <div class="container wow fadeIn" data-wow-delay="0.1s">
            <div class="copyright">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-3 mb-md-0">
                        &copy; Copyright 2024, <a class="border-bottom" href="#">PPID Kota Bogor.</a>
                        All Right Reserved
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
