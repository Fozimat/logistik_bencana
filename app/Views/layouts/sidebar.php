<?php $uri = service('uri'); ?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center mb-5" href="#">
        <img class="position-absolute" style="width: 100px;left: 1px;top: 10px;" src="<?= site_url('assets/img/bpbd_lingga.png'); ?>" alt="">
        <div class="sidebar-brand-text text-left" style="margin-left: 90px; margin-top: 50px;">BPBD KABUPATEN LINGGA</div>
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

    <li class="nav-item  <?= ($uri->getSegment(2) == 'persediaan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('admin/persediaan'); ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Persediaan</span></a>
    </li>

    <li class="nav-item <?= ($uri->getSegment(2) == 'logistikmasuk') || ($uri->getSegment(2) == 'logistikkeluar') ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Logistik</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= ($uri->getSegment(2) == 'logistikmasuk') ? 'active' : ''; ?>" href="<?= site_url('admin/logistikmasuk'); ?>">Masuk</a>
                <a class="collapse-item <?= ($uri->getSegment(2) == 'logistikkeluar') ? 'active' : ''; ?>" href="<?= site_url('admin/logistikkeluar'); ?>">Keluar</a>
            </div>
        </div>
    </li>

    <li class="nav-item <?= ($uri->getSegment(2) == 'informasikebencanaan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('admin/informasikebencanaan'); ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Informasi Kebencanaan</span></a>
    </li>

    <li class="nav-item <?= ($uri->getSegment(2) == 'beritabarangmasuk') || ($uri->getSegment(2) == 'beritabarangkeluar') ? 'active' : ''; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Berita Acara</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= ($uri->getSegment(2) == 'beritabarangmasuk') ? 'active' : ''; ?>" href="<?= site_url('admin/beritabarangmasuk'); ?>">Barang Masuk</a>
                <a class="collapse-item <?= ($uri->getSegment(2) == 'beritabarangkeluar') ? 'active' : ''; ?>" href="<?= site_url('admin/beritabarangkeluar'); ?>">Barang Keluar</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Settings
    </div>

    <?php if (session()->get('roles') == 'ADMIN') : ?>
        <li class="nav-item <?= ($uri->getSegment(2) == 'pesan') ? 'active' : ''; ?>">
            <a class="nav-link" href="<?= site_url('admin/pesan'); ?>">
                <i class="fas fa-fw fa-sms"></i>
                <span>Pesan</span></a>
        </li>
    <?php endif; ?>

    <li class="nav-item <?= ($uri->getSegment(2) == 'laporan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('admin/laporan'); ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>