<?php

namespace App\Models;

use CodeIgniter\Model;

class CheckoutModel extends Model
{
    protected $table = 'transaksi';
    protected $allowedFields = ['kode_transaksi', 'username', 'nama_penerima', 'nama_warung', 'alamat', 'no_hp', 'email', 'tgl_pembayaran', 'status', 'foto_struk'];
    protected $returnType    = '\App\Entities\Transaksi';
    protected $primaryKey = 'kode_transaksi';
    protected $useTimestamps = true;

    public function getData($kodeTransaksi = null)
    {
        if ($kodeTransaksi == null) {
            return $this->findAll();
        } else {
            return $this->getWhere(['kode_transaksi' => $kodeTransaksi]);
        }
    }

    public function getDataByUsername($username = null)
    {
        if ($username == null) {
            return $this->findAll();
        } else {
            return $this->getWhere(['username' => $username]);
        }
    }

    public function add($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }
}
