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
            'title' => 'Hubungi Kami | WarungIn'
        ];
        return view('pages/contact_us', $data);
    }

    public function sendEmail()
    {
        $mail = new PHPMailer(true);

        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $nomor_kontak = $_POST['nomor_kontak'];
            $pesan = $_POST['pesan'];

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'warungin.id@gmail.com';
                $mail->Password = 'penyetokwarung';
                $mail->SMTPSecure = 'tsl';
                $mail->Port = '587';

                $mail->setFrom('warungin.id@gmail.com');
                $mail->addAddress('warungin.id@gmail.com');

                $mail->isHTML(true);
                $mail->Subject = 'Message Received (Contact Page)';
                $mail->Body = "<h3>Name : '$nama' <br>Email : '$email' <br>Nomor Kontak : '$nomor_kontak' <br>Pesan : '$pesan' </h3>";

                $mail->send();
            } catch (Exceptions $e) {
                $alert = "<span>'.$e'</span>";
            }
            return redirect()->to('/contact_us');
        }
    }
}
