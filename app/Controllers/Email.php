<?php

namespace App\Controllers;

use App\Models\EmailModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email extends BaseController
{
    protected $emailModel;
    public function __construct()
    {
        helper('form');
        $email = \Config\Services::email();
        $this->emailModel = new EmailModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Hubungi Kami | WarungIn',
            'alt_title' => 'contactUs',
        ];
        return view('pages/contact_us', $data);
    }

    public function sendEmail()
    {
        $mail = new PHPMailer(true);

        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $nomor_kontak = $this->request->getPost('nomor_kontak');
        $pesan = $this->request->getPost('pesan');
        $username = user()->username;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'warungin.id@gmail.com';
        $mail->Password = 'penyetokwarung';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('warungin.id@gmail.com', $nama);
        $mail->addReplyTo($email, $nama);
        $mail->addAddress('warungin.id@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Pesan dari ' . $nama;
        $mailContent = "<center>
        <h1>Nama : " . $nama . "</h1>
        <h1>Email : " . $email . "</h1>
        <h1>Nomor Kontak : " . $nomor_kontak . "</h1>
        <h1>Pesan : " . $pesan . "</h1>
        </center>";
        $mail->Body = $mailContent;
        // $mail->Body = "<h3>Name : " . $nama . " <br>Email : " . $email . " <br>Nomor Kontak : " . $nomor_kontak . " <br>Pesan : " . $pesan . " </h3>";

        // Send email
        if (!$mail->send()) {
            throw new \Exception($mail->ErrorInfo);
        } else {
            return redirect()->to('/#contact_us');
        }
    }
}
