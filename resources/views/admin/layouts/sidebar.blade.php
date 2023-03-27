<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav mt-4">
            <a class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}" href="{{route('dashboardAdmin')}}">
                <div class="sb-nav-link-icon"><i class="bi bi-grid-1x2"></i></div>
                Dashboard Admin
            </a>
            <a class="nav-link {{ Request::is('admin/market*') ? 'active' : '' }}" href="/admin/market">
            <div class="sb-nav-link-icon"><i class="bi bi-check2-all"></i></div>
                Data Market
            </a>
            <a class="nav-link {{ Request::is('admin/officer*') ? 'active' : '' }}" href="/admin/officer">
                <div class="sb-nav-link-icon"><i class="bi bi-person-badge-fill"></i></div>
                Data Kecamatan
            </a>
            <a class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}" href="/admin/user">
            <div class="sb-nav-link-icon"><i class="bi bi-person-plus"></i></div>
                Pengguna
            </a>
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{route('main')}}">
            <div class="sb-nav-link-icon"><i class="bi bi-map"></i></div>
                Lihat Peta
            </a>
        </div>
    </div>
</nav>
