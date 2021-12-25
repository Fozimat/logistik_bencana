<?= $this->extend('layouts/template'); ?>
<?= $this->section('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Logistik Masuk</h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card-shadow">
            <div class="card-body">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-primary d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-light">Form Tambah Logistik Masuk
                        </h5>
                        <a href="<?= base_url('admin/logistikmasuk'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="offset-md-3 col-md-6">
                                <form action="<?= site_url('admin/logistikmasuk/store'); ?>" method="POST">
                                    <?= csrf_field(); ?>

                                    <div class="form-tambah-barang">
                                        <div class="form-group">
                                            <label for="id_barang" class="hitam-tebal">Nama Barang</label>
                                            <select required name="id_barang[0]" id="id_barang" class="form-control">
                                                <option value="">--- Pilih Barang ---</option>
                                                <?php foreach ($persediaan as $pd) : ?>
                                                    <option value="<?= $pd->id; ?>"><?= $pd->nama_barang; ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="vol_unit" class="hitam-tebal">Vol/Unit</label>
                                                    <input required type="number" class="form-control" name="vol_unit[0]" id="vol_unit">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <button class="btn btn-success btn-sm pull-right tambah-barang"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_masuk" class="hitam-tebal">Tanggal Masuk</label>
                                        <input required type="date" class="form-control" name="tgl_masuk" id="tgl_masuk">
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan" class="hitam-tebal">Keterangan</label>
                                        <textarea required class="form-control" rows="3" name="keterangan"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-plane"> Simpan</i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        var max_fields = <?= $total_barang; ?>;
        var wrapper = $(".form-tambah-barang");
        var add_button = $(".tambah-barang");
        var field = 1;
        $(add_button).click(function(e) {
            e.preventDefault();
            if (field < max_fields) {
                field++;
                $(wrapper).append(
                    `<div class="form-tambah-barang">
                <div class="form-group">
                    <label for="id_barang" class="hitam-tebal">Nama Barang</label>
                    <select required name="id_barang[]" id="id_barang" class="form-control">
                        <option value="">--- Pilih Barang ---</option>
                        <?php foreach ($persediaan as $pd) : ?>
                            <option value="<?= $pd->id; ?>"><?= $pd->nama_barang; ?></option>
                        <?php endforeach; ?>
                    </select>
                   
                </div>
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="vol_unit" class="hitam-tebal">Vol/Unit</label>
                            <input required type="number" class="form-control"  name="vol_unit[]" id="vol_unit">
                           
                        </div>
                    </div>
                    <div class="col-md-4 mt-3">
                        <button class="btn btn-danger btn-sm hapus-barang"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </div>`
                );
            }
        });
        $(wrapper).on("click", ".hapus-barang", function(e) {
            e.preventDefault();
            $(this).closest(".form-tambah-barang").remove();
            field--;
        })
    })
</script>
<?= $this->endSection(); ?>