<!-- ALERTIFY JS LIBRARY -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" integrity="sha512-IXuoq1aFd2wXs4NqGskwX2Vb+I8UJ+tGJEu/Dc0zwLNKeQ7CW3Sr6v0yU3z5OQWe3eScVIkER4J9L7byrgR/fA==" crossorigin="anonymous" />
<!-- ^ALERTIFY JS LIBRARY^ -->

<?php

session_start();
$koneksi = mysqli_connect('localhost:3307', 'root', '', 'warungin');

$name = $_POST['user'];
$password = $_POST['password'];

$query = "SELECT * FROM tabel_user WHERE nama='$name' and password='$password'";
$result = mysqli_query($koneksi, $query);
$num = mysqli_num_rows($result);

// $tabel_user = mysqli_fetch_assoc($query);

if (empty($_POST['user'])) {
    header("location:login.php?error=Username Masih Kosong!");
} else if (empty($_POST['password'])) {
    header("location:login.php?error=Password Masih Kosong!");
} else {
    //$password = md5($password);   
    if ($num > 0) {
        $_SESSION['user'] = $row['nama'];
        $_SESSION['user'] = $name;
        if (isset($_SESSION['user'])) {
            header("Location:homepage.php");
            if (!empty($_POST['remember'])) {
                setcookie("user", $_POST['user'], time() + (10 * 365 * 24 * 60 * 60));
                setcookie("password", $_POST['password'], time() + (10 * 365 * 24 * 60 * 60));
            } else {
                if (isset($_COOKIE['user'])) {
                    setcookie("user", "");
                }
                if (isset($_COOKIE['password'])) {
                    setcookie("password", "");
                }
            }
            exit();
        } else {
            header("Location:login.php");
            exit();
        }
    } else {
        header("location:login.php?error=Username atau Password Salah!");
    }
}

?>