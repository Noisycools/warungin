<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="login">
        <a id="pnh" href="/"><img class="panah pnah" src="img/panah.png" alt=""></a>
        <div><img class="imgDaftar" src="img/daftar.png" alt=""></div>
        <div class="log daftar">
            <form action="<?= route_to('register') ?>" method="post">
                <?= csrf_field() ?>
                <img class="warungin" src="img/WarungIn.png" alt="">
                <?= view('Myth\Auth\Views\_message_block') ?>

                <div class="form-group">
                    <input type="text" class="inputLog <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                </div>

                <div class="form-group">
                    <input type="email" class="inputLog <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="inputLog <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="password" name="pass_confirm" class="inputLog <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                </div>


                <input class="checkbox" type="checkbox" name="accept" value="agree">
                <p class="chk">Syarat dan Ketentuan yang Berlaku</p>

                <button type="submit" class="btn goog"><?= lang('Auth.register') ?></button>

                <div class="strip"></div>
                <div class="forgot">
                    <p>Sudah Punya Akun ?</p>
                    <p class="ft"><a href="<?= route_to('login') ?>">Login dengan akun yang ada</a></p>
                </div>
            </form>
        </div>
    </div>
</body>