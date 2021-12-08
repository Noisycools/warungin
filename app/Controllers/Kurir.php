<?php

namespace App\Controllers;

class Kurir extends BaseController
{

    public function verifikasi()
    {
        if (!$this->validate([
            'kodeTransaksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'fotoStruk' => 'uploaded[fotoStruk]'
        ])) {
            return redirect()->to('/kurir')->withInput();
        }
    }
}
