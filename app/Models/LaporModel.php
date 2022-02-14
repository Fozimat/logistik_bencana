<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporModel extends Model
{
    protected $table            = 'lapor';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_user', 'tanggal_waktu_kejadian', 'jenis_bencana', 'tanggal_waktu_lapor', 'no_hp', 'keterangan', 'status'];

    public function getLapor()
    {
        return $this->findAll();
    }

    public function insertLapor($data)
    {
        return $this->save($data);
    }
}
