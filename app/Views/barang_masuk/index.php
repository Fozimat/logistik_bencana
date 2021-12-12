<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Berita Acara Barang Masuk</h1>
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
        <a class="m-0 font-weight-bold btn btn-primary" href="<?= site_url('admin/beritabarangmasuk/create'); ?>"><i class="fa fa-user-plus mr-1"></i>Tambah Data</a>
        <a class="m-0 font-weight-bold btn btn-success ml-2" href="<?= site_url('admin/laporan/berita_barang_masuk'); ?>" target="_blank"><i class="fa fa-print mr-1"></i>Cetak Laporan</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No berita Acara</th>
                        <th>Tanggal Masuk</th>
                        <th>Sumber Bantuan</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($barang_masuk as $ba) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $ba->no_berita_acara; ?></td>
                            <td><?= $ba->tgl_ba_masuk; ?></td>
                            <td><?= $ba->sumber_bantuan; ?></td>
                            <td><img width="100" height="100" src="<?= site_url('upload/barang_masuk/' . $ba->gambar); ?>" alt=""></td>
                            <td>
                                <a href="<?= site_url('admin/beritabarangmasuk/edit/' . $ba->id); ?>" class="btn btn-info">edit</a> |
                                <form action="<?= site_url('admin/beritabarangmasuk/delete/' . $ba->id); ?>" method="POST" class="d-inline">
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