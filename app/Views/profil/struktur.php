<?= $this->extend('profil/template'); ?>
<?= $this->section('content'); ?>
<main id="main" data-aos="fade-up" class="aos-init aos-animate">

    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center">
                <h2>Struktur Organisasi</h2>
                <ol>
                    <li><a href="#">Profil</a></li>
                    <li>Struktur Organisasi</li>
                </ol>
            </div>
        </div>
    </section>

    <section id="visi" class="visi">
        <div class="container" data-aos="fade-up">
            <div class="d-flex justify-content-center align-items-center">
                <img src="<?= site_url('assets-profil/img/galeri/struktur.jpg'); ?>" class="img-fluid" alt="">
            </div>
        </div>
    </section>




</main>
<?= $this->endSection(); ?>