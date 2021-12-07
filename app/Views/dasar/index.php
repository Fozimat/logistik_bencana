<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kebutuhan Dasar</h1>
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
        <?php if (session()->get('roles') == 'ADMIN') : ?>
            <a class="m-0 font-weight-bold btn btn-primary" href="<?= site_url('admin/dasar/create'); ?>"><i class="fa fa-user-plus mr-1"></i>Tambah Data</a>
            <a class="m-0 font-weight-bold btn btn-success ml-2" href="<?= site_url('admin/laporan/kebutuhan_dasar'); ?>" target="_blank"><i class="fa fa-print mr-1"></i>Cetak Laporan</a>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Kebutuhan</th>
                        <th>Keterangan</th>
                        <?php if (session()->get('roles') == 'ADMIN') : ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dasar as $d) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $d->nama_kebutuhan; ?></td>
                            <td><?= $d->jenis; ?></td>
                            <td><?= $d->jumlah; ?></td>
                            <td><?= $d->satuan; ?></td>
                            <td><?= $d->kebutuhan; ?></td>
                            <td><?= $d->keterangan; ?></td>
                            <?php if (session()->get('roles') == 'ADMIN') : ?>
                                <td>
                                    <a href="<?= site_url('admin/dasar/edit/' . $d->id); ?>" class="btn btn-info">edit</a> |
                                    <form action="<?= site_url('admin/dasar/delete/' . $d->id); ?>" method="POST" class="d-inline">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>