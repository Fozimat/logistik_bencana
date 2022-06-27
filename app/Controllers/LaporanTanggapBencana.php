<?php

namespace App\Controllers;

use App\Models\LaporModel;
use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;
use App\Models\FotoKejadianModel;

class LaporanTanggapBencana extends BaseController
{
    public function __construct()
    {
        $this->tanggapBencana = new LaporModel();
        $this->fotoKejadian = new FotoKejadianModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan Tanggap Bencana',
            'tanggap_bencana' => $this->tanggapBencana->getLaporByUser(session()->get('user_id'))
        ];
        return view('laporan_tanggap_bencana/index', $data);
    }

    public function create()
    {
        // if ($this->session->get('roles') != 'PENGUNJUNG') {
        //     return redirect()->back();
        // }

        $data = [
            'title' => 'Form Tambah Laporan',
            'validation' => \Config\Services::validation()
        ];
        return view('laporan_tanggap_bencana/create', $data);
    }

    public function store()
    {
        if (!$this->validate(
            [
                'nik' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'NIK tidak boleh kosong'
                    ]
                ],
                'jenis_bencana' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Bencana tidak boleh kosong'
                    ]
                ],
                'tanggal_waktu_kejadian' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Waktu Kejadian tidak boleh kosong'
                    ]
                ],
                'no_hp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'No Hp tidak boleh kosong'
                    ]
                ],
                'lokasi_tempat_kejadian' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Lokasi Tempat Kejadian tidak boleh kosong'
                    ]
                ],
            ]
        )) {
            return redirect()->to('laporantanggapbencana/create')->withInput();
        }
        $data = [
            'id_user' => session()->get('user_id'),
            'nik' => $this->request->getVar('nik'),
            'jenis_bencana' => $this->request->getVar('jenis_bencana'),
            'lokasi_tempat_kejadian' => $this->request->getVar('lokasi_tempat_kejadian'),
            'tanggal_waktu_kejadian' => $this->request->getVar('tanggal_waktu_kejadian'),
            'latitude' => $this->request->getVar('lat'),
            'longitude' => $this->request->getVar('lng'),
            'tanggal_waktu_lapor' => Time::now(),
            'no_hp' => $this->request->getVar('no_hp'),
            'status' => 'Belum ditanggapi',
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        $this->tanggapBencana->insertLapor($data);
        $last_id = $this->tanggapBencana->getInsertID();
        session()->setFlashdata('status', 'Data berhasil ditambahkan');
        return redirect()->to('laporantanggapbencana/create_photo/' . $last_id);
    }

    public function create_photo($id)
    {
        $uri = service('uri');
        $data = [
            'title' => 'Form Tambah Foto Kejadian',
            'validation' => \Config\Services::validation(),
            'lapor' => $this->tanggapBencana->getLaporById($id),
            'foto' =>  $this->fotoKejadian->getFotoById($id),
            'segment' => $uri->getSegment('3')
        ];
        return view('laporan_tanggap_bencana/create_photo', $data);
    }

    public function store_photo()
    {
        if (!$this->validate(
            [
                'gambar' => [
                    'rules' => 'uploaded[gambar]|max_size[gambar,5120]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Gambar tidak boleh kosong',
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ]
            ]
        )) {
            return redirect()->to('laporantanggapbencana/create_photo/' . $this->request->getVar('id_lapor'))->withInput();
        }
        if ($this->request->getFileMultiple('gambar')) {
            foreach ($this->request->getFileMultiple('gambar') as $gambar) {
                $namaGambar = time() . '_' . $gambar->getName();
                $gambar->move('upload/laporan_tanggap_bencana', $namaGambar);
                $data = [
                    'id_lapor' => $this->request->getVar('id_lapor'),
                    'foto' => $namaGambar
                ];
                $this->fotoKejadian->insertFoto($data);
            }
        }
        session()->setFlashdata('status', 'Foto berhasil ditambahkan');
        $segment = $this->request->getVar('segment');
        return redirect()->to('laporantanggapbencana/create_photo/' . $segment);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Foto Laporan',
            'validation' => \Config\Services::validation(),
            'lapor' => $this->tanggapBencana->getLaporById($id)
        ];
        return view('laporan_tanggap_bencana/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate(
            [
                'nik' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'NIK tidak boleh kosong'
                    ]
                ],
                'jenis_bencana' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Bencana tidak boleh kosong'
                    ]
                ],
                'tanggal_waktu_kejadian' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal Waktu Kejadian tidak boleh kosong'
                    ]
                ],
                'no_hp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'No Hp tidak boleh kosong'
                    ]
                ],
                'lokasi_tempat_kejadian' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Lokasi Tempat Kejadian tidak boleh kosong'
                    ]
                ],
            ]
        )) {
            return redirect()->to('laporantanggapbencana/edit/' . $this->request->getVar('id'))->withInput();
        }
        $data = [
            'id_user' => session()->get('user_id'),
            'nik' => $this->request->getVar('nik'),
            'jenis_bencana' => $this->request->getVar('jenis_bencana'),
            'tanggal_waktu_kejadian' => $this->request->getVar('tanggal_waktu_kejadian'),
            'lokasi_tempat_kejadian' => $this->request->getVar('lokasi_tempat_kejadian'),
            'latitude' => $this->request->getVar('lat'),
            'longitude' => $this->request->getVar('lng'),
            'tanggal_waktu_lapor' => Time::now(),
            'no_hp' => $this->request->getVar('no_hp'),
            'status' => 'Belum ditanggapi',
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        $this->tanggapBencana->updateLapor($id, $data);
        session()->setFlashdata('status', 'Data berhasil diubah');
        return redirect()->to('laporantanggapbencana');
    }

    public function delete($id)
    {
        $this->tanggapBencana->deleteLapor($id);
        session()->setFlashdata('status', 'Data berhasil dihapus');
        return redirect()->to('laporantanggapbencana');
    }

    public function edit_photo($id)
    {
        $data = [
            'title' => 'Form Edit Foto Kejadian',
            'validation' => \Config\Services::validation(),
            'foto' => $this->fotoKejadian->getFoto($id)
        ];
        return view('laporan_tanggap_bencana/edit_photo', $data);
    }

    public function update_photo($id)
    {
        if (!$this->validate(
            [
                'gambar' => [
                    'rules' => 'uploaded[gambar]|max_size[gambar,5120]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Gambar tidak boleh kosong',
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ]
            ]
        )) {
            return redirect()->to('laporantanggapbencana/edit_photo/' . $this->request->getVar('id'))->withInput();
        }
        $gambar = $this->request->getFile('gambar');
        if ($gambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambar_lama');
        } else {
            $namaGambar = time() . '_' . $gambar->getName();
            $gambar->move('upload/laporan_tanggap_bencana', $namaGambar);
            unlink('upload/laporan_tanggap_bencana/' . $this->request->getVar('gambar_lama'));
        }

        $data = [
            'foto' => $namaGambar
        ];
        $this->fotoKejadian->updateFoto($id, $data);
        session()->setFlashdata('status', 'Foto berhasil diubah');
        return redirect()->to('laporantanggapbencana');
    }


    public function delete_photo($id)
    {
        $segment = $this->request->getVar('segment');
        $this->fotoKejadian->deleteFoto($id);
        session()->setFlashdata('status', 'Foto berhasil dihapus');
        return redirect()->to('laporantanggapbencana/create_photo/' . $segment);
    }
}
