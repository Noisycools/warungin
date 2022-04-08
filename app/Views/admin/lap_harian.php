<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <img src="/img/WarungIn2.png" alt="warunginLogo" class="attachment-img" width="7%">
                        Laporan Harian
                        <small>
                            <h3 class="float-right">Tanggal : <?= $date; ?></h3>
                        </small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>

            <!-- Table row -->
            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Transaksi</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Warung</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Harga Barang</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($transaksi->getResult('array') as $t) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $t['kode_transaksi']; ?></td>
                                    <td><?= $t['nama_penerima']; ?></td>
                                    <td><?= $t['nama_warung']; ?></td>
                                    <td><?= $t['nama_barang']; ?></td>
                                    <td><?= $t['qty']; ?></td>
                                    <td>Rp. <?= number_format($t['harga_barang'], 0); ?></td>
                                    <td>Rp. <?= number_format($t['total_harga'], 0); ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <th colspan="6">Sub Total</th>
                                    <?php foreach ($jumlah->getResult('array') as $j) : ?>
                                        <td>Rp. <?= number_format($j['total'], 0); ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>