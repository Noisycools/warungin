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
                                <?php foreach ($transaksi->getResult('array') as $t) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $t['kode_transaksi']; ?></td>
                                        <td><?= $t['username']; ?></td>
                                        <td><?= $t['nama_warung']; ?></td>
                                        <td><?= $t['tgl_pembayaran']; ?></td>
                                        <td>Rp. <?= number_format($t['total_harga'], 0); ?></td>
                                        <td><span class="badge bg-primary"><?= $t['status']; ?></span></td>
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
                    </div>
                </div>
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
                                <p>One fine body&hellip;</p>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>