<?php

namespace App\Controllers\Admin;

use App\Models\PersediaanModel;
use App\Controllers\BaseController;

class Persediaan extends BaseController
{
    protected $persediaanModel;

    public function __construct()
    {
        $this->persediaanModel = new PersediaanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Persediaan',
            'persediaan' => $this->persediaanModel->getPersediaan()
        ];
        return view('persediaan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Persediaan',
            'validation' => \Config\Services::validation()
        ];
        return view('persediaan/create', $data);
    }

    public function store()
    {
        if (!$this->validate(
            [
                'nama_barang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Barang tidak boleh kosong'
                    ]
                ],
                'vol_unit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Vol/Unit tidak boleh kosong'
                    ]
                ],
                'satuan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Satuan tidak boleh kosong'
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
            return redirect()->to('admin/persediaan/create')->withInput();
        }
        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'vol_unit' => $this->request->getVar('vol_unit'),
            'satuan' => $this->request->getVar('satuan'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        $this->persediaanModel->insertPersediaan($data);
        session()->setFlashdata('status', 'Data berhasil ditambahkan');
        return redirect()->to('admin/persediaan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Persediaan',
            'validation' => \Config\Services::validation(),
            'persediaan' => $this->persediaanModel->getPersediaanById($id)
        ];
        return view('persediaan/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate(
            [
                'nama_barang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Barang tidak boleh kosong'
                    ]
                ],
                'vol_unit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Vol/Unit tidak boleh kosong'
                    ]
                ],
                'satuan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Satuan tidak boleh kosong'
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
            return redirect()->to('admin/persediaan/edit/' . $this->request->getVar('id'))->withInput();
        }
        $data = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'vol_unit' => $this->request->getVar('vol_unit'),
            'satuan' => $this->request->getVar('satuan'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        $this->persediaanModel->updatePersediaan($id, $data);
        session()->setFlashdata('status', 'Data berhasil diubah');
        return redirect()->to('admin/persediaan');
    }

    public function delete($id)
    {
        $this->persediaanModel->deletePersediaan($id);
        session()->setFlashdata('status', 'Data berhasil dihapus');
        return redirect()->to('admin/persediaan');
    }
}
