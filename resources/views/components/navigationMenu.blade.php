<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                href="{{ route('dashboard.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            {{--  Interface --}}
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link {{ request()->routeIs('jabatan.index') ? 'active' : '' }}" href="/jabatan">
                <div class="sb-nav-link-icon"><i class="fas fa-award fa-fw"></i></div>
                Jabatan
            </a>

            <a class="nav-link {{ request()->routeIs('perangkatdesa.index') ? 'active' : '' }}"
                href="{{ route('perangkatdesa.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-users fa-fw"></i></div>
                Perangkat Desa
            </a>

            <a class="nav-link {{ request()->routeIs('agendakegiatan.index') ? 'active' : '' }}"
                href="{{ route('agendakegiatan.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt fa-fw"></i></div>
                Agenda Kegiatan Desa
            </a>

            <a class="nav-link collapsed
            @if (request()->routeIs('pertanian.index') ||
                    request()->routeIs('peternakan.index') ||
                    request()->routeIs('perkebunan.index') ||
                    request()->routeIs('perikanan.index')) ||
                    request()->routeIs('meubel.index')) active @endif
            "
                href="#" data-bs-toggle="collapse" data-bs-target="#potensiDesa" aria-expanded="false"
                aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-briefcase fa-fw"></i></div>
                Potensi Desa
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse
            @if (request()->routeIs('pertanian.index') ||
                    request()->routeIs('peternakan.index') ||
                    request()->routeIs('perkebunan.index') ||
                    request()->routeIs('perikanan.index')) ||
                    request()->routeIs('meubel.index')) show @endif
                    "
                id="potensiDesa" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->routeIs('pertanian.index') ? 'active' : '' }}"
                        href="{{ route('pertanian.index') }}">Pertanian</a>
                    <a class="nav-link {{ request()->routeIs('peternakan.index') ? 'active' : '' }}"
                        href="{{ route('peternakan.index') }}">Peternakan</a>
                    <a class="nav-link {{ request()->routeIs('perkebunan.index') ? 'active' : '' }}"
                        href="{{ route('perkebunan.index') }}">Perkebunan</a>
                    <a class="nav-link {{ request()->routeIs('perikanan.index') ? 'active' : '' }}"
                        href="{{ route('perikanan.index') }}">Perikanan</a>
                    <a class="nav-link {{ request()->routeIs('meubel.index') ? 'active' : '' }}"
                        href="{{ route('meubel.index') }}">Meubel</a>
                </nav>
            </div>

            <a class="nav-link {{ request()->routeIs('galeri.index') ? 'active' : '' }}"
                href="{{ route('galeri.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-images fa-fw"></i></div>
                Galeri
            </a>

            {{-- <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="charts.html">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Charts
            </a>
            <a class="nav-link" href="tables.html">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Tables
            </a> --}}
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        @if (empty(Auth::user()->email))
            Guest
        @else
            {{ Auth::user()->nama_awal }} {{ Auth::user()->nama_akhir }}
        @endif
    </div>
</nav>
