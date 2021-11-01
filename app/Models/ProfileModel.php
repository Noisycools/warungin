<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'id_profile';
    protected $allowedFields = ['username', 'nama', 'nama_warung', 'alamat', 'no_hp', 'email'];
    public function getProfile($username = false)
    {
        if ($username == false) {
            return $this->findAll();
        }
        return $this->where(['username' => $username])->first();
    }
}
