<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriBeritaModel extends Model
{
    protected $table            = 'kategori_berita';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['kategori'];

    public function getKategori()
    {
        return $this->findAll();
    }

    public function insertKategori($data)
    {
        return $this->save($data);
    }

    public function getKategoriById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function updateKategori($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteKategori($id)
    {
        $kategori = $this->find($id);
        if (empty($kategori)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data dengan id: ' . $id . ' tidak ditemukan');
        }
        return $this->delete($id);
    }
}
