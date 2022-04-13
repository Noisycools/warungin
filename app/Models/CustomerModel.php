<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table      = 'customer';
    protected $allowedFields = ['nama', 'alamat', 'email', 'no_tlp', 'username', 'password'];
    public function getCustomer($password = false)
    {
        if ($password == false) {
            return $this->findAll();
        }
        return $this->where(['password' => $password])->first();
    }
}