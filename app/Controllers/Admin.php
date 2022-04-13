<?php

namespace App\Controllers;


use App\Models\TransactionModel;
use App\Models\BarangTransaksiModel;
use App\Models\BarangModel;
use App\Models\AdminModel;
use App\Models\ProfileModel;
use CodeIgniter\I18n\Time;

class Admin extends BaseController
{
    protected $transaksiModel;
    protected $barangTransaksiModel;
    protected $profile;
    protected $barangModel;
    public function __construct()
    {
        $this->transaksiModel = new TransactionModel();
        $this->barangTransaksiModel = new BarangTransaksiModel();
        $this->barangModel = new BarangModel();
        $this->adminModel = new AdminModel();
        $this->profile = new ProfileModel();
    }

    public function index()
    {
        $data = [
            'title' => "Admin | Dashboard",
            'pesanan' => $this->transaksiModel->jumlah_pesanan(),
            'pendapatan' => $this->transaksiModel->pendapatan(),
            'customer' => $this->profile->customer(),
            'barang' => $this->barangModel->jumlah_barang()
        ];
        return view('admin/index', $data);
    }

    public function lap_harian()
    {
        $myTime = Time::now('Asia/Jakarta');
        $date = $myTime->toLocalizedString('d MMMM yyyy');
        $tanggal0 = $this->request->getPost('tanggal');
        $time = Time::parse($tanggal0, 'Asia/Jakarta');
        $tanggal = $time->toLocalizedString('d MMMM yyyy');
        $tanggal1 = $time->toLocalizedString('d MMMM yyyy');
        // dd($tanggal);
        $data = [
            'title' => "Admin | Laporan Harian",
            'tanggal' => $tanggal1,
            'date' => $date,
            'transaksi' => $this->adminModel->lap_harian($tanggal),
            'jumlah' => $this->adminModel->jumlahtotal($tanggal),
            'qty' => $this->adminModel->jumlahqty($tanggal)
        ];
        return view('admin/lap_harian', $data);
    }

    public function lap_mingguan()
    {
        $myTime = Time::now('Asia/Jakarta');
        $date = $myTime->toLocalizedString('d MMMM yyyy');
        $tanggall = $this->request->getPost('tanggal1');
        $tanggalll = $this->request->getPost('tanggal2');
        $time1 = Time::parse($tanggall, 'Asia/Jakarta');
        $time2 = Time::parse($tanggalll, 'Asia/Jakarta');
        $tanggal1 = $time1->toDateString();
        $tanggal2 = $time2->toDateString();
        $tanggal3 = $time1->toLocalizedString('d MMMM yyyy');
        $tanggal4 = $time2->toLocalizedString('d MMMM yyyy');
        // dd($tanggal1, $tanggal2);
        $data = [
            'title' => "Admin | Laporan Mingguan",
            'tanggal3' => $tanggal3,
            'tanggal4' => $tanggal4,
            'date' => $date,
            'transaksi' => $this->adminModel->lap_mingguan($tanggal1, $tanggal2),
            'jumlah' => $this->adminModel->jumlahtotal1($tanggal1, $tanggal2),
            'qty' => $this->adminModel->jumlahqty1($tanggal1, $tanggal2),
        ];
        return view('admin/lap_mingguan', $data);
    }

    public function lap_bulanan()
    {
        $myTime = Time::now('Asia/Jakarta');
        $date = $myTime->toLocalizedString('d MMMM yyyy');
        $bulan = $this->request->getPost('bulan');
        // dd($bulan);
        $data = [
            'title' => "Admin | Laporan Bulanan",
            'bulan' => $bulan,
            'date' => $date,
            'transaksi' => $this->adminModel->lap_bulanan($bulan),
            'jumlah' => $this->adminModel->jumlahtotal2($bulan),
            'qty' => $this->adminModel->jumlahqty2($bulan),
        ];
        return view('admin/lap_bulanan', $data);
    }

    public function lap_tahunan()
    {
        $myTime = Time::now('Asia/Jakarta');
        $date = $myTime->toLocalizedString('d MMMM yyyy');
        $tahun = $this->request->getPost('tahun');
        // dd($tahun);
        $data = [
            'title' => "Admin | Laporan Bulanan",
            'tahun' => $tahun,
            'date' => $date,
            'transaksi' => $this->adminModel->lap_bulanan($tahun),
            'jumlah' => $this->adminModel->jumlahtotal3($tahun),
            'qty' => $this->adminModel->jumlahqty3($tahun),
        ];
        return view('admin/lap_tahunan', $data);
    }
}