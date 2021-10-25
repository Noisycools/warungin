<?php

namespace App\Controllers;

use App\Models\BarangModel;
use TCPDF;

class Warungin extends BaseController
{
    protected $barangModel;
    protected $usersModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
        // $this->usersModel = new UsersModel;
    }

    public function index()
    {
        $tabel_barang = $this->barangModel->findAll();
        // $users = $this->usersModel->findAll();

        $data = [
            'title' => 'Warungin | Platform Penyetok Warung',
            'barang' => $tabel_barang,
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
        $tabel_barang = $this->barangModel->findAll();

        $data = [
            'title' => 'Cetak Transaksi | WarungIn',
            'barang' => $tabel_barang
        ];

        $html = view('pages/print_pdf', $data);

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
