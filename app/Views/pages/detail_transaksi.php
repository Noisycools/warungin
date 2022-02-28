<?= $this->extend('layout/tem_detail_transaksi'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="heading">
        <a href="/"><img src="/img/WarungIn.png" alt="WarungIn"></a>
    </div>

    <div class="cart transition is-open">

        <h1>Detail Transaksi</h1>

        <div class="center">
            <div class="layout-inline row th">
                <div class="col align-center">Kode Transaksi &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &ensp;: &ensp; <?= $transaksi->kode_transaksi ?></div>
            </div>
            <div class="layout-inline row th">
                <div class="col align-center">Tanggal Pembayaran &nbsp; &nbsp; &ensp;: &ensp; <?= $transaksi->tgl_pembayaran ?></div>
            </div>
            <div class="layout-inline row th">
                <div class="col align-center">Nama Penerima &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &ensp;: &ensp; <?= $transaksi->nama_penerima ?></div>
            </div>
            <div class="layout-inline row th">
                <div class="col align-center">Nama Warung &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &ensp;: &ensp; <?= $transaksi->nama_warung ?></div>
            </div>
            <div class="layout-inline row th">
                <div class="col align-center">Alamat &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &ensp;: &ensp; <?= $transaksi->alamat ?></div>
            </div>
            <div class="layout-inline row th">
                <div class="col align-center">No HP &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &ensp;: &ensp; <?= $transaksi->no_hp ?></div>
            </div>
            <div class="layout-inline row th">
                <div class="col align-center">Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &ensp;: &ensp; <?= $transaksi->email ?></div>
            </div>
            <form action="/pages/struk" method="post">
                <button type="submit" class="btn btn-update">Lihat Struk Belanja</button>
                <input type="hidden" name="kodeTransaksi" value="<?= $transaksi->kode_transaksi ?>">
            </form>
        </div>
    </div>

    <script src="js/script_daftar_belanja.js"></script>

    <?= $this->endSection(); ?>