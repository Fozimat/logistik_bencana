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
}
