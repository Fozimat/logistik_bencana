<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaBarangMasukModel;

class BeritaBarangMasuk extends BaseController
{
    protected $beritaBarangMasukModel;

    public function __construct()
    {
        $this->beritaBarangMasukModel = new BeritaBarangMasukModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Berita Acara Barang Masuk',
            'barang_masuk' => $this->beritaBarangMasukModel->getBeritaBarangMasuk()
        ];
        return view('barang_masuk/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Berita Acara Barang Masuk',
            'validation' => \Config\Services::validation()
        ];
        return view('barang_masuk/create', $data);
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
                'tgl_ba_masuk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal berita acara tidak boleh kosong'
                    ]
                ],
                'sumber_bantuan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Sumber bantuan tidak boleh kosong'
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
            return redirect()->to('admin/beritabarangmasuk/create')->withInput();
        }
        $gambar = $this->request->getFile('gambar');
        $namaGambar = time() . '_' . $gambar->getName();
        $gambar->move('upload/barang_masuk', $namaGambar);
        $data = [
            'no_berita_acara' => $this->request->getVar('no_berita_acara'),
            'tgl_ba_masuk' => $this->request->getVar('tgl_ba_masuk'),
            'sumber_bantuan' => $this->request->getVar('sumber_bantuan'),
            'gambar' => $namaGambar
        ];
        $this->beritaBarangMasukModel->insertBeritaBarangMasuk($data);
        session()->setFlashdata('status', 'Data berhasil ditambahkan');
        return redirect()->to('admin/beritabarangmasuk');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Berita Acara Barang Masuk',
            'validation' => \Config\Services::validation(),
            'barang_masuk' => $this->beritaBarangMasukModel->getBeritaBarangMasukById($id)
        ];
        return view('barang_masuk/edit', $data);
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
                'tgl_ba_masuk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal berita acara tidak boleh kosong'
                    ]
                ],
                'sumber_bantuan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Sumber bantuan tidak boleh kosong'
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
            return redirect()->to('admin/beritabarangmasuk/edit/' . $this->request->getVar('id'))->withInput();
        }
        $gambar = $this->request->getFile('gambar');
        if ($gambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambar_lama');
        } else {
            $namaGambar = time() . '_' . $gambar->getName();
            $gambar->move('upload/barang_masuk', $namaGambar);
            unlink('upload/barang_masuk/' . $this->request->getVar('gambar_lama'));
        }

        $data = [
            'no_berita_acara' => $this->request->getVar('no_berita_acara'),
            'tgl_ba_masuk' => $this->request->getVar('tgl_ba_masuk'),
            'sumber_bantuan' => $this->request->getVar('sumber_bantuan'),
            'gambar' => $namaGambar
        ];
        $this->beritaBarangMasukModel->update($id, $data);
        session()->setFlashdata('status', 'Data berhasil diubah');
        return redirect()->to('admin/beritabarangmasuk');
    }

    public function delete($id)
    {
        $this->beritaBarangMasukModel->deleteBeritaBarangMasuk($id);
        session()->setFlashdata('status', 'Data berhasil dihapus');
        return redirect()->to('admin/beritabarangmasuk');
    }
}
