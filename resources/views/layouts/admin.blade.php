<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin - UKM X')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet" />
    @stack('styles')

</head>

<body>

    {{-- ===== TOP NAVBAR ===== --}}
    <nav class="admin-topbar">
        <span class="admin-brand">UKM X</span>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="btn-keluar">
                <i class="bi bi-box-arrow-right"></i> Keluar
            </button>
        </form>
    </nav>

    <div class="admin-wrapper">

        {{-- ===== SIDEBAR ===== --}}
        <aside class="admin-sidebar">

            {{-- Profile --}}
            <div class="sidebar-profile">
                <div class="sidebar-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div>
                    <div class="sidebar-name">Admin</div>
                    <div class="sidebar-role">Portal Manjemen</div>
                </div>
            </div>

            {{-- Nav Menu --}}
            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}"
                    class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2-fill"></i> Dashboard
                </a>
                <a href="{{ route('admin.publikasi.index') }}"
                    class="sidebar-link {{ request()->routeIs('admin.publikasi*') ? 'active' : '' }}">
                    <i class="bi bi-book"></i> Publikasi
                </a>
                <a href="{{ route('admin.dokumentasi.index') }}"
                    class="sidebar-link {{ request()->routeIs('admin.dokumentasi*') ? 'active' : '' }}">
                    <i class="bi bi-tablet"></i> Dokumentasi
                </a>
                <a href="#" class="sidebar-link {{ request()->routeIs('admin.konten*') ? 'active' : '' }}">
                    <i class="bi bi-plus-circle"></i> Konten
                </a>
            </nav>
        </aside>

        {{-- ===== MAIN CONTENT ===== --}}
        <main class="admin-main">
            @yield('content')
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    @stack('scripts')
</body>

</html>
