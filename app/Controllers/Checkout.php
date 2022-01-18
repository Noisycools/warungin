<?php

namespace App\Controllers;

use App\Models\BarangTransaksiModel;
use App\Models\CheckoutModel;
use App\Models\DaftarBelanjaModel;
use App\Models\HistoriTransaksiModel;

class Checkout extends BaseController
{
    protected $checkoutModel;
    protected $daftarBelanjaModel;
    protected $historiTransaksiModel;

    public function __construct()
    {
        $this->checkoutModel = new CheckoutModel();
        $this->daftarBelanjaModel = new DaftarBelanjaModel();
        $this->historiTransaksiModel = new HistoriTransaksiModel();
    }

    public function buatPesanan()
    {
        $username = user()->username;
        $daftar_belanja = $this->daftarBelanjaModel->getData($username);
        $getTotal = $this->daftarBelanjaModel->getTotal($username);
        $jumlahBarang = $this->request->getPost('jumlahBarang');

        $data = [
            'kode_transaksi' => $this->request->getPost('kodeTransaksi'),
            'username' => user()->username,
            'nama_penerima' => $this->request->getPost('namaPenerima'),
            'nama_warung' => $this->request->getPost('namaWarung'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('noHp'),
            'email' => $this->request->getPost('email'),
            'status' => 'unverified'
        ];
        $this->checkoutModel->add($data);

        $data2 = [];
        for ($i=0; $i < $jumlahBarang; $i++) { 
            $data2[] = array(
                'kode_transaksi' => $this->request->getPost('kodeTransaksi'),
                'username' => user()->username,
                'nama_barang' => $this->request->getPost('nama_barang' . $i),
                'qty' => $this->request->getPost('qty' . $i),
                'total_harga' => $this->request->getPost('totalHarga')
            );
        }
        $this->historiTransaksiModel->add($data2);

        $kodeTransaksi = $this->request->getPost('kodeTransaksi');
        $dataTransaksi = [
            'transaksi' => $this->checkoutModel->getData($kodeTransaksi)->getRow(),
            'barang' => $daftar_belanja,
            'total' => $getTotal
        ];

        return view('pages/template_pdf', $dataTransaksi);
    }
}
