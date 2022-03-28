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
                        <h1 class="mt-2 mb-2">Daftar Barang Habis</h1>
                        <div class="col-4">
                            <form action="" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search" name="keyword">
                                    <button class="btn btn-outline-secondary" type="submit" name="submit"><i class="fa fa-search"></i></button>
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
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($barang->getResult('array') as $b) : ?>
                                    <tr">
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $b['nama_barang']; ?>
                                            <?php if ($b['stok'] == 0) : ?>
                                                &ensp;<span class="badge bg-danger">Habis</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>Rp. <?= number_format($b['harga_barang'], 0); ?></td>
                                        <td><?= $b['satuan_barang']; ?></td>
                                        <td><?= $b['kategori_barang']; ?></td>
                                        <td><?= $b['stok']; ?></td>
                                        <td><img src="/img/<?= $b['foto_barang']; ?>" alt="" class="gambar"></td>
                                        <td><a href="/product/edit/<?= $b['slug']; ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <form action="/product/<?= $b['barang_id']; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-hapus"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                        </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>