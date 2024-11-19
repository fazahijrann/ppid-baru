<x-dashboard-layout>


    <!-- Spinner Start -->
    <x-spinner></x-spinner>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <x-navbar-dashboard></x-navbar-dashboard>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-12 col-lg-6 align-self-center text-center text-lg-start mb-4 mb-lg-5">
                    <h1 class="display-5 text-white mb-3 animated slideInRight"
                        style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">PROFILE</h1>
                    <h2 class="text-white mb-3 animated slideInRight"
                        style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Pejabat Pengelola Informasi &
                        Dokumentasi
                        (PPID) KOTA BOGOR</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                            @if (Auth::check())
                                <li class="breadcrumb-item animated slideInRight">
                                    <a class="text-white" href="{{ route('dashboard') }}">Home</a>
                                </li>
                            @else
                                <li class="breadcrumb-item animated slideInRight">
                                    <a class="text-white" href="{{ route('welcome') }}">Home</a>
                                </li>
                            @endif
                            <li class="breadcrumb-item animated slideInRight">
                                <a class="text-white " href="profileppid">Profile</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-12 col-lg-6 align-self-center text-center text-lg-end">
                    <div class="d-flex justify-content-center justify-content-lg-end mb-3">
                        <img class="img-fluid me-3 animated slideInRight" src="img/logo-pemkot-bogor.png"
                            alt="Logo Pemkot Bogor" style="max-width: 60px;">
                        <img class="img-fluid animated slideInRight" src="img/logo-ppid.png" alt="Logo PPID"
                            style="max-width: 80px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
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


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="btn btn-sm border rounded-pill text-primary px-4 mb-3">PPID</div>
                    <h5 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Pejabat Pengelola Informasi
                        Dan
                        Dokumentasi adalah pejabat yang bertanggungjawab di bidang penyimpanan, pendokumentasian,
                        penyediaan, dan/atau pelayanan informasi di badan publik.</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Pejabat Pengelola Informasi
                        dan
                        Dokumentasi (PPID) di bentuk di semua Satuan Kerja Perangkat Daerah (SKPD) di lingkungan
                        Pemeritah Kota Bogor </h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Pejabat Pengelola Informasi
                        dan
                        Dokumentasi (PPID)tersebut berada di bawah dan bertanggung jawab kepada masing-masing Kepala
                        SKPD</h5>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h6 class="mb-3">Pejabat Pengelola Informasi dan Dokumentasi (PPID) mempunyai tugas dan
                        tanggung
                        jawab:</h6>
                    <h6 class="mb-3"><i class="fas fa-dot-circle"></i>
                        Menyediakan, menyimpan, mendokumentasikan, dan mengamankan informasi;</h6>
                    <h6 class="mb-3"><i class="fas fa-dot-circle"></i>
                        Memberikan pelayanan informasi sesuai dengan ketentuan peraturan perundang-undangan;</h6>
                    <h6 class="mb-3"><i class="fas fa-dot-circle"></i>
                        Melaksanakan pengujian konsekuensi;</h6>
                    <h6 class="mb-3"><i class="fas fa-dot-circle"></i>
                        Mengklasifikasikan informasi dan/atau pengubahannya;</h6>
                    <h6 class="mb-3"><i class="fas fa-dot-circle"></i>
                        Menetapkan informasi yang dikecualikan yang telah habis jangka waktu pengecualiannya sebagai
                        Informasi publik yang dapat diakses;</h6>
                    <h6 class="mb-3">PPID dalam melaksanakan tugas dan tanggung jawab dibantu oleh pejabat
                        fungsional
                        yang meliputi Arsiparis, Pranata Komputer, Pranata Hubungan Masyarakat, Pustakawan, dan
                        pejabat
                        fungsional lainnya sesuai dengan kebutuhan.</h6>
                    <div class="d-flex align-items-center mt-4">
                        <!-- <a class="btn btn-primary rounded-pill px-4 me-3" href="">Read More</a> -->
                        <a class="btn btn-outline-primary btn-square me-3" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-primary btn-square me-3" href="https://x.com/kominfobogor"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square me-3" href=""><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Feature Start -->
    <div class="container-fluid bg-primary feature pt-0">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height: 75vh;">
                <div class="col-lg-12 text-center text-lg-start wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="text-white d-flex justify-content-center align-items-center mb-2">TUGAS DAN FUNGSI
                        PPID
                    </h1>
                    <div class="text-center">
                        <div
                            class="btn d-inline-flex justify-content-center btn-sm border rounded-pill text-light px-3 mb-3">
                            TUGAS</div>
                    </div>
                    <h5 class="text-light text-center mb-4">Merencanakan, mengorganisasikan, melaksanakan,
                        mengawasi,
                        dan mengevaluasi pelaksanaan kegiatan pelayanan dan pengolahan informasi dan dokumentasi di
                        lingkungan Pemerintah Kota Bogor yang dalam pelaksanaan tugas didukung oleh Pejabat
                        Pengelola
                        Informasi dan Dokumentasi Pelaksana.</h5>
                    <div class="text-center">
                        <div
                            class="btn d-inline-flex justify-content-center btn-sm border rounded-pill text-light px-3 mb-3">
                            FUNGSI</div>
                    </div>
                    <div class="col-lg-8 mx-auto text-start wow fadeIn" data-wow-delay="0.3s">
                        <div class="d-flex align-items-center text-white mb-3">
                            <i class="fa fa-check-circle fa-2x me-3"></i>
                            <span>Penghimpunan informasi publik di lingkungan Pemerintah Kota Bogor</span>
                        </div>
                        <div class="d-flex align-items-center text-white mb-3">
                            <i class="fa fa-check-circle fa-2x me-3"></i>
                            <span>Penyampaian Informasi publik yang diperoleh dari seluruh unit kerja di lingkungan
                                Pemerintah Kota Bogor</span>
                        </div>
                        <div class="d-flex align-items-center text-white mb-3">
                            <i class="fa fa-check-circle fa-2x me-3"></i>
                            <span>Pelaksanaan uji informasi publik untuk masuk dalam kategori informasi yang
                                dikecualikan</span>
                        </div>
                        <div class="d-flex align-items-center text-white mb-3">
                            <i class="fa fa-check-circle fa-2x me-3"></i>
                            <span>Penyediaann dan pemberian layanan informasi publik yang bersifat terbuka</span>
                        </div>
                        <div class="d-flex align-items-center text-white mb-3">
                            <i class="fa fa-check-circle fa-2x me-3"></i>
                            <span>Penyelesaian sangketa pelayanan Informasi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Team Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-12 wow fadeIn text-center" data-wow-delay="0.1s">
                    <h1 class="text-dark mb-2">BAGAN ORGANISASI</h1>
                    <p class="text-dark mb-2">PEJABAT PENGELOLA INFORMASI DAN DOKUMENTASI KOTA BOGOR</p>
                    <img class="img-fluid mx-auto d-block animated slideInRight" src="img/struktural.png"
                        alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Team End -->


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


</x-dashboard-layout>
