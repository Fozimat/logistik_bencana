<?php

namespace App\Controllers\Admin;

use App\Models\PesanModel;
use App\Controllers\BaseController;

class Pesan extends BaseController
{
    protected $pesanModel;

    public function __construct()
    {
        $this->pesanModel = new PesanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Pesan',
            'pesan' => $this->pesanModel->getPesan()
        ];
        return view('pesan/index', $data);
    }

    public function seen($id)
    {
        $this->pesanModel->updateSeen($id);
        return redirect()->to('admin/pesan');
    }

    public function unseen($id)
    {
        $this->pesanModel->updateUnseen($id);
        return redirect()->to('admin/pesan');
    }

    public function delete($id)
    {
        $this->pesanModel->deletePesan($id);
        session()->setFlashdata('status', 'Pesan berhasil dihapus');
        return redirect()->to('admin/pesan');
    }
}
