<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaBarangKeluarModel;

class BeritaBarangKeluar extends BaseController
{
    protected $beritaBarangKeluarModel;

    public function __construct()
    {
        $this->beritaBarangKeluarModel = new BeritaBarangKeluarModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Berita Acara Barang Keluar',
            'barang_keluar' => $this->beritaBarangKeluarModel->getBeritaBarangKeluar()
        ];
        return view('barang_keluar/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Berita Acara Barang Keluar',
            'validation' => \Config\Services::validation()
        ];
        return view('barang_keluar/create', $data);
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
                'tgl_ba_keluar' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal berita acara tidak boleh kosong'
                    ]
                ],
                'pihak_pertama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pihak pertama tidak boleh kosong'
                    ]
                ],
                'pihak_kedua' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pihak kedua tidak boleh kosong'
                    ]
                ],
                'gambar' => [
                    'rules' => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Gambar tidak boleh kosong',
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ]
            ]
        )) {
            return redirect()->to('admin/beritabarangkeluar/create')->withInput();
        }
        $gambar = $this->request->getFile('gambar');
        $namaGambar = time() . '_' . $gambar->getName();
        $gambar->move('upload/barang_keluar', $namaGambar);
        $data = [
            'no_berita_acara' => $this->request->getVar('no_berita_acara'),
            'tgl_ba_keluar' => $this->request->getVar('tgl_ba_keluar'),
            'pihak_pertama' => $this->request->getVar('pihak_pertama'),
            'pihak_kedua' => $this->request->getVar('pihak_kedua'),
            'gambar' => $namaGambar
        ];
        $this->beritaBarangKeluarModel->insertBeritaBarangKeluar($data);
        session()->setFlashdata('status', 'Data berhasil ditambahkan');
        return redirect()->to('admin/beritabarangkeluar');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Berita Acara Barang Keluar',
            'validation' => \Config\Services::validation(),
            'barang_keluar' => $this->beritaBarangKeluarModel->getBeritaBarangKeluarById($id)
        ];
        return view('barang_keluar/edit', $data);
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
                'tgl_ba_keluar' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal berita acara tidak boleh kosong'
                    ]
                ],
                'pihak_pertama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pihak pertama tidak boleh kosong'
                    ]
                ],
                'pihak_kedua' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pihak kedua tidak boleh kosong'
                    ]
                ],
                'gambar' => [
                    'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ]
            ]
        )) {
            return redirect()->to('admin/beritabarangkeluar/edit/' . $this->request->getVar('id'))->withInput();
        }
        $gambar = $this->request->getFile('gambar');
        if ($gambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambar_lama');
        } else {
            $namaGambar = time() . '_' . $gambar->getName();
            $gambar->move('upload/barang_keluar', $namaGambar);
            unlink('upload/barang_keluar/' . $this->request->getVar('gambar_lama'));
        }

        $data = [
            'no_berita_acara' => $this->request->getVar('no_berita_acara'),
            'tgl_ba_keluar' => $this->request->getVar('tgl_ba_keluar'),
            'pihak_pertama' => $this->request->getVar('pihak_pertama'),
            'pihak_kedua' => $this->request->getVar('pihak_kedua'),
            'gambar' => $namaGambar
        ];
        $this->beritaBarangKeluarModel->update($id, $data);
        session()->setFlashdata('status', 'Data berhasil diubah');
        return redirect()->to('admin/beritabarangkeluar');
    }

    public function delete($id)
    {
        $this->beritaBarangKeluarModel->deleteBeritaBarangKeluar($id);
        session()->setFlashdata('status', 'Data berhasil dihapus');
        return redirect()->to('admin/beritabarangkeluar');
    }
}
