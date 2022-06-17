<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Tanggap Bencana
    </h1>
</div>

<?= $this->section('script'); ?>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
    // variabel global marker
    var marker;

    function taruhMarker(peta, posisiTitik) {
        if (marker) {
            // pindahkan marker
            marker.setPosition(posisiTitik);
        } else {
            // buat marker baru
            marker = new google.maps.Marker({
                position: posisiTitik,
                map: peta,
                animation: google.maps.Animation.BOUNCE
            });
        }

        // isi nilai koordinat ke form
        document.getElementById("lat").value = posisiTitik.lat();
        document.getElementById("lng").value = posisiTitik.lng();

    }

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

        // even listner ketika peta diklik
        google.maps.event.addListener(peta, 'click', function(event) {
            taruhMarker(this, event.latLng);
        });
    }
    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?= $this->endSection(); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card-shadow">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-light">Form Edit Laporan
                        </h5>
                        <a href="<?= base_url('laporantanggapbencana'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="<?= site_url('laporantanggapbencana/update/' . $lapor->id); ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?= $lapor->id; ?>">
                                    <div class="form-group">
                                        <label for="jenis_bencana" class="hitam-tebal">Jenis Bencana</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('jenis_bencana')) ? 'is-invalid' : ''; ?>" value="<?= $lapor->jenis_bencana; ?>" name="jenis_bencana" id="jenis_bencana">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jenis_bencana'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tanggal_waktu_kejadian" class="hitam-tebal">Tanggal Waktu Kejadian</label>
                                        <input type="datetime-local" class="form-control <?= ($validation->hasError('tanggal_waktu_kejadian')) ? 'is-invalid' : ''; ?>" value="<?= date('Y-m-d\TH:i', strtotime($lapor->tanggal_waktu_kejadian)); ?>" name="tanggal_waktu_kejadian" id="tanggal_waktu_kejadian">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tanggal_waktu_kejadian'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="lokasi_tempat_kejadian" class="hitam-tebal">Lokasi Tempat Kejadian</label>
                                        <textarea class="form-control <?= ($validation->hasError('lokasi_tempat_kejadian')) ? 'is-invalid' : ''; ?>" rows="3" name="lokasi_tempat_kejadian"><?= old('lokasi_tempat_kejadian'); ?><?= $lapor->lokasi_tempat_kejadian; ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('lokasi_tempat_kejadian'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_hp" class="hitam-tebal">No HP (Kontak yang bisa dihubungi)</label>
                                        <input type="number" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" value="<?= $lapor->no_hp; ?>" name="no_hp" id="no_hp">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_hp'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan" class="hitam-tebal">Keterangan</label>
                                        <textarea class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" rows="3" name="keterangan"><?= $lapor->keterangan; ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('keterangan'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="lat" name="lat">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="lng" name="lng">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-plane"> Simpan</i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div id="googleMap" style="width:100%;height:500px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>