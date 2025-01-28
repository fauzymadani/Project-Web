<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sisfo Anggota</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('anggota.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Anggota</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('buku.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span> Buku</span></a>
    </li>


    <li class="nav-item active">
        <a class="nav-link" href="{{ route('anggota.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Kategori Buku</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('anggota.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Peminjaman</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('commits.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Change Log</span></a>
    </li>


    <!-- Divider -->


</ul>
