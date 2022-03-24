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
            ],
            'fotoPengiriman' => [
                'rules' => 'uploaded[fotoPengiriman]|is_image[fotoPengiriman]|mime_in[fotoPengiriman,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Upload foto Pengirimannya terlebih dahulu!',
                    'is_image' => 'File harus berupa image/foto!',
                    'mime_in' => 'File harus berupa image/foto!'
                ]
            ]
        ])) {
            return redirect()->to('/kurir')->withInput();
        }

        $fileFotoStruk = $this->request->getFile('fotoStruk');
        $fileFotoPengiriman = $this->request->getFile('fotoPengiriman');
        $namaFoto = $fileFotoStruk->getRandomName();
        $namaFoto2 = $fileFotoPengiriman->getRandomName();
        $fileFotoStruk->move('img');
        $fileFotoPengiriman->move('img');
        $namaFoto = $fileFotoStruk->getName();
        $namaFoto2 = $fileFotoPengiriman->getName();

        $this->transactionModel->verifikasi([
            'kodeTransaksi' => $this->request->getVar('kodeTransaksi'),
            'foto_struk' => $namaFoto,
            'foto_pengiriman' => $namaFoto2
        ]);
        session()->setFlashData('message', 'Data berhasil ditambahkan');

        return redirect()->to('pages/kurir');
    }
}
