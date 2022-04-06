<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\BarangTransaksiModel;
use App\Models\CheckoutModel;
use App\Models\DaftarBelanjaModel;
use App\Models\HistoriTransaksiModel;
use CodeIgniter\I18n\Time;

class Checkout extends BaseController
{
    protected $checkoutModel;
    protected $daftarBelanjaModel;
    protected $historiTransaksiModel;
    protected $barangModel;

    public function __construct()
    {
        $this->checkoutModel = new CheckoutModel();
        $this->daftarBelanjaModel = new DaftarBelanjaModel();
        $this->historiTransaksiModel = new HistoriTransaksiModel();
        $this->barangModel = new BarangModel();
    }

    public function buatPesanan()
    {
        $username = user()->username;
        $daftar_belanja = $this->daftarBelanjaModel->getData($username);
        $getTotal = $this->daftarBelanjaModel->getTotal($username);
        $jumlahBarang = $this->request->getPost('jumlahBarang');

        $myTime = Time::now('Asia/Jakarta');
        $time = $myTime->toLocalizedString('d MMM yyyy');

        $waktuCreatedAt = Time::now('Asia/Jakarta', 'id_ID');
        $today = Time::today('Asia/Jakarta', 'id_ID');
        $expiredDate = Time::parse($today, 'Asia/Jakarta');
        $tgl = $expiredDate->toDateString();
        $expiredDate = $expiredDate->addDays(7);

        $data = [
            'kode_transaksi' => $this->request->getPost('kodeTransaksi'),
            'id_profile' => $this->request->getPost('idProfile'),
            'username' => user()->username,
            'nama_penerima' => $this->request->getPost('namaPenerima'),
            'nama_warung' => $this->request->getPost('namaWarung'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('noHp'),
            'email' => $this->request->getPost('email'),
            'tgl_pembayaran' => $time,
            'created_at' => $tgl,
            'expired_date' => $expiredDate->toDateString(),
            'waktu_created_at' => $waktuCreatedAt->hour . ':' . $waktuCreatedAt->minute,
            'status' => 'Pending',
            'foto_struk' => 'none'
        ];
        $this->checkoutModel->add($data);

        $data2 = [];
        for ($i = 0; $i < $jumlahBarang; $i++) {
            $data2[] = array(
                'kode_transaksi' => $this->request->getPost('kodeTransaksi'),
                'id_profile' => $this->request->getPost('idProfile'),
                'username' => user()->username,
                'barang_id' => $this->request->getPost('barangId' . $i),
                'nama_barang' => $this->request->getPost('nama_barang' . $i),
                'qty' => $this->request->getPost('qty' . $i),
                'harga_barang' => $this->request->getPost('hargaBarang' . $i),
                'total_harga' => $this->request->getPost('totalHarga')
            );
        }
        $this->historiTransaksiModel->add($data2);

        $kodeTransaksi = $this->request->getPost('kodeTransaksi');
        $dataTransaksi = [
            'transaksi' => $this->checkoutModel->getData($kodeTransaksi)->getRow(),
            'barang' => $this->historiTransaksiModel->getData($kodeTransaksi),
            'barang2' => $this->historiTransaksiModel->getData($kodeTransaksi)->getRowArray(),
        ];

        $this->daftarBelanjaModel->hapus($username);

        return view('pages/template_pdf', $dataTransaksi);
    }

    public function updateStatus()
    {
        $kodeTransaksi = $this->request->getVar('kodeTransaksi');
        $status = $this->request->getVar('status');

        $data = [
            'kode_transaksi' => $kodeTransaksi,
            'status' => $status
        ];

        $this->checkoutModel->updateStatus($data);

        return redirect()->to('/');
    }
}
