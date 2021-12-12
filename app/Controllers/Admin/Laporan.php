<?php

namespace App\Controllers\Admin;

use App\ThirdParty\PDF;
use App\ThirdParty\PDFL;
use App\Models\DasarModel;
use App\Models\PersediaanModel;
use App\Models\LogistikMasukModel;
use App\Controllers\BaseController;
use App\Models\LogistikKeluarModel;
use App\Models\BeritaBarangMasukModel;
use App\Models\BeritaBarangKeluarModel;
use App\Models\InformasiKebencanaanModel;

class Laporan extends BaseController
{
    public function __construct()
    {
        $this->dasarModel = new DasarModel();
        $this->persediaanModel = new PersediaanModel();
        $this->logistikMasukModel = new LogistikMasukModel();
        $this->logistikKeluarModel = new LogistikKeluarModel();
        $this->beritaBarangMasukModel = new BeritaBarangMasukModel();
        $this->beritaBarangKeluarModel = new BeritaBarangKeluarModel();
        $this->informasiKebencanaanModel = new InformasiKebencanaanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan',
        ];
        return view('laporan/index', $data);
    }

    public function cetak()
    {
        $cetak = $this->request->getVar('cetak');
        switch ($cetak) {
            case "persediaan":
                return redirect()->to('admin/laporan/persediaan');
                break;
            case "logistik_masuk":
                return redirect()->to('admin/laporan/logistik_masuk');
                break;
            case "logistik_keluar":
                return redirect()->to('admin/laporan/logistik_keluar');
                break;
            case "kebencanaan":
                return redirect()->to('admin/laporan/informasi_kebencanaan');
                break;
            case "berita_masuk":
                return redirect()->to('admin/laporan/berita_barang_masuk');
                break;
            case "berita_keluar":
                return redirect()->to('admin/laporan/berita_barang_keluar');
                break;
            default:
                return redirect()->to('admin/laporan/cetak');
        }
    }

    public function kebutuhan_dasar()
    {
        $pdf = new PDF();
        $pdf->isFinished = false;
        $pdf->SetTitle('Laporan Logistik Masuk');
        $pdf->AddPage('P', 'A4');
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Times', 'B', '14');
        $pdf->Cell(0, 15, 'LOGISTIK MASUK', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Nama Kebutuhan', 1, 0, 'C');
        $pdf->Cell(25, 6, 'Jenis', 1, 0, 'C');
        $pdf->Cell(15, 6, 'Jumlah', 1, 0, 'C');
        $pdf->Cell(15, 6, 'Satuan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Kebutuhan', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Keterangan', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $dasar = $this->dasarModel->getDasar();
        $no = 1;
        foreach ($dasar as $data) {
            $pdf->SetFont('times', '', 11);
            $pdf->Cell(8, 7, $no, 1, 0, 'C');
            $pdf->Cell(40, 7, $data->nama_kebutuhan, 1, 0);
            $pdf->Cell(25, 7, $data->jenis, 1, 0, 'C');
            $pdf->Cell(15, 7, $data->jumlah, 1, 0, 'C');
            $pdf->Cell(15, 7, $data->satuan, 1, 0);
            $pdf->Cell(40, 7, $data->kebutuhan, 1, 0);
            $pdf->Cell(50, 7, $data->keterangan, 1, 1);
            $no++;
        }
        $pdf->isFinished = true;
        $pdf->Output();
        exit;
    }

    public function persediaan()
    {
        $pdf = new PDF();
        $pdf->isFinished = false;
        $pdf->SetTitle('Laporan Persediaan');
        $pdf->AddPage('P', 'A4');
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Times', 'B', '14');
        $pdf->Cell(0, 15, 'PERSEDIAAN', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(60, 6, 'Jenis Barang', 1, 0, 'C');
        $pdf->Cell(25, 6, 'Vol/Unit', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Satuan', 1, 0, 'C');
        $pdf->Cell(70, 6, 'Keterangan', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $persediaan = $this->persediaanModel->getPersediaan();
        $no = 1;
        foreach ($persediaan as $data) {
            $pdf->SetFont('times', '', 11);
            $pdf->Cell(8, 7, $no, 1, 0, 'C');
            $pdf->Cell(60, 7, $data->jenis_barang, 1, 0);
            $pdf->Cell(25, 7, $data->vol_unit, 1, 0, 'C');
            $pdf->Cell(30, 7, $data->satuan, 1, 0, 'C');
            $pdf->Cell(70, 7, $data->keterangan, 1, 1);
            $no++;
        }
        $pdf->isFinished = true;
        $pdf->Output();
        exit;
    }

    public function logistik_masuk()
    {
        $pdf = new PDF();
        $pdf->isFinished = false;
        $pdf->SetTitle('Laporan Logistik Masuk');
        $pdf->AddPage('P', 'A4');
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Times', 'B', '14');
        $pdf->Cell(0, 15, 'LOGISTIK MASUK', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Nomor Berita Acara', 1, 0, 'C');
        $pdf->Cell(25, 6, 'Jenis Barang', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Tanggal Masuk', 1, 0, 'C');
        $pdf->Cell(25, 6, 'Sumber', 1, 0, 'C');
        $pdf->Cell(15, 6, 'Vol/Unit', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Satuan', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Keterangan', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $logistik_masuk = $this->logistikMasukModel->getLogistikMasuk();
        $no = 1;
        foreach ($logistik_masuk as $data) {
            $pdf->SetFont('times', '', 11);
            $pdf->Cell(8, 7, $no, 1, 0, 'C');
            $pdf->Cell(35, 7, $data->no_berita_acara, 1, 0);
            $pdf->Cell(25, 7, $data->jenis_barang, 1, 0, 'C');
            $pdf->Cell(30, 7, $data->tgl_masuk, 1, 0, 'C');
            $pdf->Cell(25, 7, $data->sumber, 1, 0);
            $pdf->Cell(15, 7, $data->vol_unit, 1, 0);
            $pdf->Cell(20, 7, $data->satuan, 1, 0);
            $pdf->Cell(35, 7, $data->keterangan, 1, 1);
            $no++;
        }
        $pdf->isFinished = true;
        $pdf->Output();
        exit;
    }

    public function logistik_keluar()
    {
        $pdf = new PDF();
        $pdf->isFinished = false;
        $pdf->SetTitle('Laporan Logistik Keluar');
        $pdf->AddPage('P', 'A4');
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Times', 'B', '14');
        $pdf->Cell(0, 15, 'LOGISTIK KELUAR', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Nomor Berita Acara', 1, 0, 'C');
        $pdf->Cell(25, 6, 'Jenis Barang', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Tanggal Keluar', 1, 0, 'C');
        $pdf->Cell(25, 6, 'Tujuan', 1, 0, 'C');
        $pdf->Cell(15, 6, 'Vol/Unit', 1, 0, 'C');
        $pdf->Cell(20, 6, 'Satuan', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Keterangan', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $logistik_keluar =  $this->logistikKeluarModel->getLogistikKeluar();
        $no = 1;
        foreach ($logistik_keluar as $data) {
            $pdf->SetFont('times', '', 11);
            $pdf->Cell(8, 7, $no, 1, 0, 'C');
            $pdf->Cell(35, 7, $data->no_berita_acara, 1, 0);
            $pdf->Cell(25, 7, $data->jenis_barang, 1, 0, 'C');
            $pdf->Cell(30, 7, $data->tgl_keluar, 1, 0, 'C');
            $pdf->Cell(25, 7, $data->tujuan, 1, 0);
            $pdf->Cell(15, 7, $data->vol_unit, 1, 0);
            $pdf->Cell(20, 7, $data->satuan, 1, 0);
            $pdf->Cell(35, 7, $data->keterangan, 1, 1);
            $no++;
        }
        $pdf->isFinished = true;
        $pdf->Output();
        exit;
    }

    public function berita_barang_masuk()
    {
        $pdf = new PDF();
        $pdf->isFinished = false;
        $pdf->SetTitle('Laporan Berita Acara Barang Masuk');
        $pdf->AddPage('P', 'A4');
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Times', 'B', '14');
        $pdf->Cell(0, 15, 'BERITA ACARA BARANG MASUK', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(8, 10, 'No', 1, 0, 'C');
        $pdf->Cell(40, 10, 'No Berita Acara', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Tanggal Masuk', 1, 0, 'C');
        $pdf->Cell(45, 10, 'Sumber Bantuan', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Gambar', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $berita_barang_masuk =  $this->beritaBarangMasukModel->getBeritaBarangMasuk();
        $no = 1;
        foreach ($berita_barang_masuk as $data) {
            $pdf->SetFont('times', '', 11);
            $pdf->Cell(8, 40,  $no++, 1, 0, 'C');
            $pdf->Cell(40, 40, $data->no_berita_acara, 1, 0);
            $pdf->Cell(40, 40, $data->tgl_ba_masuk, 1, 0, 'C');
            $pdf->Cell(45, 40, $data->sumber_bantuan, 1, 0, 'C');
            $pdf->Cell(60, 40, $pdf->InlineImage(FCPATH . 'upload/barang_masuk/' . $data->gambar, $pdf->GetX(), $pdf->GetY(), 60, 40,));
            $pdf->Ln(0);
        }
        $pdf->isFinished = true;
        $pdf->Output();
        exit;
    }

    public function berita_barang_keluar()
    {
        $pdf = new PDF();
        $pdf->isFinished = false;
        $pdf->SetTitle('Laporan Berita Acara Barang Keluar');
        $pdf->AddPage('P', 'A4');
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Times', 'B', '14');
        $pdf->Cell(0, 15, 'BERITA ACARA BARANG KELUAR', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(8, 10, 'No', 1, 0, 'C');
        $pdf->Cell(40, 10, 'No Berita Acara', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Tanggal Keluar', 1, 0, 'C');
        $pdf->Cell(45, 10, 'Tujuan Bantuan', 1, 0, 'C');
        $pdf->Cell(60, 10, 'Gambar', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $berita_barang_keluar =  $this->beritaBarangKeluarModel->getBeritaBarangkeluar();
        $no = 1;
        foreach ($berita_barang_keluar as $data) {
            $pdf->SetFont('times', '', 11);
            $pdf->Cell(8, 40,  $no++, 1, 0, 'C');
            $pdf->Cell(40, 40, $data->no_berita_acara, 1, 0);
            $pdf->Cell(40, 40, $data->tgl_ba_keluar, 1, 0, 'C');
            $pdf->Cell(45, 40, $data->tujuan_bantuan, 1, 0, 'C');
            $pdf->Cell(60, 40, $pdf->InlineImage(FCPATH . 'upload/barang_keluar/' . $data->gambar, $pdf->GetX(), $pdf->GetY(), 60, 40,));
            $pdf->Ln(0);
        }
        $pdf->isFinished = true;
        $pdf->Output();
        exit;
    }

    public function informasi_kebencanaan()
    {
        $pdf = new PDFL();
        $pdf->isFinished = false;
        $pdf->SetTitle('Laporan Informasi Kebencanaan');
        $pdf->AddPage('L', 'A4');
        $pdf->Cell(10, 5, '', 0, 1);
        $pdf->SetFont('Times', 'B', '14');
        $pdf->Cell(0, 15, 'INFORMASI KEBENCANAAN', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Jenis Bencana', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Tempat Kejadian', 1, 0, 'C');
        $pdf->Cell(25, 6, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Objek Terdampak', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Kbn Terdampak LK', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Kbn Terdampak PR', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Tindakan', 1, 0, 'C');
        $pdf->Cell(45, 6, 'Keterangan', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $informasi_kebencanaan =  $this->informasiKebencanaanModel->getInformasiKebencanaan();
        $no = 1;
        foreach ($informasi_kebencanaan as $data) {
            $pdf->SetFont('times', '', 11);
            $pdf->Cell(8, 7, $no, 1, 0, 'C');
            $pdf->Cell(35, 7, $data->jenis_bencana, 1, 0);
            $pdf->Cell(35, 7, $data->lokasi_tempat_kejadian, 1, 0, 'C');
            $pdf->Cell(25, 7, $data->tgl_bencana, 1, 0, 'C');
            $pdf->Cell(35, 7, $data->objek_terdampak, 1, 0);
            $pdf->Cell(35, 7, $data->jumlah_korban_terdampak_laki, 1, 0, 'C');
            $pdf->Cell(35, 7, $data->jumlah_korban_terdampak_perempuan, 1, 0, 'C');
            $pdf->Cell(30, 7, $data->tindakan, 1, 0);
            $pdf->Cell(45, 7, $data->keterangan, 1, 1);
            $no++;
        }
        $pdf->isFinished = true;
        $pdf->Output();
        exit;
    }
}
