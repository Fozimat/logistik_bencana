<?php $uri = service('uri'); ?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Logistik</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item <?= ($uri->getSegment(2) == 'dashboard') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('admin/dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Data Master
    </div>

    <li class="nav-item  <?= ($uri->getSegment(2) == 'dasar') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('admin/dasar'); ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Kebutuhan Dasar</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Persediaan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Logistik</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Masuk</a>
                <a class="collapse-item" href="#">Keluar</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Informasi Kebencanaan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Berita Acara</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Barang Masuk</a>
                <a class="collapse-item" href="#">Barang Keluar</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Settings
    </div>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>