<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PPID KOTA BOGOR</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Ubuntu:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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

                    <butaton type="button" class="btn text-white p-0 d-none d-lg-block" data-bs-toggle="modal"
                        data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header mb-5">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <img class="img-fluid me-3  animated slideInLeft" src="img/logo-pemkot-bogor.png" alt=""
                        style="max-width: 80px;">
                    <img class="img-fluid  animated slideInRight" src="img/logo-ppid.png" alt=""
                        style="max-width: 100px;">
                    <!-- <h1 class="display-4 text-white mb-2 animated slideInLeft" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">SELAMAT DATANG</h1> -->
                    <h2 class="text-white mb-2 animated slideInRight"
                        style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">WEBSITE PORTAL PPID KOTA BOGOR</h2>
                    <h5 class="text-white mb-2 animated slideInLeft"
                        style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">PENGELOLA DAN PELAYANAN INFORMASI PUBLIK
                        KOTA BOGOR</h5>
                </div>
                <!-- <div class="col-lg-6 align-self-center text-center text-lg-end position-relative">
                    <img class="img-fluid d-none d-lg-block" src="img/bulet2.png" alt="" style="max-width: 400px; position: absolute; right: 0; top: 50%; transform: translateY(-50%);">
                </div> -->
            </div>
        </div>
    </div>
    <!-- Hero End -->


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

    <div class="container-fluid bg-light mb-5 py-3 position-relative">
        <!-- Row for the layout with two columns -->
        <div class="row align-items-center position-absolute w-100"
            style="top: 50%; transform: translateY(-50%); z-index: 1;">
            <!-- Kolom kiri dengan tombol login -->
            <div class="col-md-6 text-center">
                <h1>AJUKAN</h1>
                <h1>PERMOHONAN INFORMASI</h1>
                <h1>PUBLIK ANDA</h1><br>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2">Mulai</a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn btn-primary px-4 py-2">Mulai</a>
                @endguest
            </div>
            <!-- Kolom kanan kosong atau dapat diisi dengan konten lain -->
            <div class="col-md-6 text-end">
                <!-- Konten lainnya bisa ditambahkan di sini, jika diperlukan -->
            </div>
        </div>

        <!-- Banner -->
        <img class="img-fluid w-100" src="img/banner-permohonan.png" alt="">
    </div>

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