<?= $this->extend('layout/tem_checkout'); ?>

<?= $this->section('content'); ?>

<div class="wrapper">
    <div class="container">
        <form action="">
            <h1>
                <i class="fas fa-shipping-fast"></i>
                Rincian pengiriman
            </h1>
            <div class="name">
                <div>
                    <label for="f-name">Nama Depan</label>
                    <input type="text" name="f-name">
                </div>
                <div>
                    <label for="l-name">Nama Belakang</label>
                    <input type="text" name="l-name">
                </div>
            </div>
            <div class="street">
                <label for="name">Alamat</label>
                <input type="text" name="address">
            </div>
            <div class="address-info">
                <div>
                    <label for="city">Kecamatan</label>
                    <input type="text" name="city">
                </div>
                <div>
                    <label for="state">Kelurahan</label>
                    <input type="text" name="state">
                </div>
                <div>
                    <label for="zip">Kode Pos</label>
                    <input type="text" name="zip">
                </div>
            </div>
            <h1>
                <i class="far fa-credit-card"></i> Informasi Pembayaran
            </h1>
            <div class="cc-num">
                <label>Barang yang dibeli : </label> <br>
                <?php foreach ($barang as $b) : ?>
                    <label>- <?= $b['nama_barang']; ?> (<?= $b['qty']; ?>)</label> <br>
                <?php endforeach; ?>
            </div>
            <div class="cc-num">
                <label>Total : </label>
                <?php foreach ($total->getResult() as $rows) : ?>
                    <label><?php echo "Rp. " . number_format($rows->total_harga, 2, ',', '.'); ?></label>
                <?php endforeach;  ?>
            </div>
            <div class="btns">
                <button><a href="warungin/templatePDF">Buat Pesanan</a></button>
                <button><a href="/daftar_belanja">Kembali</a></button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>