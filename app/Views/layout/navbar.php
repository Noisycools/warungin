<div class="navbar">
    <img src="/img/WarungIn.png" alt="">
    <ul class="nav">
        <li><a href="/">Home</a></li>
        <li><a href="#product">Product</a></li>
        <li><a href="/contact_us">Contact Us</a></li>
        <li><a href="#">WarungKu</a></li>
        <?php

        use Myth\Auth\Collectors\Auth;

        if (logged_in()) : ?>
            <li><a href="/daftar_belanja">Daftar Belanja</a></li>
        <?php endif; ?>
    </ul>
    <div class="user">
        <?php if (logged_in()) : ?>
            <span><a class="a" href="/logout">Logout</a></span>
        <?php else : ?>
            <span><a class="a" href="/login">Login</a></span>
            <span class="unik"><a class="unk" href="/register"><img src="img/new.png" alt="">Sign Up</a></span>
        <?php endif; ?>
    </div>
    <span class="check">
        <div class="hamburger"></div>
    </span>
</div>