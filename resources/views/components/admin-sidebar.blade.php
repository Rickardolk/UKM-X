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
        <a href="{{ route('admin.konten.index') }}"
            class="sidebar-link {{ request()->routeIs('admin.konten*') ? 'active' : '' }}">
            <i class="bi bi-plus-circle"></i> Konten
        </a>
    </nav>
</aside>