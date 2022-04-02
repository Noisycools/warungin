<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\DaftarBelanjaModel;
use App\Models\HistoriTransaksiModel;
use App\Models\ProfileModel;

class DaftarBelanja extends BaseController
{
    protected $daftarBelanjaModel;
    protected $profileModel;
    protected $historiTransaksiModel;

    public function __construct()
    {
        $this->daftarBelanjaModel = new DaftarBelanjaModel();
        $this->profileModel = new ProfileModel();
        $this->historiTransaksiModel = new HistoriTransaksiModel();
    }

    public function add()
    {
        $username = user()->username;
        $qty = $this->request->getVar('qty');
        $slug = $this->request->getVar('slug');
        $namaBarang = $this->request->getPost('namaBarang');
        $hargaBarang = $this->request->getPost('hargaBarang');
        $imgBarang = $this->request->getPost('imgBarang');
        $hargaTotal = $this->request->getPost('hargaTotal');

        $data = [
            'username' => $username,
            'qty' => $qty,
            'nama_barang' => $namaBarang,
            'harga_barang' => $hargaBarang,
            'harga_total' => $hargaTotal,
            'img_barang' => $imgBarang,
        ];

        $data2 = [
            'nama_barang' => $namaBarang,
            'stok' => 0
        ];

        if ($this->daftarBelanjaModel->ifOutOfStock($data2) == false) {
            return redirect()->to('/pages/detail_barang/' . $slug);
        }

        $this->daftarBelanjaModel->tambah($data);

        session()->setFlashdata('daftarBelanjaAdd', 'Barang berhasil ditambahkan!');

        return redirect()->to('/');
    }

    public function redirectBack()
    {
        
    }

    public function delete($namaBarang)
    {
        $db = \Config\Database::connect();
        // $namaBarang = $this->deleteVariable;

        // $nama_barang = $this->request->getVar('nama_barang');
        $db->query("DELETE FROM daftar_belanja WHERE nama_barang = '$namaBarang' ");

        return redirect()->to('/pages/daftar_belanja');
    }

    public function checkout()
    {
        $username = user()->username;
        $daftar_belanja = $this->daftarBelanjaModel->getData($username);
        $getTotal = $this->daftarBelanjaModel->getTotal($username);
        $getProfile = $this->profileModel->getProfile($username)->getRow();

        $data = [
            'title' => 'Checkout | WarungIn',
            'barang' => $daftar_belanja,
            'total' => $getTotal,
            'profile' => $getProfile
        ];

        if ($this->daftarBelanjaModel->isDaftarBelanja() == false) {
            return redirect()->to('/daftar_belanja');
        }

        return view('pages/checkout', $data);
    }
}
