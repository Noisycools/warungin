<?= $this->extend('layout/tem_profile'); ?>

<?= $this->section('content'); ?>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section mt-5">Profil</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-md-7 d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">
                                    <?php if ($profile == null) : ?>
                                        Tambahkan Profil Warung Kamu
                                    <?php else :
                                    ?> Edit Profil
                                    <?php endif; ?>
                                </h3>
                                <?php if ($profile == null) : ?>
                                    <form action="profile/add" method="POST" id="contactForm" name="contactForm">
                                    <?php else : ?>
                                        <form action="profile/update" method="POST" id="contactForm" name="contactForm">
                                        <?php endif; ?>
                                        <div class="row">
                                            <?php if ($profile == null) : ?>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="namaWarung" id="name" placeholder="Nama Warung">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea name="alamat" class="form-control" id="message" cols="20" rows="2" placeholder="Alamat"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="noHp" id="email" placeholder="No. HP">
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="username" value="<?= $username; ?>">
                                            <?php else : ?>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="namaWarung" id="name" value="<?= $profile->nama_warung; ?>" placeholder="Nama Warung">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea name="alamat" class="form-control" id="message" cols="20" rows="2" placeholder="Alamat"><?= $profile->alamat; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="noHp" id="email" value="<?= $profile->no_hp; ?>" placeholder="No. HP">
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email" id="email" value="<?= $profile->email; ?>" placeholder="Email">
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="submit" value="<?php if ($profile == null) :  echo "Tambah Profil";
                                                                                else : echo "Edit Profil";
                                                                                endif; ?>" class="btn btn-secondary">
                                                    <div class="submitting"></div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-stretch">
                            <?php if ($profile == null) : ?>
                                <div class="info-wrap w-100 p-lg-5 p-4">
                                    <h3 class="mb-4 mt-md-4">Nama Warung Kamu</h3>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-map-marker"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Alamat:</span> Belum diset</p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>No. HP:</span><a href="tel://1234567920"> Belum diset</a></p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-paper-plane"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Email:</span><a href="mailto:info@yoursite.com"> Belum diset</a></p>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="info-wrap w-100 p-lg-5 p-4">
                                    <h3 class="mb-4 mt-md-4">
                                        <?= $profile->nama_warung; ?>
                                    </h3>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-map-marker"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Alamat:</span>
                                                <?= $profile->alamat; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>No. HP:</span> <a href="tel://1234567920">
                                                    <?= $profile->no_hp; ?>
                                                </a></p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-paper-plane"></span>
                                        </div>
                                        <div class="text pl-3">
                                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">
                                                    <?= $profile->email; ?>
                                                </a></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>