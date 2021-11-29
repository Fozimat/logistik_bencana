<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Informasi Kebencanaan</h1>
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
        <a class="m-0 font-weight-bold btn btn-primary" href="<?= site_url('admin/informasikebencanaan/create'); ?>">Tambah Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Bencana</th>
                        <th>Lokasi</th>
                        <th>Tanggal Bencana</th>
                        <th>Objek Terdampak</th>
                        <th>Jumlah Korban Terdampak Laki</th>
                        <th>Jumlah Korban Terdampak Perempuan</th>
                        <th>Tindakan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($informasi_kebencanaan as $d) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $d->jenis_bencana; ?></td>
                            <td><?= $d->lokasi_tempat_kejadian; ?></td>
                            <td><?= $d->tgl_bencana; ?></td>
                            <td><?= $d->objek_terdampak; ?></td>
                            <td><?= $d->jumlah_korban_terdampak_laki; ?></td>
                            <td><?= $d->jumlah_korban_terdampak_perempuan; ?></td>
                            <td><?= $d->tindakan; ?></td>
                            <td><?= $d->keterangan; ?></td>
                            <td>
                                <a href="<?= site_url('admin/informasikebencanaan/edit/' . $d->id); ?>" class="btn btn-info">edit</a> |
                                <form action="<?= site_url('admin/informasikebencanaan/delete/' . $d->id); ?>" method="POST" class="d-inline">
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