<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Logistik Masuk</h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-shadow">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-light">Form Edit Logistik Masuk
                        </h5>
                        <a href="<?= base_url('admin/logistikmasuk'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="offset-md-3 col-md-6">
                                <form action="<?= site_url('admin/logistikmasuk/update/' . $logistik_masuk->id); ?>" method="POST">
                                    <?= csrf_field(); ?>

                                    <div class="form-group">
                                        <label for="id_barang" class="hitam-tebal">Nama Barang</label>
                                        <select name="id_barang" id="id_barang" class="form-control  <?= ($validation->hasError('id_barang')) ? 'is-invalid' : ''; ?>">
                                            <option value="">--- Pilih Barang ---</option>
                                            <?php foreach ($persediaan as $pd) : ?>
                                                <option value="<?= $pd->id; ?>" <?= ($pd->id == $logistik_masuk->id_barang ? 'selected' : ''); ?>><?= $pd->nama_barang; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('id_barang'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_masuk" class="hitam-tebal">Tanggal Masuk</label>
                                        <input type="date" class="form-control <?= ($validation->hasError('tgl_masuk')) ? 'is-invalid' : ''; ?>" value="<?= old('tgl_masuk', $logistik_masuk->tgl_masuk); ?>" name="tgl_masuk" id="tgl_masuk">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_masuk'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="vol_unit" class="hitam-tebal">Vol/Unit</label>
                                        <input type="number" class="form-control <?= ($validation->hasError('vol_unit')) ? 'is-invalid' : ''; ?>" value="<?= old('vol_unit', $logistik_masuk->vol_unit); ?>" name="vol_unit" id="vol_unit">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('vol_unit'); ?>
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