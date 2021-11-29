<?php

namespace App\Models;

use CodeIgniter\Model;

class InformasiKebencanaanModel extends Model
{
    protected $table            = 'informasi_kebencanaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['jenis_bencana', 'lokasi_tempat_kejadian', 'tgl_bencana', 'objek_terdampak', 'jumlah_korban_terdampak_laki', 'jumlah_koreban_terdampak_perempuan', 'tindakan', 'keterangan'];

    public function getInformasiKebencanaan()
    {
        return $this->findAll();
    }

    public function getInformasiKebencanaanById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function insertInformasiKebencanaan($data)
    {
        return $this->save($data);
    }

    public function updateInformasiKebencanaan($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteInformasiKebencanaan($id)
    {
        $dasar = $this->find($id);
        if (empty($dasar)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data dengan id: ' . $id . ' tidak ditemukan');
        }
        return $this->delete($id);
    }
}
