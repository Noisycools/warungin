<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="py-24">
    <div class="max-w-4xl mx-auto">
        <div class="relative overflow-x-auto shadow-xl sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <tr class="bg-gray-300">
                    <th class="p-3">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <form action="" method="post">
                                <input name="keyword" type="text" id="table-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 pl-10 p-2.5" placeholder="Cari berdasarkan kode transaksi">
                                <input type="submit" class="hidden">
                            </form>
                        </div>
                    </th>
                    <th class="py-2">
                        <h2 class="font-medium text-xl text-gray-700 ml-6 w-52">Histori Transaksi Anda</h2>
                    </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr class="text-xs text-gray-700 uppercase bg-gray-50">
                    <th scope="col" class="px-6 py-3 text-center">
                        Kode Transaksi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Penerima
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Warung
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No HP
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pembayaran
                    </th>
                    <th scope="col" class="px-12 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Lihat Selengkapnya</span>
                    </th>
                </tr>
                <tbody>
                    <?php foreach ($transaksi as $t) : ?>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-center">
                                <?= $t->kode_transaksi; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $t->nama_penerima; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $t->nama_warung; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $t->alamat; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $t->no_hp; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $t->tgl_pembayaran; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $t->status; ?> <?php if ($t->status == 'Pending') {
                                    echo '<i class="fas fa-clock text-red-500"></i>';
                                } else if ($t->status == 'Diproses') {
                                    echo '<i class="fas fa-truck text-yellow-500"></i>';
                                } else if ($t->status == 'Dikirim') {
                                    echo '<i class="fas fa-people-carry text-lime-500"></i>';
                                } else if ($t->status == 'Perlu Diverifikasi') {
                                    echo '<i class="fas fa-arrow-circle-right text-red-600"></i>';
                                } else if ($t->status == 'Diterima') {
                                    echo '<i class="fas fa-check-circle text-green-500"></i>';
                                } ?>
                            </td>
                            <td class="px-3 py-4 text-left">
                                <a href="/pages/detail_histori_transaksi/<?= $t->kode_transaksi ?>" class="font-medium text-blue-600 hover:underline">Lihat Selengkapnya</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($transaksi == null) : ?>
                        <tr class="bg-white">
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                        </tr>
                        <tr class="bg-white">
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                        </tr>
                        <tr class="bg-white">
                            <td class="px-6 py-4 w-full">Tidak ada transaksi yang dilakukan sejauh ini</td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                        </tr>
                        <tr class="bg-white">
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                        </tr>
                        <tr class="bg-white">
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                            <td class="px-6 py-4 w-full"></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?= $pager->links('transaksi2', 'histori_transaksi_pagination') ?>

        <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    </div>
</div>

<?= $this->endSection(); ?>