<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav mt-4">
            <a class="nav-link {{ Request::is('dosen/dashboard*') ? 'active' : '' }}" href="/dosen/dashboard">
                <div class="sb-nav-link-icon"><i class="bi bi-grid-1x2"></i></div>
                Dashboard
            </a>
            <a class="nav-link {{ Request::is('dosen/officer*') ? 'active' : '' }}" href="/dosen/officer">
                <div class="sb-nav-link-icon"><i class="bi bi-person-badge-fill"></i></div>
                Petugas Kebersihan
            </a>
            <a class="nav-link {{ Request::is('dosen/schedules*') ? 'active' : '' }}" href="/dosen/schedules">
                <div class="sb-nav-link-icon"><i class="bi bi-calendar3"></i></div>
                Jadwal Kebersihan
            </a>
            <a class="nav-link {{ Request::is('dosen/report*') ? 'active' : '' }}" href="/dosen/report">
                <div class="sb-nav-link-icon"><i class="bi bi-check-square"></i></div>
                Laporan Kebersihan
            </a>
            <a class="nav-link {{ Request::is('dosen/sop*') ? 'active' : '' }}" href="/dosen/sop">
                <div class="sb-nav-link-icon"><i class="bi bi-file-earmark-text"></i></div>
                SOP Kebersihan ITG
            </a>
        </div>
    </div>
</nav>
