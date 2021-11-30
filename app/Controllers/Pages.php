<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\CheckoutModel;
use App\Models\DaftarBelanjaModel;
use App\Models\ProfileModel;
use App\Models\TransactionModel;

class Pages extends BaseController
{
    protected $barangModel;
    protected $daftarBelanjaModel;
    protected $profileModel;
    protected $checkoutModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->daftarBelanjaModel = new DaftarBelanjaModel();
        $this->profileModel = new ProfileModel();
        $this->checkoutModel = new CheckoutModel();
    }

    public function homepage()
    {
        return view('pages/homepage');
    }

    public function daftar_belanja()
    {
        $username = user()->username;
        $daftar_belanja = $this->daftarBelanjaModel->getData($username);
        $getTotal = $this->daftarBelanjaModel->getTotal($username);

        $data = [
            'title' => 'Daftar Belanja | WarungIn',
            'barang' => $daftar_belanja,
            'total' => $getTotal
        ];

        return view('pages/daftar_belanja', $data);
    }

    public function histori_transaksi()
    {
        $username = user()->username;
        $data = [
            'title'     => 'Histori Transaksi | WarungIn',
            'transaksi' => $this->checkoutModel->getDataByUsername($username)
        ];

        return view('pages/histori_transaksi', $data);
    }

    public function warungku()
    {
        return view('pages/warungku');
    }

    public function detail_barang($slug)
    {
        $data = [
            'title' => 'Detail Barang',
            'barang' => $this->barangModel->getBarang($slug),
        ];

        return view('pages/detail_barang', $data);
    }

    public function product()
    {
        $tabel_barang = $this->barangModel->findAll();
        $data = [
            'title' => 'Product | WarungIn',
            'barang' => $tabel_barang
        ];

        return view('pages/product', $data);
    }

    public function profile()
    {
        $profileModel = new ProfileModel();
        $username = user()->username;
        $profile = $profileModel->getProfile($username)->getRow();

        $data = [
            'title' => 'Profile | WarungIn',
            'profile' => $profile
        ];

        return view('pages/profile', $data);
    }

    public function kurir()
    {
        $data = [
            'title' => 'Verifikasi Pesanan | WarungIn Kurir',
        ];

        return view('pages/kurir', $data);
    }
}
