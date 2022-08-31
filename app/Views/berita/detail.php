<?= $this->extend('profil/template'); ?>
<?= $this->section('content'); ?>
<main id="main" data-aos="fade-up" class="aos-init aos-animate">

    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Berita</h2>
                <ol>
                    <li><a href="#">Kebencanaan</a></li>
                    <li>Berita</li>
                </ol>
            </div>
        </div>
    </section>
    <section id="berita" class="berita">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12 blog-main">
                    <div class="blog-post">
                        <h2 class="blog-post-title"><?= $post_berita->judul; ?></h2>
                        <p class="blog-post-meta"><?= date('d M Y', strtotime($post_berita->tanggal_post)); ?> by <a href="#">Admin</a></p>
                        <hr>
                        <img style="width: 800px;height:800px;" class="card-img-right flex-auto d-none d-md-block img-thumbnail" src="<?= site_url('upload/post_berita/' . $post_berita->gambar); ?>">
                        <?= $post_berita->post; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>




</main>
<?= $this->endSection(); ?>