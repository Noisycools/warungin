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

    public function jumlahtotal($tanggal)
    {
        return $this->db->query("SELECT SUM(transaksi.total_harga) as total FROM `transaksi`
        WHERE status = 'Selesai' AND tgl_pembayaran = '$tanggal'");
    }

    public function jumlahqty($tanggal)
    {
        return $this->db->query("SELECT SUM(barang_transaksi.qty) as total_qty FROM barang_transaksi 
        JOIN transaksi ON barang_transaksi.kode_transaksi = transaksi.kode_transaksi 
        WHERE transaksi.status = 'Selesai' 
        AND tgl_pembayaran = '$tanggal'");
    }

    public function lap_mingguan($tanggal1, $tanggal2)
    {
        return $this->db->query("SELECT * FROM `transaksi` JOIN `barang_transaksi` 
        ON transaksi.kode_transaksi = barang_transaksi.kode_transaksi 
        WHERE status = 'Selesai' AND created_at BETWEEN '$tanggal1' AND '$tanggal2'
        ORDER BY created_at ASC");
    }

    public function jumlahtotal1($tanggal1, $tanggal2)
    {
        return $this->db->query("SELECT SUM(transaksi.total_harga) as total FROM `transaksi`
        WHERE status = 'Selesai' AND created_at BETWEEN '$tanggal1' AND '$tanggal2'");
    }

    public function jumlahqty1($tanggal1, $tanggal2)
    {
        return $this->db->query("SELECT SUM(barang_transaksi.qty) as total_qty FROM barang_transaksi 
        JOIN transaksi ON barang_transaksi.kode_transaksi = transaksi.kode_transaksi 
        WHERE transaksi.status = 'Selesai' 
        AND transaksi.created_at BETWEEN '$tanggal1' AND '$tanggal2'");
    }

    public function lap_bulanan($bulan)
    {
        return $this->db->query("SELECT * FROM `transaksi` JOIN `barang_transaksi` 
        ON transaksi.kode_transaksi = barang_transaksi.kode_transaksi 
        WHERE transaksi.status = 'Selesai' AND tgl_pembayaran LIKE '%$bulan%' ");
        // return $this->table('transaksi')
        // ->join('barang_transaksi', 'transaksi.kode_transaksi = barang_transaksi.kode_transaksi')
        // ->where('transaksi.status', 'Selesai')
        // ->like('transaksi.tgl_pembayaran', $bulan, 'both');
    }

    public function jumlahtotal2($bulan)
    {
        return $this->db->query("SELECT SUM(transaksi.total_harga) as total FROM `transaksi`
        WHERE status = 'Selesai' AND tgl_pembayaran LIKE '%$bulan%'");
    }

    public function jumlahqty2($bulan)
    {
        return $this->db->query("SELECT SUM(barang_transaksi.qty) as total_qty FROM barang_transaksi 
        JOIN transaksi ON barang_transaksi.kode_transaksi = transaksi.kode_transaksi 
        WHERE transaksi.status = 'Selesai' 
        AND tgl_pembayaran LIKE '%$bulan%'");
    }

    public function lap_tahunan($tahun)
    {
        return $this->db->query("SELECT * FROM `transaksi` JOIN `barang_transaksi` 
        ON transaksi.kode_transaksi = barang_transaksi.kode_transaksi 
        WHERE transaksi.status = 'Selesai' AND created_at LIKE '%$tahun%' ");
        // return $this->table('transaksi')
        // ->join('barang_transaksi', 'transaksi.kode_transaksi = barang_transaksi.kode_transaksi')
        // ->where('transaksi.status', 'Selesai')
        // ->like('transaksi.tgl_pembayaran', $tahun, 'both');
    }

    public function jumlahtotal3($tahun)
    {
        return $this->db->query("SELECT SUM(transaksi.total_harga) as total FROM `transaksi`
        WHERE status = 'Selesai' AND created_at LIKE '%$tahun%'");
    }

    public function jumlahqty3($tahun)
    {
        return $this->db->query("SELECT SUM(barang_transaksi.qty) as total_qty FROM barang_transaksi 
        JOIN transaksi ON barang_transaksi.kode_transaksi = transaksi.kode_transaksi 
        WHERE transaksi.status = 'Selesai' 
        AND created_at LIKE '%$tahun%'");
    }
}
