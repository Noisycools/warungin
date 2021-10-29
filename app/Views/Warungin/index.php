<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="jumbotron" id="home">
        <div class="jumboText">
            <h1>WarungIn</h1>
            <?php if (logged_in()) : ?>
                <p>Selamat datang kembali, <?= user()->username; ?>!</p>
            <?php else : ?>
                <p>Setok warung anda secara online melalui website <br>
                    dengan satu klik!<br>
                </p>
                <div class="continue">
                    <p>Mulai daftar dan stock warungmu!</p>
                    <span class="unik"><a class="unk" href="/register"><img src="img/new.png" alt="">Sign Up</a></span>
                    Atau <span><a class="a" href="/login">Login</a></span>
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
    <div class="product" id="product">
        <div class="prod">
            <h1>Terlaris bulan ini!</h1>
            <span><a href="pages/product">Lihat Semua</a></span>
            <div class="slider"><img src="img/slider.png" alt=""></div>

            <div class="items" id="items">
                <?php foreach ($barang as $b) : ?>
                    <a href="/pages/detail_barang/<?= $b['slug']; ?>">
                        <div class="item"><img src="/img/<?= $b['foto_barang'] ?>" alt="">
                            <p><?php echo $b['nama_barang'] ?></p><br>
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

    <div class="product"></div>

</div>
<?= $this->endSection(); ?>