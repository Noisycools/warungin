<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarBelanjaModel extends Model
{
    protected $table = 'daftar_belanja';

    public function getData($username = null)
    {
        if ($username == null) {
            return $this->findAll();
        } else {
            return $this->getWhere(['username' => $username]);
        }
    }

    public function ifBarangExist($namaBarang)
    {
        $builder = $this->db->table('daftar_belanja');
        $builder->select('nama_barang');
        $builder->where('nama_barang', $namaBarang);
        $query = $builder->get();
        if ($query->getRow() == false) {
            return false;
        } else {
            return true;
        }
    }

    public function ifOutOfStock($data2)
    {
        $builder = $this->db->table('tabel_barang');
        $builder->select('*');
        $builder->where($data2);
        $query = $builder->get();
        if ($query->getRow() == false) {
            return true;
        } else {
            return false;
        }
    }

    public function getTotal($username = null)
    {
        if ($username == null) {
            return $this->findAll();
        } else {
            return $this->db->query("SELECT SUM(harga_total) AS total_harga FROM daftar_belanja WHERE username='$username'");
        }
    }

    public function tambah($data)
    {
        $builder = $this->db->table('daftar_belanja');
        if ($this->ifBarangExist($data['nama_barang'])  == false) {
            return $builder->insert($data);
        } else {
            return $builder->increment('qty', $data['qty']);
        }
    }

    public function hapus($username)
    {
        return $this->db->query("DELETE FROM daftar_belanja WHERE username='$username'");
    }

    public function isDaftarBelanja()
    {
        $builder = $this->db->table('daftar_belanja');
        $builder->select('username');
        $builder->where('username', user()->username);
        $query = $builder->get();
        if ($query->getRow() == false) {
            return false;
        } else {
            return true;
        }
    }
}
