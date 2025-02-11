<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Lumi Store</div>
    </a>
    <hr class="sidebar-divider my-0">
    @if ($user->role == 'admin')
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'font-weight-bold' : '' }}">
                <i class="fa-regular fa-fw fa-house"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">Kelola</div>
        <li class="nav-item">
            <a href="{{ route('admin.kelola.owner') }}" class="nav-link {{ request()->routeIs('admin.kelola.owner') ? 'font-weight-bold' : '' }}">
                <i class="fa-solid fa-user-tie"></i>
                <span>Kelola Owner</span>
            </a>
            <a href="{{ route('admin.kelola.kasir') }}" class="nav-link {{ request()->routeIs('admin.kelola.kasir') ? 'font-weight-bold' : '' }}">
                <i class="fa-light fa-users"></i>
                <span>Kelola Kasir</span>
            </a>
        </li>
    @endif

    @if ($user->role == 'superadmin')
        <li class="nav-item">
            <a href="{{ route('superadmin.dashboard') }}" class="nav-link {{ request()->routeIs('superadmin.dashboard') ? 'font-weight-bold' : '' }}">
                <i class="fa-regular fa-fw fa-house"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">Kelola</div>
        <li class="nav-item">
            <a href="{{ route('kelola.perusahaan') }}" class="nav-link {{ request()->routeIs('kelola.perusahaan') ? 'font-weight-bold' : '' }}">
                <i class="fa-solid fa-building"></i>
                <span>Kelola Perusahaan</span>
            </a>
            <a href="{{ route('kelola.owner') }}" class="nav-link  {{ request()->routeIs('kelola.owner') ? 'font-weight-bold' : '' }}">
                <i class="fa-solid fa-user-tie"></i>
                <span>Kelola Owner</span>
            </a>
            <a href="{{ route('kelola.admin') }}" class="nav-link  {{ request()->routeIs('kelola.admin') ? 'font-weight-bold' : '' }}">
                <i class="fa-light fa-users"></i>
                <span>Kelola Admin</span>
            </a>
            <a href="{{ route('kelola.kasir') }}" class="nav-link  {{ request()->routeIs('kelola.kasir') ? 'font-weight-bold' : '' }}">
                <i class="fa-light fa-users"></i>
                <span>Kelola Kasir</span>
            </a>
            <a href="{{ route('kelola.member') }}" class="nav-link  {{ request()->routeIs('kelola.member') ? 'font-weight-bold' : '' }}">
                <i class="fa-solid fa-users"></i>
                <span>Kelola Member</span>
            </a>
        </li>
    @endif

    @if ($user->role == 'owner')
        <li class="nav-item">
            <a href="{{ route('owner.dashboard') }}" class="nav-link {{ request()->routeIs('owner.dashboard') ? 'font-weight-bold' : '' }}">
                <i class="fa-regular fa-fw fa-house"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">Laporan</div>
        <li class="nav-item">
            <a href="{{ route('owner.chart') }}" class="nav-link {{ request()->routeIs('owner.chart') ? 'font-weight-bold' : '' }}">
                <i class="fa-solid fa-chart-simple"></i>
                <span>Pemasukan</span>
            </a>
            <a href="{{ route('owner.stok.terjual') }}" class="nav-link">
                <i class="fa-solid fa-box-open"></i>
                <span>Barang Terjual</span>
            </a>
            <a href="{{ route('owner.stok.bertambah') }}" class="nav-link">
                <i class="fa-solid fa-box"></i>
                <span>Stok Bertambah</span>
            </a>
        </li>
    @endif
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
