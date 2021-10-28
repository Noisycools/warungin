<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\CheckoutModel;
use App\Models\DaftarBelanjaModel;
use App\Models\ProfileModel;
use TCPDF;

class Warungin extends BaseController
{
    protected $barangModel;
    protected $usersModel;
    protected $profileModel;
    protected $checkoutModel;
    protected $daftarBelanjaModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->profileModel = new ProfileModel();
        $this->checkoutModel = new CheckoutModel();
        $this->daftarBelanjaModel = new DaftarBelanjaModel();
        // $this->usersModel = new UsersModel;
    }

    public function index()
    {
        $tabel_barang = $this->barangModel->findAll();
        // $users = $this->usersModel->findAll();

        $data = [
            'title' => 'Warungin | Platform Penyetok Warung',
            'barang' => $tabel_barang
            // 'users' => $users
        ];

        return view('Warungin/index', $data);
    }

    public function templatePDF()
    {
        $tabel_barang = $this->barangModel->findAll();
        $data = [
            'barang' => $tabel_barang
        ];
        return view('pages/template_pdf', $data);
    }

    public function printPDF()
    {
        $username = user()->username;
        $daftar_belanja = $this->daftarBelanjaModel->getData($username);
        $getTotal = $this->daftarBelanjaModel->getTotal($username);
        $kodeTransaksi = $this->request->getPost('kodeTransaksi');

        $data = [
            'transaksi' => $this->checkoutModel->getData($kodeTransaksi)->getRow(),
            'barang' => $daftar_belanja,
            'total' => $getTotal
        ];

        $html = view('pages/template_pdf', $data);

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->AddPage();

        // Print text using writeHTMLCell()
        $pdf->writeHTML($html);

        // Close and output PDF document
        $this->response->setContentType('application/pdf');
        $pdf->Output('Transaksi-WarungIn.pdf', 'I');
    }
}
