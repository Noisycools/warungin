<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Warungin extends BaseController
{
    protected $barangModel;
    protected $usersModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $tabel_barang = $this->barangModel->findAll();
        $users = $this->usersModel->findAll();

        $data = [
            'title' => 'Warungin | Platform Penyetok Warung',
            'barang' => $tabel_barang,
            'users' => $users
        ];

        return view('Warungin/index', $data);
    }
}
