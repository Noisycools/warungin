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
        <div class="layout-inline row">
          <div class="col col-pro layout-inline">
            <img src="img/shampoo.jpg" alt="kitten" />
            <p>Lifebuoy Shampoo</p>
          </div>

          <div class="col col-price col-numeric align-center ">
            <p>16000</p>
          </div>

          <div class="col col-qty layout-inline">
            <a href="#" class="qty qty-minus">-</a>
            <input type="numeric" value="1" />
            <a href="#" class="qty qty-plus">+</a>
          </div>

          <div class="col col-total col-numeric">
            <p> 16000</p>
          </div>
        </div>


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