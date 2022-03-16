<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">

  <link href="/css/app.css" rel="stylesheet">
  <script src="/js/bundle.js" defer></script>

  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.css">
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

  <style>
    .gradient {
      background: linear-gradient(90deg, #df1b1b 0%, #c72c2c 100%);
    }
  </style>

</head>

<body class>
  <div class="lg:flex">
    <div class="lg:w-2/5 xl:max-w-screen-sm">
      <div class="px-8 py-6 mx-auto mt-4 text-left bg-white md:w-full sm:w-1/3">
        <div class="flex justify-center">
          <div class="w-32 drop-shadow-md">
            <img src="/img/WarungIn.png" class="" alt="Logo Warungin" />
          </div>
        </div>
        <form action="<?= route_to('register') ?>" method="post">
        <?= csrf_field() ?>
          <div class="mt-4">
            <div>
              <label class="block" for="Name">Name<label>
                  <input name="username" type="text" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" class="w-full px-4 py-2 mt-2 border rounded-3xl focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
            <div class="mt-4">
              <label class="block" for="email">Email<label>
                  <input name="email" type="text" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" class="w-full px-4 py-2 mt-2 border rounded-3xl focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
            <div class="mt-4">
              <label class="block">Password<label>
                  <input name="password" type="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off" class="w-full px-4 py-2 mt-2 border rounded-3xl focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
            <div class="mt-4">
              <label class="block">Confirm Password<label>
                  <input name="pass_confirm" type="password" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off" class="w-full px-4 py-2 mt-2 border rounded-3xl focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
            <span class="text-xs text-red-400">Password must be same!</span>
            <div class="flex">
              <button type="submit" class="w-full px-6 py-2 mt-4 text-white bg-red-600 rounded-3xl hover:bg-red-900">Buat Akun</button>
            </div>
            <div class="mt-6 flex justify-center border-t-2 pt-2 text-grey-dark">
              <span>Already have an account?</span>
              <a class="text-red-600 hover:underline" href="<?= route_to('login') ?>"> Log in</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="hidden lg:flex items-center justify-center bg-red-100 flex-1 h-screen">
      <div class="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">
        <div class="w-96 mx-auto">
          <img src="/img/daftar.png" />
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>