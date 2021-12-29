<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Berita Acara Barang Keluar</h1>
</div>

<?php if (session()->getFlashdata('status')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= session()->getFlashdata('status'); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<form action="<?= base_url('admin/laporan/cetak_periode'); ?>" method="POST" target="_blank">
    <input type="hidden" name="cetak" value="berita_keluar">
    <div class="row mt-2">
        <div class="col-4">
            <label for="tanggal1">Mulai Tanggal </label>
            <input type="date" class="form-control" name="tanggal1" required>
        </div>
        <div class="col-4">
            <label for="tanggal2">Sampai Tanggal</label>
            <input type="date" class="form-control" name="tanggal2" required>
        </div>
        <div class="col-4">
            <button class="font-weight-bold btn btn-success" type="submit" style="margin-top: 30px;" target="_blank"><i class="fa fa-print mr-1"></i>Cetak PDF</button>
        </div>
    </div>
</form>

<div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
        <?php if (session()->get('roles') == 'ADMIN') : ?>
            <a class="m-0 font-weight-bold btn btn-primary" href="<?= site_url('admin/beritabarangkeluar/create'); ?>"><i class="fa fa-user-plus mr-1"></i>Tambah Data</a>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No berita Acara</th>
                        <th>Tanggal Keluar</th>
                        <th>Gambar</th>
                        <?php if (session()->get('roles') == 'ADMIN') : ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                        <?php if (session()->get('roles') == 'KASI') : ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($barang_keluar as $ba) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $ba->no_berita_acara; ?></td>
                            <td><?= $ba->tgl_ba_keluar; ?></td>
                            <td><img width="100" height="100" src="<?= site_url('upload/barang_keluar/' . $ba->gambar); ?>" alt=""></td>
                            <?php if (session()->get('roles') == 'ADMIN') : ?>
                                <td>
                                    <a href="<?= site_url('upload/barang_keluar/' . $ba->gambar); ?>" class="btn btn-secondary" target="_blank">detail</a> |
                                    <a href="<?= site_url('admin/beritabarangkeluar/edit/' . $ba->id); ?>" class="btn btn-info">edit</a> |
                                    <form action="<?= site_url('admin/beritabarangkeluar/delete/' . $ba->id); ?>" method="POST" class="d-inline">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </td>
                            <?php endif; ?>
                            <?php if (session()->get('roles') == 'KASI') : ?>
                                <td>
                                    <a href="<?= site_url('upload/barang_keluar/' . $ba->gambar); ?>" class="btn btn-secondary" target="_blank">detail</a>
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