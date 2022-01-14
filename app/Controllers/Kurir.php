<?php

namespace App\Controllers;

class Kurir extends BaseController
{

    public function verifikasi()
    {

        $fotoStruk = $this->request->getFile('fotoStruk');
        $namaFoto = $fotoStruk->getRandomName();
        $fotoStruk->move('img', $namaFoto);

        if (!$this->validate([
            'kodeTransaksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'fotoStruk' => [
                'rules' => 'uploaded[fotoStruk]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Upload foto struknya terlebih dahulu!',
                    'is_image' => 'File harus berupa image/foto!',
                    'mime_in' => 'File harus berupa image/foto!' 
                ]
            ]
        ])) {
            return redirect()->to('/kurir')->withInput();
        }

        $data = [
            
        ];
    }
}
