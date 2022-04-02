<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/bundle.js" defer></script>

    <?php

    use Myth\Auth\Collectors\Auth; ?>

    <!-- <link rel="stylesheet" href="/css/swiper-bundle.css">
  <script src="/js/swiper-bundle.js"></script> -->

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.css">
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

    <style>
        .gradient {
            background: linear-gradient(90deg, #df1b1b 0%, #c72c2c 100%);
        }

        /* Toggle A */
        input:checked~.dot {
            transform: translateX(100%);
            background-color: #48bb78;
        }
    </style>

    <title><?= $title; ?></title>
</head>

<body>
    <?php $item3 = 0 ?>
    <?php $item2 = 0 ?>
    <?php $item1 = 0 ?>
    <main class="gradient h-screen overflow-hidden relative">
        <div class="flex items-start justify-between">
            <div class="flex flex-col w-full md:space-y-4">
                <header class="w-full h-16 z-40 flex items-center justify-between">
                    <div class="relative flex justify-center w-24 pl-3 pt-3 lg:ml-0">
                        <a href="#" class="">
                            <img src="/img/WarungIn.png" class="w-full h-full" alt="Logo Warungin" />
                        </a>
                    </div>
                    <div class="relative z-20 flex flex-col justify-end h-full px-3 md:w-full">
                        <div class="relative p-1 flex items-center w-full space-x-4 justify-end">
                            <button class="flex p-2 items-center rounded-full text-gray-400 hover:text-gray-700 bg-white shadow text-md">
                                <svg width="20" height="20" class="" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1520 1216q0-40-28-68l-208-208q-28-28-68-28-42 0-72 32 3 3 19 18.5t21.5 21.5 15 19 13 25.5 3.5 27.5q0 40-28 68t-68 28q-15 0-27.5-3.5t-25.5-13-19-15-21.5-21.5-18.5-19q-33 31-33 73 0 40 28 68l206 207q27 27 68 27 40 0 68-26l147-146q28-28 28-67zm-703-705q0-40-28-68l-206-207q-28-28-68-28-39 0-68 27l-147 146q-28 28-28 67 0 40 28 68l208 208q27 27 68 27 42 0 72-31-3-3-19-18.5t-21.5-21.5-15-19-13-25.5-3.5-27.5q0-40 28-68t68-28q15 0 27.5 3.5t25.5 13 19 15 21.5 21.5 18.5 19q33-31 33-73zm895 705q0 120-85 203l-147 146q-83 83-203 83-121 0-204-85l-206-207q-83-83-83-203 0-123 88-209l-88-88q-86 88-208 88-120 0-204-84l-208-208q-84-84-84-204t85-203l147-146q83-83 203-83 121 0 204 85l206 207q83 83 83 203 0 123-88 209l88 88q86-88 208-88 120 0 204 84l208 208q84 84 84 204z">
                                    </path>
                                </svg>
                            </button>
                            <button class="flex p-2 items-center rounded-full bg-white shadow text-gray-400 hover:text-gray-700 text-md">
                                <svg width="20" height="20" class="text-gray-400" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M912 1696q0-16-16-16-59 0-101.5-42.5t-42.5-101.5q0-16-16-16t-16 16q0 73 51.5 124.5t124.5 51.5q16 0 16-16zm816-288q0 52-38 90t-90 38h-448q0 106-75 181t-181 75-181-75-75-181h-448q-52 0-90-38t-38-90q50-42 91-88t85-119.5 74.5-158.5 50-206 19.5-260q0-152 117-282.5t307-158.5q-8-19-8-39 0-40 28-68t68-28 68 28 28 68q0 20-8 39 190 28 307 158.5t117 282.5q0 139 19.5 260t50 206 74.5 158.5 85 119.5 91 88z">
                                    </path>
                                </svg>
                            </button>
                            <?php if (logged_in()) : ?>
                                <button type="button" class="ml-auto mr-2 text-white bg-slate-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><a href="/logout">Logout</a></button>
                            <?php endif; ?>
                            <span class="w-1 h-8 rounded-lg bg-gray-200">
                            </span>
                        </div>
                    </div>
                </header>
                <div class="overflow-auto h-screen pb-24 px-4 md:px-6">
                    <h1 class="text-4xl font-semibold text-white">
                        Selamat Siang, <?= user()->username; ?>
                    </h1>
                    <h2 class="text-md text-gray-400">
                        Berikut data pesanan hari ini.
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-4">

                        <!-- THIS IS THE PENDING TRANSACTION -->

                        <div id="item3-container" class="w-full h-96">
                            <div class="container flex flex-col w-full items-center justify-center bg-red-500 rounded-lg shadow-lg">
                                <div class="px-4 py-5 sm:px-6 border-b w-full">
                                    <h3 class="text-lg leading-6 font-medium text-white">
                                        <?= $transaksi['kode_transaksi'] ?>
                                    </h3>
                                </div>
                                <ul class="flex flex-col divide divide-y w-full">
                                    <li class="flex flex-row">
                                        <div class="select-none flex flex-1 items-center p-4">
                                            <div class="flex-1 pl-1 mr-16">
                                                <ul>
                                                    <li class="text-white font-medium text-sm lg:w-full"><b class="inline-block w-1/2 relative pr-3 after:content-[':'] after:absolute after:right-3">Nama Penerima</b> <?= $transaksi['nama_penerima'] ?></li>
                                                    <li class="text-white font-medium text-sm lg:w-full"><b class="inline-block w-1/2 relative pr-3 after:content-[':'] after:absolute after:right-3">Nama Warung</b> <?= $transaksi['nama_warung'] ?></li>
                                                    <li class="text-white font-medium text-sm lg:w-full"><b class="inline-block w-1/2 relative pr-3 after:content-[':'] after:absolute after:right-3">Alamat</b> <?= $transaksi['alamat'] ?></li>
                                                    <li class="text-white font-medium text-sm lg:w-full"><b class="inline-block w-1/2 relative pr-3 after:content-[':'] after:absolute after:right-3">No HP</b> <?= $transaksi['no_hp'] ?></li>
                                                    <li class="text-white font-medium text-sm lg:w-full"><b class="inline-block w-1/2 relative pr-3 after:content-[':'] after:absolute after:right-3">Email</b> <?= $transaksi['email'] ?></li>
                                                    <li class="text-white font-medium text-sm lg:w-full"><b class="inline-block w-1/2 relative pr-3 after:content-[':'] after:absolute after:right-3">Tanggal Pembayaran</b> <?= $transaksi['tgl_pembayaran'] ?> <?= $transaksi['waktu_created_at'] ?> WIB</li>
                                                </ul>
                                                <label for="toogleA" class="flex items-center cursor-pointer mt-6">
                                                    <!-- toggle -->
                                                    <div class="relative">
                                                        <!-- input -->
                                                        <input id="toogleA" type="checkbox" class="sr-only" onclick="ifChecked()" />
                                                        <!-- line -->
                                                        <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                                        <!-- dot -->
                                                        <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                                                    </div>
                                                    <!-- label -->
                                                    <div class="ml-3 text-white font-bold">
                                                        <span id="status">Pending</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <form action="/checkout/updatestatus" method="post">
                                <input type="hidden" name="kodeTransaksi" value="<?= $transaksi['kode_transaksi']; ?>">
                                <input type="hidden" id="statusHidden" name="status" value="Pending">
                                <div class="flex items-center mt-6"> <i class="fa fa-arrow-left text-sm pr-2 text-white"></i> <span class="text-md font-medium text-white"><button type="submit">Kembali</button></span> </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function ifChecked() {
        if (document.getElementById('toogleA').checked == true) {
            document.getElementById('status').textContent = 'Diproses';
            document.getElementById('statusHidden').value = 'Diproses';
        } else {
            document.getElementById('status').textContent = 'Pending';
            document.getElementById('statusHidden').value = 'Pending';
        }
    }
</script>

</html>