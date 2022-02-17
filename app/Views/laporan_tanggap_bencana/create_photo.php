<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Tanggap Bencana
    </h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-shadow">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-light">Form Tambah Foto Kejadian
                        </h5>
                        <a href="<?= base_url('laporantanggapbencana'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="offset-md-3 col-md-6">
                                <form action="<?= site_url('laporantanggapbencana/store_photo'); ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id_lapor" value="<?= $lapor->id; ?>">
                                    <div class="form-group">
                                        <label for="jenis_bencana" class="hitam-tebal">Jenis Bencana</label>
                                        <input type="text" readonly class="form-control" value="<?= $lapor->jenis_bencana; ?>" name="jenis_bencana" id="jenis_bencana">
                                    </div>

                                    <div class="form-group">
                                        <label for="gambar">Gambar</label>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="file" name="gambar[]" multiple="" class="<?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('gambar'); ?>
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