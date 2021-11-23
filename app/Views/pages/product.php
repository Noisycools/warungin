<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="product" id="product">
    <div class="prod">
        <h1>Daftar Barang</h1>
        <div class="items" id="items">
            <?php foreach ($barang as $b) : ?>
                <a href="/pages/detail_barang/<?= $b['slug']; ?>">
                    <div class="item"><img src="/img/<?= $b['foto_barang'] ?>" alt="">
                        <p><?php echo $b['nama_barang'] ?></p><span><?php echo $b['pemilik_barang'] ?> <br>Jl. Kebon Jeruk</span><br>
                        <form action="/daftarbelanja/add" method="post">
                            <input type="hidden" name="slug" value="<?= $b['slug']; ?>">
                            <div class="btn-1">
                                <div class="btn-a">
                                    <button type="submit"><span>Tambahkan ke Daftar Belanja</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>