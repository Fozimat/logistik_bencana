<?php

namespace App\Controllers\Admin;

use App\Models\DasarModel;
use App\Controllers\BaseController;

class Dasar extends BaseController
{
    protected $dasarModel;

    public function __construct()
    {
        $this->dasarModel = new DasarModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kebutuhan Dasar',
            'dasar' => $this->dasarModel->getDasar()
        ];
        return view('dasar/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Kebutuhan Dasar',
            'validation' => \Config\Services::validation()
        ];
        return view('dasar/create', $data);
    }

    public function store()
    {
        if (!$this->validate(
            [
                'nama_kebutuhan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama tidak boleh kosong'
                    ]
                ],
                'jenis' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis tidak boleh kosong'
                    ]
                ],
                'jumlah' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah tidak boleh kosong'
                    ]
                ],
                'satuan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Satuan tidak boleh kosong'
                    ]
                ],
                'kebutuhan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kebutuhan tidak boleh kosong'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Keterangan tidak boleh kosong'
                    ]
                ],
            ]
        )) {
            return redirect()->to('admin/dasar/create')->withInput();
        }

        $this->dasarModel->save(
            [
                'nama_kebutuhan' => $this->request->getVar('nama_kebutuhan'),
                'jenis' => $this->request->getVar('jenis'),
                'jumlah' => $this->request->getVar('jumlah'),
                'satuan' => $this->request->getVar('satuan'),
                'kebutuhan' => $this->request->getVar('kebutuhan'),
                'keterangan' => $this->request->getVar('keterangan'),
            ]
        );
        session()->setFlashdata('status', 'Data berhasil ditambahkan');
        return redirect()->to('admin/dasar');
    }
}
