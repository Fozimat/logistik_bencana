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
}
