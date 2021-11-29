<?php

namespace App\Models;

use CodeIgniter\Model;

class DasarModel extends Model
{
    protected $table            = 'dasar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_kebutuhan', 'jenis', 'jumlah', 'satuan', 'kebutuhan', 'keterangan'];

    public function getDasar()
    {
        return $this->findAll();
    }
}
