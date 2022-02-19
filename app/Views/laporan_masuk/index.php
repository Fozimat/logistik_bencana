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
                            <td><a id="id<?= $d->id; ?>" href="javascript:void(0);"><span id="status<?= $d->id; ?>" class="badge badge-secondary"><?= $d->status; ?></span></a></td>
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

<?= $this->section('script'); ?>
<script>
    $("[id^=id]").each(function() {
        var id_lapor = $(this).val();
        var status_sekarang = $('#status' + id_lapor).text();
        $('#id' + id_lapor).on('click', function(e) {
            // e.preventDefault();
            document.location.reload();
            $.ajax({
                type: "POST",
                url: status_sekarang == "Belum ditanggapi" ? "http://localhost:8080/admin/laporanmasuk/update_status_belum_ditanggapi/" + id_lapor : (status_sekarang == "Sedang ditanggapi" ? "http://localhost:8080/admin/laporanmasuk/update_status_sedang_ditanggapi/" + id_lapor : "http://localhost:8080/admin/laporanmasuk/update_status_selesai/" + id_lapor),
                dataType: 'json',
                data: {
                    id_lapor: id_lapor
                },
                success: function(res) {
                    if (res.success == true) {
                        $('#status' + id_lapor).text(res.status);
                    } else {
                        console.log("Failed");
                    }
                },
                error: function() {
                    console.log("Error");
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>