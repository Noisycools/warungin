<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $allowedFields = ['email', 'username', 'password_hash'];
    public function getUsers($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getID($username = false)
    {
        if ($username == false) {
            return $this->findAll();
        }
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('username', $username);
        return $builder->get();
    }
}
