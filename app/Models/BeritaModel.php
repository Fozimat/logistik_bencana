<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table            = 'berita';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['kategori_id', 'tanggal_post', 'judul', 'slug', 'post', 'gambar'];

    public function getBerita()
    {
        return $this->db->table('berita')
            ->select('berita.id, kategori_berita.kategori, judul, tanggal_post, slug ,post, gambar')
            ->join('kategori_berita', 'kategori_berita.id=berita.kategori_id')
            ->get()->getResultObject();
    }

    public function insertBerita($data)
    {
        return $this->save($data);
    }

    public function getBeritaById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getBeritaBySlug($slug)
    {
        return $this->where(['slug' => $slug])->first();
    }

    public function updateBerita($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteBerita($id)
    {
        $post = $this->find($id);
        unlink('upload/post_berita/' . $post->gambar);
        if (empty($post)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data dengan id: ' . $id . ' tidak ditemukan');
        }
        return $this->delete($id);
    }
}
