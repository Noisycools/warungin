<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriTransaksiModel extends Model
{
    protected $table = 'barang_transaksi';
    protected $primaryKey = 'id';

    public function add($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insertBatch($data);
    }
}