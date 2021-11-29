<?= $this->extend('layout/tem_histori_transaksi'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="heading">
        <a href="/"><img src="/img/WarungIn.png" alt="WarungIn"></a>
        <a href="#" class="visibility-cart transition is-open">X</a>
    </div>

    <div class="cart transition is-open">

        <h1>Histori Transaksi</h1>


        <div class="table">

            <div class="layout-inline row th">
                <div class="col col-pro col-kode">Kode Transaksi</div>
                <div class="col col-price">Nama Penerima</div>
                <div class="col">Nama Warung</div>
                <div class="col col-price">Alamat</div>
                <div class="col col-price">No HP</div>
                <div class="col">Email</div>
            </div>
            <?php foreach ($transaksi->getResult() as $t) : ?>
                <a href="#">
                    <div class="layout-inline row rows">
                        <div class="col col-pro layout-inline">
                            <p><?= $t->kode_transaksi; ?></p>
                        </div>

                        <div class="col col-price col-nama">
                            <p><?= $t->nama_penerima; ?></p>
                        </div>

                        <div class="col col-total">
                            <p><?= $t->nama_warung; ?></p>
                        </div>

                        <div class="col col-numeric col-alamat">
                            <p><?= $t->alamat; ?></p>
                        </div>

                        <div class="col col-numeric">
                            <p><?= $t->no_hp; ?></p>
                        </div>

                        <div class="col col-numeric">
                            <p><?= $t->email; ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>

        </div>
        <script src="js/script_daftar_belanja.js"></script>

        <?= $this->endSection(); ?>