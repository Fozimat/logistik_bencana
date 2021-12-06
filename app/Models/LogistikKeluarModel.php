<?php

namespace App\Models;

use CodeIgniter\Model;

class LogistikKeluarModel extends Model
{
    protected $table            = 'logistik_keluar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_barang', 'no_berita_acara', 'tgl_keluar', 'tujuan', 'vol_unit'];

    public function getLogistikKeluar()
    {
        return $this->db->table('logistik_keluar')
            ->select('logistik_keluar.id, no_berita_acara, persediaan.jenis_barang ,tgl_keluar, tujuan, logistik_keluar.vol_unit, satuan, keterangan')
            ->join('persediaan', 'persediaan.id=logistik_keluar.id_barang')
            ->get()->getResultObject();
    }

    public function insertLogistikKeluar($data)
    {
        return $this->save($data);
    }

    public function getLogistikKeluarById($id)
    {
        return $this->db->table('logistik_keluar')
            ->select('logistik_keluar.id, id_barang, no_berita_acara, persediaan.jenis_barang ,tgl_keluar, tujuan, logistik_keluar.vol_unit, satuan, keterangan')
            ->join('persediaan', 'persediaan.id=logistik_keluar.id_barang')
            ->where('logistik_keluar.id', $id)
            ->get()->getRow();
    }

    public function updateLogistikKeluar($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteLogistikKeluar($id)
    {
        $dasar = $this->find($id);
        if (empty($dasar)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data dengan id: ' . $id . ' tidak ditemukan');
        }
        return $this->delete($id);
    }
}