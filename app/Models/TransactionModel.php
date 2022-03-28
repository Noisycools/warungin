<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'kode_transaksi';
    protected $allowedFields = ['kode_transaksi', 'username', 'nama_penerima', 'nama_warung', 'alamat', 'no_hp', 'email', 'status', 'foto_struk', 'foto_pengiriman'];


    public function getTransaksi($kode_transaksi = null)
    {
        if ($kode_transaksi == false) {
            return $this->findAll();
        }
        return $this->where(['kode_transaksi' => $kode_transaksi])->first();
    }

    public function add($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function verifikasi($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->set('foto_struk', $data['foto_struk'])->where('kode_transaksi', $data['kodeTransaksi'])->update();
    }

    public function pesanan_masuk()
    {
        return $this->db->query("SELECT DISTINCT transaksi.kode_transaksi, transaksi.username, transaksi.nama_warung, transaksi.tgl_pembayaran, barang_transaksi.total_harga, transaksi.status
        FROM transaksi INNER JOIN barang_transaksi 
        ON transaksi.kode_transaksi = barang_transaksi.kode_transaksi
        WHERE transaksi.status='Pending'
        ORDER BY transaksi.created_at DESC");
    }

    public function pesanan_proses()
    {
        return $this->db->query("SELECT DISTINCT transaksi.kode_transaksi, transaksi.username, transaksi.nama_warung, transaksi.tgl_pembayaran, barang_transaksi.total_harga, transaksi.status
        FROM transaksi INNER JOIN barang_transaksi 
        ON transaksi.kode_transaksi = barang_transaksi.kode_transaksi
        WHERE transaksi.status='Proses'
        ORDER BY transaksi.created_at DESC");
    }

    public function pesanan_selesai()
    {
        return $this->db->query("SELECT DISTINCT transaksi.kode_transaksi, transaksi.username, transaksi.nama_warung, transaksi.tgl_pembayaran, barang_transaksi.total_harga, transaksi.status
        FROM transaksi INNER JOIN barang_transaksi 
        ON transaksi.kode_transaksi = barang_transaksi.kode_transaksi
        WHERE transaksi.status='Selesai'
        ORDER BY transaksi.created_at DESC");
    }

    public function pesanan_dikirim()
    {
        return $this->db->query("SELECT DISTINCT transaksi.kode_transaksi, transaksi.username, transaksi.nama_warung, transaksi.tgl_pembayaran, barang_transaksi.total_harga, transaksi.status
        FROM transaksi INNER JOIN barang_transaksi 
        ON transaksi.kode_transaksi = barang_transaksi.kode_transaksi
        WHERE transaksi.status='Dikirim'
        ORDER BY transaksi.created_at DESC");
    }

    public function pesanan_diterima()
    {
        return $this->db->query("SELECT DISTINCT transaksi.kode_transaksi, transaksi.username, transaksi.nama_warung, transaksi.tgl_pembayaran, barang_transaksi.total_harga, transaksi.status
        FROM transaksi INNER JOIN barang_transaksi 
        ON transaksi.kode_transaksi = barang_transaksi.kode_transaksi
        WHERE transaksi.status='Diterima'
        ORDER BY transaksi.created_at DESC");
    }

    public function search($keyword)
    {
        return $this->table('transaksi')
            ->Like('kode_transaksi', $keyword)
            ->orLike('username', $keyword)
            ->orLike('nama_penerima', $keyword)
            ->orLike('nama_warung', $keyword)
            ->orLike('alamat', $keyword)
            ->orLike('no_hp', $keyword)
            ->orLike('email', $keyword)
            ->orLike('status', $keyword);
    }
}
