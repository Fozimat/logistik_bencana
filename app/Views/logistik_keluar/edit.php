<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Logistik Keluar</h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-shadow">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-light">Form Edit Logistik Keluar
                        </h5>
                        <a href="<?= base_url('admin/logistikkeluar'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="offset-md-3 col-md-6">
                                <form action="<?= site_url('admin/logistikkeluar/update/' . $logistik_keluar->id); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="no_berita_acara" class="hitam-tebal">No Berita Acara</label>
                                        <input type="hidden" name="id" value="<?= $logistik_keluar->id; ?>">
                                        <input type="text" class="form-control <?= ($validation->hasError('no_berita_acara')) ? 'is-invalid' : ''; ?>" value="<?= old('no_berita_acara', $logistik_keluar->no_berita_acara); ?>" name="no_berita_acara" id="no_berita_acara">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_berita_acara'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="id_barang" class="hitam-tebal">Nama Barang</label>
                                        <select name="id_barang" id="id_barang" class="form-control  <?= ($validation->hasError('id_barang')) ? 'is-invalid' : ''; ?>">
                                            <option value="">--- Pilih Barang ---</option>
                                            <?php foreach ($persediaan as $pd) : ?>
                                                <option value="<?= $pd->id; ?>" <?= ($pd->id == $logistik_keluar->id_barang ? 'selected' : ''); ?>><?= $pd->nama_barang; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('id_barang'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_keluar" class="hitam-tebal">Tanggal Keluar</label>
                                        <input type="date" class="form-control <?= ($validation->hasError('tgl_keluar')) ? 'is-invalid' : ''; ?>" value="<?= old('tgl_keluar', $logistik_keluar->tgl_keluar); ?>" name="tgl_keluar" id="tgl_keluar">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_keluar'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pihak_pertama" class="hitam-tebal">Pihak Pertama</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('pihak_pertama')) ? 'is-invalid' : ''; ?>" value="<?= old('pihak_pertama', $logistik_keluar->pihak_pertama); ?>" name="pihak_pertama" id="pihak_pertama">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('pihak_pertama'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pihak_kedua" class="hitam-tebal">Pihak Kedua</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('pihak_kedua')) ? 'is-invalid' : ''; ?>" value="<?= old('pihak_kedua', $logistik_keluar->pihak_kedua); ?>" name="pihak_kedua" id="pihak_kedua">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('pihak_kedua'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="vol_unit" class="hitam-tebal">Vol/Unit</label>
                                        <input type="number" class="form-control <?= ($validation->hasError('vol_unit')) ? 'is-invalid' : ''; ?>" value="<?= old('vol_unit', $logistik_keluar->vol_unit); ?>" name="vol_unit" id="vol_unit">
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