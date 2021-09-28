<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ke WarungIn</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="login">
        <a href="index.php"><img class="panah" src="img/panah.png" alt=""></a>
        <div><img class="imgLogin" src="img/login.png" alt=""></div>
        <div class="log">
            <form action="verify_login.php" method="POST">
                <img class="warungin" src="img/WarungIn.png" alt="">
                <input class="inputLog" type="text" name="user" placeholder="Username" value="<?php
                                                                                                if (isset($_COOKIE['user'])) {
                                                                                                    echo $_COOKIE['user'];
                                                                                                }
                                                                                                ?>">
                <input class="inputLog" type="password" name="password" placeholder="Password" value="<?php
                                                                                                        if (isset($_COOKIE['password'])) {
                                                                                                            echo $_COOKIE['password'];
                                                                                                        }
                                                                                                        ?>">
                <input class="checkbox" type="checkbox" name="remember" <?php if (isset($_COOKIE['user'])) : ?> checked <?php endif ?>>
                Remember Me
                <button class="btn" type="submit" name="save">Login</button>
                <div class="strip"></div>
                <div class="btn goog"><img class="google" src="img/google.png" alt="">Login With Google</div>
                <div class="btn fb"><img class="facebook" src="img/fb.png" alt="">Login With Facebook</div>
                <div class="strip"></div>
                <div class="forgot">
                    <p class="ft">Don't have an account?<a href="daftar.php">Create one!</a></p>
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
</body>

</html>