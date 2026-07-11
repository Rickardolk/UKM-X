<aside class="admin-sidebar">

    <div class="admin-sidebar__profile">
        <div class="admin-sidebar__avatar"></div>
        <div>
            <p class="admin-sidebar__name">Admin</p>
            <p class="admin-sidebar__role">Portal Manjemen</p>
        </div>
    </div>

    <nav class="admin-sidebar__nav">
        <a href="{{ route('admin.dashboard') }}"
            class="admin-sidebar__link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2"></i> Dashboard
        </a>
        <a href="#"
            class="admin-sidebar__link {{ request()->is('admin/publikasi*') ? 'active' : '' }}">
            <i class="bi bi-journal-bookmark"></i> Publikasi
        </a>
        <a href="#"
            class="admin-sidebar__link {{ request()->is('admin/dokumentasi*') ? 'active' : '' }}">
            <i class="bi bi-journal-richtext"></i> Dokumentasi
        </a>
        <a href="#"
            class="admin-sidebar__link {{ request()->is('admin/konten*') ? 'active' : '' }}">
            <i class="bi bi-plus-circle"></i> Konten
        </a>
    </nav>

</aside>