<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailModel extends Model
{
    protected $table      = 'contact_us';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'ID', 'email', 'nomor_kontak', 'pesan'];

    public function getEmail($ID = false)
    {
        if ($ID == false) {
            return $this->findAll();
        }
        return $this->where(['ID' => $ID])->first();
    }
}
