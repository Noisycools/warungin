<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Validation\Rules;

class Users extends BaseController
{
    protected $usersModel;
    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        // $users = $this->usersModel->findAll();

        $data = [
            'users' => $this->usersModel->getUsers()
        ];

        // connect secara manual
        // $db = \Config\Database::connect();
        // $users = $db->query("SELECT * FROM users");
        // dd($users);

        return view('admin/users/index', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('admin/users/create', $data);
    }

    public function save()
    {
        //validation
        if (!$this->validate([
            'email' => [
                'rules' => 'required|is_unique[users.email]',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi!',
                    'is_unique' => '{field} user sudah terdaftar'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi!',
                    'is_unique' => '{field} user sudah terdaftar'
                ]
            ],
            'password_hash' => [
                'rules' => 'required|is_unique[users.password_hash]',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi!',
                    'is_unique' => '{field} user sudah terdaftar'
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/users/create')->withInput()->with('validation', $validation);
            return redirect()->to('admin/users/create')->withInput();
        }

        // //ambil gambar
        // $fileGambar = $this->request->getFile('gambar');

        // //generate nama file random
        // // $namaGambar = $fileGambar->getRandomName(); lalu parameter dimasukan ke function move

        // //pindahkan file ke folder img
        // $fileGambar->move('img');
        // //ambil nama file
        // $namaGambar = $fileGambar->getName();

        // $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->usersModel->save([
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password_hash' => $this->request->getVar('password_hash')
        ]);
        session()->setFlashData('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('admin/users');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id
        // $users = $this->usersModel->find($id);

        //hapus gambar
        // unlink('img/' . $users['gambar']);

        $this->usersModel->delete($id);
        session()->setFlashData('pesan', 'Data berhasil dihapus');
        return redirect()->to('admin/users');
    }

    public function edit($id)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'users' => $this->usersModel->getUsers($id)
        ];
        return view('admin/users/edit', $data);
    }

    public function update($id)
    {
        //cek username

        $usersLama = $this->usersModel->getUsers($this->request->getVar('id'));
        if ($usersLama['username'] == $this->request->getVar('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|is_unique[users.username]';
        }

        if (!$this->validate([
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => 'Kolom {field} harus diisi!',
                    'is_unique' => '{field} users sudah terdaftar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/users/edit/' . $this->request->getVar('slug'))->withInput();
        }

        // $fileGambar = $this->request->getFile('gambar');
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

        // $slug = url_title($this->request->getVar('nama'), '-', true);
        $this->usersModel->save([
            'id' => $id,
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password_hash' => $this->request->getVar('password_hash'),
        ]);
        session()->setFlashData('pesan', 'Data berhasil diubah');
        return redirect()->to('admin/users');
    }
}
