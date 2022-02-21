<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Tanggap Bencana
    </h1>
</div>

<?php if (session()->getFlashdata('status')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= session()->getFlashdata('status'); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

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
                            <div class="col-md-6">
                                <form action="<?= site_url('laporantanggapbencana/store_photo'); ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id_lapor" value="<?= $lapor->id; ?>">
                                    <input type="hidden" name="segment" value="<?= $segment; ?>">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_bencana">Foto Kejadian Bencana</label>
                                    <?php foreach ($foto as $f) : ?>
                                        <img src="<?= site_url('upload/laporan_tanggap_bencana/' . $f->foto); ?>" alt="Foto Kejadian" class="img-thumbnail mb-3" style="width: 400px;height: auto;">
                                        <a href="<?= site_url('laporantanggapbencana/edit_photo/' . $f->id); ?>" class="btn btn-info btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                                        <!-- <a onclick="return confirm('Apakah anda yakin?')" href="<?= site_url('laporantanggapbencana/delete_photo/' . $f->id); ?>" class="badge badge-danger d-inline-block"><i class="fas fa-fw fa-trash"></i></a> -->
                                        <form action="<?= site_url('laporantanggapbencana/delete_photo/' . $f->id); ?>" method="POST" class="d-inline">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="segment" value="<?= $segment; ?>">
                                            <button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn btn-danger btn-sm d-inline-block"><i class="fas fa-fw fa-trash"></i></button>
                                        </form>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>