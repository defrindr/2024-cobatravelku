<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Dashboard -->
    <li class="nav-item {{ isActiveDashboard() ? 'menu-open' : '' }}">
        <a href="{{ url('/beranda') }}" class="nav-link {{ Request::is('beranda') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
                Data Customer
            </p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('mitra.index') }}" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
                Kendaraan Mitra
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
