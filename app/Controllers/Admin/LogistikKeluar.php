<?php

namespace App\Controllers\Admin;

use App\Models\PersediaanModel;
use App\Controllers\BaseController;
use App\Models\LogistikKeluarModel;

class LogistikKeluar extends BaseController
{
    public function __construct()
    {
        $this->logistikKeluarModel = new LogistikKeluarModel();
        $this->persediaanModel = new PersediaanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Logistik Keluar',
            'logistik_keluar' => $this->logistikKeluarModel->getLogistikKeluar()
        ];
        return view('logistik_keluar/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Logistik Keluar',
            'validation' => \Config\Services::validation(),
            'persediaan' => $this->persediaanModel->getPersediaan(),
            'total_barang' => $this->persediaanModel->getTotalBarang()
        ];
        return view('logistik_keluar/create', $data);
    }

    public function store()
    {
        $id_barang = $this->request->getVar('id_barang');
        $vol_unit = $this->request->getVar('vol_unit');

        $index = 0;
        $data = [];
        foreach ($id_barang as $id) {
            array_push($data, [
                'no_berita_acara' => $this->request->getVar('no_berita_acara'),
                'id_barang' => $id,
                'vol_unit' => $vol_unit[$index],
                'tgl_keluar' => $this->request->getVar('tgl_keluar'),
                'pihak_pertama' => $this->request->getVar('pihak_pertama'),
                'pihak_kedua' => $this->request->getVar('pihak_kedua'),
            ]);
            $id_barang =  $id;
            $persediaan = (int)$this->persediaanModel->getVolUnitPersediaan($id_barang)->vol_unit;
            $persediaan_baru = [
                'vol_unit' => $persediaan - $vol_unit[$index]
            ];
            $this->persediaanModel->updateVolUnit($id_barang, $persediaan_baru);
            $index++;
        }
        $this->logistikKeluarModel->insertLogistikKeluar($data);

        session()->setFlashdata('status', 'Data berhasil ditambahkan');
        return redirect()->to('admin/logistikkeluar');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Logistik Keluar',
            'validation' => \Config\Services::validation(),
            'persediaan' => $this->persediaanModel->getPersediaan(),
            'logistik_keluar' => $this->logistikKeluarModel->getLogistikKeluarById($id)
        ];
        return view('logistik_keluar/edit', $data);
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
                        'required' => 'Nama Barang tidak boleh kosong'
                    ]
                ],
                'tgl_keluar' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Keluar tidak boleh kosong'
                    ]
                ],
                'pihak_pertama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pihak Pertama tidak boleh kosong'
                    ]
                ],
                'pihak_kedua' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pihak Kedua tidak boleh kosong'
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
            return redirect()->to('admin/logistikkeluar/edit/' . $this->request->getVar('id'))->withInput();
        }
        $data = [
            'no_berita_acara' => $this->request->getVar('no_berita_acara'),
            'id_barang' => $this->request->getVar('id_barang'),
            'tgl_keluar' => $this->request->getVar('tgl_keluar'),
            'pihak_pertama' => $this->request->getVar('pihak_pertama'),
            'pihak_kedua' => $this->request->getVar('pihak_kedua'),
            'vol_unit' => $this->request->getVar('vol_unit'),
        ];

        $id_barang =  $this->request->getVar('id_barang');
        $persediaan = (int)$this->persediaanModel->getVolUnitPersediaan($id_barang)->vol_unit;
        $persediaan_lama = (int)$this->logistikKeluarModel->getLogistikKeluarById($id)->vol_unit;
        $edit_persediaan =  $data['vol_unit'];
        $persediaan_baru = [
            'vol_unit' => ($persediaan + $persediaan_lama) - $edit_persediaan
        ];
        $this->logistikKeluarModel->updateLogistikKeluar($id, $data);
        $this->persediaanModel->updateVolUnit($id_barang, $persediaan_baru);
        session()->setFlashdata('status', 'Data berhasil diubah');
        return redirect()->to('admin/logistikkeluar');
    }

    public function delete($id)
    {
        $id_barang =  $this->logistikKeluarModel->getLogistikKeluarById($id)->id_barang;
        $vol_unit = $this->logistikKeluarModel->getLogistikKeluarById($id)->vol_unit;
        $this->logistikKeluarModel->deleteLogistikKeluar($id);
        $persediaan = (int)$this->persediaanModel->getVolUnitPersediaan($id_barang)->vol_unit;
        $persediaan_baru = [
            'vol_unit' => $persediaan + $vol_unit
        ];
        $this->persediaanModel->updateVolUnit($id_barang, $persediaan_baru);
        session()->setFlashdata('status', 'Data berhasil dihapus');
        return redirect()->to('admin/logistikkeluar');
    }
}
