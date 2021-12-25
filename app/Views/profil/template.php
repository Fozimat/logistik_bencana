<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= site_url('assets/img/bpbd_lingga.png'); ?>" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= site_url('assets-profil/vendor/aos/aos.css'); ?>" rel="stylesheet">
    <link href="<?= site_url('assets-profil/vendor/bootstrap/css/bootstrap.min.cs'); ?>s" rel="stylesheet">
    <link href="<?= site_url('assets-profil/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?= site_url('assets-profil/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
    <link href="<?= site_url('assets-profil/vendor/glightbox/css/glightbox.min.css'); ?>" rel="stylesheet">
    <link href="<?= site_url('assets-profil/vendor/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= site_url('assets-profil/css/style.css'); ?>" rel="stylesheet">
</head>

<body>
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:bpbdkab.lingga@gmail.com">bpbdkab.lingga@gmail.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 812 7572 3321</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a target="_blank" href="https://www.facebook.com/profile.php?id=100075927138948" class="facebook"><i class="bi bi-facebook"></i></a>
                <a target="_blank" href="https://www.instagram.com/bpbd_lingga" class="instagram"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </section>

    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="#" class="logo"><img src="<?= site_url('assets/img/bpbd_lingga.png'); ?>" alt=""></a>
            <h1 class="logo" style="margin-right: 130px;"><a href="#">BPBD KAB.LINGGA<span></span></a></h1>
            <?= $this->include('profil/sidebar'); ?>
        </div>
    </header>

    <?= $this->renderSection('content'); ?>

    <?= $this->include('profil/footer'); ?>


    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= site_url('assets-profil/vendor/purecounter/purecounter.js'); ?>"></script>
    <script src="<?= site_url('assets-profil/vendor/aos/aos.js'); ?>"></script>
    <script src="<?= site_url('assets-profil/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= site_url('assets-profil/vendor/glightbox/js/glightbox.min.js'); ?>"></script>
    <script src="<?= site_url('assets-profil/vendor/isotope-layout/isotope.pkgd.min.js'); ?>"></script>
    <script src="<?= site_url('assets-profil/vendor/swiper/swiper-bundle.min.js'); ?>"></script>
    <script src="<?= site_url('assets-profil/vendor/waypoints/noframework.waypoints.js'); ?>"></script>
    <script src="<?= site_url('assets-profil/vendor/php-email-form/validate.js'); ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?= site_url('assets-profil/js/main.js'); ?>"></script>

</body>

</html>