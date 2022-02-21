<?= $this->extend('profil/template'); ?>
<?= $this->section('content'); ?>
<main id="main" data-aos="fade-up" class="aos-init aos-animate">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Kontak Kami</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Kontak</li>
                </ol>
            </div>

        </div>
    </section>

    <section id="contact" class="contact">
        <div class="container aos-init aos-animate" data-aos="fade-up">
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

                <div class="col-lg-12 ">
                    <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.791668714713!2d104.60274114199333!3d-0.20942242625509289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e27697b2417cc5b%3A0x54d7b07d97c94268!2sIstana%20Kota%20Baru!5e0!3m2!1sid!2sid!4v1638713053084!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen=""></iframe>
                </div>

            </div>

        </div>
    </section>

</main>
<?= $this->endSection(); ?>