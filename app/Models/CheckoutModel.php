<?php

namespace App\Models;

use CodeIgniter\Model;

class CheckoutModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'kode_transaksi';

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
        return $builder->insert($data);
    }
}
