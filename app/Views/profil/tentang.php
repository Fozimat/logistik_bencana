<?= $this->extend('profil/template'); ?>
<?= $this->section('content'); ?>
<main id="main" data-aos="fade-up" class="aos-init aos-animate">

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Tentang BPBD Kabupaten Lingga</h2>
                <ol>
                    <li><a href="#">Profil</a></li>
                    <li>Tentang BPBD</li>
                </ol>
            </div>

        </div>
    </section>

    <section id="tentang" class="tentang">
        <div class="container" data-aos="fade-up">
            <div>
                <p style="text-indent: 40px;text-align: justify;">
                    Badan Penanggulangan Bencana Daerah Kabupaten Lingga dibentuk dalam rangka membantu Bupati dalam penyelenggaraan Pemerintah Daerah di Bidang Penanggulangan Bencana. Dalam tugas dan fungsinya dituntut untuk menyelenggarakan Program dan Kegiatan yang merupakan upaya memberikan perlindungan dan pengurangan risiko.
                </p>
                <div class="d-flex align-items-center justify-content-center">
                    <img src="<?= site_url('assets-profil/img/profil.jpg'); ?>" class="img-fluid" alt="">
                </div>
            </div>
            <div class="mt-3">
                <table class="table">
                    <tr>
                        <td style="width: 250px;">Nama Instansi</td>
                        <td style="width: 10px;">:</td>
                        <td style="width: 500px;">Badan Penanggulangan Bencana Daerah Kabupaten Lingga</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>Jl. Istana Robat-Daik Lingga </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Prasarana</td>
                        <td>:</td>
                        <td>7 Ruang Kerja</td>
                        <td>1 Toilet</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>1 Gudang</td>
                        <td>Tempat Parkir</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Aula</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Status Kepemilikan Tanah</td>
                        <td>:</td>
                        <td>Milik Pemkab Lingga</td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>




</main>
<?= $this->endSection(); ?>