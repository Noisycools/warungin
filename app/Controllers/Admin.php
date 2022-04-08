<?php

namespace App\Controllers;


use App\Models\TransactionModel;
use App\Models\BarangTransaksiModel;
use App\Models\AdminModel;
use CodeIgniter\I18n\Time;

class Admin extends BaseController
{
    protected $transaksiModel;
    protected $barangTransaksiModel;
    public function __construct()
    {
        $this->transaksiModel = new TransactionModel();
        $this->barangTransaksiModel = new BarangTransaksiModel();
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        $data = ['title' => "Admin | Dashboard"];
        return view('admin/index', $data);
    }

    public function lap_harian()
    {
        $myTime = Time::now('Asia/Jakarta');
        $date = $myTime->toLocalizedString('d MMM yyyy');
        $tanggal0 = $this->request->getPost('tanggal');
        $tanggal = date('d M Y', strtotime($tanggal0));
        // dd($tanggal);
        $data = [
            'title' => "Admin | Dashboard",
            'tanggal' => $tanggal,
            'date' => $date,
            'transaksi' => $this->adminModel->lap_harian($tanggal),
            'jumlah' => $this->adminModel->jumlah($tanggal)
        ];
        return view('admin/lap_harian', $data);
    }

    public function lap_mingguan()
    {
        $data = ['title' => "Admin | Dashboard"];
        return view('admin/', $data);
    }

    public function lap_bulanan()
    {
        $data = ['title' => "Admin | Dashboard"];
        return view('admin/', $data);
    }

    public function lap_tahunan()
    {
        $data = ['title' => "Admin | Dashboard"];
        return view('admin/', $data);
    }
}
