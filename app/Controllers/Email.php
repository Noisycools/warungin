<?php

namespace App\Controllers;

class Email extends BaseController
{
    public function __construct()
    {
        helper('form');
        $email = \Config\Services::email();
    }

    public function index()
    {
        $data = [
            'title' => 'Hubungi Kami | WarungIn'
        ];
        $this->load->view('pages/contact_us', $data);
    }

    public function sendEmail()
    {
        if (isset($_POST['submit_email'])) {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $nomor_kontak = $this->input->post('nomor_kontak');
            $pesan = $this->input->post('pesan');

            if (!empty($email)) {
                // configuration to email & process
                $config = [
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl:smtp.googlemail.com',
                    'smtp_user' => 'warungin.id@gmail.com',
                    'smtp_pass' => 'penyetokwarung',
                    'smtp_port' => 465
                ];

                $this->load->library('email', $config);
                $this->email->initialize($config);
                // end config
                $this->email->from('emailFrom');
                $this->email->to($email);
                $this->email->subject($nama);
                $this->email->message($nomor_kontak);
                $this->email->message($pesan);

                if ($this->email->send()) {
                    return redirect()->to('/contact_us');
                } else {
                    show_error($this->email->print_debugger());
                }
            }
        }
    }
}
