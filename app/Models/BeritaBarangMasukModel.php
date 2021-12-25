<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaBarangMasukModel extends Model
{
    protected $table            = 'berita_acara_barang_masuk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['no_berita_acara', 'tgl_ba_masuk', 'gambar'];

    public function getBeritaBarangMasuk()
    {
        return $this->findAll();
    }

    public function getBeritaBarangMasukById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function insertBeritaBarangMasuk($data)
    {
        return $this->save($data);
    }

    public function updateBeritaBarangMasuk($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteBeritaBarangMasuk($id)
    {
        $barang_masuk = $this->find($id);
        unlink('upload/barang_masuk/' . $barang_masuk->gambar);
        if (empty($barang_masuk)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data dengan id: ' . $id . ' tidak ditemukan');
        }
        return $this->delete($id);
    }
}
