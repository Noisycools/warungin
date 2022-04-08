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
    </style>

    <title><?= $title; ?></title>
</head>

<body x-data="{ popup: false, flashdata: true }">
    <form action="/checkout/updatestatus" method="post">
        <?php $item3 = 0 ?>
        <?php $item2 = 0 ?>
        <?php $item1 = 0 ?>
        <!-- Delete Product Modal -->
        <?php if (session()->getFlashdata('message')) : ?>
            <!-- Main modal -->
            <div id="walletModal" x-show="flashdata" tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 md:h-full flex items-center justify-center h-full bg-black bg-opacity-40">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow pt-6">
                        <!-- Modal header -->
                        <div class="flex justify-center items-center py-2 px-6 rounded-t">
                            <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                                <?= session()->getFlashdata('message') ?> <i class="far fa-check-circle text-green-500"></i>
                            </h3>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 text-center">
                            <button @click="flashdata = false" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                OK
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div id="popup-modal" x-show="popup" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 flex items-center justify-center h-full bg-slate-400 bg-opacity-50">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-end p-4"></div>
                    <!-- Modal body -->
                    <div class="p-6 pt-0 text-center">
                        <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah pesanan ini selesai dikirim?</h3>
                        <input type="hidden" name="status" value="Dikirim">
                        <button type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Ya, sudah
                        </button>
                        <button @click="popup = false" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Belum</button>
                    </div>
                </div>
            </div>
        </div>
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
                        <div class="flex my-6 items-center w-full space-y-4 md:space-x-4 md:space-y-0 flex-col md:flex-row">
                            <div class="w-full md:w-6/12">
                                <div class="shadow-lg w-full bg-red-500 relative overflow-hidden">
                                    <a href="#" class="w-full h-full block">
                                        <div class="w-1/2">
                                            <div class="px-4 py-6 w-full bg-red-500 relative">
                                                <p id="pending" class="text-2xl text-white font-bold">

                                                </p>
                                                <p class="text-gray-200 text-sm">
                                                    Pesanan pending hari ini
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="flex items-center w-full md:w-1/2 space-x-4">
                                <div class="w-1/2">
                                    <div class="shadow-lg px-4 py-6 w-full bg-red-500 relative">
                                        <p id="diproses" class="text-2xl text-white font-bold">

                                        </p>
                                        <p class="text-gray-200 text-sm">
                                            Pesanan diproses hari ini
                                        </p>
                                    </div>
                                </div>
                                <div class="w-1/2">
                                    <div class="shadow-lg px-4 py-6 w-full bg-red-500 relative">
                                        <p id="dikirim" class="text-2xl text-white font-bold">

                                        </p>
                                        <p class="text-gray-200 text-sm">
                                            Pesanan selesai dikirim hari ini
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button class="flex items-center text-gray-400 text-md border-gray-300 border px-4 py-2 rounded-tl-sm rounded-bl-full rounded-r-full">
                                <svg width="20" height="20" fill="currentColor" class="mr-2 text-gray-400" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M192 1664h288v-288h-288v288zm352 0h320v-288h-320v288zm-352-352h288v-320h-288v320zm352 0h320v-320h-320v320zm-352-384h288v-288h-288v288zm736 736h320v-288h-320v288zm-384-736h320v-288h-320v288zm768 736h288v-288h-288v288zm-384-352h320v-320h-320v320zm-352-864v-288q0-13-9.5-22.5t-22.5-9.5h-64q-13 0-22.5 9.5t-9.5 22.5v288q0 13 9.5 22.5t22.5 9.5h64q13 0 22.5-9.5t9.5-22.5zm736 864h288v-320h-288v320zm-384-384h320v-288h-320v288zm384 0h288v-288h-288v288zm32-480v-288q0-13-9.5-22.5t-22.5-9.5h-64q-13 0-22.5 9.5t-9.5 22.5v288q0 13 9.5 22.5t22.5 9.5h64q13 0 22.5-9.5t9.5-22.5zm384-64v1280q0 52-38 90t-90 38h-1408q-52 0-90-38t-38-90v-1280q0-52 38-90t90-38h128v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h384v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h128q52 0 90 38t38 90z">
                                    </path>
                                </svg>
                                Last month
                                <svg width="20" height="20" class="ml-2 text-gray-400" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1408 704q0 26-19 45l-448 448q-19 19-45 19t-45-19l-448-448q-19-19-19-45t19-45 45-19h896q26 0 45 19t19 45z">
                                    </path>
                                </svg>
                            </button>
                            <span class="text-sm text-gray-400">
                                Compared to oct 1- otc 30, 2020
                            </span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 my-4">

                            <!-- THIS IS THE PENDING TRANSACTION -->

                            <div id="item3-container" class="w-full h-96">
                                <div class="container flex flex-col w-full items-center justify-center bg-red-500 rounded-lg shadow-lg">
                                    <div class="px-4 py-5 sm:px-6 border-b w-full">
                                        <h3 class="text-lg leading-6 font-medium text-white">
                                            Daftar Pesanan
                                        </h3>
                                    </div>
                                    <ul class="flex flex-col divide divide-y">

                                        <?php foreach ($pending->getResult('array') as $t) : ?>
                                            <?php $item3++ ?>
                                            <li class="flex flex-row">
                                                <div class="select-none flex flex-1 items-center p-4">
                                                    <div class="flex items-center justify-center relative w-14 h-16 bg-white rounded-full shadow-md mr-4">
                                                        <p class="mx-auto text-center text-xs font-bold w-full"><?= $t['kode_transaksi']; ?></p>
                                                    </div>
                                                    <!-- <div class="flex flex-col w-10 h-10 justify-center items-center mr-4">
                                                </div> -->
                                                    <div class="flex-1 pl-1 mr-16">
                                                        <div class="font-medium text-white lg:w-full">
                                                            <?= $t['nama_penerima']; ?>
                                                        </div>
                                                        <div class="text-gray-200 text-sm lg:w-full">
                                                            <?= $t['alamat']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="text-gray-200 text-xs">
                                                        <?php
                                                        echo $t['waktu_created_at'] . ' WIB';
                                                        ?>
                                                    </div>
                                                    <a href="<?= '/pages/detail_transaksi/' . $t['kode_transaksi']; ?>" class="w-24 lg:w-12 text-right lg:text-center flex justify-end lg:justify-center">
                                                        <svg width="20" fill="currentColor" height="20" class="dark:hover:text-white text-gray-200" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                        <?php if ($item3 <= 0) : ?>
                                            <div class="p-6 text-center">
                                                <h3 class="text-sm leading-6 font-medium text-gray-400">
                                                    Tidak ada
                                                </h3>
                                            </div>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>

                            <!-- //THIS IS THE PENDING TRANSACTION// -->

                            <!-- ================================================== -->

                            <div id="item2-container" class="w-full max-h-96">
                                <div class="container flex flex-col mx-auto w-full items-center justify-center bg-red-500 rounded-lg shadow-lg">
                                    <div class="px-4 py-5 sm:px-6 border-b w-full">
                                        <h3 class="text-lg leading-6 font-medium text-white">
                                            Pesanan Diproses
                                        </h3>
                                    </div>
                                    <ul class="flex flex-col divide divide-y w-full p-5">

                                        <?php foreach ($proses->getResult('array') as $s) : ?>
                                            <?php $item2++ ?>
                                            <li class="flex flex-row">
                                                <div class="select-none flex flex-1 items-center p-4">
                                                    <div class="flex flex-col w-10 h-10 justify-center items-center mr-4">
                                                        <a href="#" class="block relative">
                                                            <img alt="profil" src="/img/profile.jpg" class="mx-auto object-cover rounded-full h-10 w-10 " />
                                                        </a>
                                                    </div>
                                                    <div class="flex-1 pl-1 mr-16">
                                                        <div class="font-medium text-white">
                                                            <?= $s['nama_warung'] ?>
                                                        </div>
                                                        <div class="text-gray-200 text-sm">
                                                            <?= $s['nama_penerima'] ?> (<i><?= $s['kode_transaksi'] ?></i>)
                                                            <input type="hidden" name="kodeTransaksi" value="<?= $s['kode_transaksi'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="text-gray-200 text-md">
                                                        <i class="far fa-clock"></i>
                                                    </div>
                                                </div>
                                                <div class="text-blue-500 cursor-pointer text-md relative ml-4">
                                                    <button @click="popup = !popup" type="button"><i class="far fa-check-square absolute top-0 right-0"></i></button>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                        <?php if ($item2 <= 0) : ?>
                                            <div class="p-6 text-center">
                                                <h3 class="text-sm leading-6 font-medium text-gray-400">
                                                    Tidak ada
                                                </h3>
                                            </div>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>


                            <div id="item1-container" class="w-full max-h-96">
                                <div class="container flex flex-col mx-auto w-full items-center justify-center bg-red-500 rounded-lg shadow-lg">
                                    <div class="px-4 py-5 sm:px-6 border-b w-full">
                                        <h3 class="text-lg leading-6 font-medium text-white">
                                            Pesanan Dikirim
                                        </h3>
                                    </div>
                                    <ul class="flex flex-col divide divide-y w-full p-5">

                                        <?php foreach ($dikirim->getResult('array') as $s) : ?>
                                            <?php $item1++ ?>
                                            <li class="flex flex-row">
                                                <div class="select-none flex flex-1 items-center p-4">
                                                    <div class="flex flex-col w-10 h-10 justify-center items-center mr-4">
                                                        <a href="#" class="block relative">
                                                            <img alt="profil" src="/img/profile.jpg" class="mx-auto object-cover rounded-full h-10 w-10 " />
                                                        </a>
                                                    </div>
                                                    <div class="flex-1 pl-1 mr-16">
                                                        <div class="font-medium text-white">
                                                            <?= $s['nama_warung'] ?>
                                                        </div>
                                                        <div class="text-gray-200 text-sm">
                                                            <?= $s['nama_penerima'] ?> (<i><?= $s['kode_transaksi'] ?></i>)
                                                        </div>
                                                    </div>
                                                    <div class="text-gray-200 text-md">
                                                        <a href="<?= '/pages/detail_transaksi/' . $s['kode_transaksi']; ?>"><i class="far fa-check-circle"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                        <?php if ($item1 <= 0) : ?>
                                            <div class="p-6 text-center">
                                                <h3 class="text-sm leading-6 font-medium text-gray-400">
                                                    Tidak ada
                                                </h3>
                                            </div>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </main>
    </form>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    <?php
    echo "var item1 ='$item1';";
    echo "var item2 ='$item2';";
    echo "var item3 ='$item3';";
    ?>
    var item1Container = document.getElementById("item1-container");
    var item2Container = document.getElementById("item2-container");
    var item3Container = document.getElementById("item3-container");

    window.addEventListener('load', (event) => {

        document.getElementById("pending").textContent = item3;
        document.getElementById("diproses").textContent = item2;
        document.getElementById("dikirim").textContent = item1;

        if (item1 > 3) {
            item1Container.classList.add("overscroll-auto");
            item1Container.classList.add("overflow-y-scroll");
        } else {
            item1Container.classList.remove("overscroll-auto");
            item1Container.classList.remove("overflow-y-scroll");
        }

        if (item2 > 3) {
            item2Container.classList.add("overscroll-auto");
            item2Container.classList.add("overflow-y-scroll");
        } else {
            item2Container.classList.remove("overscroll-auto");
            item2Container.classList.remove("overflow-y-scroll");
        }

        if (item3 > 3) {
            item3Container.classList.add("overscroll-auto");
            item3Container.classList.add("overflow-y-scroll");
        } else {
            item3Container.classList.remove("overscroll-auto");
            item3Container.classList.remove("overflow-y-scroll");
        }
    })
</script>

</html>