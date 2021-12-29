<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Persediaan</h1>
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
            <a class="m-0 font-weight-bold btn btn-primary" href="<?= site_url('admin/persediaan/create'); ?>"><i class="fa fa-user-plus mr-1"></i>Tambah Data</a>
        <?php endif; ?>
        <a class="m-0 font-weight-bold btn btn-success ml-2" href="<?= site_url('admin/laporan/persediaan'); ?>" target="_blank"><i class="fa fa-print mr-1"></i>Cetak PDF</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA BARANG</th>
                        <th>VOL/UNIT</th>
                        <th>SATUAN</th>
                        <th>KETERANGAN</th>
                        <?php if (session()->get('roles') == 'ADMIN') : ?>
                            <th>AKSI</th>
                        <?php endif; ?>

                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($persediaan as $d) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $d->nama_barang; ?></td>
                            <td><?= $d->vol_unit; ?></td>
                            <td><?= $d->satuan; ?></td>
                            <td><?= $d->keterangan; ?></td>
                            <?php if (session()->get('roles') == 'ADMIN') : ?>
                                <td>
                                    <a href="<?= site_url('admin/persediaan/edit/' . $d->id); ?>" class="btn btn-info">edit</a> |
                                    <form action="<?= site_url('admin/persediaan/delete/' . $d->id); ?>" method="POST" class="d-inline">
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