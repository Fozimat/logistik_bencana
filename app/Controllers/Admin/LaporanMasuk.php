<?php

namespace App\Controllers\Admin;

use App\Models\LaporModel;
use App\Models\FotoKejadianModel;
use App\Controllers\BaseController;

class LaporanMasuk extends BaseController
{
    protected $pesanModel;

    public function __construct()
    {
        $this->tanggapBencana = new LaporModel();
        $this->fotoKejadian = new FotoKejadianModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan Bencana',
            'tanggap_bencana' => $this->tanggapBencana->getLapor()
        ];
        return view('laporan_masuk/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Form Edit Foto Kejadian',
            'lapor' => $this->tanggapBencana->getLaporById($id),
            'foto' => $this->fotoKejadian->getFotoById($id)
        ];
        return view('laporan_masuk/detail', $data);
    }

    public function belumditanggapi($id)
    {
        $data = [
            'status' => 'Sedang ditanggapi'
        ];
        $this->tanggapBencana->updateLapor($id, $data);
        return redirect()->to('admin/laporanmasuk');
    }

    public function sedangditanggapi($id)
    {
        $data = [
            'status' => 'Selesai'
        ];
        $this->tanggapBencana->updateLapor($id, $data);
        return redirect()->to('admin/laporanmasuk');
    }

    public function selesai($id)
    {
        $data = [
            'status' => 'Belum ditanggapi'
        ];
        $this->tanggapBencana->updateLapor($id, $data);
        return redirect()->to('admin/laporanmasuk');
    }

    public function delete($id)
    {
        $this->tanggapBencana->deleteLapor($id);
        session()->setFlashdata('status', 'Data berhasil dihapus');
        return redirect()->to('admin/laporanmasuk');
    }
}
