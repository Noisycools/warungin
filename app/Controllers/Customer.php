<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Validation\Rules;

class Customer extends BaseController
{
    protected $customerModel;
    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        // $customer = $this->customerModel->findAll();

        $data = [
            'customer' => $this->customerModel->getCustomer()
        ];

        // connect secara manual
        // $db = \Config\Database::connect();
        // $customer = $db->query("SELECT * FROM customer");
        // dd($customer);

        return view('admin/customer/index', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('admin/customer/create', $data);
    }

    public function save()
    {
        //validation
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[customer.nama]',
                'errors' => [
                    'required' => 'Kolom ini harus diisi!',
                    'is_unique' => 'nama customer sudah terdaftar'
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
            'no_tlp' => [
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
        $faker = \Faker\Factory::create('id_ID');
        $this->customerModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'no_tlp' => $this->request->getVar('no_tlp'),
            'username' => $this->request->getVar('username'),
            'password' => $faker->password,
        ]);
        session()->setFlashData('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('admin/customer');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        // $customer = $this->customerModel->find($id);

        // // hapus gambar
        // unlink('img/' . $customer['foto_customer']);

        $this->customerModel->delete($id);
        session()->setFlashData('pesan', 'Data berhasil dihapus');
        return redirect()->to('admin/customer');
    }

    public function edit($password)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'customer' => $this->customerModel->getCustomer($password)
        ];
        return view('admin/customer/edit', $data);
    }

    public function update($id)
    {
        // dd($this->request->getVar());
        //cek nama_customer
        $customerLama = $this->customerModel->getCustomer($this->request->getVar('password'));
        if ($customerLama['nama'] == $this->request->getVar('nama')) {
            $rule_namacustomer = 'required';
        } else {
            $rule_namacustomer = 'required|is_unique[customer.nama]';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => $rule_namacustomer,
                'errors' => [
                    'required' => 'Kolom ini harus diisi!',
                    'is_unique' => 'nama customer sudah terdaftar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/customer/edit/' . $this->request->getVar('password'))->withInput();
        }

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
        $this->customerModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'no_tlp' => $this->request->getVar('no_tlp'),
            'username' => $this->request->getVar('username')
        ]);
        session()->setFlashData('pesan', 'Data berhasil diubah');
        return redirect()->to('admin/customer');
    }
}
