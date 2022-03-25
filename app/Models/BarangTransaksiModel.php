<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangTransaksiModel extends Model
{
    protected $table      = 'barang_transaksi';
    protected $allowedFields = ['username', 'kode_transaksi', 'nama_barang', 'qty', 'harga_barang', 'total_barang'];

    public function getBarang($kode_transaksi = false)
    {
        if ($kode_transaksi == false) {
            return $this->findAll();
        }
        return $this->where(['kode_transaksi' => $kode_transaksi])->first();
    }

    public function search($keyword)
    {
        return $this->table('barang_transaksi')->like('nama_barang', $keyword);
    }
}
