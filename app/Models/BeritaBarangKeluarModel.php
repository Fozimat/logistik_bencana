<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaBarangKeluarModel extends Model
{
    protected $table            = 'berita_acara_barang_keluar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['no_berita_acara', 'tgl_ba_keluar', 'tujuan_bantuan', 'gambar'];

    public function getBeritaBarangKeluar()
    {
        return $this->findAll();
    }

    public function getBeritaBarangKeluarById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function insertBeritaBarangKeluar($data)
    {
        return $this->save($data);
    }

    public function updateBeritaBarangKeluar($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteBeritaBarangKeluar($id)
    {
        $barang_keluar = $this->find($id);
        unlink('upload/barang_keluar/' . $barang_keluar->gambar);
        if (empty($barang_keluar)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data dengan id: ' . $id . ' tidak ditemukan');
        }
        return $this->delete($id);
    }
}
