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

    public function getDasarById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function insertDasar($data)
    {
        return $this->save($data);
    }

    public function updateDasar($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteDasar($id)
    {
        $dasar = $this->find($id);
        if (empty($dasar)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data dengan id: ' . $id . ' tidak ditemukan');
        }
        return $this->delete($id);
    }
}
