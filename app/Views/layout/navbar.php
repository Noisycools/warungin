<?php

use Myth\Auth\Collectors\Auth; ?>
<div class="navbar-tem">
    <img src="/img/WarungIn.png" alt="">
    <ul class="nav-tem">
        <li><a href="/">Home</a></li>
        <li><a href="/contact_us">Contact Us</a></li>
        <?php if (logged_in()) : ?>
            <?php if (in_groups('user')) : ?>
                <li><a href="/profile">Profile</a></li>
                <li><a href="/daftar_belanja">Daftar Belanja</a></li>
                <li><a href="/histori_transaksi">Histori Transaksi</a></li>
            <?php endif; ?>
            <?php if (in_groups('admin')) : ?>
                <li><a href="/admin">Admin</a></li>
            <?php endif; ?>
            <?php if (in_groups('kurir')) : ?>
                <li><a href="/kurir">Kurir</a></li>
            <?php endif; ?>
        <?php endif; ?>
    </ul>
    <div class="user">
        <?php if (logged_in()) : ?>
            <span><a class="a" href="/logout">Logout</a></span>
        <?php else : ?>
            <span><a class="a" href="/login">Login</a></span>
            <span class="unik"><a class="unk" href="/register"><img src="/img/new.png" alt="">Sign Up</a></span>
        <?php endif; ?>
    </div>
    <span class="check">
        <div class="hamburger"></div>
    </span>
</div>