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
                        Laporan Data Customer
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
                                <th scope="col">Nama Warung</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No. HP</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($profile as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $p['nama']; ?></td>
                                <td><?= $p['nama_warung']; ?></td>
                                <td><?= $p['alamat']; ?></td>
                                <td><?= $p['no_hp']; ?></td>
                                <td><?= $p['email']; ?></td>

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