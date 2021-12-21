<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Persediaan</h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-shadow">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-light">Form Tambah Persediaan
                        </h5>
                        <a href="<?= base_url('admin/persediaan'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="offset-md-3 col-md-6">
                                <form action="<?= site_url('admin/persediaan/store'); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="nama_barang" class="hitam-tebal">Nama Barang</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>" value="<?= old('nama_barang'); ?>" name="nama_barang" id="nama_barang">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_barang'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="vol_unit" class="hitam-tebal">Vol/Unit</label>
                                        <input type="number" class="form-control <?= ($validation->hasError('vol_unit')) ? 'is-invalid' : ''; ?>" value="<?= old('vol_unit'); ?>" name="vol_unit" id="vol_unit">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('vol_unit'); ?>
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