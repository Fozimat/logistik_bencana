<?= $this->extend('profil/template'); ?>
<?= $this->section('content'); ?>
<main id="main" data-aos="fade-up" class="aos-init aos-animate">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Berita</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Berita</li>
                </ol>
            </div>

        </div>
    </section>

    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?= site_url('assets-profil/img/galeri/galeri1.jpg'); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Perkembangan Bencana Gelombang tinggi</h5>
                            <p class="card-text">Perkembangan Bencana Gelombang tinggi dan disertai hujan di kab. Lingga, Provinsi kepulauan Riau</p>
                            <a href="<?= base_url('berita/detail'); ?>" class="btn btn-primary btn-sm">Selengkapnya</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
<?= $this->endSection(); ?>