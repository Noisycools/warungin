<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- component -->
<!-- This is an example component -->

<div class="py-24">

    <div class="block md:flex md:justify-center">

        <div class="w-full h-3/4 lg:max-w-3xl md:w-2/5 p-4 sm:p-6 lg:p-8 bg-white rounded-md shadow-md">
            <div class="flex justify-between border-b-2 pb-2">
                <span class="text-xl text-black font-semibold block">User Profile</span>
            </div>

            <div class="w-full p-4 text-black">
                <?php if ($profile == null) : ?>
                    <p class="text-base leading-relaxed">
                    <h3 class="text-xl text-black font-bold pb-4">Nama Warung Kamu</h3>
                    <i class="fas fa-id-badge"></i> &nbsp;<b class="inline-block w-1/4 relative pr-3 after:content-[':'] after:absolute after:right-2">Nama</b> <span class="text-red-400">belum diset</span><br><br>
                    <i class="fas fa-map-marked-alt"></i> &nbsp;<b class="inline-block w-1/4 relative pr-3 after:content-[':'] after:absolute after:right-3">Alamat</b> <span class="text-red-400">belum diset</span><br><br>
                    <i class="fas fa-phone-alt"></i> &nbsp;<b class="inline-block w-1/4 relative pr-3 after:content-[':'] after:absolute after:right-3">No. HP</b> <span class="text-red-400">belum diset</span><br><br>
                    <i class="fas fa-envelope"></i> &nbsp;<b class="inline-block w-1/4 relative pr-3 after:content-[':'] after:absolute after:right-3">Email</b> <span class="text-red-400">belum diset</span><br><br>
                    </p>
                <?php else : ?>
                    <p class="text-base leading-relaxed">
                    <h3 class="text-xl text-black font-bold pb-4"><?= $profile->nama_warung; ?></h3>
                    <i class="fas fa-id-badge"></i> &nbsp;<b class="inline-block w-1/4 relative pr-3 after:content-[':'] after:absolute after:right-2">Nama</b> <span class="text-gray-500"><?= $profile->nama; ?></span><br><br>
                    <i class="fas fa-map-marked-alt"></i> &nbsp;<b class="inline-block w-1/4 relative pr-3 after:content-[':'] after:absolute after:right-3">Alamat</b> <span class="text-gray-500"><?= $profile->alamat; ?></span><br><br>
                    <i class="fas fa-phone-alt"></i> &nbsp;<b class="inline-block w-1/4 relative pr-3 after:content-[':'] after:absolute after:right-3">No. HP</b> <span class="text-gray-500"><?= $profile->no_hp; ?></span><br><br>
                    <i class="fas fa-envelope"></i> &nbsp;<b class="inline-block w-1/4 relative pr-3 after:content-[':'] after:absolute after:right-3">Email</b> <span class="text-gray-500"><?= $profile->email; ?></span><br><br>
                    </p>
                <?php endif; ?>
            </div>
        </div>

        <div class="max-w-lg md:w-3/5 p-8 bg-white lg:ml-4 rounded-md shadow-md">
            <div class="rounded  shadow-lg p-6">
                <?php if ($profile == null) : ?>
                    <form action="/profile/add" method="POST" id="contactForm" name="contactForm">
                        <input type="hidden" name="usersID" value="<?= $usersID->id ?>">
                    <?php else : ?>
                        <form action="profile/update" method="POST" id="contactForm" name="contactForm">
                        <?php endif; ?>
                        <?php if ($profile == null) : ?>
                            <div class="pb-6">
                                <label for="name" class="font-semibold text-gray-700 block pb-1">Nama Panjang</label>
                                <div class="flex">
                                    <input name="nama" id="username" class="border-1 text-gray-900 bg-slate-200 focus:bg-transparent rounded-r px-4 py-2 w-full" type="text" value="" />
                                </div>
                            </div>
                            <div class="pb-6">
                                <label for="about" class="font-semibold text-gray-700 block pb-1">Nama Warung</label>
                                <input name="namaWarung" id="email" class="border-1 text-gray-900 bg-slate-200 focus:bg-transparent rounded-r px-4 py-2 w-full" type="text" value="" />
                            </div>
                            <div class="pb-6">
                                <label for="about" class="font-semibold text-gray-700 block pb-1">Alamat</label>
                                <textarea class="border-1 text-gray-900 bg-slate-200 focus:bg-transparent rounded-r px-4 py-2 w-full" name="alamat" id="" cols="20" rows="2"></textarea>
                            </div>
                            <div class="pb-6">
                                <label for="about" class="font-semibold text-gray-700 block pb-1">No. HP</label>
                                <input name="noHp" id="email" class="border-1 text-gray-900 bg-slate-200 focus:bg-transparent rounded-r px-4 py-2 w-full" type="text" value="" />
                            </div>
                            <div class="pb-10">
                                <label for="about" class="font-semibold text-gray-700 block pb-1">Email</label>
                                <input name="email" id="email" class="border-1 text-gray-900 bg-slate-200 focus:bg-transparent rounded-r px-4 py-2 w-full" type="email" value="" />
                            </div>
                            <input type="hidden" name="username" value="<?= user()->username; ?>">
                        <?php else : ?>
                            <div class="pb-6">
                                <label for="name" class="font-semibold text-gray-700 block pb-1">Nama Panjang</label>
                                <div class="flex">
                                    <input name="nama" id="username" class="border-1 text-gray-900 bg-slate-200 focus:bg-transparent rounded-r px-4 py-2 w-full" type="text" value="<?= $profile->nama; ?>" />
                                </div>
                            </div>
                            <div class="pb-6">
                                <label for="about" class="font-semibold text-gray-700 block pb-1">Nama Warung</label>
                                <input name="namaWarung" id="email" class="border-1 text-gray-900 bg-slate-200 focus:bg-transparent rounded-r px-4 py-2 w-full" type="text" value="<?= $profile->nama_warung; ?>" />
                            </div>
                            <div class="pb-6">
                                <label for="about" class="font-semibold text-gray-700 block pb-1">Alamat</label>
                                <textarea class="border-1 text-gray-900 bg-slate-200 focus:bg-transparent rounded-r px-4 py-2 w-full" name="alamat" id="" cols="20" rows="2"><?= $profile->alamat; ?></textarea>
                            </div>
                            <div class="pb-6">
                                <label for="about" class="font-semibold text-gray-700 block pb-1">No. HP</label>
                                <input name="noHp" id="email" class="border-1 text-gray-900 bg-slate-200 focus:bg-transparent rounded-r px-4 py-2 w-full" type="text" value="<?= $profile->no_hp; ?>" />
                            </div>
                            <div class="pb-10">
                                <label for="about" class="font-semibold text-gray-700 block pb-1">Email</label>
                                <input name="email" id="email" class="border-1 text-gray-900 bg-slate-200 focus:bg-transparent rounded-r px-4 py-2 w-full" type="email" value="<?= $profile->email; ?>" />
                            </div>
                        <?php endif; ?>
                        <div class="pb-4">
                            <input type="submit" value="<?php if ($profile == null) :  echo "Tambah Profil";
                                                        else : echo "Edit Profil";
                                                        endif; ?>" class="-mt-2 cursor-pointer text-md font-bold text-white bg-gray-700 rounded-full px-5 py-2 hover:bg-gray-800">
                        </div>
                        </form>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>