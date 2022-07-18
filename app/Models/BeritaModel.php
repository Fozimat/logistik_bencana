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
        return $this->findAll();
    }

    public function insertBerita($data)
    {
        return $this->save($data);
    }

    public function getBeritaById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function updateBerita($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteBerita($id)
    {
        $kategori = $this->find($id);
        if (empty($kategori)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data dengan id: ' . $id . ' tidak ditemukan');
        }
        return $this->delete($id);
    }
}
