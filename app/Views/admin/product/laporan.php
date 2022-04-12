<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h3 class="page-header">
                        <img src="/img/WarungIn2.png" alt="warunginLogo" class="attachment-img" width="7%">
                        Laporan Data Barang
                    </h3>
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
                                <th scope="col">Nama</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Stok</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($barang->getResult('array') as $b) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $b['nama_barang']; ?></td>
                                <td><?= $b['harga_barang']; ?></td>
                                <td><?= $b['satuan_barang']; ?></td>
                                <td><?= $b['kategori']; ?></td>
                                <td><?= $b['stok']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <h6 class="float-right" style="margin-right: 45px;">Bandung, <?= $date; ?></h6><br><br>
                    <h6 class="float-right" style="margin: 50px 133px;">Warungin</h6>
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