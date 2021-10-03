<?= $this->extend('layout/tem_daftar_belanja'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="heading">
    <a href="/"><img src="img/WarungIn.png" alt="WarungIn"></a>
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
        <div class="col">Total</div>
      </div>
      <?php foreach ($barang as $b) : ?>
        <div class="layout-inline row">
          <div class="col col-pro layout-inline">
            <img src="/<?= $b['img_barang']; ?>" alt="kitten" />
            <p><?= $b['nama_barang']; ?></p>
          </div>

          <div class="col col-price col-numeric align-center ">
            <p><?= (int)$b['harga_barang'] * $b['qty']; ?></p>
          </div>

          <div class="col col-total col-numeric">
            <p><?= $b['harga_barang']; ?></p>
          </div>
        </div>

      <?php endforeach; ?>


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
  <?= $this->endSection(); ?>