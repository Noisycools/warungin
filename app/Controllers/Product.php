<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\Validation\Rules;
use CodeIgniter\I18n\Time;

class Product extends BaseController
{
    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function laporan()
    {
        $myTime = Time::now('Asia/Jakarta');
        $date = $myTime->toLocalizedString('d MMMM yyyy');
        $data = [
            'date' => $date,
            'barang' => $this->barangModel->getBarang1()
        ];

        return view('admin/product/laporan', $data);
    }

    public function index()
    {
        // $barang = $this->barangModel->findAll();
        $currentPage = $this->request->getVar('page_tabel_barang') ? $this->request->getVar('page_tabel_barang') : 1;
        // d($this->request->getVar('keyword'));
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $barang = $this->barangModel->search($keyword);
        } else {
            $barang = $this->barangModel;
        }

        $data = [
            // 'barang' => $this->barangModel->getBarang(),
            'title' => "Admin | Product",
            'barang' => $barang->paginate(10, 'tabel_barang'),
            'pager' => $this->barangModel->pager,
            'currentPage' => $currentPage
        ];

        // connect secara manual
        // $db = \Config\Database::connect();
        // $barang = $db->query("SELECT * FROM barang");
        // dd($barang);

        return view('admin/product/index', $data);
    }

    public function habis()
    {
        $data = [
            'title' => 'Admin | Product Habis',
            'barang' => $this->barangModel->habis()
        ];
        return view('admin/product/habis/index', $data);
    }

    public function tambah($barang_id)
    {
        $data = [
            'title' => "Admin | Edit Barang",
            'validation' => \Config\Services::validation(),
            'barang' => $this->barangModel->getBarang($barang_id)
        ];
        return view('admin/product/habis/edit', $data);
    }

    public function add($barang_id)
    {
        $data = [
            'barang_id' => $barang_id,
            'stok' => $this->request->getVar('stok')
        ];
        $this->barangModel->edit($data);
        session()->setFlashData('message', 'Data berhasil diubah');
        return redirect()->to('/admin/product');
    }

    public function create()
    {
        // session();
        $data = [
            'title' => "Admin | Create Barang",
            'validation' => \Config\Services::validation(),
            'barang' => $this->barangModel->getKategori()
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
            'stok' => [
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
        // $this->barangModel->save([
        //     'nama_barang' => $this->request->getVar('nama_barang'),
        //     'slug' => $slug,
        //     'kategori_barang' => $this->request->getVar('kategori_barang'),
        //     'harga_barang' => $this->request->getVar('harga_barang'),
        //     'satuan_barang' => $this->request->getVar('satuan_barang'),
        //     'stok' => $this->request->getVar('stok'),
        //     'foto_barang' => $namaGambar
        // ]);
        $dataCreate = [
            'nama_barang' => $this->request->getVar('nama_barang'),
            'slug' => $slug,
            'id_kategori' => $this->request->getVar('kategori_barang'),
            'harga_barang' => $this->request->getVar('harga_barang'),
            'satuan_barang' => $this->request->getVar('satuan_barang'),
            'stok' => $this->request->getVar('stok'),
            'foto_barang' => $namaGambar
        ];
        $id_kategori = $this->request->getVar('kategori_barang');
        $this->barangModel->create($id_kategori, $dataCreate);
        session()->setFlashData('message', 'Data berhasil ditambahkan');
        return redirect()->to('admin/product');
    }

    public function delete($barang_id)
    {
        // cari gambar berdasarkan barang_id
        $barang = $this->barangModel->find($barang_id);

        // hapus gambar
        unlink('img/' . $barang['foto_barang']);

        $this->barangModel->delete($barang_id);
        session()->setFlashData('message', 'Data berhasil dihapus');
        return redirect()->to('admin/product');
    }

    public function edit($barang_id)
    {
        $data = [
            'title' => "Admin | Edit Barang",
            'validation' => \Config\Services::validation(),
            'barang' => $this->barangModel->getBarang($barang_id)
        ];
        return view('admin/product/edit', $data);
    }

    public function editStok($slug)
    {
        $data = [
            'title' => "Admin | Tambah Stok Barang",
            'validation' => \Config\Services::validation(),
            'barang' => $this->barangModel->getBarang($slug)
        ];
        return view('admin/product/habis/edit', $data);
    }


    public function update($barang_id)
    {
        // dd($this->request->getVar());
        //cek nama_barang
        // $barangLama = $this->barangModel->getBarang($this->request->getVar('slug'));
        // if ($barangLama['nama_barang'] == $this->request->getVar('nama_barang')) {
        //     $rule_namabarang = 'required';
        // } else {
        //     $rule_namabarang = 'required|is_unique[tabel_barang.nama_barang]';
        // }

        // if (!$this->validate([
        //     'nama_barang' => [
        //         'rules' => $rule_namabarang,
        //         'errors' => [
        //             'required' => 'Kolom ini harus diisi!',
        //             'is_unique' => 'nama barang sudah terdaftar'
        //         ]
        //     ]
        // ])) {
        //     // $validation = \Config\Services::validation();
        //     return redirect()->to('/product/edit/' . $this->request->getVar('slug'))->withInput();
        // }

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
        // $this->barangModel->update([
        //     'barang_id' => $barang_id,
        //     'nama_barang' => $this->request->getVar('nama_barang'),
        //     'slug' => $slug,
        //     'harga_barang' => $this->request->getVar('harga_barang'),
        //     'satuan_barang' => $this->request->getVar('satuan_barang'),
        //     'stok' => $this->request->getVar('stok'),
        //     'foto_barang' => $namaGambar
        // ]);
        $data = [
            'barang_id' => $barang_id,
            'nama_barang' => $this->request->getVar('nama_barang'),
            'slug' => $slug,
            'harga_barang' => $this->request->getVar('harga_barang'),
            'satuan_barang' => $this->request->getVar('satuan_barang'),
            'stok' => $this->request->getVar('stok'),
            'foto_barang' => $namaGambar
        ];
        $this->barangModel->edit($data);
        session()->setFlashData('message', 'Data berhasil diubah');
        return redirect()->to('admin/product');
    }
}