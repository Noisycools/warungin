<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<form action="/daftarbelanja/add" method="post">
  <input type="hidden" name="idProfile" value="<?= $profile->id_profile; ?>">
  <input type="hidden" name="slug" value="<?= $barang->slug; ?>">
  <input type="hidden" name="barangId" value="<?= $barang->barang_id; ?>">
  <input type="hidden" name="namaBarang" value="<?= $barang->nama_barang; ?>">
  <input type="hidden" name="hargaBarang" value="<?= $barang->harga_barang; ?>">
  <input type="hidden" name="imgBarang" value="<?= $barang->foto_barang; ?>">
  <div class="container px-5 py-24 mx-auto" x-data="{ inputQuantity: 1, warning: false }">
    <div id="popup-modal" x-show="warning" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 w-full z-50 md:inset-0 md:h-full flex items-center justify-center h-full bg-black bg-opacity-40">
      <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex justify-end p-2">
            <button @click="warning = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>
          </div>
          <!-- Modal body -->
          <div class="p-6 pt-0 text-center">
            <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Stok barang habis! Cari barang lain!</h3>
            <button @click="warning = false" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
              OK
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="lg:w-4/5 mx-auto flex flex-wrap">
      <img alt="ecommerce" class="lg:w-1/2 w-1/3 rounded-2xl object-cover object-center border border-gray-200" src="/img/<?= $barang->foto_barang; ?>">
      <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
        <h2 class="text-sm title-font text-gray-300 tracking-widest"><?= strtoupper($barang->kategori); ?></h2>
        <h1 class="text-white text-3xl title-font font-bold mb-1"><?= $barang->nama_barang; ?></h1>
        <div class="flex mb-4"></div>
        <p class="leading-relaxed"></p>
        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">

          <?php $qty = 1; ?>
          <div class="inline-flex items-center -space-x-px text-xs rounded-md">
            <button <?php if ($barang->stok > 0) {
                      echo '@click="inputQuantity--;if(inputQuantity <= 0){inputQuantity = 0;}"';
                    } ?> class="px-5 py-3 font-medium border rounded-l-md hover:z-10 focus:outline-none focus:border-indigo-600 focus:z-10 hover:bg-slate-500 active:opacity-75" type="button">
              -
            </button>

            <input <?php if ($barang->stok > 0) {
                      echo 'x-model="inputQuantity"';
                    } ?> type="text" name="qty" id="qty" value="<?php if ($barang->stok == 0) {
                                                                  echo 0;
                                                                } else {
                                                                  echo $qty;
                                                                } ?>" class="w-1/5 py-3 font-medium border hover:z-10 focus:outline-none focus:border-indigo-600 focus:z-10 active:opacity-75 bg-transparent text-center">
            <input type="hidden" name="hargaTotal" value="<?= (int)$barang->harga_barang * $qty; ?>">

            <button <?php if ($barang->stok > 0) {
                      echo ' @click="inputQuantity++"';
                    } ?> class="px-5 py-3 font-medium border rounded-r-md hover:z-10 focus:outline-none focus:border-indigo-600 focus:z-10 hover:bg-slate-500 active:opacity-75" type="button">
              +
            </button>
          </div>

          <div class="flex ml-6 items-center">
            <span class="mr-3">Satuan</span>
            <div class="relative">
              <select class="rounded border appearance-none border-gray-400 bg-slate-500 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10">
                <option><?= $barang->satuan_barang; ?></option>
              </select>
              <span class="absolute right-0 top-0 h-full w-10 text-center text-white pointer-events-none flex items-center justify-center">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                  <path d="M6 9l6 6 6-6"></path>
                </svg>
              </span>
            </div>
          </div>
        </div>
        <div class="flex">
          <span class="title-font font-medium text-2xl text-gray-300"><?= "Rp. " . number_format($barang->harga_barang, 0, '', '.'); ?></span>
          <button <?php if ($barang->stok > 0) {
                    echo ' type="submit"';
                  } else {
                    echo ' @click="warning = true" type="button"';
                  } ?> class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded"><i class="fas fa-plus-square self-center"></i>&nbsp;&nbsp;&nbsp;Daftar Belanja</button>
          <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</form>

<?= $this->endSection(); ?>