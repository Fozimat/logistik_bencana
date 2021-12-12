<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesanModel;

class Kontak extends BaseController
{
    protected $pesanModel;

    public function __construct()
    {
        $this->pesanModel = new PesanModel();
    }

    public function index()
    {
        $data['title'] = 'Kontak';
        return view('profil/kontak', $data);
    }

    public function pesan()
    {
        $data = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'subjek' => $this->request->getVar('subjek'),
            'pesan' => $this->request->getVar('pesan'),
            'tgl_dikirim' => date('Y-m-d H:i:s'),
            'status' => 0
        ];
        $this->pesanModel->insertPesan($data);
        session()->setFlashdata('status', 'Pesan berhasil dikirim');
        return redirect()->to('kontak#contact');
    }
}
