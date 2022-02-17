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
            'tanggap_bencana' => $this->tanggapBencana->getLapor()
        ];
        return view('laporan_tanggap_bencana/index', $data);
    }

    public function create()
    {
        if ($this->session->get('roles') != 'PENGUNJUNG') {
            return redirect()->back();
        }

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
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Keterangan tidak boleh kosong'
                    ]
                ],
            ]
        )) {
            return redirect()->to('laporantanggapbencana/create')->withInput();
        }
        $data = [
            'id_user' => session()->get('user_id'),
            'jenis_bencana' => $this->request->getVar('jenis_bencana'),
            'tanggal_waktu_kejadian' => $this->request->getVar('tanggal_waktu_kejadian'),
            'tanggal_waktu_lapor' => Time::now(),
            'no_hp' => $this->request->getVar('no_hp'),
            'status' => 'Belum ditanggapi',
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        $this->tanggapBencana->insertLapor($data);
        session()->setFlashdata('status', 'Data berhasil ditambahkan');
        return redirect()->to('laporantanggapbencana');
    }

    public function create_photo($id)
    {
        $data = [
            'title' => 'Form Tambah Foto Kejadian',
            'validation' => \Config\Services::validation(),
            'lapor' => $this->tanggapBencana->getLaporById($id)
        ];
        // dd($data['lapor']);
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
        return redirect()->to('laporantanggapbencana');
    }
}
