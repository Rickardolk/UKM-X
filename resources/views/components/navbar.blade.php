<nav class="navbar navbar-expand-lg bg-white sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">UKM X</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav mx-auto gap-lg-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kegiatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Arsip</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('layanan*') ? 'active' : '' }}"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Layanan
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('layanan.peminjaman') ? 'active' : '' }}"
                               href="{{ route('layanan.peminjaman') }}">
                                SOP Peminjaman Alat
                            </a>
                        </li>
                        {{-- Tambah menu layanan lain di sini nanti --}}
                        {{-- <li><a class="dropdown-item" href="#">Layanan Lain</a></li> --}}
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Pendaftaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profil</a>
                </li>
            </ul>
            <a href="#" class="btn-masuk ms-lg-3 mt-2 mt-lg-0 text-decoration-none d-inline-block text-center">Masuk</a>
        </div>
    </div>
</nav>