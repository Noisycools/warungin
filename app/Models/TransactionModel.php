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
        return $builder->set(['foto_pengiriman' => $data['foto_pengiriman'], 'status' => 'Perlu Diverifikasi'])->where('kode_transaksi', $data['kodeTransaksi'])->update();
    }

    public function verifikasi_customer($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->set(['status' => 'Diterima'])->where('kode_transaksi', $data['kodeTransaksi'])->update();
    }

    public function pesanan_masuk($value)
    {
        $results = $this->where('status', 'Pending')->orderBy('created_at', 'asc')->paginate($value);
        return $results;
    }

    public function pesanan_proses($value)
    {
        $results = $this->where('status', 'Diproses')->orderBy('created_at', 'asc')->paginate($value);
        return $results;
    }

    public function pesanan_perlu_diverifikasi($value)
    {
        $results = $this->where('status', 'Perlu Diverifikasi')->orderBy('created_at', 'asc')->paginate($value);
        return $results;
    }

    public function pesanan_dikirim($value)
    {
        $results = $this->where('status', 'Dikirim')->orderBy('created_at', 'asc')->paginate($value);
        return $results;
    }

    public function pesanan_diterima($value)
    {
        $results = $this->where('status', 'Diterima')->orderBy('created_at', 'asc')->paginate($value);
        return $results;
    }

    public function jumlah_pesanan()
    {
        return $this->db->query("SELECT COUNT(kode_transaksi) as total FROM `transaksi`;");
    }

    public function pendapatan()
    {
        return $this->db->query("SELECT SUM(total_harga) as total FROM `transaksi`;");
    }

    public function info_pesanan()
    {
        return $this->db->query("SELECT * FROM transaksi JOIN barang_transaksi 
        ON transaksi.kode_transaksi=barang_transaksi.kode_transaksi");
    }

    public function info_barang($kode_transaksi)
    {
        return $this->db->query("SELECT * FROM transaksi JOIN barang_transaksi 
        ON transaksi.kode_transaksi=barang_transaksi.kode_transaksi WHERE transaksi.kode_transaksi=$kode_transaksi;");
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