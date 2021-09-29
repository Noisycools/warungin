<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warungin | Platform penyetok warung</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>

    <!-- Awal Navbar -->
    <div class="navbar">
        <img src="img/WarungIn.png" alt="">
        <ul class="nav">
            <li><a href="#home">Home</a></li>
            <li><a href="#product">Product</a></li>
            <li><a href="/contact_us">Contact Us</a></li>
            <li><a href="#">WarungKu</a></li>
            <?php

use Myth\Auth\Collectors\Auth;

if (logged_in()) : ?>
                <li><a href="/daftar_belanja">Daftar Belanja</a></li>
            <?php endif; ?>
        </ul>
        <div class="user">
            <?php if (logged_in()) : ?>
                <span><a class="a" href="/logout">Logout</a></span>
            <?php else : ?>
                <span><a class="a" href="/login">Login</a></span>
                <span class="unik"><a class="unk" href="/register"><img src="img/new.png" alt="">Sign Up</a></span>
            <?php endif; ?>
        </div>
        <span class="check">
            <div class="hamburger"></div>
        </span>
    </div>
    <!-- Akhir Navbar -->

    <div class="container">
        <div class="jumbotron" id="home">
            <div class="jumboText">
                <h1>WarungIn</h1>
                <?php if (logged_in()) : ?>
                    <p>Selamat datang kembali !</p>
                <?php else : ?>
                    <p>Pengen nyetok warung jadi lebih praktis dan terorganisir ?<br>
                        Males keluar Rumah untuk belanja stok di warung ?
                    </p>
                    <div class="continue">
                        <p>Coba WarungIn Aja Dengan</p>
                        <span class="sosmed"><img src="img/google.png" alt=""> With Google</span>
                        <span class="garus">|</span>
                        <span class="sosmed fb"><img src="img/fb.png" alt=""> With Facebook</span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="img">
                <img src="img/jumbotron.png" alt="">
                <img class="jumbo2" src="img/jumbotron2.png" alt="">
            </div>
        </div>
        <div class="searchBox" id="product">
            <input class="searchInput" type="text" placeholder="Search" name="keyword">
            <span class="search" id="basic-addon2">Cari</span>
            <span class="search" id="basic-addon2">Lokasi</span>
            <span class="search" id="basic-addon2">Radius</span>
        </div>
        <div class="product">
            <div class="prod">
                <h1>Best Seller</h1>
                <span>Lihat Semua</span>
                <div class="slider"><img src="img/slider.png" alt=""></div>
                <div class="items">
                    <?php foreach($barang as $b) : ?>
                    <div class="item"><img src="<?php echo $b['foto_barang'] ?>" alt="">
                        <p><?php echo $b['nama_barang'] ?></p><span><?php echo $b['pemilik_barang'] ?> <br>Jl. Kebon Jeruk</span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <img src="img/WarungIn.png" alt="">
        <ul>
            <li><a href="">Kerja Sama</a></li>
            <li><a href="">About</a></li>
            <li><a href="/contact_us">Contact Us</a></li>
        </ul>
    </footer>

    <script src="js/script.js"></script>
</body>

</html>