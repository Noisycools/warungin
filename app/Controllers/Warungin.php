<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\CheckoutModel;
use App\Models\DaftarBelanjaModel;
use App\Models\ProfileModel;
use TCPDF;

class MYPDF extends TCPDF
{
    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, '(c) Copyright WarungIn 2021', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

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
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->AddPage();

        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // Print text using writeHTMLCell()
        $pdf->writeHTML($html);

        // Set Footer
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // Close and output PDF document
        $this->response->setContentType('application/pdf');
        $pdf->Output('transaksi_warungin.pdf', 'I');
    }
}
