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
        $data = [
            'nama_kebutuhan' => $this->request->getVar('nama_kebutuhan'),
            'jenis' => $this->request->getVar('jenis'),
            'jumlah' => $this->request->getVar('jumlah'),
            'satuan' => $this->request->getVar('satuan'),
            'kebutuhan' => $this->request->getVar('kebutuhan'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        $this->dasarModel->insertDasar($data);
        session()->setFlashdata('status', 'Data berhasil ditambahkan');
        return redirect()->to('admin/dasar');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Kebutuhan Dasar',
            'validation' => \Config\Services::validation(),
            'dasar' => $this->dasarModel->getDasarById($id)
        ];
        return view('dasar/edit', $data);
    }

    public function update($id)
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
            return redirect()->to('admin/dasar/edit/' . $this->request->getVar('id'))->withInput();
        }
        $data = [
            'nama_kebutuhan' => $this->request->getVar('nama_kebutuhan'),
            'jenis' => $this->request->getVar('jenis'),
            'jumlah' => $this->request->getVar('jumlah'),
            'satuan' => $this->request->getVar('satuan'),
            'kebutuhan' => $this->request->getVar('kebutuhan'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        $this->dasarModel->updateDasar($id, $data);
        session()->setFlashdata('status', 'Data berhasil diubah');
        return redirect()->to('admin/dasar');
    }

    public function delete($id)
    {
        $this->dasarModel->deleteDasar($id);
        session()->setFlashdata('status', 'Data berhasil dihapus');
        return redirect()->to('admin/dasar');
    }
}
