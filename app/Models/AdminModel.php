<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'transaksi, barang_transaksi';
    protected $primaryKey = 'kode_transaksi';

    public function lap_harian($tanggal)
    {
        return $this->db->query("SELECT * FROM `transaksi` JOIN `barang_transaksi` 
        ON transaksi.kode_transaksi = barang_transaksi.kode_transaksi 
        WHERE transaksi.status = 'Selesai' AND transaksi.tgl_pembayaran = '$tanggal'");
    }

    public function jumlah($tanggal)
    {
        return $this->db->query("SELECT SUM(transaksi.total_harga) as total FROM `transaksi`
        WHERE status = 'Selesai' AND tgl_pembayaran = '$tanggal'");
    }
}
