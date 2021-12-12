<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pesan</h1>
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Pesan</th>
                        <th>Tgl dikirim</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pesan as $d) : ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $d->nama; ?></td>
                            <td><?= $d->email; ?></td>
                            <td><?= $d->subjek; ?></td>
                            <td><?= $d->pesan; ?></td>
                            <td><?= $d->tgl_dikirim; ?></td>
                            <td><?= $d->status == 0 ? "<a href='" . site_url('admin/pesan/seen/' . $d->id) . "' class='badge badge-warning'>Belum dibaca</a>" : "<a href='" . site_url('admin/pesan/unseen/' . $d->id) . "' class='badge badge-success'>Sudah dibaca</a>"; ?></td>
                            <td>
                                <form action="<?= site_url('admin/pesan/delete/' . $d->id); ?>" method="POST" class="d-inline">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn btn-danger btn-sm">delete</button>
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