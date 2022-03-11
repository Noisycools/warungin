<!DOCTYPE html>
<html class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="/css/app.css" rel="stylesheet">
  <script src="/js/bundle.js" defer></script>

  <!-- <link rel="stylesheet" href="/css/swiper-bundle.css">
  <script src="/js/swiper-bundle.js"></script> -->

  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.css">
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

  <style>
    .gradient {
      background: linear-gradient(90deg, #df1b1b 0%, #c72c2c 100%);
    }
  </style>

  <title><?= $title; ?></title>
</head>

<body class="leading-normal tracking-normal text-white gradient">
  <?= $this->include('layout/new_navbar'); ?>

  <?= $this->renderSection('content'); ?>

  <?= $this->include('layout/new_footer'); ?>

  <?php
  $altTitle = $alt_title;
  ?>
  <script>
    var scrollpos = window.scrollY;
    var header = document.getElementById("header");
    var home = document.getElementById("home");
    var contactUs = document.getElementById("contactUs");
    var profile = document.getElementById("profile");
    var daftarBelanja = document.getElementById("daftarBelanja");
    var historiTransaksi = document.getElementById("historiTransaksi");
    var kurir = document.getElementById("kurir");
    <?php
    echo "var jsvar ='$altTitle';";
    ?>

    window.addEventListener('load', (event) => {

      if (home.id == jsvar) {
        home.classList.add("md:text-blue-700");
        home2.classList.add("bg-blue-700");
      } else if (contactUs.id == jsvar) {
        contactUs.classList.add("md:text-blue-700");
        contactUs2.classList.add("bg-blue-700");
      } else if (profile.id == jsvar) {
        profile.classList.add("md:text-blue-700");
        profile2.classList.add("bg-blue-700");
      } else if (daftarBelanja.id == jsvar) {
        daftarBelanja.classList.add("md:text-blue-700");
        daftarBelanja2.classList.add("bg-blue-700");
      } else if (historiTransaksi.id == jsvar) {
        historiTransaksi.classList.add("md:text-blue-700");
        historiTransaksi2.classList.add("bg-blue-700");
      } else if (kurir.id == jsvar) {
        kurir.classList.add("md:text-blue-700");
        kurir2.classList.add("bg-blue-700");
      } else {
        contactUs.classList.remove("md:text-blue-700");
        contactUs2.classList.remove("bg-blue-700");
        profile.classList.remove("md:text-blue-700");
        profile2.classList.remove("bg-blue-700");
        daftarBelanja.classList.remove("md:text-blue-700");
        daftarBelanja2.classList.remove("bg-blue-700");
        historiTransaksi.classList.remove("md:text-blue-700");
        historiTransaksi2.classList.remove("bg-blue-700");
        kurir.classList.remove("md:text-blue-700");
        kurir2.classList.remove("bg-blue-700");
      }

    });

    document.addEventListener("scroll", function() {
      scrollpos = window.scrollY;

      if (scrollpos > 10) {
        header.classList.add("bg-red-700");
      } else {
        header.classList.remove("bg-red-700");
      }
    });
  </script>

  <script>
    var swiper = new Swiper(".swiper-populer", {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: true,
      grabCursor: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });

    var swiper2 = new Swiper(".swiper-auto", {
      centeredSlides: true,
      autoplay: {
        delay: 5500,
        disableOnInteraction: false,
      },
    });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>