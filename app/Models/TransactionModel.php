<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'kode_transaksi';
    protected $allowedFields = ['kode_transaksi', 'username', 'nama_penerima', 'nama_warung', 'alamat', 'no_hp', 'email', 'status', 'foto_pengiriman'];


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
        return $builder->set(['foto_pengiriman' => $data['foto_pengiriman'], 'status' => 'Selesai'])->where('kode_transaksi', $data['kodeTransaksi'])->update();
    }

    public function pesanan_masuk()
    {
        return $this->db->query("SELECT * FROM transaksi WHERE status='Pending'
        ORDER BY waktu_created_at ASC");
    }

    public function pesanan_proses()
    {
        return $this->db->query("SELECT * FROM transaksi WHERE status='Diproses'
        ORDER BY waktu_created_at ASC");
    }

    public function pesanan_selesai()
    {
        return $this->db->query("SELECT * FROM transaksi WHERE status='Selesai'
        ORDER BY waktu_created_at ASC");
    }

    public function pesanan_dikirim()
    {
        return $this->db->query("SELECT * FROM transaksi WHERE status='Dikirim'
        ORDER BY waktu_created_at ASC");
    }

    public function pesanan_diterima()
    {
        return $this->db->query("SELECT * FROM transaksi WHERE status='Diterima'
        ORDER BY waktu_created_at DESC");
    }

    public function info_pesanan()
    {
        return $this->db->query("SELECT * FROM transaksi JOIN barang_transaksi 
        ON transaksi.kode_transaksi=barang_transaksi.kode_transaksi");
    }

    public function search($keyword)
    {
        return $this->table('transaksi')
            ->Like('kode_transaksi', $keyword)
            ->orLike('username', $keyword)
            ->orLike('nama_warung', $keyword)
            ->orLike('tgl_pembayaran', $keyword)
            ->orLike('status', $keyword);
    }
}