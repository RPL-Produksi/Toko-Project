<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Lumi Store</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="fa-regular fa-fw fa-house"></i>
            <span>Dashboard</span>
        </a>
    </li>

<<<<<<< HEAD
    {{-- sidedbar buatt admin --}}
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Kelola</div>
    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="fa-solid fa-user-tie"></i>
            <span>Kelola Owner</span>
        </a>
        <a href="" class="nav-link">
            <i class="fa-light fa-users"></i>
            <span>Kelola Kasir</span>
        </a>
    </li>
=======
    @if ($user->role == 'admin')
        <hr class="sidebar-divider">
        <div class="sidebar-heading">Kelola</div>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fa-solid fa-user-tie"></i>
                <span>Kelola Owner</span>
            </a>
            <a href="" class="nav-link">
                <i class="fa-light fa-users"></i>
                <span>Kelola Kasir</span>
            </a>
        </li>
    @endif
>>>>>>> dev


    @if ($user->role == 'superadmin')
        {{-- sidebar buatt superadmin --}}
        <hr class="sidebar-divider">
        <div class="sidebar-heading">Kelola</div>
        <li class="nav-item">
            <a href="{{ route('perusahaan') }}" class="nav-link">
                <i class="fa-solid fa-building"></i>
                <span>Kelola Perusahaan</span>
            </a>
            <a href="{{ route('owner') }}" class="nav-link">
                <i class="fa-solid fa-user-tie"></i>
                <span>Kelola Owner</span>
            </a>
            <a href="" class="nav-link">
                <i class="fa-light fa-users"></i>
                <span>Kelola Kasir</span>
            </a>
            <a href="" class="nav-link">
                <i class="fa-solid fa-users"></i>
                <span>Kelola Member</span>
            </a>
        </li>
    @endif

    @if ($user->role == 'owner')
        {{-- sidebar buar owner --}}
        <hr class="sidebar-divider">
        <div class="sidebar-heading">Laporan</div>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="fa-sharp fa-solid fa-chart-simple"></i>
                <span>Pemasukan</span>
            </a>
            <a href="" class="nav-link">
                <i class="fa-solid fa-box-open"></i>
                <span>Barang Terjual</span>
            </a>
            <a href="" class="nav-link">
                <i class="fa-solid fa-box"></i>
                <span>Stok Tambah</span>
            </a>
        </li>
    @endif


    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
