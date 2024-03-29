<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Bencana</h1>
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
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tanggap_bencana as $d) : ?>
                        <tr>
                            <input type="hidden" name="id_lapor" id="id_lapor" value="<?= $d->id; ?>">
                            <th><?= $i++; ?></th>
                            <td><?= $d->jenis_bencana; ?></td>
                            <td><?= date('d-m-Y H:i', strtotime($d->tanggal_waktu_kejadian)); ?></td>
                            <td><?= $d->lokasi_tempat_kejadian; ?></td>
                            <?php if (session()->get('roles') == 'ADMIN') : ?>
                                <td>
                                    <?php if ($d->status == 'Belum ditanggapi') {
                                        echo "<a class='badge badge-danger' href='" . site_url('admin/laporanmasuk/belumditanggapi/' . $d->id) . "'>" . $d->status . "</a>";
                                    } else if ($d->status == 'Sedang ditanggapi') {
                                        echo "<a class='badge badge-warning' href='" . site_url('admin/laporanmasuk/sedangditanggapi/' . $d->id) . "'>" . $d->status . "</a>";
                                    } else {
                                        echo "<a class='badge badge-success' href='" . site_url('admin/laporanmasuk/selesai/' . $d->id) . "'>" . $d->status . "</a>";
                                    }
                                    ?>
                                </td>
                            <?php endif; ?>
                            <?php if (session()->get('roles') == 'KASI') : ?>
                                <td>
                                    <?php if ($d->status == 'Belum ditanggapi') {
                                        echo "<a class='badge badge-danger' href='#'>" . $d->status . "</a>";
                                    } else if ($d->status == 'Sedang ditanggapi') {
                                        echo "<a class='badge badge-warning' href='#'>" . $d->status . "</a>";
                                    } else {
                                        echo "<a class='badge badge-success' href='#'>" . $d->status . "</a>";
                                    }
                                    ?>
                                </td>
                            <?php endif; ?>

                            <td>
                                <a href="<?= site_url('admin/laporanmasuk/detail/' . $d->id); ?>" class="btn btn-success">detail</a> |
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