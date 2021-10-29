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
        $profile = $profileModel->getData($username)->getRow();

        $data = [
            'username' => $username,
            'nama' => $this->request->getPost('nama'),
            'nama_warung' => $this->request->getPost('namaWarung'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('noHp'),
            'email' => $this->request->getPost('email')
        ];

        $this->profileModel->addProfile($data);
        return redirect()->to('/profile');
    }

    public function update()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'nama_warung' => $this->request->getPost('namaWarung'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('noHp'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username')
        ];

        $this->profileModel->updateProfile($data);
        return redirect()->to('/profile');
    }
}
