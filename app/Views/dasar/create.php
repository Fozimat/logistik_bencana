<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kebutuhan Dasar</h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-shadow">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h5 class="m-0 font-weight-bold text-light">Form Tambah Kebutuhan Dasar
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="offset-md-3 col-md-6">
                                <form action="<?= site_url('admin/dasar/store'); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="nama_kebutuhan" class="hitam-tebal">Nama</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('nama_kebutuhan')) ? 'is-invalid' : ''; ?>" value="<?= old('nama_kebutuhan'); ?>" name="nama_kebutuhan" id="nama_kebutuhan">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_kebutuhan'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="jenis" class="hitam-tebal">Jenis</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('jenis')) ? 'is-invalid' : ''; ?>" value="<?= old('jenis'); ?>" name="jenis" id="jenis">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jenis'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah" class="hitam-tebal">Jumlah</label>
                                        <input type="number" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" value="<?= old('jumlah'); ?>" name="jumlah" id="jumlah">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jumlah'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="satuan" class="hitam-tebal">Satuan</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('satuan')) ? 'is-invalid' : ''; ?>" value="<?= old('satuan'); ?>" name="satuan" id="satuan">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('satuan'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="kebutuhan" class="hitam-tebal">Kebutuhan</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('kebutuhan')) ? 'is-invalid' : ''; ?>" value="<?= old('kebutuhan'); ?>" name="kebutuhan" id="kebutuhan">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kebutuhan'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan" class="hitam-tebal">Keterangan</label>
                                        <textarea class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" rows="3" name="keterangan"><?= old('keterangan'); ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('keterangan'); ?>
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