<?php

namespace App\Controllers;

// use App\Models\CustomerModel;
use App\Models\ProfileModel;
use CodeIgniter\Validation\Rules;
use CodeIgniter\I18n\Time;

class Customer extends BaseController
{
    // protected $customerModel;
    protected $profileModel;

    public function __construct()
    {
        // $this->customerModel = new CustomerModel();
        $this->profileModel = new ProfileModel();
    }

    public function laporan()
    {
        $myTime = Time::now('Asia/Jakarta');
        $date = $myTime->toLocalizedString('d MMM yyyy');
        $data = [
            'date' => $date,
            'profile' => $this->profileModel->getProfile()
        ];

        return view('admin/customer/laporan', $data);
    }

    public function index()
    {
        // $barang = $this->barangModel->findAll();
        $currentPage = $this->request->getVar('page_profile') ? $this->request->getVar('page_profile') : 1;
        // d($this->request->getVar('keyword'));
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $profile = $this->profileModel->search($keyword);
        } else {
            $profile = $this->profileModel;
        }

        $data = [
            'title' => "Admin | Customer",
            // 'profile' => $this->profileModel->getBarang(),
            'profile' => $profile->paginate(10, 'profile'),
            'pager' => $this->profileModel->pager,
            'currentPage' => $currentPage
        ];

        // connect secara manual
        // $db = \Config\Database::connect();
        // $barang = $db->query("SELECT * FROM barang");
        // dd($barang);

        return view('admin/customer/index', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => "Admin | Create Customer",
            'validation' => \Config\Services::validation()
        ];
        return view('admin/customer/create', $data);
    }

    public function save()
    {
        //validation
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[profile.nama]',
                'errors' => [
                    'required' => 'Kolom ini harus diisi!',
                    'is_unique' => 'nama customer sudah terdaftar'
                ]
            ],
            'nama_warung' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom ini harus diisi!'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom ini harus diisi!'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom ini harus diisi!',
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom ini harus diisi!',
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom ini harus diisi!',
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/customer/create')->withInput()->with('validation', $validation);
            return redirect()->to('admin/customer/create')->withInput();
        }

        //ambil gambar
        // $fileGambar = $this->request->getFile('foto_customer');

        // //generate nama file random
        // // $namaGambar = $fileGambar->getRandomName(); //lalu parameter dimasukan ke function move

        // //pindahkan file ke folder img
        // $fileGambar->move('img');
        // //ambil nama file
        // $namaGambar = $fileGambar->getName();

        // $slug = url_title($this->request->getVar('nama_customer'), '-', true);
        // $faker = \Faker\Factory::create('id_ID');
        $this->profileModel->save([
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'nama_warung' => $this->request->getVar('nama_warung'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp'),
            'email' => $this->request->getVar('email'),
        ]);
        session()->setFlashData('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('admin/customer');
    }

    public function delete($id_profile)
    {
        // cari gambar berdasarkan profi$id_profile
        // $customer = $this->customerModel->find($id_profile);

        // // hapus gambar
        // unlink('img/' . $customer['foto_customer']);

        $this->profileModel->delete($id_profile);
        session()->setFlashData('pesan', 'Data berhasil dihapus');
        return redirect()->to('admin/customer');
    }

    public function edit($username)
    {
        $data = [
            'title' => "Admin | Edit Customer",
            'validation' => \Config\Services::validation(),
            // 'customer' => $this->customerModel->getCustomer($username),
            'profile' =>  $this->profileModel->getProfile($username)->getRow()
        ];
        return view('admin/customer/edit', $data);
    }

    public function update()
    {
        // dd($this->request->getVar());
        //cek nama_customer
        // $customerLama = $this->profileModel->getProfile($this->request->getVar('username'));
        // if ($customerLama['nama'] == $this->request->getVar('nama')) {
        //     $rule_namacustomer = 'required';
        // } else {
        //     $rule_namacustomer = 'required|is_unique[profile.nama]';
        // }

        // $fileGambar = $this->request->getFile('foto_customer');
        // //cek gambar apakah tetap gambar lama
        // if ($fileGambar->getError() == 4) {
        //     $namaGambar = $this->request->getVar('gambarLama');
        // } else {
        //     //pindahkan file ke folder img
        //     $fileGambar->move('img');
        //     //ambil nama file
        //     $namaGambar = $fileGambar->getName();
        //     //hapus file lama
        //     unlink('img/' . $this->request->getVar('gambarLama'));
        // }

        // $slug = url_title($this->request->getVar('nama_customer'), '-', true);
        $data = [
            'nama' => $this->request->getPost('nama'),
            'nama_warung' => $this->request->getPost('nama_warung'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email' => $this->request->getPost('email')
        ];

        // if (!$this->validate([
        //     'nama' => [
        //         'rules' => $rule_namacustomer,
        //         'errors' => [
        //             'required' => 'Kolom ini harus diisi!',
        //             'is_unique' => 'Nama customer sudah terdaftar'
        //         ]
        //     ]
        // ])) {
        //     // $validation = \Config\Services::validation();
        // }
        $this->profileModel->updateProfile($data);

        session()->setFlashData('pesan', 'Data berhasil diubah');
        return redirect()->to('admin/customer');
    }
}
