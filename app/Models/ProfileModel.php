<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'id_profile';
    protected $allowedFields = ['nama', 'nama_warung', 'alamat', 'no_hp', 'email'];

    public function getProfile($username = null)
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
        $builder->where(['nama' => $data['nama']]);
        return $builder->update($data);
    }

    public function search($keyword)
    {
        return $this->table('profilel')
            ->like('nama', $keyword)
            ->orLike('nama_warung', $keyword)
            ->orLike('alamat', $keyword)
            ->orLike('no_hp', $keyword)
            ->orLike('email', $keyword);
    }
}
