<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Dashboard -->
    <li class="nav-item {{ isActiveDashboard() ? 'menu-open' : '' }}">
        <a href="{{ url('/beranda') }}" class="nav-link {{ Request::is('beranda') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <!-- Data Kota -->
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-city"></i>
            <p>
                Data Kota
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item {{ Request::is('kota_keberangkatan*') ? 'menu-open' : '' }}">
                <a href="{{ route('kota_keberangkatan.index') }}"
                    class="nav-link {{ Request::is('kota_keberangkatan*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kota Keberangkatan</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('kota_tujuan*') ? 'menu-open' : '' }}">
                <a href="{{ route('kota_tujuan.index') }}"
                    class="nav-link {{ Request::is('kota_tujuan*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kota Tujuan</p>
                </a>
            </li>
        </ul>
    </li>
    <!-- Pemesanan -->
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
                Pemesanan
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pemesanan Lunas</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pemesanan Belum Lunas</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pemesanan Baru</p>
                </a>
            </li>
        </ul>
    </li>
    <!-- Konfirmasi Pemesanan -->
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-check-circle"></i>
            <p>
                Konfirmasi Pemesanan
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Konfirmasi Pesan Lunas</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Konfirmasi Pesan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Konfirmasi Belum Bayar</p>
                </a>
            </li>
        </ul>
    </li>
    <!-- Jadwal -->
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
                Jadwal
            </p>
        </a>
    </li>
    <!-- Kendaraan -->
    <li class="nav-item {{ Request::is('mitra*') ? 'menu-open' : '' }}">
        <a href="{{ route('mitra.index') }}" class="nav-link {{ Request::is('mitra*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-bus"></i>
            <p>Kendaraan</p>
        </a>
    </li>

    <!-- Laporan -->
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
                Laporan
            </p>
        </a>
    </li>

    <!-- Logout -->
    <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
                Logout
            </p>
        </a>
    </li>
</ul>
