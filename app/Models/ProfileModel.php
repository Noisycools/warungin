<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'profile';

    public function getData()
    {
        // $db = \Config\Database::connect();
        // $builder = $db->table($this->table);
        // $query = $builder->get();
        return $this->db->query("SELECT * FROM profile");
    }
}