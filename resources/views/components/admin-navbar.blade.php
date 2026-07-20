<nav class="navbar admin-navbar sticky-top shadow-sm">
    <div class="container">
        <span class="navbar-brand admin-navbar__brand mb-0">UKM X</span>

        <form method="POST" action="{{ route('admin.logout') }}" class="mb-0">
            @csrf
            <button type="submit" class="btn-keluar">
                <i class="bi bi-box-arrow-right"></i> Keluar
            </button>
        </form>
    </div>
</nav>