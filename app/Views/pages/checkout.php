<?= $this->extend('layout/tem_checkout'); ?>

<?= $this->section('content'); ?>

<div class="wrapper">
    <div class="container">
        <form action="/checkout/buatPesanan" method="post" onsubmit="return confirm('Anda yakin untuk buat pesanan?');">
            <h1>
                <i class="fas fa-shipping-fast"></i>
                Rincian pengiriman
            </h1>
            <div class="name">
                <div>
                    <label for="f-name">Nama Penerima</label>
                    <input type="text" name="namaPenerima">
                </div>
                <div>
                    <label for="l-name">Nama Warung</label>
                    <input type="text" name="namaWarung" value="<?= $profile->nama_warung; ?>">
                </div>
            </div>
            <div class="street">
                <label for="name">Alamat</label>
                <input type="text" name="alamat" value="<?= $profile->alamat; ?>">
            </div>
            <div class="name">
                <div>
                    <label for="city">No. Hp</label>
                    <input type="text" name="noHp" value="<?= $profile->no_hp; ?>">
                </div>
                <div>
                    <label for="zip">Email</label>
                    <input type="text" name="email" value="<?= $profile->email; ?>">
                </div>
            </div>
            <h1>
                <i class="far fa-credit-card"></i> Informasi Pembayaran
            </h1>
            <div class="cc-num">
                <label>Barang yang dibeli : </label> <br>
                <?php $urutanKe = 0; ?>
                <?php $qtyKe = 0; ?>
                <?php foreach ($barang->getResult() as $b) : ?>
                    <label>- <?= $b->nama_barang; ?> (<?= $b->qty; ?>)</label> <br>
                    <input type="hidden" name="nama_barang<?= $urutanKe++ ?>" value="<?= $b->nama_barang; ?>">
                    <input type="hidden" name="qty<?= $qtyKe++ ?>" value="<?= $b->qty; ?>">
                <?php endforeach; ?>
                <input type="hidden" name="jumlahBarang" value="<?= $urutanKe ?>">
            </div>
            <div class="cc-num">
                <label>Total : </label>
                <?php foreach ($total->getResult() as $rows) : ?>
                    <label><?php echo "Rp. " . number_format($rows->total_harga, 2, ',', '.'); ?></label>
                    <input type="hidden" name="totalHarga" value="<?= $rows->total_harga; ?>">
                <?php endforeach;  ?>
            </div>
            <div class="btns">
                <input type="hidden" name="kodeTransaksi" value="
                    <?php echo $kodeTransaksi = 'wr-'.random_string('alnum', 5); ?>
                ">
                <button type="submit" id="submit">Buat Pesanan</button>
                <button><a href="/daftar_belanja">Kembali</a></button>
            </div>
        </form>
    </div>
</div>


<?= $this->endSection(); ?>