<?= $this->extend('layout/tem_admin2'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="col-8">
                            <h2 class="my-3">Form Ubah Data</h2>
                            <form action="/transaction/update4/<?= $transaksi['kode_transaksi']; ?>" method="POST"
                                enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="kode_transaksi" value="<?= $transaksi['kode_transaksi']; ?>">
                                <div class="form-group row">
                                    <label for="kode_transaksi" class="col-sm-4 col-form-label">Kode Transaksi</label>
                                    <div class="col-sm-5">
                                        <input type="text"
                                            class="form-control <?= ($validation->hasError('kode_transaksi')) ? 'is-invalid' : ''; ?>"
                                            id="kode_transaksi" name="kode_transaksi" autofocus
                                            value="<?= (old('kode_transaksi')) ? old('kode_transaksi') : $transaksi['kode_transaksi']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kode_transaksi'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-4 col-form-label">Username</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="<?= (old('username')) ? old('username') : $transaksi['username']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('username'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_warung" class="col-sm-4 col-form-label">Nama Warung</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="nama_warung" name="nama_warung"
                                            value="<?= (old('nama_warung')) ? old('nama_warung') : $transaksi['nama_warung']; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_warung'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_pembayaran" class="col-sm-4 col-form-label">Tanggal
                                        Pembayaran</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="tgl_pembayaran"
                                            name="tgl_pembayaran"
                                            value="<?= (old('tgl_pembayaran')) ? old('tgl_pembayaran') : $transaksi['tgl_pembayaran'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_pembayaran'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="total_harga" class="col-sm-4 col-form-label">Total Harga</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="total_harga" name="total_harga"
                                            value="<?= (old('total_harga')) ? old('total_harga') : $transaksi['total_harga'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('total_harga'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-5">
                                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>