<?php

namespace App\Controllers\Admin;

use App\Models\BeritaModel;
use App\Controllers\BaseController;
use App\Models\KategoriBeritaModel;

class PostBerita extends BaseController
{
    protected $postBerita;

    public function __construct()
    {
        $this->postBerita = new BeritaModel();
        $this->kategoriBeritaModel = new KategoriBeritaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Post Berita',
            'post_berita' => $this->postBerita->getBerita()
        ];
        return view('post_berita/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Post Berita',
            'kategori' => $this->kategoriBeritaModel->getKategori(),
            'validation' => \Config\Services::validation()
        ];
        return view('post_berita/create', $data);
    }

    public function store()
    {
        if (!$this->validate(
            [
                'judul' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Judul tidak boleh kosong'
                    ]
                ],
                'kategori_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kategori tidak boleh kosong'
                    ]
                ],
                'tanggal_post' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal tidak boleh kosong'
                    ]
                ],
                'post' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Post tidak boleh kosong'
                    ]
                ],
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
            return redirect()->to('admin/postberita/create')->withInput();
        }
        $gambar = $this->request->getFile('gambar');
        $namaGambar = time() . '_' . $gambar->getName();
        $gambar->move('upload/post_berita', $namaGambar);
        $data = [
            'kategori_id' => $this->request->getPost('kategori_id'),
            'tanggal_post' => $this->request->getPost('tanggal_post'),
            'judul' => $this->request->getPost('judul'),
            'slug' =>  url_title($this->request->getPost('judul'), '-', TRUE),
            'post' => nl2br($this->request->getPost('post')),
            'gambar' => $namaGambar,

        ];
        $this->postBerita->insertBerita($data);
        session()->setFlashdata('status', 'Postingan berhasil ditambahkan');
        return redirect()->to('admin/postberita');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Post Berita',
            'validation' => \Config\Services::validation(),
            'post_berita' => $this->postBerita->getBeritaById($id),
            'kategori' => $this->kategoriBeritaModel->getKategori(),
        ];
        return view('post_berita/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate(
            [
                'judul' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Judul tidak boleh kosong'
                    ]
                ],
                'kategori_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kategori tidak boleh kosong'
                    ]
                ],
                'tanggal_post' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tanggal tidak boleh kosong'
                    ]
                ],
                'post' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Post tidak boleh kosong'
                    ]
                ],
                'gambar' => [
                    'rules' => 'max_size[gambar,5120]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ]
            ]
        )) {
            return redirect()->to('admin/postberita/edit/' . $this->request->getVar('id'))->withInput();
        }
        $gambar = $this->request->getFile('gambar');
        if ($gambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambar_lama');
        } else {
            $namaGambar = time() . '_' . $gambar->getName();
            $gambar->move('upload/post_berita', $namaGambar);
            unlink('upload/post_berita/' . $this->request->getVar('gambar_lama'));
        }

        $data = [
            'kategori_id' => $this->request->getPost('kategori_id'),
            'tanggal_post' => $this->request->getPost('tanggal_post'),
            'judul' => $this->request->getPost('judul'),
            'slug' =>  url_title($this->request->getPost('judul'), '-', TRUE),
            'post' => nl2br($this->request->getPost('post')),
            'gambar' => $namaGambar,
        ];
        $this->postBerita->updateBerita($id, $data);
        session()->setFlashdata('status', 'Data berhasil diubah');
        return redirect()->to('admin/postberita');
    }

    public function delete($id)
    {
        $this->postBerita->deleteBerita($id);
        session()->setFlashdata('status', 'Postingan berhasil dihapus');
        return redirect()->to('admin/postberita');
    }
}
