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
                        <h5 class="m-0 font-weight-bold text-light">Form Edit Foto Kejadian
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="<?= site_url('laporantanggapbencana/update_photo/' . $foto->id); ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?= $foto->id; ?>">
                                    <div class="form-group">
                                        <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= site_url('upload/laporan_tanggap_bencana/' . $foto->foto); ?>" class="img-thumbnail img-preview" alt="">
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="custom-file">
                                                    <input type="hidden" name="gambar_lama" value="<?= $foto->foto; ?>">
                                                    <input type="file" name="gambar" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="gambar" onchange="previewImg()">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('foto'); ?>
                                                    </div>
                                                    <label class="custom-file-label" for="foto">Pilih foto</label>
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