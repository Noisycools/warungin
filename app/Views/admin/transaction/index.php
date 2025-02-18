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
                        <h1 class="mt-2">Histori Transaksi</h1>
                        <a href="/transaction/laporan" rel="noopener" target="_blank" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</a>
                        <a href="/transaction/create" class="btn btn-primary mb-3 float-right mr-2">Tambah Data</a>
                        <?php if (session()->getFlashData('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashData('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="col-4">
                            <form action="" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Masukkan keyword pencarian.." name="keyword">
                                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Transaksi</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Nama Penerima</th>
                                    <th scope="col">Nama Warung</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No Hp</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Aksi</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($transaksi as $t) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $t['kode_transaksi']; ?></td>
                                        <td><?= $t['username']; ?></td>
                                        <td><?= $t['nama_penerima']; ?></td>
                                        <td><?= $t['nama_warung']; ?></td>
                                        <td><?= $t['alamat']; ?></td>
                                        <td><?= $t['no_hp']; ?></td>
                                        <td><?= $t['email']; ?></td>
                                        <td><a href="/transaction/edit/<?= $t['kode_transaksi']; ?>" class="btn btn-warning">Edit</a></td>
                                        <td>
                                            <form action="/transaction/<?= $t['kode_transaksi']; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?= $pager->links('transaksi', 'pagination'); ?>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>