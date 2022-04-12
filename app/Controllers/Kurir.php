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

    public function verifikasi($kode_transaksi)
    {
        if ($this->request->getPost('kodeTransaksi2') != $this->request->getVar('kode_transaksi')) {
            session()->setFlashData('message', 'Kode Transaksi harus sama!');
            return redirect()->to('/pages/detail_transaksi/' . $kode_transaksi);
        } else {
            $fileFotoPengiriman = $this->request->getFile('fotoPengiriman');
            $namaFoto2 = $fileFotoPengiriman->getRandomName();
            $fileFotoPengiriman->move('img');
            $namaFoto2 = $fileFotoPengiriman->getName();

            $this->transactionModel->verifikasi([
                'kodeTransaksi' => $this->request->getVar('kode_transaksi'),
                'foto_pengiriman' => $namaFoto2
            ]);
            session()->setFlashData('verified', 'Data berhasil diserahkan ke Admin untuk diverifikasi');

            return redirect()->to('/')->withInput();
        }
    }

    public function verifikasi_customer($kode_transaksi)
    {
        if ($this->request->getPost('kodeTransaksi2') != $this->request->getVar('kode_transaksi')) {
            session()->setFlashData('message', 'Kode Transaksi harus sama!');
            return redirect()->to('/pages/detail_transaksi/' . $kode_transaksi);
        } else {
            $this->transactionModel->verifikasi_customer([
                'kodeTransaksi' => $this->request->getVar('kode_transaksi'),
            ]);

            return redirect()->to('/histori_transaksi')->withInput();
        }
    }
}
