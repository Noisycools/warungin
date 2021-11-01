<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'kode_transaksi';
    protected $allowedFields = ['kode_transaksi', 'nama_penerima', 'nama_warung', 'alamat', 'no_hp', 'email'];
    public function getTransaksi($kode_transaksi = false)
    {
        if ($kode_transaksi == false) {
            return $this->findAll();
        }
        return $this->where(['kode_transaksi' => $kode_transaksi])->first();
    }
}
