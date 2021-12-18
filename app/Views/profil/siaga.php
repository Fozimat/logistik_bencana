<?= $this->extend('profil/template'); ?>
<?= $this->section('content'); ?>
<main id="main" data-aos="fade-up" class="aos-init aos-animate">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Siaga Bencana</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Siaga Bencana</li>
                </ol>
            </div>

        </div>
    </section>

    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img style="height: 200px; width: 350px;" src="<?= site_url('assets-profil/img/siaga/siaga_banjir.jpeg'); ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Siaga Bencana</h4>
                        <p>Siaga Banjir</p>
                        <a href="<?= site_url('assets-profil/img/siaga/siaga_banjir.jpeg'); ?>" data-gallery=" portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img style="height: 200px; width: 350px;" src="<?= site_url('assets-profil/img/siaga/siaga_gelombang.jpeg'); ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Siaga Bencana</h4>
                        <p>Siaga Gelombang Pasang</p>
                        <a href="<?= site_url('assets-profil/img/siaga/siaga_gelombang.jpeg'); ?>" data-gallery=" portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img style="height: 200px; width: 350px;" src="<?= site_url('assets-profil/img/siaga/siaga_gempa.jpeg'); ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Siaga Bencana</h4>
                        <p>Siaga Gempa Bumi</p>
                        <a href="<?= site_url('assets-profil/img/siaga/siaga_gempa.jpeg'); ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img style="height: 200px; width: 350px;" src="<?= site_url('assets-profil/img/siaga/siaga_kekeringan.jpeg'); ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Siaga Bencana</h4>
                        <p>Siaga Kekeringan</p>
                        <a href="<?= site_url('assets-profil/img/siaga/siaga_kekeringan.jpeg'); ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img style="height: 200px; width: 350px;" src="<?= site_url('assets-profil/img/siaga/siaga_letusan.jpeg'); ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Siaga Bencana</h4>
                        <p>Siaga Letusan Gunung Api</p>
                        <a href="<?= site_url('assets-profil/img/siaga/siaga_letusan.jpeg'); ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img style="height: 200px; width: 350px;" src="<?= site_url('assets-profil/img/siaga/siaga_longsor.jpeg'); ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Siaga Bencana</h4>
                        <p>Siaga Tanah Longsor</p>
                        <a href="<?= site_url('assets-profil/img/siaga/siaga_longsor.jpeg'); ?>" data-gallery=" portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img style="height: 200px; width: 350px;" src="<?= site_url('assets-profil/img/siaga/siaga_puting.jpeg'); ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Siaga Bencana</h4>
                        <p>Siaga Puting Beliung</p>
                        <a href="<?= site_url('assets-profil/img/siaga/siaga_puting.jpeg'); ?>" data-gallery=" portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img style="height: 200px; width: 350px;" src="<?= site_url('assets-profil/img/siaga/siaga_tsunami.jpeg'); ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Siaga Bencana</h4>
                        <p>Siaga Tsunami</p>
                        <a href="<?= site_url('assets-profil/img/siaga/siaga_tsunami.jpeg'); ?>" data-gallery=" portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>
<?= $this->endSection(); ?>