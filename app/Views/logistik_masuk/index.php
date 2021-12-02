<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Logistik Masuk</h1>
</div>

<?php if (session()->getFlashdata('status')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= session()->getFlashdata('status'); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class="m-0 font-weight-bold btn btn-primary" href="<?= site_url('admin/logistikmasuk/create'); ?>">Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Berita Acara</th>
                        <th>Jenis Barang</th>
                        <th>Tangal Masuk</th>
                        <th>Sumber</th>
                        <th>Vol/Unit</th>
                        <th>Satuan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($logistik_masuk as $d) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $d->no_berita_acara; ?></td>
                            <td><?= $d->jenis_barang; ?></td>
                            <td><?= $d->tgl_masuk; ?></td>
                            <td><?= $d->sumber; ?></td>
                            <td><?= $d->vol_unit; ?></td>
                            <td><?= $d->satuan; ?></td>
                            <td><?= $d->keterangan; ?></td>
                            <td>
                                <a href="<?= site_url('admin/logistikmasuk/edit/' . $d->id); ?>" class="btn btn-info">edit</a> |
                                <form action="<?= site_url('admin/logistikmasuk/delete/' . $d->id); ?>" method="POST" class="d-inline">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn btn-danger">delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>