<?= $this->extend('profil/template'); ?>
<?= $this->section('content'); ?>
<main id="main" data-aos="fade-up" class="aos-init aos-animate">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Daftar Berita</h2>
                <ol>
                    <li><a href="#">Kebencanaan</a></li>
                    <li>Berita</li>
                </ol>
            </div>

        </div>
    </section>
    <section id="berita" class="berita">
        <div class="container" data-aos="fade-up">
            <div class="row mb-2">
                <?php $i = 1; ?>
                <?php foreach ($post_berita as $d) : ?>
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary"><?= $d->kategori; ?></strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="#"><?= $d->judul; ?></a>
                                </h3>
                                <div class="mb-1 text-muted wrapper">
                                    <p class="post-text"><?= date('d M Y', strtotime($d->tanggal_post)); ?></p>
                                </div>
                                <a href="<?= site_url('listberita/detail/' . $d->slug); ?>">Selengkapnya</a>
                            </div>
                            <img style="width: 300px;height:300px;" class="card-img-right flex-auto d-none d-md-block img-thumbnail" src="<?= site_url('upload/post_berita/' . $d->gambar); ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>




</main>
<?= $this->endSection(); ?>