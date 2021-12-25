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
                    <div class="card-header py-3 bg-primary d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-light">Form Edit Informasi Kebencanaan
                        </h5>
                        <a href="<?= base_url('admin/informasikebencanaan'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="offset-md-2 col-md-8">
                                <form action="<?= site_url('admin/informasikebencanaan/update/' . $informasi_kebencanaan->id); ?>" method="POST">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="jenis_bencana" class="hitam-tebal">Jenis Bencana</label>
                                        <input type="hidden" name="id" value="<?= $informasi_kebencanaan->id; ?>">
                                        <input type="text" class="form-control <?= ($validation->hasError('jenis_bencana')) ? 'is-invalid' : ''; ?>" value="<?= old('jenis_bencana', $informasi_kebencanaan->jenis_bencana); ?>" name="jenis_bencana" id="jenis_bencana">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jenis_bencana'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="lokasi_tempat_kejadian" class="hitam-tebal">Lokasi/Tempat Kejadian</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('lokasi_tempat_kejadian')) ? 'is-invalid' : ''; ?>" value="<?= old('lokasi_tempat_kejadian', $informasi_kebencanaan->lokasi_tempat_kejadian); ?>" name="lokasi_tempat_kejadian" id="lokasi_tempat_kejadian">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('lokasi_tempat_kejadian'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_bencana" class="hitam-tebal">Tanggal Bencana</label>
                                        <input type="date" class="form-control <?= ($validation->hasError('tgl_bencana')) ? 'is-invalid' : ''; ?>" value="<?= old('tgl_bencana', $informasi_kebencanaan->tgl_bencana); ?>" name="tgl_bencana" id="tgl_bencana">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_bencana'); ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="korban_laki" class="hitam-tebal">Jumlah Korban Terdampak Laki-laki</label>
                                                <input type="number" class="form-control <?= ($validation->hasError('korban_laki')) ? 'is-invalid' : ''; ?>" value="<?= old('korban_laki', $informasi_kebencanaan->korban_laki); ?>" name="korban_laki" id="korban_laki">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('korban_laki'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="korban_perempuan" class="hitam-tebal">Jumlah Korban Terdampak Perempuan</label>
                                                <input type="number" class="form-control <?= ($validation->hasError('korban_perempuan')) ? 'is-invalid' : ''; ?>" value="<?= old('korban_perempuan', $informasi_kebencanaan->korban_perempuan); ?>" name="korban_perempuan" id="korban_perempuan">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('korban_perempuan'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="usia_0_5" class="hitam-tebal">Usia 0 - 5 Tahun</label>
                                                <input type="number" class="form-control <?= ($validation->hasError('usia_0_5')) ? 'is-invalid' : ''; ?>" value="<?= old('usia_0_5', $informasi_kebencanaan->usia_0_5); ?>" name="usia_0_5" id="usia_0_5">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('usia_0_5'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="usia_6_20" class="hitam-tebal">Usia 6 - 20 Tahun</label>
                                                <input type="number" class="form-control <?= ($validation->hasError('usia_6_20')) ? 'is-invalid' : ''; ?>" value="<?= old('usia_6_20', $informasi_kebencanaan->usia_6_20); ?>" name="usia_6_20" id="usia_6_20">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('usia_6_20'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="usia_21_60" class="hitam-tebal">Usia 21 - 60 Tahun</label>
                                                <input type="number" class="form-control <?= ($validation->hasError('usia_21_60')) ? 'is-invalid' : ''; ?>" value="<?= old('usia_21_60', $informasi_kebencanaan->usia_21_60); ?>" name="usia_21_60" id="usia_21_60">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('usia_21_60'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="usia_61" class="hitam-tebal">Usia 61 Tahun ke atas</label>
                                                <input type="number" class="form-control <?= ($validation->hasError('usia_61')) ? 'is-invalid' : ''; ?>" value="<?= old('usia_61', $informasi_kebencanaan->usia_61); ?>" name="usia_61" id="usia_61">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('usia_61'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="ibu_hamil" class="hitam-tebal">Ibu Hamil</label>
                                                <input type="number" class="form-control <?= ($validation->hasError('ibu_hamil')) ? 'is-invalid' : ''; ?>" value="<?= old('ibu_hamil', $informasi_kebencanaan->ibu_hamil); ?>" name="ibu_hamil" id="ibu_hamil">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('ibu_hamil'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="meninggal" class="hitam-tebal">Meninggal</label>
                                                <input type="number" class="form-control <?= ($validation->hasError('meninggal')) ? 'is-invalid' : ''; ?>" value="<?= old('meninggal', $informasi_kebencanaan->meninggal); ?>" name="meninggal" id="meninggal">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('meninggal'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="hilang" class="hitam-tebal">Hilang</label>
                                                <input type="number" class="form-control <?= ($validation->hasError('hilang')) ? 'is-invalid' : ''; ?>" value="<?= old('hilang', $informasi_kebencanaan->hilang); ?>" name="hilang" id="hilang">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('hilang'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="luka" class="hitam-tebal">Luka</label>
                                                <input type="number" class="form-control <?= ($validation->hasError('luka')) ? 'is-invalid' : ''; ?>" value="<?= old('luka', $informasi_kebencanaan->luka); ?>" name="luka" id="luka">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('luka'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="mengungsi" class="hitam-tebal">Mengungsi</label>
                                                <input type="number" class="form-control <?= ($validation->hasError('mengungsi')) ? 'is-invalid' : ''; ?>" value="<?= old('mengungsi', $informasi_kebencanaan->mengungsi); ?>" name="mengungsi" id="mengungsi">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('mengungsi'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="jenis_prasarana" class="hitam-tebal">Jenis Prasarana</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('jenis_prasarana')) ? 'is-invalid' : ''; ?>" value="<?= old('jenis_prasarana', $informasi_kebencanaan->jenis_prasarana); ?>" name="jenis_prasarana" id="jenis_prasarana">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('jenis_prasarana'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="rusak_ringan" class="hitam-tebal">Rusak Ringan</label>
                                                <input type="number" class="form-control <?= ($validation->hasError('rusak_ringan')) ? 'is-invalid' : ''; ?>" value="<?= old('rusak_ringan', $informasi_kebencanaan->rusak_ringan); ?>" name="rusak_ringan" id="rusak_ringan">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('rusak_ringan'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="rusak_sedang" class="hitam-tebal">Rusak Sedang</label>
                                                <input type="number" class="form-control <?= ($validation->hasError('rusak_sedang')) ? 'is-invalid' : ''; ?>" value="<?= old('rusak_sedang', $informasi_kebencanaan->rusak_sedang); ?>" name="rusak_sedang" id="rusak_sedang">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('rusak_sedang'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="rusak_berat" class="hitam-tebal">Rusak Berat</label>
                                                <input type="number" class="form-control <?= ($validation->hasError('rusak_berat')) ? 'is-invalid' : ''; ?>" value="<?= old('rusak_berat', $informasi_kebencanaan->rusak_berat); ?>" name="rusak_berat" id="rusak_berat">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('rusak_berat'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan" class="hitam-tebal">Keterangan</label>
                                        <textarea class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" rows="3" name="keterangan"><?= old('keterangan', $informasi_kebencanaan->keterangan); ?></textarea>
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