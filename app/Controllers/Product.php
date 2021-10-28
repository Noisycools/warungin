<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\Validation\Rules;

class Product extends BaseController
{
    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        // $barang = $this->barangModel->findAll();

        $data = [
            'barang' => $this->barangModel->getBarang()
        ];

        // connect secara manual
        // $db = \Config\Database::connect();
        // $barang = $db->query("SELECT * FROM barang");
        // dd($barang);

        return view('admin/product/index', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('admin/product/create', $data);
    }

    public function save()
    {
        //validation
        if (!$this->validate([
            'nama_barang' => [
                'rules' => 'required|is_unique[tabel_barang.nama_barang]',
                'errors' => [
                    'required' => 'Kolom ini harus diisi!',
                    'is_unique' => 'nama barang sudah terdaftar'
                ]
            ],
            'kategori_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom ini harus diisi!'
                ]
            ],
            'harga_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom ini harus diisi!',
                ]
            ],
            'satuan_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom ini harus diisi!',
                ]
            ],
            'foto_barang' => [
                'rules' => 'uploaded[foto_barang]|max_size[foto_barang,1024]|is_image[foto_barang,image/jpg,image/jpeg,image/png]'
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/barang/create')->withInput()->with('validation', $validation);
            return redirect()->to('admin/product/create')->withInput();
        }

        //ambil gambar
        $fileGambar = $this->request->getFile('foto_barang');

        //generate nama file random
        // $namaGambar = $fileGambar->getRandomName(); //lalu parameter dimasukan ke function move

        //pindahkan file ke folder img
        $fileGambar->move('img');
        //ambil nama file
        $namaGambar = $fileGambar->getName();

        $slug = url_title($this->request->getVar('nama_barang'), '-', true);
        $this->barangModel->save([
            'nama_barang' => $this->request->getVar('nama_barang'),
            'slug' => $slug,
            'kategori_barang' => $this->request->getVar('kategori_barang'),
            'harga_barang' => $this->request->getVar('harga_barang'),
            'satuan_barang' => $this->request->getVar('satuan_barang'),
            'foto_barang' => $namaGambar
        ]);
        session()->setFlashData('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('admin/product');
    }

    public function delete($barang_id)
    {
        // cari gambar berdasarkan barang_id
        $barang = $this->barangModel->find($barang_id);

        // hapus gambar
        unlink('img/' . $barang['foto_barang']);

        $this->barangModel->delete($barang_id);
        session()->setFlashData('pesan', 'Data berhasil dihapus');
        return redirect()->to('admin/product');
    }

    public function edit($barang_id)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'barang' => $this->barangModel->getBarang($barang_id)
        ];
        return view('admin/product/edit', $data);
    }

    public function update($barang_id)
    {
        // dd($this->request->getVar());
        //cek nama_barang
        $barangLama = $this->barangModel->getBarang($this->request->getVar('slug'));
        if ($barangLama['nama_barang'] == $this->request->getVar('nama_barang')) {
            $rule_namabarang = 'required';
        } else {
            $rule_namabarang = 'required|is_unique[tabel_barang.nama_barang]';
        }

        if (!$this->validate([
            'nama_barang' => [
                'rules' => $rule_namabarang,
                'errors' => [
                    'required' => 'Kolom ini harus diisi!',
                    'is_unique' => 'nama barang sudah terdaftar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/product/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileGambar = $this->request->getFile('foto_barang');
        //cek gambar apakah tetap gambar lama
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            //pindahkan file ke folder img
            $fileGambar->move('img');
            //ambil nama file
            $namaGambar = $fileGambar->getName();
            //hapus file lama
            unlink('img/' . $this->request->getVar('gambarLama'));
        }

        $slug = url_title($this->request->getVar('nama_barang'), '-', true);
        $this->barangModel->save([
            'barang_id' => $barang_id,
            'nama_barang' => $this->request->getVar('nama_barang'),
            'slug' => $slug,
            'kategori_barang' => $this->request->getVar('kategori_barang'),
            'harga_barang' => $this->request->getVar('harga_barang'),
            'satuan_barang' => $this->request->getVar('satuan_barang'),
            'foto_barang' => $namaGambar
        ]);
        session()->setFlashData('pesan', 'Data berhasil diubah');
        return redirect()->to('admin/product');
    }
}
