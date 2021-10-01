<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Pages extends BaseController
{
    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function homepage()
    {
        return view('pages/homepage');
    }

    public function contact_us()
    {
        $data = [
            'title' => 'Hubungi Kami | WarungIn'
        ];
        return view('pages/contact_us', $data);
    }

    public function daftar_belanja()
    {
        return view('pages/daftar_belanja');
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
