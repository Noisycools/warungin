<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'profile';

    public function getData($username = null)
    {
        if ($username == null) {
            return $this->findAll();
        } else {
            return $this->getWhere(['username' => $username]);
        }
    }

    public function addProfile($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateProfile($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->update($data);
    }
}
