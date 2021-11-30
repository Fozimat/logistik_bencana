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
                    <div class="card-header py-3 bg-primary">
                        <h5 class="m-0 font-weight-bold text-light">Form Tambah Persediaan
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="offset-md-3 col-md-6">
                                <form action="<?= site_url('admin/persediaan/store'); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="jenis_barang" class="hitam-tebal">Jenis Barang</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('jenis_barang')) ? 'is-invalid' : ''; ?>" value="<?= old('jenis_barang'); ?>" name="jenis_barang" id="jenis_barang">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jenis_barang'); ?>
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