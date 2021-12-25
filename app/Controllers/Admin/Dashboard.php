<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PersediaanModel;
use App\Models\LogistikMasukModel;
use App\Models\LogistikKeluarModel;
use App\Models\BeritaBarangMasukModel;
use App\Models\BeritaBarangKeluarModel;
use App\Models\InformasiKebencanaanModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
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
            'title' => 'Dashboard',
            'total_persediaan' =>  $this->persediaanModel->getCount(),
            'total_logistik_masuk' =>  $this->logistikMasukModel->getCount(),
            'total_logistik_keluar' =>  $this->logistikKeluarModel->getCount(),
            'total_bencana' =>  $this->informasiKebencanaanModel->getCount(),
            'informasi_kebencanaan' => $this->informasiKebencanaanModel->get5InformasiKebencanaan()
        ];
        return view('dashboard/index', $data);
    }
}
