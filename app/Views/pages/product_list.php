<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="pt-20">
    <div x-data="{ warning: false }" class="bg-white pb-20">
        <div id="popup-modal" x-show="warning" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 w-full z-50 md:inset-0 md:h-full flex items-center justify-center h-full bg-black bg-opacity-40">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex justify-end p-2">
                        <button @click="warning = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="popup-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 pt-0 text-center">
                        <svg class="mx-auto mb-4 w-14 h-14 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500">Stok barang habis! Cari barang lain!</h3>
                        <button @click="warning = false" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container mx-auto px-6 py-3">
                <div class="relative mt-6 max-w-lg mx-auto">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                        <svg class="h-5 w-5 text-red-500" viewBox="0 0 24 24" fill="none">
                            <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <form action="" method="post">
                        <input name="keyword" class="w-full text-black border shadow-sm rounded-md pl-10 pr-4 py-2 focus:border-red-500 focus:outline-none focus:shadow-outline" type="text" placeholder="Search">
                        <input type="submit" class="hidden">
                    </form>
                </div>
            </div>
        </div>
        <main class="my-8">
            <div class="container mx-auto px-6">
                <div class="flex justify-between">
                    <h3 class="text-gray-700 text-2xl font-medium">List Barang</h3>
                    <h3 class="text-red-700 my-auto"><a href="/">
                            <- Kembali</a>
                    </h3>
                </div>
                <span class="mt-3 text-sm text-gray-500"><?php echo $countAll ?> Products</span>
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    <?php foreach ($barang as $b) : ?>
                        <?php if ($b['stok'] == 0) : ?>
                            <div class="relative w-full max-w-sm mx-auto rounded-md shadow-md border border-yellow-500 overflow-hidden">
                            <?php else : ?>
                                <div class="relative w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                                <?php endif; ?>
                                <a <?php if (!logged_in()) {
                                        echo 'href="/login"';
                                    } ?> href="/pages/detail_barang/<?= $b['slug'] ?>" class="group">
                                    <div class="transition ease-in-out delay-100 group-hover:-translate-y-1 group-hover:scale-110 flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('/img/<?= $b['foto_barang'] ?>')"></div>
                                    <?php if ($b['stok'] == 0) : ?>
                                        <div class="absolute left-0 top-5 -translate-x-48 group-hover:-translate-x-0 duration-300 p-2 text-yellow-500 border-l-4 border-yellow-500 bg-yellow-50" role="alert">
                                            <h3 class="text-sm font-medium">Stok barang habis!</h3>
                                        </div>
                                    <?php else : ?>
                                        <div class="absolute left-0 top-5 -translate-x-48 group-hover:-translate-x-0 duration-300 p-2 text-red-500 border-l-4 border-red-500 bg-red-50" role="alert">
                                            <h3 class="text-sm font-medium">Lihat Selengkapnya</h3>
                                        </div>
                                    <?php endif; ?>
                                </a>
                                <form action="/daftarbelanja/add" method="post">
                                    <input type="hidden" name="idProfile" value="<?= $profile->id_profile; ?>">
                                    <input type="hidden" name="slug" value="<?= $b['slug']; ?>">
                                    <input type="hidden" name="barangId" value="<?= $b['barang_id']; ?>">
                                    <input type="hidden" name="namaBarang" value="<?= $b['nama_barang']; ?>">
                                    <input type="hidden" name="hargaBarang" value="<?= $b['harga_barang']; ?>">
                                    <input type="hidden" name="imgBarang" value="<?= $b['foto_barang']; ?>">
                                    <input type="hidden" name="hargaTotal" value="<?= $b['harga_barang']; ?>">
                                    <input type="hidden" name="qty" value="1">
                                    <button <?php if ($b['stok'] > 0) {
                                                echo ' type="submit"';
                                            } else {
                                                echo ' @click="warning = true" type="button"';
                                            } ?> class="absolute p-2 right-2 bottom-16 rounded-full bg-red-600 text-white mx-5 -mb-4 hover:bg-red-400 focus:outline-none focus:bg-slate-500">
                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </button>
                                </form>
                                <div class="px-5 py-3">
                                    <h3 class="text-gray-700 uppercase"><?= $b['nama_barang'] ?></h3>
                                    <span class="text-gray-500 mt-2"><?php echo "Rp. " . number_format($b['harga_barang'], 0, '', '.'); ?></span>
                                </div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                            <?= $pager->links('tabel_barang', 'product_list_pagination') ?>
                </div>
        </main>
    </div>
</div>

<?= $this->endSection(); ?>