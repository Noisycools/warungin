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
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where('kode_transaksi', $kodeTransaksi);
            return $builder->get();
        }
    }

    public function add($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insertBatch($data);
    }
}