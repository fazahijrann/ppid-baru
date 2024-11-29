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
                        style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">PERMOHONAN INFORMASI</h1>
                    <h3 class="text-white mb-4 animated slideInRight"
                        style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Form Permohonan Informasi Publik</h3>
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
                            <li class="breadcrumb-item"><a class="text-white" href="permohonaninformasi">Permohonan
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

    <!-- Form Permohonan Informasi Start -->
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="text-white">PERMOHONAN INFORMASI</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="text-center mb-4">Silahkan isi form berikut dengan baik dan lengkap</h5>

                        <!-- Update: Tambahkan action ke route untuk menyimpan permohonan -->
                        <form action="{{ route('permohonan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">

                                    <!-- Hidden Field: ID Pemohon -->
                                    @if (isset($pemohon))
                                        <input type="hidden" name="id_pemohon" value="{{ $pemohon->id }}">
                                    @else
                                        <input type="hidden" name="id_pemohon" value="">
                                    @endif

                                    <x-text-input id="no_permohonan_informasi" class="block mt-1 w-full"
                                        type="hidden" name="no_permohonan_informasi" :value="$newPermohonanInformasi" required
                                        readonly />

                                    <!-- Rincian Informasi -->
                                    <div class="form-group mb-3">
                                        <label for="rincian_informasi" class="text-dark fw-bold">Rincian Informasi
                                            yang Dibutuhkan</label>
                                        <textarea name="rincian_informasi" class="form-control" id="rincian_informasi"
                                            placeholder="Masukkan Rincian Keterangan">{{ old('rincian_informasi') }}</textarea>
                                        @error('rincian_informasi')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Tujuan Informasi -->
                                    <div class="form-group mb-3">
                                        <label for="tujuan_informasi" class="text-dark fw-bold">Tujuan Penggunaan
                                            Informasi</label>
                                        <input type="text" name="tujuan_informasi" class="form-control"
                                            id="tujuan_informasi" value="{{ old('tujuan_informasi') }}"
                                            placeholder="Masukkan Tujuan Penggunaan Informasi">
                                        @error('tujuan_informasi')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Cara Memperoleh Informasi (kategori_memperoleh_id) -->
                                    <div class="form-group mb-3">
                                        <label for="id_kategori_memperoleh" class="text-dark fw-bold">Cara Memperoleh
                                            Informasi</label>
                                        <select name="id_kategori_memperoleh" class="form-control"
                                            id="id_kategori_memperoleh">
                                            <option value="">- Pilih -</option>
                                            <!-- @if (isset($kategori_memperoleh) && $kategori_memperoleh->count()) -->
                                            @foreach ($kategori_memperoleh as $kategori)
                                                <option value="{{ $kategori->id }}"
                                                    {{ old('id_kategori_memperoleh') == $kategori->id ? 'selected' : '' }}>
                                                    {{ $kategori->jenis_memperoleh }}
                                                </option>
                                            @endforeach
                                            <!-- @endif -->
                                        </select>
                                        @error('id_kategori_memperoleh')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Cara Mendapatkan Salinan Informasi (kategori_salinaninformasi_id) -->
                                    <div class="form-group mb-3">
                                        <label for="id_kategori_salinan" class="text-dark fw-bold">Cara Mendapatkan
                                            Salinan Informasi</label>
                                        <select name="id_kategori_salinan" class="form-control"
                                            id="id_kategori_salinan">
                                            <option value="">- Pilih -</option>
                                            @if (isset($kategori_salinan) && $kategori_salinan->count())
                                                @foreach ($kategori_salinan as $salinan)
                                                    <option value="{{ $salinan->id }}"
                                                        {{ old('id_kategori_salinan') == $salinan->id ? 'selected' : '' }}>
                                                        {{ $salinan->jenis_salinan }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('id_kategori_salinan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Pernyataan Checkbox -->
                            <div class="form-check mb-4">
                                <input type="checkbox" class="form-check-input" id="check" name="pernyataan"
                                    value="1" {{ old('pernyataan') ? 'checked' : '' }}>
                                <label class="form-check-label text-dark fw-bold" for="check">Dengan ini, saya
                                    menyatakan data yang saya isi adalah benar dan dapat dipertanggungjawabkan</label>
                                @error('pernyataan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tombol Simpan -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form Permohonan Informasi End -->

    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: "<?php echo session()->get('success'); ?>",
                text: "Permohonan informasi berhasil disimpan!",
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
