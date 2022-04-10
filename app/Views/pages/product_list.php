<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="pt-20">
    <div x-data="{ cartOpen: false , isOpen: false }" class="bg-white pb-20">
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
                    <h3 class="text-red-700 my-auto"><a href="/"><- Kembali</a></h3>
                </div>
                <span class="mt-3 text-sm text-gray-500"><?php echo $countAll ?> Products</span>
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    <?php foreach ($barang as $b) : ?>
                        <div class="relative w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <a href="#" class="group">
                                <div class="transition ease-in-out delay-100 group-hover:-translate-y-1 group-hover:scale-110 flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('/img/<?= $b['foto_barang'] ?>')"></div>
                                <div class="absolute left-0 top-5 -translate-x-48 group-hover:-translate-x-0 duration-300 p-2 text-red-500 border-l-4 border-red-500 bg-red-50" role="alert">
                                    <h3 class="text-sm font-medium">Lihat Selengkapnya</h3>
                                </div>
                            </a>
                            <button class="absolute p-2 right-2 bottom-16 rounded-full bg-red-600 text-white mx-5 -mb-4 hover:bg-red-400 focus:outline-none focus:bg-slate-500">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </button>
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