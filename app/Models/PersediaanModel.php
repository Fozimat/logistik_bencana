<?php

namespace App\Models;

use CodeIgniter\Model;

class PersediaanModel extends Model
{
    protected $table            = 'persediaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_barang', 'vol_unit', 'jumlah', 'satuan', 'keterangan'];

    public function getPersediaan()
    {
        return $this->findAll();
    }

    public function getPersediaanById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getCount()
    {
        $builder = $this->db->table('persediaan');
        return $builder->countAllResults();
    }

    public function insertPersediaan($data)
    {
        return $this->save($data);
    }

    public function updatePersediaan($id, $data)
    {
        return $this->update($id, $data);
    }

    public function updateVolUnit($id, $data)
    {
        return $this->update($id, $data);
    }

    public function getVolUnitPersediaan($id)
    {
        return $this->db->table($this->table)
            ->select('vol_unit')
            ->where('id', $id)->get()->getRow();
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
