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
                        <a href="{{ route('dashboard') }}"
                            class="nav-item nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Home</a>
                    @else
                        <a href="{{ route('welcome') }}"
                            class="nav-item nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}">Home</a>
                    @endif
                    <a href="profileppid"
                        class="nav-item nav-link {{ request()->routeIs('profileppid') ? 'active' : '' }}">Profile</a>
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

                <!-- Add margin classes to buttons -->
                <button type="button" class="nav-item nav-link btn btn-sm text-white p-0 ms-2 me-4"
                    data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
            </div>
        </nav>
    </div>
</div>
