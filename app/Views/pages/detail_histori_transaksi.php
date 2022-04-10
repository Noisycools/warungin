<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- component -->
<!-- This is an example component -->

<div class="py-24">
    <div class="flex flex-col justify-center items-center">
        <div class="w-full h-3/4 lg:max-w-3xl md:w-1/2 p-4 sm:p-6 lg:p-8 bg-white rounded-md shadow-md">
            <div class="flex justify-between border-b-2 pb-2">
                <span class="text-xl text-black font-semibold block">Kode Transaksi : <?= $transaksi['kode_transaksi'] ?></span>
            </div>
            <div class="w-full p-4 pt-6 text-black">
                <?php if ($transaksi['status'] == 'Pending') : ?>
                <div class="relative pt-1 pb-6">
                    <div class="flex mb-2 items-center justify-between">
                        <div>
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-red-600 bg-red-200">
                                Pending
                            </span>
                        </div>
                        <div class="text-right">
                            <span class="text-xs font-semibold inline-block text-red-600">
                                25%
                            </span>
                        </div>
                    </div>
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-red-200">
                        <div style="width:25%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500"></div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($transaksi['status'] == 'Diproses') : ?>
                <div class="relative pt-1 pb-6">
                    <div class="flex mb-2 items-center justify-between">
                        <div>
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-yellow-600 bg-yellow-200">
                                Diproses
                            </span>
                        </div>
                        <div class="text-right">
                            <span class="text-xs font-semibold inline-block text-yellow-600">
                                50%
                            </span>
                        </div>
                    </div>
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-yellow-200">
                        <div style="width:50%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500"></div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($transaksi['status'] == 'Dikirim') : ?>
                <div class="relative pt-1 pb-6">
                    <div class="flex mb-2 items-center justify-between">
                        <div>
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-lime-600 bg-lime-200">
                                Dikirim
                            </span>
                        </div>
                        <div class="text-right">
                            <span class="text-xs font-semibold inline-block text-lime-600">
                                75%
                            </span>
                        </div>
                    </div>
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-lime-200">
                        <div style="width:75%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-lime-500"></div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($transaksi['status'] == 'Selesai') : ?>
                <div class="relative pt-1 pb-6">
                    <div class="flex mb-2 items-center justify-between">
                        <div>
                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200">
                                Selesai
                            </span>
                        </div>
                        <div class="text-right">
                            <span class="text-xs font-semibold inline-block text-green-600">
                                100%
                            </span>
                        </div>
                    </div>
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
                        <div style="width:100%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                    </div>
                </div>
                <?php endif; ?>
                <p class="text-base leading-relaxed">
                    <i class="fas fa-id-badge"></i> &nbsp;<b class="inline-block w-2/5 relative pr-3 after:content-[':'] after:absolute after:right-2">Nama Penerima</b> <?= $transaksi['nama_penerima'] ?><br><br>
                    <i class="fas fa-map-marked-alt"></i> &nbsp;<b class="inline-block w-2/5 relative pr-3 after:content-[':'] after:absolute after:right-3">Nama Warung</b> <?= $transaksi['nama_warung'] ?><br><br>
                    <i class="fas fa-phone-alt"></i> &nbsp;<b class="inline-block w-2/5 relative pr-3 after:content-[':'] after:absolute after:right-3">Alamat</b> <?= $transaksi['alamat'] ?><br><br>
                    <i class="fas fa-envelope"></i> &nbsp;<b class="inline-block w-2/5 relative pr-3 after:content-[':'] after:absolute after:right-3">No. HP</b> <?= $transaksi['no_hp'] ?><br><br>
                    <i class="fas fa-envelope"></i> &nbsp;<b class="inline-block w-2/5 relative pr-3 after:content-[':'] after:absolute after:right-3">Email</b> <?= $transaksi['email'] ?><br><br>
                    <i class="fas fa-envelope"></i> &nbsp;<b class="inline-block w-2/5 relative pr-3 after:content-[':'] after:absolute after:right-3">Tanggal Pembayaran</b> <?= $transaksi['tgl_pembayaran'] ?><br><br>
                </p>
                <div class="flex justify-end items-center">
                    <a class="relative inline-flex items-center px-4 py-3 overflow-hidden text-white bg-blue-600 rounded group active:bg-blue-500 focus:outline-none focus:ring" href="/pages/struk/<?= $transaksi['kode_transaksi'] ?>">
                        <span class="absolute right-0 transition-transform translate-x-full group-hover:-translate-x-1">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </span>

                        <span class="text-sm font-medium transition-all group-hover:mr-4">
                            Lihat Struk Pesanan
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex items-center mt-6"> <i class="fa fa-arrow-left text-sm pr-2 text-white"></i> <span class="text-md font-medium text-white"><a href="/histori_transaksi">Kembali</a></span> </div>
    </div>
</div>

<?= $this->endSection(); ?>