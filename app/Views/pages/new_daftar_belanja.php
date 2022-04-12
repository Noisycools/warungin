<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<form action="/checkout/buatPesanan" method="post">
    <div class="py-24" x-data="{ open: false, warning: false }">
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
                        <h3 class="mb-5 text-lg font-normal text-gray-500">Kamu harus memesan minimal 1 barang!</h3>
                        <button @click="warning = false" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="defaultModal" x-show="open" tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 flex items-center justify-center h-full bg-slate-400 backdrop-blur-sm bg-opacity-75">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-5 rounded-t border-b">
                        <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl">
                            Checkout
                        </h3>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-3">
                        <?php $idKe = 0; ?>
                        <?php $urutanKe = 0; ?>
                        <?php $qtyKe = 0; ?>
                        <?php $hargaBarangKe = 0; ?>
                        <p class="text-base leading-relaxed text-gray-500">
                            Barang yang dibeli : <br>
                            <?php foreach ($barang->getResult() as $b) : ?>
                                <label>- <?= $b->nama_barang; ?> <span id="harga_total1"></span> (<span id="_qty"></span>)</label> <br>
                                <input type="hidden" name="barangId<?= $idKe++ ?>" value="<?= $b->barang_id; ?>">
                                <input id="namaBarangHidden" type="hidden" name="nama_barang<?= $urutanKe++ ?>" value="<?= $b->nama_barang; ?>">
                                <input id="qtyHidden" type="hidden" name="qty<?= $qtyKe++ ?>" value="<?= $b->qty; ?>">
                                <input id="hargaBarangHidden" type="hidden" name="hargaBarang<?= $hargaBarangKe++ ?>" value="<?= $b->harga_barang; ?>">
                            <?php endforeach; ?>
                            <input type="hidden" name="jumlahBarang" value="<?= $urutanKe ?>">
                        </p>
                        <p class="text-base leading-relaxed text-gray-500">
                            Total :
                            <?php foreach ($total->getResult() as $rows) : ?>
                                <label id="total_harga"><?php echo "Rp. " . number_format((float)$rows->total_harga, 2, ',', '.'); ?></label>
                                <input id="totalHargaHidden" type="hidden" name="totalHarga" value="<?= $rows->total_harga; ?>">
                            <?php endforeach;  ?>
                        </p>
                        <p class="text-base leading-relaxed text-gray-500">
                            <b class="inline-block w-1/2 relative pr-3 after:content-[':'] after:absolute after:right-3">Nama Penerima</b> <span id="_namaPenerima"></span><br>
                            <b class="inline-block w-1/2 relative pr-3 after:content-[':'] after:absolute after:right-3">Nama Warung</b> <span id="_namaWarung"></span><br>
                            <b class="inline-block w-1/2 relative pr-3 after:content-[':'] after:absolute after:right-3">Alamat</b> <span id="_alamat"></span><br>
                            <b class="inline-block w-1/2 relative pr-3 after:content-[':'] after:absolute after:right-3">No. Hp</b> <span id="_noHp"></span><br>
                            <b class="inline-block w-1/2 relative pr-3 after:content-[':'] after:absolute after:right-3">Email</b> <span id="_email"></span><br>
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                        <?php $kodeTransaksi = 'wr-' . random_int(1, 1000000); ?>
                        <input type="hidden" name="kodeTransaksi" value="<?= trim($kodeTransaksi); ?>">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Pesan</button>
                        <button @click="open = false" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg md:max-w-5xl">
            <div class="md:flex ">
                <div class="w-full p-4 px-5 py-5">
                    <div class="md:grid md:grid-cols-3 gap-2 ">
                        <div class="col-span-2 p-5">
                            <h1 class="text-xl text-black font-medium ">Daftar Belanja</h1>
                            <?php $shipping = 0; ?>
                            <?php foreach ($barang->getResult() as $b) : $shipping++; ?>
                                <div class="flex justify-between items-center mt-6 pt-6">
                                    <div class="flex items-center"> <img src="/img/<?= $b->img_barang; ?>" width="60" class="rounded-full ">
                                        <div class="flex flex-col ml-3"> <span class="md:text-md text-black font-medium"><?= $b->nama_barang; ?></span> <span class="text-xs font-light text-gray-400">#41551</span> </div>
                                    </div>
                                    <div class="flex justify-center items-center">
                                        <div class="pr-8 flex ">
                                            <button id="minus" class="font-semibold text-black">-</button>
                                            <input id="input" type="text" class="focus:outline-none bg-gray-100 border h-6 w-8 rounded text-sm text-black px-2 mx-2" value="<?= $b->qty; ?>">
                                            <button id="plus" class="font-semibold text-black">+</button>
                                        </div>
                                        <div class="pr-8 "> <span id="harga_total2" class="text-xs text-black font-medium"><?= "Rp. " . number_format($b->harga_total, 0, '', '.'); ?></span> <input type="hidden" value="<?= $b->harga_barang ?>"> <input id="multiplyHarga" type="hidden" value="<?= $b->harga_total ?>"> </div>
                                        <div>
                                            <button type="button"><a href="/daftarbelanja/delete/<?= $b->nama_barang ?>"><i class="fas fa-trash text-black font-medium"></i></a></button>
                                            <input type="hidden" name="nama_barang" value="<?= $b->nama_barang; ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="flex justify-between items-center mt-6 pt-6 border-t">
                                <div class="flex items-center"> <i class="fa fa-arrow-left text-sm pr-2 text-blue-500"></i> <span class="text-md font-medium text-blue-500"><a href="/">Lanjut Belanja</a></span> </div>
                                <div class="flex justify-center items-end"> <span class="text-sm font-medium text-gray-400 mr-1">Subtotal:</span> <span class="text-lg font-bold text-gray-800 ">
                                        <?php foreach ($total->getResult() as $rows) : ?>
                                            <span id="subtotal"><?php echo "Rp. " . number_format((float)$rows->total_harga, 2, ',', '.'); ?></span>
                                        <?php endforeach;  ?>
                                    </span> </div>
                            </div>
                        </div>
                        <div class=" p-5 bg-gray-800 rounded overflow-visible"> <span class="text-xl font-medium text-gray-100 block pb-3">Rincian pengiriman</span>
                            <input type="hidden" name="idProfile" value="<?= $profile->id_profile ?>">
                            <div class="overflow-visible flex justify-between items-center mt-2 ml-4">
                                <div class="flex justify-center items-center flex-col"> <img src="/img/cod.png" width="60" class="relative right-5" /> </div>
                            </div>
                            <div class="grid grid-cols-1 pt-2 mb-3">
                                <div class="col-span-2 "> <label class="text-xs text-gray-400">Nama Penerima</label>
                                    <div class="grid grid-cols-2 gap-2"> <input id="namaPenerima" name="namaPenerima" value="<?= $profile->nama; ?>" type="text" class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4" placeholder=""></div>
                                </div>
                                <div class="col-span-2 "> <label class="text-xs text-gray-400">Nama Warung</label>
                                    <div class="grid grid-cols-2 gap-2"> <input id="namaWarung" name="namaWarung" value="<?= $profile->nama_warung; ?>" type="text" class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4" placeholder=""></div>
                                </div>
                            </div>
                            <div class="flex justify-center flex-col pt-3">
                                <label class="text-xs text-gray-400 ">Alamat</label>
                                <input id="alamat" name="alamat" value="<?= $profile->alamat; ?>" type="text" class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4" placeholder="">
                            </div>
                            <div class="grid grid-cols-1 pt-2 mb-3">
                                <div class="col-span-2 "> <label class="text-xs text-gray-400">No. Hp</label>
                                    <div class="grid grid-cols-2 gap-2"> <input id="noHp" name="noHp" value="<?= $profile->no_hp; ?>" type="text" class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4" placeholder=""></div>
                                </div>
                            </div>
                            <div class="flex justify-center flex-col pt-3">
                                <label class="text-xs text-gray-400 ">Email</label>
                                <input id="email" name="email" value="<?= $profile->email; ?>" type="text" class="focus:outline-none w-full h-6 bg-gray-800 text-white placeholder-gray-300 text-sm border-b border-gray-600 py-4" placeholder="">
                            </div>
                            <button type="button" id="checkout" <?php if ($shipping == 0) {
                                                                    echo '@click="warning = true"';
                                                                } else {
                                                                    echo 'onclick="showValueOnModal()" @click="open = !open"';
                                                                } ?> class="h-12 w-full mt-4 bg-blue-500 rounded focus:outline-none text-white hover:bg-blue-600">Check Out</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function showValueOnModal() {
        var namaPenerima = document.getElementById('namaPenerima').value;
        var namaWarung = document.getElementById('namaWarung').value;
        var alamat = document.getElementById('alamat').value;
        var noHp = document.getElementById('noHp').value;
        var email = document.getElementById('email').value;
        var qtyHidden = document.querySelectorAll('#qtyHidden');
        var qty_hidden;
        var allInput = document.querySelectorAll('#input');
        var jumlahInput = allInput.length;
        var input;
        var _qty = document.querySelectorAll('#_qty');
        var jumlahQty = _qty.length;
        var qty;
        var hargaTotal1 = document.querySelectorAll('#harga_total1');
        var h1;
        var hargaTotal2 = document.querySelectorAll('#harga_total2');
        var h2;
        var multiplyHarga = document.querySelectorAll('#multiplyHarga');
        var harga;
        var totalHarga = document.getElementById('total_harga');
        var totalHargaHidden = document.getElementById('totalHargaHidden');

        let sum = 0;
        for (let i = 0; i < jumlahInput; i++) {
            input = allInput[i];
            qty = _qty[i];
            qty_hidden = qtyHidden[i];
            h1 = hargaTotal1[i];
            h2 = hargaTotal2[i];
            harga = multiplyHarga[i];
            h1.textContent = h2.textContent;
            if (harga.value) {
                sum = sum + parseInt(harga.value);
                totalHarga.textContent = "Rp. " + sum.toLocaleString('id-ID');
                totalHargaHidden.value = parseInt(sum);
            } else {
                totalHarga.textContent = "<?php echo "Rp. " . number_format((float)$rows->total_harga, 2, ', ', ' . '); ?>";
            }
            if (input.value) {
                qty.textContent = input.value;
                qty_hidden.value = qty.textContent;
            }
        }

        document.getElementById('_namaPenerima').textContent = namaPenerima;
        document.getElementById('_namaWarung').textContent = namaWarung;
        document.getElementById('_alamat').textContent = alamat;
        document.getElementById('_noHp').textContent = noHp;
        document.getElementById('_email').textContent = email;
        // document.getElementById('_qty').textContent = input;
    }

    const minusButton = document.querySelectorAll('#minus');
    const plusButton = document.querySelectorAll('#plus');

    minusButton.forEach((btn) => {
        btn.addEventListener('click', () => {
            event.preventDefault();
            var input = btn.parentElement.children[1];
            var inputValue = input.value;
            var newValue = parseInt(inputValue) - 1;
            var harga = btn.parentElement.nextElementSibling.children[1];
            if (newValue >= 1) {
                input.value = newValue;
                var multiplyHarga = parseInt(harga.value) * newValue;
                btn.parentElement.nextElementSibling.children[2].value = multiplyHarga;
                btn.parentElement.nextElementSibling.children[0].textContent = "Rp. " + multiplyHarga.toLocaleString('id-ID');
            } else {
                input.value = 1;
            }
        })
    });

    plusButton.forEach((btn) => {
        btn.addEventListener('click', () => {
            event.preventDefault();
            var input = btn.parentElement.children[1];
            var inputValue = input.value;
            var newValue = parseInt(inputValue) + 1;
            var harga = btn.parentElement.nextElementSibling.children[1];
            if (newValue >= 1) {
                input.value = newValue;
                var multiplyHarga = parseInt(harga.value) * newValue;
                btn.parentElement.nextElementSibling.children[2].value = multiplyHarga;
                btn.parentElement.nextElementSibling.children[0].textContent = "Rp. " + multiplyHarga.toLocaleString('id-ID');
            } else {
                input.value = 1;
            }
        })
    });
</script>

<?= $this->endSection(); ?>