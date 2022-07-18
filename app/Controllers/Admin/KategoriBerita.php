<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriBeritaModel;

class KategoriBerita extends BaseController
{
    protected $kategoriBeritaModel;

    public function __construct()
    {
        $this->kategoriBeritaModel = new KategoriBeritaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kategori Berita',
            'kategori_berita' => $this->kategoriBeritaModel->getKategori()
        ];
        return view('kategori_berita/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Informasi Kebencanaan',
            'validation' => \Config\Services::validation()
        ];
        return view('kategori_berita/create', $data);
    }

    public function store()
    {
        if (!$this->validate(
            [
                'kategori' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kategori tidak boleh kosong'
                    ]
                ]
            ]
        )) {
            return redirect()->to('admin/kategoriberita/create')->withInput();
        }
        $data = [
            'kategori' => $this->request->getVar('kategori')
        ];
        $this->kategoriBeritaModel->insertKategori($data);
        session()->setFlashdata('status', 'Kategori berhasil ditambahkan');
        return redirect()->to('admin/kategoriberita');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Kategori Berita',
            'validation' => \Config\Services::validation(),
            'kategori_berita' => $this->kategoriBeritaModel->getKategoriById($id)
        ];
        return view('kategori_berita/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate(
            [
                'kategori' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kategori tidak boleh kosong'
                    ]
                ]
            ]
        )) {
            return redirect()->to('admin/kategoriberita/create')->withInput();
        }
        $data = [
            'kategori' => $this->request->getVar('kategori')
        ];
        $this->kategoriBeritaModel->updateKategori($id, $data);
        session()->setFlashdata('status', 'Kategori berhasil diubah');
        return redirect()->to('admin/kategoriberita');
    }

    public function delete($id)
    {
        $this->kategoriBeritaModel->deleteKategori($id);
        session()->setFlashdata('status', 'Kategori berhasil dihapus');
        return redirect()->to('admin/kategoriberita');
    }
}
