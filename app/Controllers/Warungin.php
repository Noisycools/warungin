<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\CheckoutModel;
use App\Models\DaftarBelanjaModel;
use App\Models\HistoriTransaksiModel;
use App\Models\TransactionModel;
use App\Models\ProfileModel;
use CodeIgniter\I18n\Time;
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
    protected $historiTransaksiModel;
    protected $transaksiModel;


    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->transaksiModel = new TransactionModel();
        $this->profileModel = new ProfileModel();
        $this->checkoutModel = new CheckoutModel();
        $this->daftarBelanjaModel = new DaftarBelanjaModel();
        $this->historiTransaksiModel = new HistoriTransaksiModel();
        // $this->usersModel = new UsersModel;
    }

    public function index()
    {
        if (logged_in()) :
            if (in_groups('kurir')) :
                $data = [
                    'title' => 'Pesanan Hari Ini | WarungIn Kurir',
                    'alt_title' => 'kurir',
                    'validation' => \Config\Services::validation(),
                    'transaksi' => $this->checkoutModel->getData(),
                    'pending' => $this->checkoutModel->getDataByStatus('Pending'),
                    'dikirim' => $this->checkoutModel->getDataByStatus('Dikirim'),
                    'proses' => $this->checkoutModel->getDataByStatus('Diproses')
                ];
                // return view('pages/kurir', $data);
                return view('pages/kurir', $data);
            endif;
            if (in_groups('admin')) :
                $data = [
                    'title' => "Admin | Dashboard",
                    'pesanan' => $this->transaksiModel->jumlah_pesanan(),
                    'pendapatan' => $this->transaksiModel->pendapatan(),
                    'customer' => $this->profileModel->customer(),
                    'barang' => $this->barangModel->jumlah_barang()
                ];
                return view('admin/index', $data);
            endif;
        endif;

        $tabel_barang = $this->barangModel->findAll();
        // $users = $this->usersModel->findAll();

        $data = [
            'title' => 'Warungin | Platform Penyetok Warung',
            'alt_title' => 'home',
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
        $kodeTransaksi = $this->request->getPost('kodeTransaksi');

        $data = [
            'transaksi' => $this->checkoutModel->getData($kodeTransaksi)->getRow(),
            'barang' => $this->historiTransaksiModel->getData($kodeTransaksi),
            'barang2' => $this->historiTransaksiModel->getData($kodeTransaksi)->getRowArray()
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