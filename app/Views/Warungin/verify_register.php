<!-- ALERTIFY JS LIBRARY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" integrity="sha512-IXuoq1aFd2wXs4NqGskwX2Vb+I8UJ+tGJEu/Dc0zwLNKeQ7CW3Sr6v0yU3z5OQWe3eScVIkER4J9L7byrgR/fA==" crossorigin="anonymous" />
<!-- ^ALERTIFY JS LIBRARY^ -->

<?php

session_start();

$koneksi = mysqli_connect('localhost:3307', 'root', '', 'warungin');

$name = "";
$password = "";
$email = "";
$repeat = "";

if (isset($_POST['user']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repeat'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['user']);
    $password = validate($_POST['password']);
    $email = validate($_POST['email']);
    $repeat = validate($_POST['repeat']);
    //$accept = validate($_POST['accept']);

    if (empty($name)) {
        header("Location: daftar.php?error=Nama Dibutuhkan!");
        exit();
    } else if (empty($email)) {
        header("Location: daftar.php?error=Email Dibutuhkan!");
        exit();
    } else if (empty($password)) {
        header("Location: daftar.php?error=Password Dibutuhkan!");
        exit();
    } else if (empty($repeat)) {
        header("Location: daftar.php?error=Mohon Ketik Ulang Password Anda!");
        exit();
    } else if ($password !== $repeat) {
        header("Location: daftar.php?error=Password Tidak Benar!");
        exit();
    } else if ($_POST['accept'] != "agree") {
        header("Location: daftar.php?error=Anda Harus Menyetujui Syarat dan Ketentuan Kami");
        exit();
    } else {

        //$password = md5($password);

        $sql = "SELECT * FROM tabel_user WHERE nama='$name'";
        $sql2 = "SELECT * FROM tabel_user WHERE email='$email'";
        $result = mysqli_query($koneksi, $sql);
        $result3 = mysqli_query($koneksi, $sql2);

        if (mysqli_num_rows($result) > 0) {
            header("Location: daftar.php?error=Username Sudah Digunakan!");
            exit();
        } else if (mysqli_num_rows($result3) > 0) {
            header("Location: daftar.php?error=Email Sudah Digunakan!");
            exit();
        } else {
            $register = "INSERT INTO tabel_user(nama, email, password) VALUES('$name', '$email', '$password')";
            $result2 = mysqli_query($koneksi, $register);
            if ($result2) {
                header("Location: daftar.php?success=Akun Telah Dibuat!");
                exit();
            } else {
                header("Location: daftar.php?error=Error! Coba Lagi");
                exit();
            }
            // akun telah dibuat!
            // pilihan : masuk ke login atau ke homepage?
        }
    }
} else {
    header('location: daftar.php');
    exit();
}

?>