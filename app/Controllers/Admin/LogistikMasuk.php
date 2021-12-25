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
            'persediaan' => $this->persediaanModel->getPersediaan(),
            'total_barang' => $this->persediaanModel->getTotalBarang()
        ];
        return view('logistik_masuk/create', $data);
    }

    public function store()
    {
        $id_barang = $this->request->getVar('id_barang');
        $vol_unit = $this->request->getVar('vol_unit');

        $index = 0;
        $data = [];
        foreach ($id_barang as $id) {
            array_push($data, [
                'id_barang' => $id,
                'vol_unit' => $vol_unit[$index],
                'tgl_masuk' => $this->request->getVar('tgl_masuk'),
            ]);
            $id_barang =  $id;
            $persediaan = (int)$this->persediaanModel->getVolUnitPersediaan($id_barang)->vol_unit;
            $persediaan_baru = [
                'vol_unit' => $persediaan + $vol_unit[$index]
            ];
            $this->persediaanModel->updateVolUnit($id_barang, $persediaan_baru);
            $index++;
        }
        $this->logistikMasukModel->insertLogistikMasuk($data);

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
                'id_barang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Barang tidak boleh kosong'
                    ]
                ],
                'tgl_masuk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Masuk tidak boleh kosong'
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
            return redirect()->to('admin/logistikmasuk/edit/' . $this->request->getVar('id'))->withInput();
        }
        $data = [
            'id_barang' => $this->request->getVar('id_barang'),
            'tgl_masuk' => $this->request->getVar('tgl_masuk'),
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
