<?php $uri = service('uri'); ?>

<nav id="navbar" class="navbar">
    <ul>
        <li><a class="nav-link scrollto <?= ($uri->getSegment(1) == 'home') ? 'active' : ''; ?>" href="<?= site_url('home'); ?>">Beranda</a></li>
        <li class="dropdown"><a href="#" class="<?= ($uri->getSegment(1) == 'profil') ? 'active' : ''; ?>"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="#">Sejarah</a></li>

                <li><a href="<?= site_url('profil/visi'); ?>" class="<?= ($uri->getSegment(2) == 'visi') ? 'active' : ''; ?>">Visi & Misi</a></li>
                <li><a href="<?= site_url('profil/struktur_organisasi'); ?>" class="<?= ($uri->getSegment(2) == 'struktur_organisasi') ? 'active' : ''; ?>">Struktur Organisasi</a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="#"><span>Kebencanaan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="#">Edukasi</a></li>
                <li><a href="#">Data Kejadian</a></li>
                <li><a href="#">Pedoman Peringatan Dini</a></li>
            </ul>
        </li>
        <li><a class="nav-link scrollto" href="#services">Berita</a></li>
        <li><a class="nav-link scrollto <?= ($uri->getSegment(1) == 'galeri') ? 'active' : ''; ?>" href="<?= site_url('galeri'); ?>">Galeri</a></li>
        <li><a class="nav-link scrollto <?= ($uri->getSegment(1) == 'kontak') ? 'active' : ''; ?>" href="<?= site_url('kontak'); ?>">Kontak</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav>