<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoKejadianModel extends Model
{
    protected $table            = 'foto_kejadian';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_lapor', 'foto'];

    public function insertFoto($data)
    {
        return $this->insert($data);
    }

    public function getFotoById($id)
    {
        return $this->where(['id_lapor' => $id])->findAll();
    }

    public function getFoto($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function updateFoto($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteFoto($id)
    {
        $foto = $this->find($id);
        unlink('upload/laporan_tanggap_bencana/' . $foto->foto);
        if (empty($foto)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data dengan id: ' . $id . ' tidak ditemukan');
        }
        return $this->delete($id);
    }
}
