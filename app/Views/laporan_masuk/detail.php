<?= $this->extend('layouts/template'); ?>

<?= $this->section('script'); ?>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
    function initialize() {
        var propertiPeta = {
            center: new google.maps.LatLng(<?= $lapor->latitude ?>, <?= $lapor->longitude ?>),
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(<?= $lapor->latitude ?>, <?= $lapor->longitude ?>),
            map: peta,
            animation: google.maps.Animation.BOUNCE
        });
    }
    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Tanggap Bencana
    </h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-shadow">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-light">Detail Laporan
                        </h5>
                        <a href="<?= base_url('admin/laporanmasuk'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form>
                                    <div class="form-group">
                                        <label for="jenis_bencana">Jenis Bencana</label>
                                        <input type="text" class="form-control" readonly value="<?= $lapor->jenis_bencana; ?>" name="jenis_bencana" id="jenis_bencana">
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_waktu_kejadian">Tanggal Waktu Kejadian</label>
                                        <input type="datetime-local" class="form-control" readonly value="<?= date('Y-m-d\TH:i', strtotime($lapor->tanggal_waktu_kejadian)); ?>" name="tanggal_waktu_kejadian" id="tanggal_waktu_kejadian">
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_waktu_lapor">Tanggal Waktu Lapor</label>
                                        <input type="datetime-local" class="form-control" readonly value="<?= date('Y-m-d\TH:i', strtotime($lapor->tanggal_waktu_lapor)); ?>" name="tanggal_waktu_lapor" id="tanggal_waktu_lapor">
                                    </div>
                                    <div class="form-group">
                                        <label for="lokasi_tempat_kejadian">Lokasi Tempat Kejadian</label>
                                        <textarea readonly class="form-control" rows="3" name="lokasi_tempat_kejadian"><?= $lapor->lokasi_tempat_kejadian; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">No HP (Kontak yang bisa dihubungi)</label>
                                        <input type="number" class="form-control" readonly name="no_hp" id="no_hp" value="<?= $lapor->no_hp; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" readonly rows="3" name="keterangan"><?= $lapor->keterangan; ?></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <label for="lokasi">Lokasi</label>
                                <div id="googleMap" style="width:100%;height:500px;"></div>
                                <?php if (!empty($foto)) : ?>
                                    <div class="form-group">
                                        <label for="jenis_bencana">Foto Kejadian Bencana</label>
                                        <?php foreach ($foto as $f) : ?>
                                            <img src="<?= site_url('upload/laporan_tanggap_bencana/' . $f->foto); ?>" alt="Foto Kejadian" class="img-thumbnail mb-3" style="width: 400px;height: auto;">
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>