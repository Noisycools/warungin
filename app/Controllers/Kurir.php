<?php

namespace App\Controllers;

use App\Models\TransactionModel;

class Kurir extends BaseController
{
    protected $transactionModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
    }

    public function verifikasi()
    {
        if (!$this->validate([
            'kodeTransaksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'fotoStruk' => [
                'rules' => 'uploaded[fotoStruk]|is_image[fotoStruk]|mime_in[fotoStruk,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Upload foto struknya terlebih dahulu!',
                    'is_image' => 'File harus berupa image/foto!',
                    'mime_in' => 'File harus berupa image/foto!' 
                ]
            ]
        ])) {
            return redirect()->to('/kurir')->withInput();
        }

        $fotoStruk = $this->request->getFile('fotoStruk');
        $namaFoto = $fotoStruk->getRandomName();
        $fotoStruk->move('img', $namaFoto);

        $data = [
            'foto_struk' => $namaFoto,
            'kodeTransaksi' => $this->request->getPost('kodeTransaksi')
        ];
        $this->transactionModel->verifikasi($data);

        return redirect()->to('pages/kurir');
    }
}
