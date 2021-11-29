<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Informasi Kebencanaan</h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-shadow">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h5 class="m-0 font-weight-bold text-light">Form Tambah Informasi Kebencanaan
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="offset-md-2 col-md-8">
                                <form action="<?= site_url('admin/informasikebencanaan/store'); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="jenis_bencana" class="hitam-tebal">Jenis Bencana</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('jenis_bencana')) ? 'is-invalid' : ''; ?>" value="<?= old('jenis_bencana'); ?>" name="jenis_bencana" id="jenis_bencana">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jenis_bencana'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="lokasi_tempat_kejadian" class="hitam-tebal">Lokasi/Tempat Kejadian</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('lokasi_tempat_kejadian')) ? 'is-invalid' : ''; ?>" value="<?= old('lokasi_tempat_kejadian'); ?>" name="lokasi_tempat_kejadian" id="lokasi_tempat_kejadian">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('lokasi_tempat_kejadian'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_bencana" class="hitam-tebal">Tanggal Bencana</label>
                                        <input type="date" class="form-control <?= ($validation->hasError('tgl_bencana')) ? 'is-invalid' : ''; ?>" value="<?= old('tgl_bencana'); ?>" name="tgl_bencana" id="tgl_bencana">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_bencana'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="objek_terdampak" class="hitam-tebal">Objek Terdampak</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('objek_terdampak')) ? 'is-invalid' : ''; ?>" value="<?= old('objek_terdampak'); ?>" name="objek_terdampak" id="objek_terdampak">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('objek_terdampak'); ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="jumlah_korban_terdampak_laki" class="hitam-tebal">Jumlah Korban Terdampak Laki-laki</label>
                                                <input type="number" class="form-control <?= ($validation->hasError('jumlah_korban_terdampak_laki')) ? 'is-invalid' : ''; ?>" value="<?= old('jumlah_korban_terdampak_laki'); ?>" name="jumlah_korban_terdampak_laki" id="jumlah_korban_terdampak_laki">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('jumlah_korban_terdampak_laki'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="jumlah_korban_terdampak_perempuan" class="hitam-tebal">Jumlah Korban Terdampak Perempuan</label>
                                                <input type="number" class="form-control <?= ($validation->hasError('jumlah_korban_terdampak_perempuan')) ? 'is-invalid' : ''; ?>" value="<?= old('jumlah_korban_terdampak_perempuan'); ?>" name="jumlah_korban_terdampak_perempuan" id="jumlah_korban_terdampak_perempuan">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('jumlah_korban_terdampak_perempuan'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                    <div class="form-group">
                                        <label for="tindakan" class="hitam-tebal">Tindakan</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('tindakan')) ? 'is-invalid' : ''; ?>" value="<?= old('tindakan'); ?>" name="tindakan" id="tindakan">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tindakan'); ?>
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