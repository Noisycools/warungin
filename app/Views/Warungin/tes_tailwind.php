<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="pt-24">
  <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
    <!--Left Col-->
    <div class="z-40 flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
      <p class="uppercase tracking-loose w-full">WarungIn</p>
      <?php if (logged_in()) : ?>
        <h1 class="my-4 text-2xl font-bold leading-tight md:text-5xl">
          Selamat datang, <?= user()->username; ?>!
        </h1>
      <?php else : ?>
        <h1 class="my-4 text-4xl font-bold leading-tight md:text-5xl">
          Setok warung anda secara online melalui website dengan satu klik!
        </h1>
        <p class="leading-normal text-2xl mb-8 mx-auto md:mx-0">
          Mulai daftar dan stock warungmu!
        </p>
        <button type="button" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
          <a href="/register">Daftar</a>
        </button>
      <?php endif; ?>
    </div>
    <!--Right Col-->
    <div class="w-full md:w-3/5 py-6 text-center">
      <img class="w-full md:w-4/5 z-50" src="img/jumbotron.png" />
    </div>
  </div>
</div>
<div class="relative -mt-12 lg:-mt-24">
  <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
        <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
        <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path>
        <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
      </g>
      <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
        <path d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"></path>
      </g>
    </g>
  </svg>
</div>

<section class="bg-white pt-16 relative mx-auto">
  <div class="swiper-container swiper-auto w-full ">
    <div class="swiper-wrapper">
      <div class="swiper-slide flex items-center justify-center">
        <img class="w-full h-full max-h-96 object-fill" src="/img/promo1.png">
      </div>
      <div class="swiper-slide flex items-center justify-center">
        <img class="w-full h-full max-h-96 object-fill" src="/img/promo2.jpg">
      </div>
      <div class="swiper-slide flex items-center justify-center">
        <img class="w-full h-full max-h-96 object-fill" src="/img/promo3.jpg">
      </div>
    </div>
  </div>
</section>

<section id="populer" class="bg-white pt-16 relative">
  <div class="
          relative
          items-center
          w-full
          px-5
          mx-auto
          md:px-12
          lg:px-24
          max-w-7xl
        ">
    <div class="flex justify-center">
      <h1 class="mb-2 text-4xl font-bold leading-none tracking-tighter  text-neutral-600 md:text-7xl lg:text-5xl"> Produk Terpopuler </h1>
    </div>
  </div>
  <div class="swiper-container swiper-populer w-full sm:w-4/5 ">
    <div class="swiper-wrapper">
      <?php foreach ($barang as $b) : ?>
        <div class="swiper-slide py-24 flex items-center justify-center">
          <div class="text-center">
            <div class="h-44 w-40 sm:w-44 mb-8 z-30">
              <img class="w-full h-full z-10 object-cover object-center" src="/img/<?= $b['foto_barang'] ?>">
            </div>
            <h1 class="mb-3 text-sm font-semibold leading-none tracking-tighter text-neutral-600">
              <?php echo $b['nama_barang'] ?>
            </h1>
            <span class="text-black">$00.00</span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="swiper-pagination"></div>
  </div>
</section>

<section class="bg-white pt-12 relative border-b pb-16">
  <div class="gradient flex items-center justify-center w-full p-10">
    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-2 xl:max-w-6xl max-w-4xl">
      <!-- Tile 1 -->
      <a href="#baru">
        <div class="flex bg-slate-500 rounded-lg p-4 m-2">
          <div class="w-24 bg-gray-400 p-5 rounded-lg">
            <img class="object-cover" src="/img/baru.png">
          </div>
          <div class="flex items-center justify-center ml-4">
            <h4 class="text-xl font-semibold">Produk terbaru</h4>
          </div>
        </div>
      </a>
      <!-- Tile 2 -->
      <a href="#banyak">
        <div class="flex bg-slate-500 rounded-lg p-4 m-2">
          <div class="w-24 bg-gray-400 p-5 rounded-lg">
            <img class="object-cover" src="/img/chat.png">
          </div>
          <div class="flex items-center justify-center ml-4">
            <h4 class="text-xl font-semibold">Paling banyak dicari</h4>
          </div>
        </div>
      </a>
      <!-- Tile 3 -->
      <a href="#populer">
        <div class="flex bg-slate-500 rounded-lg p-4 m-2">
          <div class="w-24 bg-gray-400 p-5 rounded-lg">
            <img class="object-cover" src="/img/fire.png">
          </div>
          <div class="flex items-center justify-center ml-4">
            <h4 class="text-xl font-semibold">Produk terpopuler</h4>
          </div>
        </div>
      </a>
    </div>
  </div>
