<?php

namespace App\Models;

use CodeIgniter\Model;

class PersediaanModel extends Model
{
    protected $table            = 'persediaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['jenis_barang', 'vol_unit', 'jumlah', 'satuan', 'keterangan'];

    public function getPersediaan()
    {
        return $this->findAll();
    }

    public function getPersediaanById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function insertPersediaan($data)
    {
        return $this->save($data);
    }

    public function updatePersediaan($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletePersediaan($id)
    {
        $dasar = $this->find($id);
        if (empty($dasar)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data dengan id: ' . $id . ' tidak ditemukan');
        }
        return $this->delete($id);
    }
}
