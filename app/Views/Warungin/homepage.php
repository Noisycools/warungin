<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WarungIn</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Awal Navbar -->
    <div class="navbar">
        <img src="img/WarungIn.png" alt="">
        <ul class="nav">
            <li><a href="#home">Home</a></li>
            <li><a href="#product">Product</a></li>
            <li><a href="contact_us.php">Contact Us</a></li>
            <li>WarungKu</li>
            <li><a href="daftar_belanja.php">Daftar Belanja</a></li>
        </ul>
        <div class="user">
            <!-- ==================== -->
            <span><a class="a" href="logout.php">Logout</a></span>
            <!-- ==================== -->
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
                <p>
                    Selamat datang  ?>!
                </p>
            </div>
            <div class="img">
                <img src="img/jumbotron.png" alt="">
                <img class="jumbo2" src="img/jumbotron2.png" alt="">
            </div>
        </div>
        <div class="searchBox" id="product">
            <input class="searchInput" type="text" placeholder="Search">
            <span class="search">Lokasi</span>
            <span class="search">Radius</span>
        </div>
        <div class="product">
            <div class="prod">
                <h1>Best Seller</h1>
                <span>Lihat Semua</span>
                <div class="slider"><img src="img/slider.png" alt=""></div>
                <div class="items">
                    <!-- ... -->
                </div>
            </div>
        </div>
    </div>

    <footer>
        <img src="img/WarungIn.png" alt="">
        <ul>
            <li><a href="">Kerja Sama</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact Us</a></li>
        </ul>
    </footer>

    <script src="js/script.js"></script>
</body>

</html>