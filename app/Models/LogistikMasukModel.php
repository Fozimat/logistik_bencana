<?php

namespace App\Models;

use CodeIgniter\Model;

class LogistikMasukModel extends Model
{
    protected $table            = 'logistik_masuk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_barang', 'no_berita_acara', 'tgl_masuk', 'sumber', 'vol_unit'];

    public function getLogistikMasuk()
    {
        return $this->db->table('logistik_masuk')
            ->select('logistik_masuk.id, no_berita_acara, persediaan.jenis_barang ,tgl_masuk, sumber, logistik_masuk.vol_unit, satuan, keterangan')
            ->join('persediaan', 'persediaan.id=logistik_masuk.id_barang')
            ->get()->getResultObject();
    }

    public function getCount()
    {
        $builder = $this->db->table('logistik_masuk');
        return $builder->countAllResults();
    }

    public function insertLogistikMasuk($data)
    {
        return $this->save($data);
    }

    public function getLogistikMasukById($id)
    {
        return $this->db->table('logistik_masuk')
            ->select('logistik_masuk.id, id_barang, no_berita_acara, persediaan.jenis_barang ,tgl_masuk, sumber, logistik_masuk.vol_unit, satuan, keterangan')
            ->join('persediaan', 'persediaan.id=logistik_masuk.id_barang')
            ->where('logistik_masuk.id', $id)
            ->get()->getRow();
    }

    public function updateLogistikMasuk($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteLogistikMasuk($id)
    {
        $dasar = $this->find($id);
        if (empty($dasar)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data dengan id: ' . $id . ' tidak ditemukan');
        }
        return $this->delete($id);
    }
}
