<?= $this->extend('layouts/template'); ?>

<?= $this->section('script'); ?>
<script src="<?= base_url('assets/vendor/ckeditor/ckeditor.js'); ?>"></script>
<script>
    CKEDITOR.replace("editor");
</script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Post Berita</h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-shadow">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-light">Form Edit Post Berita
                        </h5>
                        <a href="<?= base_url('admin/postberita'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?= site_url('admin/postberita/update/' . $post_berita->id); ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="judul" class="hitam-tebal">Judul</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" value="<?= old('judul', $post_berita->judul); ?>" name="judul" id="judul">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('judul'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori_id" class="hitam-tebal">Kategori</label>
                                        <select name="kategori_id" id="kategori_id" class="form-control <?= ($validation->hasError('kategori_id')) ? 'is-invalid' : ''; ?>">
                                            <option value="">--- Pilih Kategori ---</option>
                                            <?php foreach ($kategori as $pd) : ?>
                                                <option value="<?= $pd->id; ?>" <?= ($pd->id == $post_berita->kategori_id ? 'selected' : ''); ?>><?= $pd->kategori; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kategori_id'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_post" class="hitam-tebal">Tanggal Masuk</label>
                                        <input type="date" class="form-control <?= ($validation->hasError('tanggal_post')) ? 'is-invalid' : ''; ?>" name="tanggal_post" id="tanggal_post" value="<?= old('tanggal_post', $post_berita->tanggal_post); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tanggal_post'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Post</label>
                                        <textarea name="post" id="editor" class="form-control <?= ($validation->hasError('post')) ? 'is-invalid' : ''; ?>">
                                        <?= old('post', $post_berita->post); ?>        
                                        </textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('post'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar" class="col-sm-3 col-form-label">Gambar</label>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= site_url('upload/post_berita/' . $post_berita->gambar); ?>" class="img-thumbnail img-preview" alt="">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="hidden" name="gambar_lama" value="<?= $post_berita->gambar; ?>">
                                                    <input type="file" name="gambar" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" onchange="previewImg()">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('gambar'); ?>
                                                    </div>
                                                    <label class="custom-file-label" for="gambar">Pilih gambar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-plane"> Simpan</i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>