<?= $this->extend('layout/tem_detail_barang'); ?>

<?= $this->section('content'); ?>
<main class="container">

    <!-- Left Column / Headphones Image -->
    <div class="left-column">
        <img src="/<?= $barang['foto_barang']; ?>" alt="">
    </div>


    <!-- Right Column -->
    <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
            <span><?= $barang['kategori_barang']; ?></span>
            <h1><?= $barang['nama_barang']; ?></h1>
            <p>
                Pemilik Barang : <br> <br>
                <?= $barang['pemilik_barang']; ?> <br>
                <br>
            </p>
        </div>

        <!-- Product Configuration -->
        <div class="product-configuration">

            <!-- Quantity -->
            <div class="cable-config">
                <div class="quantity">
                    <button class="plus-btn" type="button" name="button">
                        <img src="/img/plus.svg" alt="" />
                    </button>
                    <input type="text" name="name" value="1">
                    <button class="minus-btn" type="button" name="button">
                        <img src="/img/minus.svg" alt="" />
                    </button>
                </div>
            </div>

            <!-- Product Pricing -->
            <div class="product-price">
                <span>Rp. <?= $barang['harga_barang']; ?></span>
                <a href="#" class="cart-btn">Tambahkan ke Daftar Belanja</a>
            </div>
        </div>
</main>
<?= $this->endSection(); ?>