<x-dashboard-layout>
    <!-- Spinner Start -->
    <x-spinner></x-spinner>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <x-navbar-dashboard></x-navbar-dashboard>
    <!-- Navbar End -->

    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header mb-5">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-12 col-lg-6 align-self-center text-center text-lg-start mb-4 mb-lg-5">
                    <div class="d-flex justify-content-center justify-content-lg-start mb-3">
                        <img class="img-fluid me-3 animated slideInLeft" src="img/logo-pemkot-bogor.png"
                            alt="Logo Pemkot Bogor" style="max-width: 60px;">
                        <img class="img-fluid animated slideInRight" src="img/logo-ppid.png" alt="Logo PPID"
                            style="max-width: 80px;">
                    </div>
                    <h1 class="display-5 text-white mb-2 animated slideInLeft"
                        style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">SELAMAT DATANG</h1>
                    <h2 class="text-white mb-2 animated slideInRight"
                        style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                        WEBSITE PORTAL PPID KOTA BOGOR</h2>
                    <h5 class="text-white mb-2 animated slideInLeft"
                        style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                        PENGELOLA DAN PELAYANAN INFORMASI PUBLIK
                        KOTA BOGOR</h5>
                </div>
                <!-- <div class="col-12 col-lg-6 align-self-center text-center d-none d-lg-block">
                    <img class="img-fluid" src="img/bulet2.png" alt="Buletan" style="max-width: 300px;">
                </div> -->
            </div>
        </div>
    </div>
    <!-- Hero End -->
    
    <!-- Profile Modal -->
    <x-profile-modal></x-profile-modal>

    <!-- Full Screen Search Start -->
    <x-search></x-search>
    <!-- Full Screen Search End -->

    <!-- Daftar PPID Start -->
    <x-daftar-ppid></x-daftar-ppid>
    <!-- Daftar PPID End -->

    <!-- Berita Start -->
    <x-berita></x-berita>
    <!-- Berita End -->

    <!--Layanan Aplikasi Kota Bogor Start-->
    <div class="container-fluid bg-light py-5">
        <section class="brand-one wow fadeIn">
            <div class="container">
                <h1 class="text-center mb-4">Layanan Aplikasi Kota Bogor</h1>
                <div class="brand-one__inner">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="brand-one__main-content">
                                <div class="swiper-container thm-swiper__slider"
                                    data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                           "0": {
                               "spaceBetween": 30,
                               "slidesPerView": 2
                           },
                           "375": {
                               "spaceBetween": 30,
                               "slidesPerView": 2
                           },
                           "575": {
                               "spaceBetween": 30,
                               "slidesPerView": 3
                           },
                           "767": {
                               "spaceBetween": 50,
                               "slidesPerView": 4
                           },
                           "991": {
                               "spaceBetween": 50,
                               "slidesPerView": 5
                           },
                           "1199": {
                               "spaceBetween": 100,
                               "slidesPerView": 5
                           }
                       }}'>
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide wow fadeIn" data-wow-delay="0.5s">
                                            <img src="img/LOGO5.png" alt="">
                                        </div>
                                        <div class="swiper-slide wow fadeIn" data-wow-delay="0.5s">
                                            <img src="img/LOGO5.png" alt="">
                                        </div>
                                        <div class="swiper-slide wow fadeIn" data-wow-delay="0.5s">
                                            <img src="img/LOGO5.png" alt="">
                                        </div>
                                        <div class="swiper-slide wow fadeIn" data-wow-delay="0.5s">
                                            <img src="img/LOGO5.png" alt="">
                                        </div>
                                        <div class="swiper-slide wow fadeIn" data-wow-delay="0.5s">
                                            <img src="img/LOGO5.png" alt="">
                                        </div>
                                        <div class="swiper-slide wow fadeIn" data-wow-delay="0.5s">
                                            <img src="img/LOGO5.png" alt="">
                                        </div>
                                        <div class="swiper-slide wow fadeIn" data-wow-delay="0.5s">
                                            <img src="img/LOGO5.png" alt="">
                                        </div>
                                        <div class="swiper-slide wow fadeIn" data-wow-delay="0.5s">
                                            <img src="img/LOGO5.png" alt="">
                                        </div>
                                    </div><!-- /.swiper-wrapper -->
                                </div><!-- /.swiper-container -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--Layanan Aplikasi Kota Bogor End-->

    <!-- Footer Start -->
    <x-footer-dashboard></x-footer-dashboard>
    <!-- Footer End -->
    
</x-dashboard-layout>
