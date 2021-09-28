<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Warungin extends BaseController
{
    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        //$tabel_barang = $this->barangModel->findAll();

        $data = [
            'title' => 'Warungin',
            'barang' => $this->barangModel->getBarang()
        ];

        return view('Warungin/index', $data);
    }

    public function homepage() 
    {
        return view('Warungin/homepage');
    }

    public function contact_us()
    {
        return view('Warungin/contact_us');
    }

    public function daftar_belanja()
    {
        return view('Warungin/daftar_belanja');
    }

    public function warungku()
    {
        return view('Warungin/warungku');
    }
}
