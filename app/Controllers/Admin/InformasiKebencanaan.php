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
                'korban_laki' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Korban Terdampak Laki-laki tidak boleh kosong'
                    ]
                ],
                'korban_perempuan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Korban Terdampak Perempuan tidak boleh kosong'
                    ]
                ],
                'usia_0_5' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Usia tidak boleh kosong'
                    ]
                ],
                'usia_6_20' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Usia tidak boleh kosong'
                    ]
                ],
                'usia_21_60' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Usia tidak boleh kosong'
                    ]
                ],
                'usia_61' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Usia tidak boleh kosong'
                    ]
                ],
                'ibu_hamil' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'meninggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'hilang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'luka' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'mengungsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'jenis_prasarana' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Prasarana tidak boleh kosong'
                    ]
                ],
                'rusak_ringan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'rusak_sedang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'rusak_berat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
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
            'korban_laki' => $this->request->getVar('korban_laki'),
            'korban_perempuan' => $this->request->getVar('korban_perempuan'),
            'usia_0_5' => $this->request->getVar('usia_0_5'),
            'usia_6_20' => $this->request->getVar('usia_6_20'),
            'usia_21_60' => $this->request->getVar('usia_21_60'),
            'usia_61' => $this->request->getVar('usia_61'),
            'ibu_hamil' => $this->request->getVar('ibu_hamil'),
            'meninggal' => $this->request->getVar('meninggal'),
            'hilang' => $this->request->getVar('hilang'),
            'luka' => $this->request->getVar('luka'),
            'mengungsi' => $this->request->getVar('mengungsi'),
            'jenis_prasarana' => $this->request->getVar('jenis_prasarana'),
            'rusak_ringan' => $this->request->getVar('rusak_ringan'),
            'rusak_sedang' => $this->request->getVar('rusak_sedang'),
            'rusak_berat' => $this->request->getVar('rusak_berat'),
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
                'korban_laki' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Korban Terdampak Laki-laki tidak boleh kosong'
                    ]
                ],
                'korban_perempuan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jumlah Korban Terdampak Perempuan tidak boleh kosong'
                    ]
                ],
                'usia_0_5' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Usia tidak boleh kosong'
                    ]
                ],
                'usia_6_20' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Usia tidak boleh kosong'
                    ]
                ],
                'usia_21_60' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Usia tidak boleh kosong'
                    ]
                ],
                'usia_61' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Usia tidak boleh kosong'
                    ]
                ],
                'ibu_hamil' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'meninggal' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'hilang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'luka' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'mengungsi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'jenis_prasarana' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Prasarana tidak boleh kosong'
                    ]
                ],
                'rusak_ringan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'rusak_sedang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
                    ]
                ],
                'rusak_berat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kolom tidak boleh kosong'
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
            'korban_laki' => $this->request->getVar('korban_laki'),
            'korban_perempuan' => $this->request->getVar('korban_perempuan'),
            'usia_0_5' => $this->request->getVar('usia_0_5'),
            'usia_6_20' => $this->request->getVar('usia_6_20'),
            'usia_21_60' => $this->request->getVar('usia_21_60'),
            'usia_61' => $this->request->getVar('usia_61'),
            'ibu_hamil' => $this->request->getVar('ibu_hamil'),
            'meninggal' => $this->request->getVar('meninggal'),
            'hilang' => $this->request->getVar('hilang'),
            'luka' => $this->request->getVar('luka'),
            'mengungsi' => $this->request->getVar('mengungsi'),
            'jenis_prasarana' => $this->request->getVar('jenis_prasarana'),
            'rusak_ringan' => $this->request->getVar('rusak_ringan'),
            'rusak_sedang' => $this->request->getVar('rusak_sedang'),
            'rusak_berat' => $this->request->getVar('rusak_berat'),
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
