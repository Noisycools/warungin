<!-- ==================== -->
<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

?>
<!-- ==================== -->

<?php

$koneksi = mysqli_connect('localhost:3307', 'root', '', 'warungin');

if (isset($_POST['add_to_cart'])) {
    // if (isset($_SESSION['daftar_belanja'])){
    //     $barang_array_id = array_column($_SESSION['daftar_belanja'], "item_id");
    //     if (!in_array($_GET['id'], $barang_array_id)){
    //         $count = count($_SESSION['daftar_belanja']);
    //         $barang_array = array (
    //             'item_id'     => $_GET['id'],
    //             'nama_barang'   => $_POST['hidden_name'],
    //             'harga_barang'  => $_POST['hidden_price'],
    //             'jumlah_barang' => $_POST['jumlah']
    //         );
    //         $_SESSION['daftar_belanja'][$count] = $barang_array;
    //     } else {
    //         echo '<script>alert("Barang Sudah Ada Di Daftar Belanja!")</script>';
    //         echo '<script>window.location="index.php"</script>';
    //     }
    // } else {
    //     $barang_array = array (
    //         'item_id'     => $_GET['id'],
    //         'nama_barang'   => $_POST['hidden_name'],
    //         'harga_barang'  => $_POST['hidden_price'],
    //         'jumlah_barang' => $_POST['jumlah']
    //     );
    //     $_SESSION['daftar_belanja'][0] = $barang_array;
    // }

    $_SESSION["nama_barang"] = $_POST['hidden_name'];
    $_SESSION["harga_barang"] = $_POST['hidden_price'];
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == "add") {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $qty = validate($_POST["jumlah"]);
        $nama_barang = validate($_POST["hidden_name"]);
        $harga_barang = validate($_POST["hidden_price"]);
        $img_barang = validate($_POST["hidden_image"]);

        $cekQuantity = "SELECT * FROM daftar_belanja WHERE nama_barang='$nama_barang'";
        $result1 = mysqli_query($koneksi, $cekQuantity);

        if (mysqli_num_rows($result1) > 0) {
            echo "<script>alert('Barang sudah tersedia di Daftar Belanja!');</script>";
            header("Location: homepage.php?error=Barang sudah tersedia di Daftar Belanja!");
            exit();
        } else {
            $jumlahHarga = $harga_barang * $qty;
            $addQuantity = "INSERT INTO daftar_belanja(qty, nama_barang, harga_barang, img_barang) VALUES('$qty', '$nama_barang', '$jumlahHarga', '$img_barang')";
            $result2 = mysqli_query($koneksi, $addQuantity);
            if ($result2) {
                echo "<script>alert('Barang berhasil ditambahkan!')</script>";
                header("Location: homepage.php?succes=Barang berhasil ditambahkan!");
                exit();
            } else {
                echo "<script>alert('Ada error yang terjadi!')</script>";
                header("Location: homepage.php?error=Ada error yang terjadi!");
                exit();
            }
        }
    }
}

?>

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
                    Selamat datang <?php echo $_SESSION['user'] ?>!
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
                    <?php

                    $sql = "SELECT * FROM tabel_barang ORDER BY barang_id ASC";
                    $result = mysqli_query($koneksi, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <form method="post" action="homepage.php?action=add&id=<?php echo $row['barang_id']; ?>">
                                <div id="item" class="item"><img src="<?php echo $row['foto_barang']; ?>">
                                    <p><?php echo $row['nama_barang']; ?></p>
                                    <span>
                                        <?php echo $row['pemilik_barang']; ?> <br>
                                        Rp. <?php echo $row['harga_barang'] . ' /' . $row['satuan_barang']; ?> <br>
                                        Jl. Kebon Jeruk
                                    </span>
                                    <input class="atribute-item" type="text" name="jumlah" value="1">
                                    <input class="atribute-item" type="submit" name="add_to_cart" value="Tambahkan Ke Daftar Belanja">
                                    <input type="hidden" name="hidden_name" value="<?php echo $row['nama_barang']; ?>">
                                    <input type="hidden" name="hidden_price" value="<?php echo $row['harga_barang']; ?>">
                                    <input type="hidden" name="hidden_image" value="<?php echo $row['foto_barang']; ?>">
                                </div>
                            </form>
                        <?php } ?>
                    <?php } ?>
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