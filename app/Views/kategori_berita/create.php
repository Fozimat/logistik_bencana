<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kategori Berita</h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-shadow">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-light">Form Tambah Kategori Berita
                        </h5>
                        <a href="<?= base_url('admin/kategoriberita'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="offset-md-3 col-md-6">
                                <form action="<?= site_url('admin/kategoriberita/store'); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="kategori" class="hitam-tebal">Nama Kategori</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('kategori')) ? 'is-invalid' : ''; ?>" value="<?= old('kategori'); ?>" name="kategori" id="kategori">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kategori'); ?>
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