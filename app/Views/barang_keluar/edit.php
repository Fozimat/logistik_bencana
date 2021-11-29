<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Berita Acara Barang Keluar</h1>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-shadow">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h5 class="m-0 font-weight-bold text-light">Form Edit Berita Acara Barang Keluar
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="offset-md-3 col-md-6">
                                <form action="<?= site_url('admin/beritabarangkeluar/update/' . $barang_keluar->id); ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?= $barang_keluar->id; ?>">
                                        <label for="no_berita_acara" class="hitam-tebal">No Berita Acara</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('no_berita_acara')) ? 'is-invalid' : ''; ?>" value="<?= old('no_berita_acara', $barang_keluar->no_berita_acara); ?>" name="no_berita_acara" id="nama_kebutuhan">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_berita_acara'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_ba_keluar" class="hitam-tebal">Tangal Masuk</label>
                                        <input type="date" class="form-control <?= ($validation->hasError('tgl_ba_keluar')) ? 'is-invalid' : ''; ?>" value="<?= old('tgl_ba_keluar', $barang_keluar->tgl_ba_keluar); ?>" name="tgl_ba_keluar" id="tgl_ba_keluar">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_ba_keluar'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tujuan_bantuan" class="hitam-tebal">Sumber Bantuan</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('tujuan_bantuan')) ? 'is-invalid' : ''; ?>" value="<?= old('tujuan_bantuan', $barang_keluar->tujuan_bantuan); ?>" name="tujuan_bantuan" id="tujuan_bantuan">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tujuan_bantuan'); ?>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="gambar" class="col-sm-3 col-form-label">Gambar</label>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= site_url('upload/barang_keluar/' . $barang_keluar->gambar); ?>" class="img-thumbnail img-preview" alt="">
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="custom-file">
                                                    <input type="hidden" name="gambar_lama" value="<?= $barang_keluar->gambar; ?>">
                                                    <input type="file" name="gambar" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" onchange="previewImg()">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('gambar'); ?>
                                                    </div>
                                                    <label class="custom-file-label" for="gambar">Pilih gambar</label>
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