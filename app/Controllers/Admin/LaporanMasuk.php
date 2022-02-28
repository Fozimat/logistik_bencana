<?php

namespace App\Controllers\Admin;

use App\Models\LaporModel;
use App\Models\PesanModel;
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
            'title' => 'Laporan Tanggap Bencana',
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

    public function update_status_belum_ditanggapi($id)
    {
        $data = [
            'status' => 'Sedang ditanggapi'
        ];
        if ($this->tanggapBencana->updateLapor($id, $data)) {
            echo json_encode([
                'success' => true,
                'status' => $data['status']
            ]);
            exit;
        } else {
            echo json_encode([
                'success' => false
            ]);
            exit;
        }
    }

    public function update_status_sedang_ditanggapi($id)
    {
        $data = [
            'status' => 'Selesai'
        ];
        if ($this->tanggapBencana->updateLapor($id, $data)) {
            echo json_encode([
                'success' => true,
                'status' => $data['status']
            ]);
            exit;
        } else {
            echo json_encode([
                'success' => false
            ]);
            exit;
        }
    }

    public function update_status_selesai($id)
    {
        $data = [
            'status' => 'Belum ditanggapi'
        ];
        if ($this->tanggapBencana->updateLapor($id, $data)) {
            echo json_encode([
                'success' => true,
                'status' => $data['status']
            ]);
            exit;
        } else {
            echo json_encode([
                'success' => false
            ]);
            exit;
        }
    }

    public function delete($id)
    {
        $this->tanggapBencana->deleteLapor($id);
        session()->setFlashdata('status', 'Data berhasil dihapus');
        return redirect()->to('admin/laporanmasuk');
    }
}
