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
        <div class="container" data-aos="fade-up">


            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">

                        <li data-filter=".filter-card">Galeri</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">



                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="<?= site_url('assets-profil/img/portfolio/portfolio-4.jpg'); ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 2</h4>
                        <p>Card</p>
                        <a href="<?= site_url('assets-profil/img/portfolio/portfolio-4.jpg'); ?>"" data-gallery=" portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>



                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="<?= site_url('assets-profil/img/portfolio/portfolio-7.jpg'); ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 1</h4>
                        <p>Card</p>
                        <a href="<?= site_url('assets-profil/img/portfolio/portfolio-7.jpg'); ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                    <img src="<?= site_url('assets-profil/img/portfolio/portfolio-8.jpg'); ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Card 3</h4>
                        <p>Card</p>
                        <a href="<?= site_url('assets-profil/img/portfolio/portfolio-8.'); ?>jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                </div>



            </div>

        </div>
    </section>


</main>
<?= $this->endSection(); ?>