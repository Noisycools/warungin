<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\CheckoutModel;
use App\Models\DaftarBelanjaModel;
use App\Models\HistoriTransaksiModel;
use App\Models\ProfileModel;
use App\Models\TransactionModel;
use App\Models\UsersModel;
use CodeIgniter\I18n\Time;

class Pages extends BaseController
{
    protected $barangModel;
    protected $daftarBelanjaModel;
    protected $profileModel;
    protected $checkoutModel;
    protected $historiTransaksiModel;
    protected $transaksiModel;
    protected $usersModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->daftarBelanjaModel = new DaftarBelanjaModel();
        $this->profileModel = new ProfileModel();
        $this->checkoutModel = new CheckoutModel();
        $this->historiTransaksiModel = new HistoriTransaksiModel();
        $this->transaksiModel = new TransactionModel();
        $this->usersModel = new UsersModel();
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
        $getTotal2 = $this->daftarBelanjaModel->getTotal($username)->getResult();
        $getProfile = $this->profileModel->getProfile($username)->getRow();

        $data = [
            'title' => 'Daftar Belanja | WarungIn',
            'alt_title' => 'daftarBelanja',
            'barang' => $daftar_belanja,
            'total' => $getTotal,
            'total2' => $getTotal2,
            'profile' => $getProfile
        ];

        return view('pages/new_daftar_belanja', $data);
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
            'transaksi' => $this->checkoutModel->getData($kodeTransaksi)->getRowArray(),
            'validation' => \Config\Services::validation()
        ];

        if (!$this->validate([
            'kode_transaksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tolong masukkan Kode Transaksi!'
                ]
            ],
            'fotoPengiriman' => [
                'rules' => 'uploaded[fotoPengiriman]|is_image[fotoPengiriman]|mime_in[fotoPengiriman,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Upload gambar terlebih dahulu!',
                    'is_image' => 'File hanya berupa gambar!',
                    'mime_in' => 'File hanya berupa gambar!'
                ]
            ]
        ])) {
            return view('pages/detail_transaksi', $data);
        }
    }

    public function detail_histori_transaksi($kodeTransaksi)
    {
        $data = [
            'title'     => 'Detail Transaksi | WarungIn',
            'alt_title' => 'detailHistoriTransaksi',
            'transaksi' => $this->checkoutModel->getData($kodeTransaksi)->getRowArray()
        ];

        return view('pages/detail_histori_transaksi', $data);
    }

    public function struk($kodeTransaksi)
    {
        $data = [
            'transaksi' => $this->checkoutModel->getData($kodeTransaksi)->getRowArray(),
            'barangTransaksi' => $this->historiTransaksiModel->getData($kodeTransaksi),
            'barangTransaksi2' => $this->historiTransaksiModel->getData($kodeTransaksi)->getRowArray()
        ];

        return view('pages/struk', $data);
    }

    public function warungku()
    {
        return view('pages/warungku');
    }

    public function detail_barang($slug)
    {
        $username = user()->username;
        if ($this->profileModel->getProfile($username)->getRow() == null) {
            $profileModel = new ProfileModel();
            $username = user()->username;
            $usersID = $this->usersModel->getID($username)->getRow();
            $profile = $profileModel->getProfile($username)->getRow();

            $data = [
                'title' => 'Profile | WarungIn',
                'alt_title' => 'profile',
                'profile' => $profile,
                'usersID' => $usersID
            ];

            return view('pages/profile', $data);
        }
        $data = [
            'title' => 'Detail Barang',
            'alt_title' => 'detail-barang',
            'barang' => $this->barangModel->getBarang($slug),
            'profile' => $this->profileModel->getProfile($username)->getRow()
        ];
        return view('pages/detail_barang', $data);
    }

    public function product_list()
    {
        $keyword = $this->request->getVar('keyword');
        if($keyword) {
            $barang = $this->barangModel->search($keyword);
        } else {
            $barang = $this->barangModel;
        }

        $username = user()->username;

        $data = [
            'title' => 'Product | WarungIn',
            'alt_title' => 'product-list',
            // 'barang' => $this->barangModel->findAll(),
            'barang' => $barang->paginate(8, 'tabel_barang'),
            'pager' => $this->barangModel->pager,
            'countAll' => $this->barangModel->getAll(),
            'profile' => $this->profileModel->getProfile($username)->getRow()
        ];

        return view('pages/product_list', $data);
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
        $usersID = $this->usersModel->getID($username)->getRow();
        $profile = $profileModel->getProfile($username)->getRow();

        $data = [
            'title' => 'Profile | WarungIn',
            'alt_title' => 'profile',
            'profile' => $profile,
            'usersID' => $usersID
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
