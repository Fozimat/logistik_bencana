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

<div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
        <a class="m-0 font-weight-bold btn btn-primary" href="<?= base_url('laporantanggapbencana/create'); ?>"><i class="fa fa-user-plus mr-1"></i>Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Bencana</th>
                        <th>Tanggal Waktu Kejadian</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tanggap_bencana as $d) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $d->jenis_bencana; ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($d->tanggal_waktu_kejadian)); ?></td>
                            <td><?= $d->lokasi_tempat_kejadian; ?></td>
                            <td><span class="badge badge-primary"><?= $d->status; ?></span></td>
                            <td><a href="<?= site_url('laporantanggapbencana/create_photo/' . $d->id); ?>" class="badge badge-success">+ Foto Kejadian</a></td>
                            <td>
                                <a href="<?= site_url('laporantanggapbencana/edit/' . $d->id); ?>" class="btn btn-info">edit</a> |
                                <form action="<?= site_url('laporantanggapbencana/delete/' . $d->id); ?>" method="POST" class="d-inline">
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