<?php

use Myth\Auth\Collectors\Auth; ?>

<nav id="header" class="fixed w-full z-50 border-gray-200 px-2 sm:px-4 py-3 rounded-b-xl" x-data="{ isOpen: false }">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="#" class="flex items-center w-24 h-12">
            <img src="/img/WarungIn.png" class="" alt="Logo Warungin" />
        </a>
        <?php if (logged_in()) : ?>
            <button type="button" class="ml-auto mr-2 md:hidden text-white bg-slate-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><a href="/logout">Logout</a></button>
        <?php else : ?>
            <button type="button" class="ml-auto mr-2 md:hidden text-white bg-slate-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><a href="/login">Login</a></button>
            <button type="button" class="md:hidden mr-3 text-white bg-slate-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><a href="/register">Daftar</a></button>
        <?php endif; ?>
        <button @click="isOpen = !isOpen" class="inline-flex items-center p-2 ml-1 text-sm rounded-lg md:hidden hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-gray-200 text-gray-400" aria-controls="mobile-menu-2" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1">
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                <li>
                    <a id="home" href="/" class="block py-2 pr-4 pl-3 text-white rounded md:bg-transparent md:p-0" aria-current="page">Home</a>
                </li>
                <li>
                    <a id="contactUs" href="#contact_us" class="block py-2 pr-4 pl-3 border-b border-white md:hover:bg-transparent md:border-0 md:p-0 text-white md:hover:text-white hover:bg-white hover:text-black">Contact Us</a>
                </li>
                <?php if (logged_in()) : ?>
                    <?php if (in_groups('user')) : ?>
                        <li>
                            <a id="profile" href="/profile" class="block py-2 pr-4 pl-3 border-b border-white md:hover:bg-transparent md:border-0 md:p-0 text-white md:hover:text-white hover:bg-white hover:text-black">Profile</a>
                        </li>
                        <li>
                            <a id="daftarBelanja" href="/daftar_belanja" class="block py-2 pr-4 pl-3 border-b border-white md:hover:bg-transparent md:border-0 md:p-0 text-white md:hover:text-white hover:bg-white hover:text-black">Daftar Belanja</a>
                        </li>
                        <li>
                            <a id="historiTransaksi" href="/histori_transaksi" class="block py-2 pr-4 pl-3 border-b border-white md:hover:bg-transparent md:border-0 md:p-0 text-white md:hover:text-white hover:bg-white hover:text-black">Histori Transaksi</a>
                        </li>
                    <?php endif; ?>
                    <?php if (in_groups('admin')) : ?>
                        <li>
                            <a id="admin" href="/admin" class="block py-2 pr-4 pl-3 border-b border-white md:hover:bg-transparent md:border-0 md:p-0 text-white md:hover:text-white hover:bg-white hover:text-black">Admin</a>
                        </li>
                    <?php endif; ?>
                    <?php if (in_groups('kurir')) : ?>
                        <li>
                            <a id="kurir" href="/kurir" class="block py-2 pr-4 pl-3 border-b border-white md:hover:bg-transparent md:border-0 md:p-0 text-white md:hover:text-white hover:bg-white hover:text-black">Kurir</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
            <?php if (logged_in()) : ?>
                <button type="button" class="ml-auto mr-2 md:ml-10 text-white bg-slate-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><a href="/logout">Logout</a></button>
            <?php else : ?>
                <button type="button" class="ml-auto mr-2 md:ml-10 text-white bg-slate-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><a href="/login">Login</a></button>
                <button type="button" class="mr-3 text-white bg-slate-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><a href="/register">Daftar</a></button>
            <?php endif; ?>
        </div>
        <div class="justify-between items-center w-full md:hidden md:w-auto md:order-1" x-show="isOpen">
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                <li>
                    <a id="home2" href="/" class="block py-2 pr-4 pl-3 text-white rounded md:bg-transparent md:text-blue-700 md:p-0" aria-current="page">Home</a>
                </li>
                <li>
                    <a id="contactUs2" href="#contact_us" class="block py-2 pr-4 pl-3 border-b border-white md:hover:bg-transparent md:border-0 md:p-0 text-white md:hover:text-white hover:bg-white hover:text-black">Contact Us</a>
                </li>
                <?php if (logged_in()) : ?>
                    <?php if (in_groups('user')) : ?>
                        <li>
                            <a id="profile2" href="/profile" class="block py-2 pr-4 pl-3 border-b border-white md:hover:bg-transparent md:border-0 md:p-0 text-white md:hover:text-white hover:bg-white hover:text-black">Profile</a>
                        </li>
                        <li>
                            <a id="daftarBelanja2" href="/daftar_belanja" class="block py-2 pr-4 pl-3 border-b border-white md:hover:bg-transparent md:border-0 md:p-0 text-white md:hover:text-white hover:bg-white hover:text-black">Daftar Belanja</a>
                        </li>
                        <li>
                            <a id="historiTransaksi2" href="/histori_transaksi" class="block py-2 pr-4 pl-3 border-b border-white md:hover:bg-transparent md:border-0 md:p-0 text-white md:hover:text-white hover:bg-white hover:text-black">Histori Transaksi</a>
                        </li>
                    <?php endif; ?>
                    <?php if (in_groups('admin')) : ?>
                        <li>
                            <a id="admin2" href="/admin" class="block py-2 pr-4 pl-3 border-b border-white md:hover:bg-transparent md:border-0 md:p-0 text-white md:hover:text-white hover:bg-white hover:text-black">Admin</a>
                        </li>
                    <?php endif; ?>
                    <?php if (in_groups('kurir')) : ?>
                        <li>
                            <a id="kurir2" href="/kurir" class="block py-2 pr-4 pl-3 border-b border-white md:hover:bg-transparent md:border-0 md:p-0 text-white md:hover:text-white hover:bg-white hover:text-black">Kurir</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>