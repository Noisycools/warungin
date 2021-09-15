<!-- ==================== -->
<?php

if (!isset($_SESSION['user'])) {
  header("Location: login.php");
}

$koneksi = mysqli_connect('localhost:3307', 'root', '', 'warungin');

?>
<!-- ==================== -->


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Belanja | WarungIn</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="css/style_daftar_belanja.css">
</head>

<body>
  <div class="container">
    <div class="heading">
      <a href="homepage.php"><img src="img/WarungIn.png" alt="WarungIn"></a>
      <a href="#" class="visibility-cart transition is-open">X</a>
    </div>

    <div class="cart transition is-open">

      <a href="#" class="btn btn-update">Update cart</a>


      <div class="table">

        <div class="layout-inline row th">
          <div class="col col-pro">Product</div>
          <div class="col col-price align-center ">
            Price
          </div>
          <div class="col col-qty align-center">QTY</div>
          <div class="col">Total</div>
        </div>

        <?php
        $result1 = mysqli_query($koneksi, "SELECT * FROM daftar_belanja");
        while ($row = mysqli_fetch_array($result1)) {


        ?>
          <div class="layout-inline row">
            <div class="col col-pro layout-inline">
              <img src="<?php echo $row['img_barang'] ?>" alt="kitten" />
              <p><?php echo $row['nama_barang'] ?></p>
            </div>

            <div class="col col-price col-numeric align-center ">
              <p><?php echo $row['harga_barang'] ?></p>
            </div>

            <div class="col col-qty layout-inline">
              <a href="#" class="qty qty-minus">-</a>
              <input type="numeric" value="<?php echo $row['qty'] ?>" />
              <a href="#" class="qty qty-plus">+</a>
            </div>

            <div class="col col-total col-numeric">
              <p> <?php echo $row['harga_barang'] ?></p>
            </div>
          </div>
        <?php } ?>


        <div class="tf">
          <div class="row layout-inline">
            <div class="col"></div>
          </div>
          <div class="row layout-inline">
            <div class="col">
              <p>Shipping</p>
            </div>
            <div class="col"></div>
          </div>
          <div class="row layout-inline">
            <div class="col">
              <p>Total</p>
            </div>
            <div class="col"></div>
          </div>
        </div>
      </div>

      <a href="#" class="btn btn-update">Update cart</a>

    </div>
    <script src="js/script_daftar_belanja.js"></script>
</body>

</html>