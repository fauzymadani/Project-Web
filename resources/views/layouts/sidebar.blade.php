<style>
.collapse-inner .collapse-item:hover {
    background-color: #004080 !important; /* Biru tua */
    color: white !important; /* Teks tetap putih */
}


</style>

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
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Folder Data -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData"
            aria-expanded="true" aria-controls="collapseData">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data</span>
        </a>
        <div id="collapseData" class="collapse" aria-labelledby="headingData" data-parent="#accordionSidebar">
            <div class="bg-primary text-white py-2 collapse-inner rounded">
                <a class="collapse-item text-white" href="{{ route('anggota.index') }}">├── Data Anggota</a>
                <a class="collapse-item text-white" href="{{ route('buku.index') }}">├── Buku</a>
                <a class="collapse-item text-white" href="{{ route('anggota.index') }}">├── Kategori Buku</a>
                <a class="collapse-item text-white" href="{{ route('anggota.index') }}">└── Data Peminjaman</a>
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
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

