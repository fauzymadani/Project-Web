<style>
.collapse-inner .collapse-item:hover {
    background-color: #404045 !important;
    color: white !important;
    border-radius: 5px;
    transform: scale(1.02);
}

.navbar-nav {
    background-color: #212327;
}

/*.navbar-nav .nav-link:hover {*/
/*    background-color: #81a1c1 !important;*/
/*}*/

.nav-item {
    position: relative;
    transition: all 0.3s ease-in-out;
}

/*.nav-item:hover {*/
/*    box-shadow: 0 0 10px #88c0d0;*/
/*    border-radius: 5px;*/
/*    transform: scale(1.02);*/
/*}*/

.nav-link {
    transition: all 0.3s ease-in-out;
}

/*.nav-link:hover {*/
/*    background-color: #81a1c1 !important;*/
/*    color: #eceff4 !important;*/
/*    box-shadow: 0 0 15px #81a1c1;*/
/*}*/
/**/
</style>

<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Library system</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Folder Data -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseData"
            aria-expanded="true" aria-controls="collapseData">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data</span>
        </a>
        <div id="collapseData" class="collapse" aria-labelledby="headingData" data-parent="#accordionSidebar">
            <div class="text-white py-2 collapse-inner rounded">
                <a class="collapse-item text-white" href="{{ route('anggota.index') }}">Data Anggota</a>
                <a class="collapse-item text-white" href="{{ route('buku.index') }}">Buku</a>
                <a class="collapse-item text-white" href="{{ route('kategori.index') }}">Kategori Buku</a>
                <a class="collapse-item text-white" href="{{ route('peminjaman.index') }}">Data Peminjaman</a>
                <a class="collapse-item text-white" href="{{ route('roles.index') }}">Roles</a>
            </div>
        </div>
    </li>


    <!-- Change Log -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('commits.index') }}">
            <i class="fas fa-fw fa-code-branch"></i>
            <span>Change Log</span>
        </a>
    </li>

</ul>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
