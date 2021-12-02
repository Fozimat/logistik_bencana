<?php

namespace App\Controllers\Admin;

use App\Models\PersediaanModel;
use App\Models\LogistikMasukModel;
use App\Controllers\BaseController;

class LogistikMasuk extends BaseController
{
    protected $persediaanModel;

    public function __construct()
    {
        $this->logistikMasukModel = new LogistikMasukModel();
        $this->persediaanModel = new PersediaanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Logistik Masuk',
            'logistik_masuk' => $this->logistikMasukModel->getLogistikMasuk()
        ];
        return view('logistik_masuk/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Logistik Masuk',
            'validation' => \Config\Services::validation(),
            'persediaan' => $this->persediaanModel->getPersediaan()
        ];
        return view('logistik_masuk/create', $data);
    }

    public function store()
    {
        if (!$this->validate(
            [
                'no_berita_acara' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Berita Acara tidak boleh kosong'
                    ]
                ],
                'id_barang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Barang tidak boleh kosong'
                    ]
                ],
                'tgl_masuk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Masuk tidak boleh kosong'
                    ]
                ],
                'sumber' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Sumber tidak boleh kosong'
                    ]
                ],
                'vol_unit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Vol/Unit tidak boleh kosong'
                    ]
                ],
            ]
        )) {
            return redirect()->to('admin/logistikmasuk/create')->withInput();
        }

        $data = [
            'no_berita_acara' => $this->request->getVar('no_berita_acara'),
            'id_barang' => $this->request->getVar('id_barang'),
            'tgl_masuk' => $this->request->getVar('tgl_masuk'),
            'sumber' => $this->request->getVar('sumber'),
            'vol_unit' => $this->request->getVar('vol_unit'),
        ];
        $this->logistikMasukModel->insertLogistikMasuk($data);

        $id_barang =  $this->request->getVar('id_barang');
        $persediaan = (int)$this->persediaanModel->getVolUnitPersediaan($id_barang)->vol_unit;
        $persediaan_baru = [
            'vol_unit' => $persediaan + $data['vol_unit']
        ];

        $this->persediaanModel->updateVolUnit($id_barang, $persediaan_baru);
        session()->setFlashdata('status', 'Data berhasil ditambahkan');
        return redirect()->to('admin/logistikmasuk');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Logistik Masuk',
            'validation' => \Config\Services::validation(),
            'persediaan' => $this->persediaanModel->getPersediaan(),
            'logistik_masuk' => $this->logistikMasukModel->getLogistikMasukById($id)
        ];
        return view('logistik_masuk/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate(
            [
                'no_berita_acara' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Berita Acara tidak boleh kosong'
                    ]
                ],
                'id_barang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Barang tidak boleh kosong'
                    ]
                ],
                'tgl_masuk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Masuk tidak boleh kosong'
                    ]
                ],
                'sumber' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Sumber tidak boleh kosong'
                    ]
                ],
                'vol_unit' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Vol/Unit tidak boleh kosong'
                    ]
                ],
            ]
        )) {
            return redirect()->to('admin/logistikmasuk/create')->withInput();
        }
        $data = [
            'no_berita_acara' => $this->request->getVar('no_berita_acara'),
            'id_barang' => $this->request->getVar('id_barang'),
            'tgl_masuk' => $this->request->getVar('tgl_masuk'),
            'sumber' => $this->request->getVar('sumber'),
            'vol_unit' => $this->request->getVar('vol_unit'),
        ];

        $id_barang =  $this->request->getVar('id_barang');
        $persediaan = (int)$this->persediaanModel->getVolUnitPersediaan($id_barang)->vol_unit;
        $persediaan_lama = (int)$this->logistikMasukModel->getLogistikMasukById($id)->vol_unit;
        $edit_persediaan =  $data['vol_unit'];
        $persediaan_baru = [
            'vol_unit' => ($persediaan - $persediaan_lama) + $edit_persediaan
        ];
        $this->logistikMasukModel->updateLogistikMasuk($id, $data);
        $this->persediaanModel->updateVolUnit($id_barang, $persediaan_baru);
        session()->setFlashdata('status', 'Data berhasil diubah');
        return redirect()->to('admin/logistikmasuk');
    }

    public function delete($id)
    {
        $id_barang =  $this->logistikMasukModel->getLogistikMasukById($id)->id_barang;
        $vol_unit = $this->logistikMasukModel->getLogistikMasukById($id)->vol_unit;
        $this->logistikMasukModel->deleteLogistikMasuk($id);
        $persediaan = (int)$this->persediaanModel->getVolUnitPersediaan($id_barang)->vol_unit;
        $persediaan_baru = [
            'vol_unit' => $persediaan - $vol_unit
        ];
        $this->persediaanModel->updateVolUnit($id_barang, $persediaan_baru);
        session()->setFlashdata('status', 'Data berhasil dihapus');
        return redirect()->to('admin/logistikmasuk');
    }
}
