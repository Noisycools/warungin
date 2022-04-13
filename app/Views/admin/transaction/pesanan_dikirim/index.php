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
                        <div class="swal" data-swal="<?= session()->getFlashdata('message'); ?>"></div>
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
                                    <th scope="col">Nama Warung</th>
                                    <th scope="col">Tanggal Pembayaran</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
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
                                        <td><?= $t['nama_warung']; ?></td>
                                        <td><?= $t['tgl_pembayaran']; ?></td>
                                        <td>Rp. <?= number_format($t['total_harga'], 0); ?></td>
                                        <td><a type="submit" href="/transaction/update_kirim/<?= $t['kode_transaksi']; ?>" class="badge btn btn-block btn-outline-warning btn-sm"><?= $t['status']; ?></a>
                                        </td>
                                        <td><a href="/transaction/edit/<?= $t['kode_transaksi']; ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a></td>
                                        <td> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                                                <i class="fas fa-eye"></i>
                                            </button></td>
                                        <td>
                                            <form action="/transaction/<?= $t['kode_transaksi']; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?= $pager->links('transaksi2', 'pagination') ?>
                    </div>
                </div>
                <?php foreach ($info_pesanan->getResult('array') as $i) : ?>
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Default Modal</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Pelanggan </th>
                                                <th scope="col">:</th>
                                                <th scope="col"><?= $i['nama_penerima']; ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Warung</td>
                                                <td>:</td>
                                                <td><?= $i['nama_warung']; ?></td>
                                            </tr>
                                            <tr>
                                                <td> Alamat</td>
                                                <td>:</td>
                                                <td><?= $i['alamat']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>No Hp </td>
                                                <td>:</td>
                                                <td><?= $i['no_hp']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>:</td>
                                                <td><?= $i['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Total Harga</td>
                                                <td>:</td>
                                                <td>Rp. <?= number_format($i['total_harga'], 0); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a name="" id="" class="btn btn-primary" href="/pages/struk/<?= $i['kode_transaksi'] ?>" role="button">Lihat Struk pesanan</a>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                <?php endforeach ?>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection(); ?>