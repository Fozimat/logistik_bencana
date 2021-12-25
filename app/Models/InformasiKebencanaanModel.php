<?php

namespace App\Models;

use CodeIgniter\Model;

class InformasiKebencanaanModel extends Model
{
    protected $table            = 'informasi_kebencanaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['jenis_bencana', 'lokasi_tempat_kejadian', 'tgl_bencana', 'korban_laki', 'korban_perempuan', 'usia_0_5', 'usia_6_20', 'usia_21_60', 'usia_61', 'ibu_hamil', 'meninggal', 'hilang', 'luka', 'mengungsi', 'jenis_prasarana', 'rusak_ringan', 'rusak_sedang', 'rusak_berat', 'keterangan'];

    public function getInformasiKebencanaan()
    {
        return $this->findAll();
    }

    public function get5InformasiKebencanaan()
    {
        $builder = $this->db->table('informasi_kebencanaan');
        return $builder->orderBy('tgl_bencana', 'DESC')->get(5)->getResult();
    }

    public function getCount()
    {
        $builder = $this->db->table('informasi_kebencanaan');
        return $builder->countAllResults();
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
