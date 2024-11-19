<div class="container-fluid bg-dark text-white-50 footer pt-5">
    <div class="container py-5">
        <div class="row d-flex justify-content-around g-5">
            <div class="col-md-4 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <!-- Column 1: Logo and Image -->
                <a href="index.html" class="d-inline-block mb-3">
                    <h1 class="text-white">PPID<span class="text-primary"><br></span>Kota Bogor</h1>
                </a>
                <img class="img-fluid me-3" src="img/logo-pemkot-bogor.png" alt="" style="max-width: 80px;">
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
                    <a class="btn btn-outline-light btn-social mx-1" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href=""><i class="fab fa-instagram"></i></a>
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
