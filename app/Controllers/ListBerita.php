<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\KategoriBeritaModel;


class ListBerita extends BaseController
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
            'title' => 'List Berita',
            'post_berita' => $this->postBerita->getBerita()
        ];
        return view('berita/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'List Berita',
            'post_berita' => $this->postBerita->getBeritaBySlug($slug),
            'kategori' => $this->kategoriBeritaModel->getKategori(),
        ];
        return view('berita/detail', $data);
    }
}
