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

    public function getTotal($username = null)
    {
        if ($username == null) {
            return $this->findAll();
        } else {
            return $this->db->query("SELECT SUM(harga_total) AS total_harga FROM daftar_belanja WHERE username='$username'");
        }
    }

    public function hapus()
    {
        $username = user()->username;
        return $this->db->query("DELETE FROM daftar_belanja WHERE username='$username'");
    }

    public function isDaftarBelanja()
    {
        $builder = $this->db->table('daftar_belanja');
        $builder->select('username');
        $builder->where('username', user()->username);
        $query = $builder->get();
        if ($query->getRow() == false)
        {
            return false;
        } else {
            return true;
        }
    }
}
