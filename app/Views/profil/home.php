<?= $this->extend('profil/template2'); ?>
<?= $this->section('content'); ?>
<section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <div class="row d-flex align-items-center justify-content-between">
            <div class="col-12">
                <h1 style="font-size: 24px;">Selamat Datang di <span> Website Resmi</span></h1>
                <h1>BADAN PENGANGGULANGAN BENCANA DAERAH <span>KABUPATEN LINGGA</span></h1>
            </div>
        </div>
    </div>
</section>
<main id="main" data-aos="fade-up" class="aos-init aos-animate">
    <section id="visi" class="visi">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h3>Visi <span>Misi</span></h3>
            </div>
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <img style="height: 350px;" src="<?= site_url('assets-profil/img/galeri/galeri1.jpg'); ?>" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <h3>Visi</h3>
                    <p class="fst-italic">
                        Terwujudnya Kabupaten Lingga Sebagai Bunda Tanah Melayu Yang Maju Dan Sejahtera
                    </p>
                    <h3>Misi</h3>
                    <ol style="margin-left:-15px;">
                        <li>
                            <div>
                                <p>Mewujudkan Sumber Daya Manusia yang Berkualitas, Berbudaya dan Berdaya Saing
                                </p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <p>Mempercepat Pemerataan Pembangunan Infrastruktur yang Berkelanjutan
                                </p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <p>Mewujudkan Pembangunan Ekonomi Berbasis Potensi Unggulan
                                </p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <p>Mewujudkan Tata Kelola Pemerintahan yang Baik (Good Governance)
                                </p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <p>Mengembangkan Tatanan Kehidupan Masyarakat yang Agamis, Tertib dan Aman Berlandaskan Nilai-Nilai Budaya Melayu
                                </p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>

        </div>
    </section>

    <section id="portfolio" class="portfolio">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="section-title">
                <h3>Siaga <span>Bencana</span></h3>
            </div>
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

    <section id="contact" class="contact">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="section-title">
                <h3>Kontak <span>Kami</span></h3>
            </div>

            <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-map"></i>
                        <h3>Alamat Kantor</h3>
                        <p>Jalan Istana Kota Baru (Komplek Perkantoran Pemkab)</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-envelope"></i>
                        <h3>Email</h3>
                        <p>bpbdkab.lingga@gmail.com</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-phone-call"></i>
                        <h3>Hubungi Kami</h3>
                        <p>+62 812 7572 3321</p>
                    </div>
                </div>

            </div>

            <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6 ">
                    <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.791668714713!2d104.60274114199333!3d-0.20942242625509289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e27697b2417cc5b%3A0x54d7b07d97c94268!2sIstana%20Kota%20Baru!5e0!3m2!1sid!2sid!4v1638713053084!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen=""></iframe>
                </div>
                <div class="col-lg-6">
                    <form action="<?= base_url('kontak/pesan'); ?>" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col form-group">
                                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required="">
                            </div>
                            <div class="col form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subjek" placeholder="Subjek" required="">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="pesan" rows="5" placeholder="Pesan" required=""></textarea>
                        </div>
                        <div class="my-3">
                            <?php if (session()->getFlashdata('status')) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?= session()->getFlashdata('status'); ?></strong>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="text-center"><button type="submit">Kirim Pesan</button></div>
                    </form>
                </div>

            </div>
        </div>
    </section>



</main>
<?= $this->endSection(); ?>