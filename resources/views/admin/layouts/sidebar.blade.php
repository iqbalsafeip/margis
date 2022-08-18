<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav mt-4">
            <a class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}" href="/admin/dashboard">
                <div class="sb-nav-link-icon"><i class="bi bi-grid-1x2"></i></div>
                Dashboard Admin
            </a>
            <a class="nav-link {{ Request::is('admin/user') ? 'active' : '' }}" href="/admin/user">
                <div class="sb-nav-link-icon"><i class="bi bi-person-plus"></i></div>
                Pengguna
            </a>
            <a class="nav-link {{ Request::is('admin/fasilitas*') ? 'active' : '' }}" href="/admin/fasilitas">
                <div class="sb-nav-link-icon"><i class="bi bi-check2-all"></i></div>
                Fasilitas
            </a>
            <a class="nav-link {{ Request::is('admin/area*') ? 'active' : '' }}" href="/admin/area">
                <div class="sb-nav-link-icon"><i class="bi bi-arrows-fullscreen"></i></div>
                Area Tugas
            </a>
            <a class="nav-link {{ Request::is('admin/officer*') ? 'active' : '' }}" href="/admin/officer">
                <div class="sb-nav-link-icon"><i class="bi bi-person-badge-fill"></i></div>
                Petugas Kebersihan
            </a>
            <a class="nav-link {{ Request::is('admin/schedules*') ? 'active' : '' }}" href="/admin/schedules">
                <div class="sb-nav-link-icon"><i class="bi bi-calendar3"></i></div>
                Jadwal Kebersihan
            </a>
            <a class="nav-link {{ Request::is('admin/report*') ? 'active' : '' }}" href="/admin/report">
                <div class="sb-nav-link-icon"><i class="bi bi-check-square"></i></div>
                Laporan Kebersihan
            </a>
            <a class="nav-link {{ Request::is('admin/sop*') ? 'active' : '' }}" href="/admin/sop">
                <div class="sb-nav-link-icon"><i class="bi bi-file-earmark-text"></i></div>
                SOP OB
            </a>
        </div>
    </div>
</nav>
