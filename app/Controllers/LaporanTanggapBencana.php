<?php

namespace App\Controllers;

use App\Models\LaporModel;
use CodeIgniter\I18n\Time;
use App\Controllers\BaseController;

class LaporanTanggapBencana extends BaseController
{
    public function __construct()
    {
        $this->tanggapBencana = new LaporModel();
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
}
