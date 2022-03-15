<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'kode_transaksi';
    protected $allowedFields = ['kode_transaksi', 'username', 'nama_penerima', 'nama_warung', 'alamat', 'no_hp', 'email', 'status', 'foto_struk'];

    public function getTransaksi($kode_transaksi = false)
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

    public function search($keyword)
    {
        return $this->table('transaksi')
            ->like('kode_transaksi', $keyword)
            ->orLike('username', $keyword)
            ->orLike('nama_penerima', $keyword)
            ->orLike('nama_warung', $keyword)
            ->orLike('alamat', $keyword)
            ->orLike('no_hp', $keyword)
            ->orLike('email', $keyword);
    }
}
