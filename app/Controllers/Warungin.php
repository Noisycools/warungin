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
        $tabel_barang = $this->barangModel->findAll();

        $data = [
            'title' => 'Warungin | Platform Penyetok Warung',
            'barang' => $tabel_barang
        ];

        return view('Warungin/index', $data);
    }
}