</section>

<section id="baru" class="bg-white border-b pb-8">
  <div class="
          relative
          items-center
          w-full
          px-5
          py-12
          mx-auto
          md:px-12
          lg:px-24
          max-w-7xl
        ">
    <div class="flex justify-between">
      <h1 class="mb-8 text-4xl font-bold leading-none tracking-tighter  text-neutral-600 md:text-7xl lg:text-5xl"> Produk terbaru! </h1>
      <h3 class="text-red-700 my-auto"><a href="">Lihat semua -></a></h3>
    </div>
    <div class="grid grid-cols-2 gap-3 mx-auto sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
      <?php foreach ($barang as $b) : ?>
        <a href="/pages/detail_barang/<?= $b['slug']; ?>">
          <div class="p-6 sm:pb-5 rounded-lg shadow-lg sm:w-full">
            <img class="
                object-cover object-center
                h-28
                w-full
                mb-8
                lg:h-32
                rounded-xl
              " src="/img/<?= $b['foto_barang'] ?>">
            <div class="inline-flex justify-between w-full lg:mb-8">
              <h1 class="
                  mb-8
                  sm:mb-0
                  text-sm
                  font-semibold
                  leading-none
                  tracking-tighter
                  text-neutral-600
                "> <?php echo $b['nama_barang'] ?> </h1>
              <span class="text-black">$00.00</span>
            </div>
            <form action="/daftarbelanja/add" method="post">
              <input type="hidden" name="slug" value="<?= $b['slug']; ?>">
              <button class="w-full p-3 mx-auto text-xs font-medium gradient rounded-sm" type="button">
                Tambah ke Daftar Belanja
              </button>
            </form>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section id="banyak" class="bg-white border-b py-8">
  <div class="
          relative
          items-center
          w-full
          px-5
          py-12
          mx-auto
          md:px-12
          lg:px-24
          max-w-7xl
        ">
    <div class="flex justify-between">
      <h1 class="mb-8 text-4xl font-bold leading-none tracking-tighter  text-neutral-600 md:text-7xl lg:text-5xl"> Paling banyak dicari </h1>
      <h3 class="text-red-700 my-auto"><a href="">Lihat semua -></a></h3>
    </div>
    <div class="grid grid-cols-2 gap-3 mx-auto sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
      <?php foreach ($barang as $b) : ?>
        <a href="/pages/detail_barang/<?= $b['slug']; ?>">
          <div class="p-6 sm:pb-5 rounded-lg shadow-lg sm:w-full">
            <img class="
                object-cover object-center
                h-28
                w-full
                mb-8
                lg:h-32
                rounded-xl
              " src="/img/<?= $b['foto_barang'] ?>">
            <div class="inline-flex justify-between w-full lg:mb-8">
              <h1 class="
                  mb-8
                  sm:mb-0
                  text-sm
                  font-semibold
                  leading-none
                  tracking-tighter
                  text-neutral-600
                "> <?php echo $b['nama_barang'] ?> </h1>
              <span class="text-black">$00.00</span>
            </div>
            <form action="/daftarbelanja/add" method="post">
              <input type="hidden" name="slug" value="<?= $b['slug']; ?>">
              <button class="w-full p-3 mx-auto text-xs font-medium gradient rounded-sm" type="button">
                Tambah ke Daftar Belanja
              </button>
            </form>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- Change the colour #f8fafc to match the previous section colour -->
<svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
    <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
      <g class="wave" fill="#f8fafc">
        <path d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"></path>
      </g>
      <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
        <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
          <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
          <path d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z" opacity="0.100000001"></path>
          <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
        </g>
      </g>
    </g>
  </g>
</svg>
<section class="container mx-auto text-center py-6 mb-12">
  <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
    Kontak Kami
  </h1>
  <div class="w-full mb-4">
    <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
  </div>
  <button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
    Contact Us
  </button>
</section>

<?= $this->endSection(); ?>