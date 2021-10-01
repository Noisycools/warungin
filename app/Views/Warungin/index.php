<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="jumbotron" id="home">
        <div class="jumboText">
            <h1>WarungIn</h1>
            <?php if (logged_in()) : ?>
                <p>Selamat datang kembali !</p>
            <?php else : ?>
                <p>Pengen nyetok warung jadi lebih praktis dan terorganisir ?<br>
                    Males keluar Rumah untuk belanja stok di warung ?
                </p>
                <div class="continue">
                    <p>Coba WarungIn Aja Dengan</p>
                    <span class="sosmed"><img src="img/google.png" alt=""> With Google</span>
                    <span class="garus">|</span>
                    <span class="sosmed fb"><img src="img/fb.png" alt=""> With Facebook</span>
                </div>
            <?php endif; ?>
        </div>
        <div class="img">
            <img src="img/jumbotron.png" alt="">
            <img class="jumbo2" src="img/jumbotron2.png" alt="">
        </div>
    </div>
    <div class="searchBox" id="product">
        <input class="searchInput" type="text" placeholder="Search" name="keyword">
        <span class="search" id="basic-addon2">Cari</span>
        <span class="search" id="basic-addon2">Lokasi</span>
        <span class="search" id="basic-addon2">Radius</span>
    </div>
    <div class="product">
        <div class="prod">
            <h1>Best Seller</h1>
            <span>Lihat Semua</span>
            <div class="slider"><img src="img/slider.png" alt=""></div>
            <div class="items">
                <?php foreach ($barang as $b) : ?>
                    <a href="/pages/detail_barang/<?= $b['slug']; ?>">
                        <div class="item"><img src="<?php echo $b['foto_barang'] ?>" alt="">
                            <p><?php echo $b['nama_barang'] ?></p><span><?php echo $b['pemilik_barang'] ?> <br>Jl. Kebon Jeruk</span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>