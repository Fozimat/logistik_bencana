<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cetak Laporan</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/laporan/cetak_periode'); ?>" method="POST" target="_blank">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="cetak">Laporan</label>
                        <select class="form-control" id="cetak" name="cetak" required>
                            <option value="">--Pilih--</option>
                            <option value="logistik_masuk">Laporan Logistik Masuk</option>
                            <option value="logistik_masuk_excel_periode">Laporan Logistik Masuk (Excel)</option>
                            <option value="logistik_keluar">Laporan Logistik Keluar</option>
                            <option value="logistik_keluar_excel_periode">Laporan Logistik Keluar (Excel)</option>
                            <option value="berita_masuk">Laporan Berita Acara Barang Masuk</option>
                            <option value="berita_keluar">Laporan Berita Acara Barang Keluar</option>
                            <option value="informasi_kebencanaan_excel_periode">Laporan Informasi Kebencanaan (Excel)</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="tanggal1">Mulai Tanggal </label>
                        <input type="date" class="form-control" name="tanggal1" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="tanggal2">Sampai Tanggal</label>
                        <input type="date" class="form-control" name="tanggal2" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="float-right font-weight-bold btn btn-primary"><i class="fa fa-print mr-1"></i>Cetak Laporan</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>