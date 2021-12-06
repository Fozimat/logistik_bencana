<?= $this->extend('profil/template'); ?>
<?= $this->section('content'); ?>
<main id="main" data-aos="fade-up" class="aos-init aos-animate">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Visi & Misi</h2>
                <ol>
                    <li><a href="#">Profil</a></li>
                    <li>Visi & Misi</li>
                </ol>
            </div>

        </div>
    </section>

    <section id="visi" class="visi">
        <div class="container" data-aos="fade-up">

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


</main>
<?= $this->endSection(); ?>