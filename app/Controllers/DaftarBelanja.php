<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\DaftarBelanjaModel;

class DaftarBelanja extends BaseController
{
    protected $daftarBelanjaModel;

    public function __construct()
    {
        $this->daftarBelanjaModel = new DaftarBelanjaModel();
    }

    public function add()
    {
        $db = \Config\Database::connect();

        $slug = $this->request->getVar('slug');
        $data = $db->query("SELECT * FROM tabel_barang WHERE slug = '$slug' ");

        // this qty not programmed yet okayy
        $qty = $this->request->getVar('qty');

        $row   = $data->getRowArray();
        $nama_barang = $row['nama_barang'];
        $harga_barang = $row['harga_barang'];
        $img_barang = $row['foto_barang'];
        $harga_total = (int)$row['harga_barang'] * $qty;

        $db->query("INSERT INTO daftar_belanja(qty, nama_barang, harga_barang, harga_total, img_barang) VALUES('$qty', '$nama_barang', '$harga_barang', '$harga_total', '$img_barang')");

        return redirect()->to('/');
    }

    public function delete()
    {
        $db = \Config\Database::connect();

        $nama_barang = $this->request->getVar('nama_barang');
        $db->query("DELETE FROM daftar_belanja WHERE nama_barang = '$nama_barang' ");

        return redirect()->to('/pages/daftar_belanja');
    }

    public function checkout()
    {
        $daftar_belanja = $this->daftarBelanjaModel->findAll();
        $getTotal = $this->daftarBelanjaModel->getTotal();

        $data = [
            'title' => 'Checkout | WarungIn',
            'barang' => $daftar_belanja,
            'total' => $getTotal
        ];

        return view('pages/checkout', $data);
    }
}
