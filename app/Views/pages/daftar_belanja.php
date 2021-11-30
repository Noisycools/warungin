<?= $this->extend('layout/tem_daftar_belanja'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="heading">
    <a href="/"><img src="/img/WarungIn.png" alt="WarungIn"></a>
    <a href="#" class="visibility-cart transition is-open">X</a>
  </div>

  <div class="cart transition is-open">

    <h1>Daftar Belanja</h1>


    <div class="table">

      <div class="layout-inline row th">
        <div class="col col-pro">Product</div>
        <div class="col col-price align-center "> Price</div> &ensp; &ensp;
        <div class="col">Total</div> &ensp; &ensp;
        <div class="col">QTY</div>
        <div class="col"></div>
      </div>
      <?php $shipping = 0; ?>
      <?php foreach ($barang->getResult() as $b) : $shipping++; ?>
        <div class="layout-inline row">
          <div class="col col-pro layout-inline">
            <img src="/img/<?= $b->img_barang; ?>" alt="kitten" />
            <p><?= $b->nama_barang; ?></p>
          </div>

          <div class="col col-price col-numeric align-center ">
            <p><?= "Rp. " . number_format($b->harga_barang, 2, ',', '.'); ?></p>
          </div>

          <div class="col col-total col-numeric">
            <p><?= "Rp. " . number_format($b->harga_total, 2, ',', '.'); ?></p>
          </div>

          <div class="col col-numeric">
            <p><?= $b->qty; ?></p>
          </div>

          <div class="col col-action">
            <div class="action">
              <form action="/daftarbelanja/delete" method="post">
                <button type="submit"><img src="/img/trash-can.png" alt="" srcset=""></button>
                <input type="hidden" name="nama_barang" value="<?= $b->nama_barang; ?>">
              </form>
            </div>
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
          <div class="col">
            <h2><?= $shipping ?></h2>
          </div>
        </div>
        <div class="row layout-inline">
          <div class="col">
            <p>Total</p>
          </div>
          <div class="col">
            <?php foreach ($total->getResult() as $rows) : ?>
              <h2><?php echo "Rp. " . number_format($rows->total_harga, 2, ',', '.'); ?></h2>
            <?php endforeach;  ?>
          </div>
        </div>
      </div>
    </div>

    <a href="/checkout" class="btn btn-update">Checkout</a>

  </div>
  <script src="js/script_daftar_belanja.js"></script>
  <?= $this->endSection(); ?>