<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav mt-4">
            <a class="nav-link {{ Request::is('pimpinan/dashboard*') ? 'active' : '' }}" href="/pimpinan/dashboard">
                <div class="sb-nav-link-icon"><i class="bi bi-grid-1x2"></i></div>
                Dashboard Pimpinan
            </a>
            <a class="nav-link {{ Request::is('pimpinan/sop*') ? 'active' : '' }}" href="/pimpinan/sop">
                <div class="sb-nav-link-icon"><i class="bi bi-file-earmark-text"></i></div>
                SOP OB
            </a>
            <a class="nav-link {{ Request::is('pimpinan/schedules*') ? 'active' : '' }}" href="/pimpinan/schedules">
                <div class="sb-nav-link-icon"><i class="bi bi-calendar3"></i></div>
                Jadwal Kebersihan
            </a>
            <a class="nav-link {{ Request::is('pimpinan/report*') ? 'active' : '' }}" href="/pimpinan/report">
                <div class="sb-nav-link-icon"><i class="bi bi-check-square"></i></div>
                Laporan Kebersihan
            </a>
        </div>
    </div>
</nav>
