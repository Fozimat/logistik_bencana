<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\InformasiKebencanaanModel;

class InformasiKebencanaan extends BaseController
{
    public function __construct()
    {
        $this->informasiKebencanaanModel = new InformasiKebencanaanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Informasi Kebencanaan',
            'informasi_kebencanaan' => $this->informasiKebencanaanModel->getInformasiKebencanaan()
        ];
        return view('informasi_kebencanaan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Informasi Kebencanaan',
            'validation' => \Config\Services::validation()
        ];
        return view('informasi_kebencanaan/create', $data);
    }

    public function store()
    {
        if (!$this->validate(
            [
                'jenis_bencana' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Bencana tidak boleh kosong'
                    ]
                ],
                'lokasi_tempat_kejadian' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Lokasi/Tempat Kejadian tidak boleh kosong'
                    ]
                ],
                'tgl_bencana' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Bencana tidak boleh kosong'
                    ]
                ],
                'objek_terdampak' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Objek Terdampak tidak boleh kosong'
                    ]
                ],
                'jumlah_korban_terdampak_laki' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Korban Terdampak Laki-laki tidak boleh kosong'
                    ]
                ],
                'jumlah_korban_terdampak_perempuan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Korban Terdampak Perempuan tidak boleh kosong'
                    ]
                ],
                'tindakan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tindakan tidak boleh kosong'
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
            return redirect()->to('admin/informasikebencanaan/create')->withInput();
        }
        $data = [
            'jenis_bencana' => $this->request->getVar('jenis_bencana'),
            'lokasi_tempat_kejadian' => $this->request->getVar('lokasi_tempat_kejadian'),
            'tgl_bencana' => $this->request->getVar('tgl_bencana'),
            'objek_terdampak' => $this->request->getVar('objek_terdampak'),
            'jumlah_korban_terdampak_laki' => $this->request->getVar('jumlah_korban_terdampak_laki'),
            'jumlah_korban_terdampak_perempuan' => $this->request->getVar('jumlah_korban_terdampak_perempuan'),
            'tindakan' => $this->request->getVar('tindakan'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        $this->informasiKebencanaanModel->insertInformasiKebencanaan($data);
        session()->setFlashdata('status', 'Data berhasil ditambahkan');
        return redirect()->to('admin/informasikebencanaan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Informasi Kebencanaan',
            'validation' => \Config\Services::validation(),
            'informasi_kebencanaan' => $this->informasiKebencanaanModel->getInformasiKebencanaanById($id)
        ];
        return view('informasi_kebencanaan/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate(
            [
                'jenis_bencana' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Bencana tidak boleh kosong'
                    ]
                ],
                'lokasi_tempat_kejadian' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Lokasi/Tempat Kejadian tidak boleh kosong'
                    ]
                ],
                'tgl_bencana' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Bencana tidak boleh kosong'
                    ]
                ],
                'objek_terdampak' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Objek Terdampak tidak boleh kosong'
                    ]
                ],
                'jumlah_korban_terdampak_laki' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Korban Terdampak Laki-laki tidak boleh kosong'
                    ]
                ],
                'jumlah_korban_terdampak_perempuan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Korban Terdampak Perempuan tidak boleh kosong'
                    ]
                ],
                'tindakan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tindakan tidak boleh kosong'
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
            return redirect()->to('admin/informasikebencanaan/edit/' . $this->request->getVar('id'))->withInput();
        }
        $data = [
            'jenis_bencana' => $this->request->getVar('jenis_bencana'),
            'lokasi_tempat_kejadian' => $this->request->getVar('lokasi_tempat_kejadian'),
            'tgl_bencana' => $this->request->getVar('tgl_bencana'),
            'objek_terdampak' => $this->request->getVar('objek_terdampak'),
            'jumlah_korban_terdampak_laki' => $this->request->getVar('jumlah_korban_terdampak_laki'),
            'jumlah_korban_terdampak_perempuan' => $this->request->getVar('jumlah_korban_terdampak_perempuan'),
            'tindakan' => $this->request->getVar('tindakan'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        $this->informasiKebencanaanModel->updateInformasiKebencanaan($id, $data);
        session()->setFlashdata('status', 'Data berhasil diubah');
        return redirect()->to('admin/informasikebencanaan');
    }

    public function delete($id)
    {
        $this->informasiKebencanaanModel->deleteInformasiKebencanaan($id);
        session()->setFlashdata('status', 'Data berhasil dihapus');
        return redirect()->to('admin/informasikebencanaan');
    }
}
