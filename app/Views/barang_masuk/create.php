<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Berita Acara Barang Masuk</h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-shadow">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-light">Form Tambah Berita Acara Barang Masuk
                        </h5>
                        <a href="<?= base_url('admin/beritabarangmasuk'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="offset-md-3 col-md-6">
                                <form action="<?= site_url('admin/beritabarangmasuk/store'); ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="no_berita_acara" class="hitam-tebal">No Berita Acara</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('no_berita_acara')) ? 'is-invalid' : ''; ?>" value="<?= old('no_berita_acara'); ?>" name="no_berita_acara" id="nama_kebutuhan">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_berita_acara'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_ba_masuk" class="hitam-tebal">Tangal Masuk</label>
                                        <input type="date" class="form-control <?= ($validation->hasError('tgl_ba_masuk')) ? 'is-invalid' : ''; ?>" value="<?= old('tgl_ba_masuk'); ?>" name="tgl_ba_masuk" id="tgl_ba_masuk">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_ba_masuk'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pihak_pertama" class="hitam-tebal">Pihak Pertama</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('pihak_pertama')) ? 'is-invalid' : ''; ?>" value="<?= old('pihak_pertama'); ?>" name="pihak_pertama" id="pihak_pertama">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('pihak_pertama'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pihak_kedua" class="hitam-tebal">Pihak Kedua</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('pihak_kedua')) ? 'is-invalid' : ''; ?>" value="<?= old('pihak_kedua'); ?>" name="pihak_kedua" id="pihak_kedua">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('pihak_kedua'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="gambar" class="col-sm-3 col-form-label">Gambar</label>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= site_url('assets/img/default.jpg'); ?>" class="img-thumbnail img-preview" alt="">
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="custom-file">
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