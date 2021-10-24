<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarBelanjaModel extends Model
{
    protected $table = 'daftar_belanja';

    public function getTotal()
    {
        return $this->db->query("SELECT SUM(harga_total) AS total_harga FROM daftar_belanja");
    }
}
