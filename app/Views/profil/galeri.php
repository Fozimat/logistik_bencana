<?= $this->extend('profil/template'); ?>
<?= $this->section('content'); ?>
<main id="main" data-aos="fade-up" class="aos-init aos-animate">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Galeri</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Galeri</li>
                </ol>
            </div>

        </div>
    </section>

    <section id="portfolio" class="portfolio">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img style="height: 600px; width: 350px;" class="d-block w-100" src="<?= site_url('assets-profil/img/galeri/galeri1.jpg'); ?>">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Apel kesiap siagaan Bencana Tahun 2021</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img style="height: 600px; width: 350px;" class="d-block w-100" src="<?= site_url('assets-profil/img/galeri/galeri2.jpg'); ?>">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Serah Terima Bantuan Desa Cukas</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img style="height: 600px; width: 350px;" class="d-block w-100" src="<?= site_url('assets-profil/img/galeri/galeri3.jpg'); ?>">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Serah Terima Bantuan di Desa Cempa</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img style="height: 600px; width: 350px;" class="d-block w-100" src="<?= site_url('assets-profil/img/galeri/galeri4.jpg'); ?>">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Serah Terima Bantuan Desa Marok Tua</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img style="height: 600px; width: 350px;" class="d-block w-100" src="<?= site_url('assets-profil/img/galeri/galeri5.jpg'); ?>">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Penyerahan Bantuan di Desa Pekajang</h2>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
        </div>
    </section>


</main>
<?= $this->endSection(); ?>