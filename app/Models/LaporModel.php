<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporModel extends Model
{
    protected $table            = 'lapor';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_user', 'tanggal_waktu_kejadian', 'jenis_bencana', 'lokasi_tempat_kejadian', 'tanggal_waktu_lapor', 'no_hp', 'keterangan', 'status'];

    public function getLapor()
    {
        return $this->findAll();
    }

    public function get5Lapor()
    {
        $builder = $this->db->table('lapor');
        return $builder->orderBy('tanggal_waktu_kejadian', 'DESC')->get(5)->getResult();
    }

    public function getLaporByUser($user)
    {
        return $this->where(['id_user' => $user])->findAll();
    }

    public function insertLapor($data)
    {
        return $this->save($data);
    }

    public function getLaporById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function updateLapor($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteLapor($id)
    {
        $lapor = $this->find($id);
        if (empty($lapor)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data dengan id: ' . $id . ' tidak ditemukan');
        }
        return $this->delete($id);
    }
}
