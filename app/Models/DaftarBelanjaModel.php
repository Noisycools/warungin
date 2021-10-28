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
}
