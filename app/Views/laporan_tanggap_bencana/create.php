<?= $this->extend('layouts/template'); ?>

<?= $this->section('style'); ?>
<style>
    #map {
        width: 100%;
        height: 400px;
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="http://maps.googleapis.com/maps/api/js"></script>

<script>
    var map;
    var koordinat = {
        lat: -0.210782,
        lng: 104.601581
    };

    function addYourLocationButton(map, marker) {
        var controlDiv = document.createElement('div');

        var firstChild = document.createElement('button');
        firstChild.style.backgroundColor = '#fff';
        firstChild.style.border = 'none';
        firstChild.style.outline = 'none';
        firstChild.style.width = '28px';
        firstChild.style.height = '28px';
        firstChild.style.borderRadius = '2px';
        firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
        firstChild.style.cursor = 'pointer';
        firstChild.style.marginRight = '10px';
        firstChild.style.padding = '0px';
        firstChild.title = 'Your Location';
        controlDiv.appendChild(firstChild);

        var secondChild = document.createElement('div');
        secondChild.style.margin = '5px';
        secondChild.style.width = '18px';
        secondChild.style.height = '18px';
        secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-1x.png)';
        secondChild.style.backgroundSize = '180px 18px';
        secondChild.style.backgroundPosition = '0px 0px';
        secondChild.style.backgroundRepeat = 'no-repeat';
        secondChild.id = 'you_location_img';
        firstChild.appendChild(secondChild);

        google.maps.event.addListener(map, 'dragend', function() {
            $('#you_location_img').css('background-position', '0px 0px');
        });

        google.maps.event.addListener(map, 'click', function(event) {
            taruhMarker(this, event.latLng);
        });

        firstChild.addEventListener('click', function() {
            var imgX = '0';
            var animationInterval = setInterval(function() {
                if (imgX == '-18') imgX = '0';
                else imgX = '-18';
                $('#you_location_img').css('background-position', imgX + 'px 0px');
            }, 500);
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    marker.setPosition(latlng);
                    map.setCenter(latlng);
                    clearInterval(animationInterval);
                    $('#you_location_img').css('background-position', '-144px 0px');
                    document.getElementById("lat").value = position.coords.latitude;
                    document.getElementById("lng").value = position.coords.longitude;
                });
            } else {
                clearInterval(animationInterval);
                $('#you_location_img').css('background-position', '0px 0px');
            }
        });

        controlDiv.index = 1;
        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);

        // isi nilai koordinat ke form

    }

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: koordinat
        });
        var myMarker = new google.maps.Marker({
            icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
            map: map,
            animation: google.maps.Animation.DROP,
            position: koordinat
        });
        addYourLocationButton(map, myMarker);

    }
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

    $(document).ready(function(e) {
        initMap();
    });
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
                        <h5 class="m-0 font-weight-bold text-light">Form Tambah Laporan
                        </h5>
                        <a href="<?= base_url('laporantanggapbencana'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="<?= site_url('laporantanggapbencana/store'); ?>" method="POST" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="jenis_bencana">Jenis Bencana</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('jenis_bencana')) ? 'is-invalid' : ''; ?>" value="<?= old('jenis_bencana'); ?>" name="jenis_bencana" id="jenis_bencana">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jenis_bencana'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tanggal_waktu_kejadian">Tanggal Waktu Kejadian</label>
                                        <input type="datetime-local" class="form-control <?= ($validation->hasError('tanggal_waktu_kejadian')) ? 'is-invalid' : ''; ?>" value="<?= old('tanggal_waktu_kejadian'); ?>" name="tanggal_waktu_kejadian" id="tanggal_waktu_kejadian">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tanggal_waktu_kejadian'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="lokasi_tempat_kejadian">Lokasi Tempat Kejadian</label>
                                        <textarea class="form-control <?= ($validation->hasError('lokasi_tempat_kejadian')) ? 'is-invalid' : ''; ?>" rows="3" name="lokasi_tempat_kejadian"><?= old('lokasi_tempat_kejadian'); ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('lokasi_tempat_kejadian'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_hp">No HP (Kontak yang bisa dihubungi)</label>
                                        <input type="number" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" value="<?= old('no_hp'); ?>" name="no_hp" id="no_hp">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_hp'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" rows="3" name="keterangan"><?= old('keterangan'); ?></textarea>
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
                                <label for="lokasi">Lokasi</label>
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>