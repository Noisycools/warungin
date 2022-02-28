<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriTransaksiModel extends Model
{
    protected $table = 'barang_transaksi';
    protected $primaryKey = 'id';

    public function getData($kodeTransaksi = null)
    {
        if ($kodeTransaksi == null) {
            return $this->findAll();
        } else {
            return $this->getWhere(['kode_transaksi' => $kodeTransaksi]);
        }
    }

    public function add($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insertBatch($data);
    }
}