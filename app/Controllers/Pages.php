<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\CheckoutModel;
use App\Models\DaftarBelanjaModel;
use App\Models\HistoriTransaksiModel;
use App\Models\ProfileModel;
use App\Models\TransactionModel;

class Pages extends BaseController
{
    protected $barangModel;
    protected $daftarBelanjaModel;
    protected $profileModel;
    protected $checkoutModel;
    protected $historiTransaksiModel;
    protected $transaksiModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->daftarBelanjaModel = new DaftarBelanjaModel();
        $this->profileModel = new ProfileModel();
        $this->checkoutModel = new CheckoutModel();
        $this->historiTransaksiModel = new HistoriTransaksiModel();
        $this->transaksiModel = new TransactionModel();
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
            'alt_title' => 'daftarBelanja',
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
            'alt_title' => 'historiTransaksi',
            'transaksi' => $this->checkoutModel->getDataByUsername($username)
        ];

        return view('pages/histori_transaksi', $data);
    }

    public function detail_transaksi($kodeTransaksi)
    {
        $data = [
            'title'     => 'Detail Transaksi | WarungIn',
            'transaksi' => $this->checkoutModel->getData($kodeTransaksi)->getRow()
        ];

        return view('pages/detail_transaksi', $data);
    }

    public function struk()
    {
        $kodeTransaksi = $this->request->getPost('kodeTransaksi');
        $data = [
            'transaksi' => $this->checkoutModel->getData($kodeTransaksi)->getRow(),
            'barangTransaksi' => $this->historiTransaksiModel->getData($kodeTransaksi),
            'barangTransaksi2' => $this->historiTransaksiModel->getData($kodeTransaksi)->getRow()
        ];

        return view('pages/struk', $data);
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
            'alt_title' => 'profile',
            'profile' => $profile
        ];

        return view('pages/profile', $data);
    }

    public function kurir()
    {
        $data = [
            'title' => 'Pesanan Hari Ini | WarungIn Kurir',
            'alt_title' => 'kurir',
            'validation' => \Config\Services::validation(),
            'transaksi' => $this->checkoutModel->getDataByDate(),
            'status' => $this->checkoutModel->getDataByStatus('Selesai')
        ];

        return view('pages/kurir', $data);
    }

    public function kurir_verif()
    {
        $data = [
            'title' => 'Verifikasi Pesanan | WarungIn Kurir',
            'validation' => \Config\Services::validation(),
        ];

        return view('pages/kurir_verif', $data);
    }
}
