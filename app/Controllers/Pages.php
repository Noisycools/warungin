<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\DaftarBelanjaModel;

class Pages extends BaseController
{
    protected $barangModel;
    protected $daftarBelanjaModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->daftarBelanjaModel = new DaftarBelanjaModel();
    }

    public function homepage()
    {
        return view('pages/homepage');
    }

    public function daftar_belanja()
    {
        $daftar_belanja = $this->daftarBelanjaModel->findAll();

        $data = [
            'title' => 'Daftar Belanja | Warungin',
            'barang' => $daftar_belanja
        ];

        return view('pages/daftar_belanja', $data);
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
}
