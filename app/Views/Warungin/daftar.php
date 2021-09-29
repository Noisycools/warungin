<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="login">
    <a id="pnh" href="index.php"><img class="panah pnah" src="img/panah.png" alt=""></a>
    <div><img class="imgDaftar" src="img/daftar.png" alt=""></div>
    <div class="log daftar">
        <form action="verify_register.php" method="POST">
            <img class="warungin" src="img/WarungIn.png" alt="">
            <input class="inputLog" type="text" name="user" placeholder="Username">
            <input class="inputLog" type="text" name="email" placeholder="Email">
            <input class="inputLog" type="password" name="password" placeholder="Password">
            <input class="inputLog" type="password" name="repeat" placeholder="Repeat Password">
            <input class="checkbox" type="checkbox" name="accept" value="agree">
            <p class="chk">Syarat dan Ketentuan yang Berlaku</p>
            <button class="btn goog" type="submit">Daftar</button>
            <div class="strip"></div>
            <div class="forgot">
                <p>Sudah Punya Akun ?</p>
                <p class="ft"><a href="login.php">Login dengan akun yang ada</a></p>
            </div>
        </form>
    </div>
</div>
<script src="js/sweetalert2.all.min.js"></script>
<script>
    $('btn').on('click', function() {
        e.preventDefault();
        Swal({
            'Succes',
            'You have successfully logged in',
            'succes',
        });
    });
</script>

<?= $this->endSection(); ?>