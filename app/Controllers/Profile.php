<?php

namespace App\Controllers;

use App\Models\ProfileModel;

class Profile extends BaseController
{
    protected $profileModel;

    public function __construct()
    {
        $this->profileModel = new ProfileModel();
    }

    public function add()
    {
        $username = user()->username;
        $profileModel = new ProfileModel();
        $profile = $profileModel->getProfile($username)->getRow();
        $tgl = date("Y-m-d");

        $data = [
            'user_id' => $this->request->getPost('usersID'),
            'username' => $username,
            'nama' => $this->request->getPost('nama'),
            'nama_warung' => $this->request->getPost('namaWarung'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('noHp'),
            'email' => $this->request->getPost('email'),
            'created_at' => $tgl
        ];

        $this->profileModel->addProfile($data);
        session()->setFlashdata('profileAdd', 'Profile berhasil dibuat!');
        return redirect()->to('/');
    }

    public function update()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'nama_warung' => $this->request->getPost('namaWarung'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('noHp'),
            'email' => $this->request->getPost('email')
        ];

        $this->profileModel->updateProfile($data);
        return redirect()->to('/profile');
    }
}
