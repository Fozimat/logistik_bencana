<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table            = 'pesan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama', 'email', 'subjek', 'pesan', 'tgl_dikirim', 'status'];

    public function getPesan()
    {
        return $this->findAll();
    }

    public function insertPesan($data)
    {
        return $this->save($data);
    }

    public function deletePesan($id)
    {
        $dasar = $this->find($id);
        if (empty($dasar)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data dengan id: ' . $id . ' tidak ditemukan');
        }
        return $this->delete($id);
    }

    public function updateSeen($id)
    {
        $builder = $this->db->table('pesan');
        $builder->set('status', 1);
        $builder->where('id', $id);
        return $builder->update();
    }

    public function updateUnseen($id)
    {
        $builder = $this->db->table('pesan');
        $builder->set('status', 0);
        $builder->where('id', $id);
        return $builder->update();
    }
}
