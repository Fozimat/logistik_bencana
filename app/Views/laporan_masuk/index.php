<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Tanggap Bencana</h1>
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

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Bencana</th>
                        <th>Waktu Kejadian</th>
                        <th>Waktu Lapor</th>
                        <th>Kontak</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tanggap_bencana as $d) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $d->jenis_bencana; ?></td>
                            <td><?= $d->tanggal_waktu_kejadian; ?></td>
                            <td><?= $d->tanggal_waktu_lapor; ?></td>
                            <td><?= $d->no_hp; ?></td>
                            <td><a href="#"><span class="badge badge-primary"><?= $d->status; ?></span></a></td>
                            <td>
                                <a href="<?= site_url('admin/laporanmasuk/detail/' . $d->id); ?>" class="btn btn-secondary">detail</a> |
                                <form action="<?= site_url('admin/laporanmasuk/delete/' . $d->id); ?>" method="POST" class="d-inline">
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