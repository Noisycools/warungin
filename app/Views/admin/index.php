<?= $this->extend('layout/tem_admin'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php foreach ($pesanan->getResult('array') as $t) :  ?>
                            <h3><?= $t['total']; ?></h3>
                            <?php endforeach; ?>
                            <p>Pesanan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php foreach ($pendapatan->getResult('array') as $t) :  ?>
                            <h3>Rp . <?= number_format($t['total'], 0); ?></h3>
                            <?php endforeach; ?>
                            <p>Pendapatan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php foreach ($customer->getResult('array') as $t) :  ?>
                            <h3><?= $t['total']; ?></h3>
                            <?php endforeach; ?>
                            <p>Customer</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php foreach ($barang->getResult('array') as $t) :  ?>
                            <h3><?= $t['total']; ?></h3>
                            <?php endforeach; ?>
                            <p>Barang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-5 col-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Laporan</h3>
                        </div>
                        <div class="card-body">
                            <!-- Date -->
                            <form action="admin/lap_harian" method="POST">
                                <div class="form-group">
                                    <label>Laporan Tanggal:</label>
                                    <div class="row">
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest"
                                            style="width: 82%;">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#reservationdate" name="tanggal" />
                                            <div class="input-group-append" data-target="#reservationdate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        &ensp;<button type="submit" class="btn btn-block btn-primary"
                                            style="width: 10%;"><i class="fa fa-download"></i></button>
                                    </div>
                                </div>
                            </form>
                            <!-- Date range -->
                            <form action="admin/lap_mingguan" method="POST">
                                <div class="form-group">
                                    <label>Laporan mingguan:</label>
                                    <div class="row">
                                        <div class="input-group date" id="reservationdate1" data-target-input="nearest"
                                            style="width: 40%;">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#reservationdate1" name="tanggal1" />
                                            <div class="input-group-append" data-target="#reservationdate1"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>&ensp;
                                        <div class="input-group date" id="reservationdate2" data-target-input="nearest"
                                            style="width: 40%;">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#reservationdate2" name="tanggal2" />
                                            <div class="input-group-append" data-target="#reservationdate2"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        &ensp;<button type="submit" class="btn btn-block btn-primary"
                                            style="width: 10%;"><i class="fa fa-download"></i></button>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </form>
                            <!-- /.form group -->
                            <form action="admin/lap_bulanan" method="POST">
                                <div class="form-group">
                                    <label>Laporan Bulanan</label>
                                    <div class="row">
                                        <select class="form-control select2" style="width: 82%;" name="bulan">
                                            <option>Januari</option>
                                            <option>Februari</option>
                                            <option>Maret</option>
                                            <option selected="selected">April</option>
                                            <option>Mei</option>
                                            <option>Juni</option>
                                            <option>Juli</option>
                                            <option>Agustus</option>
                                            <option>September</option>
                                            <option>Oktober</option>
                                            <option>November</option>
                                            <option>Desember</option>
                                        </select>
                                        &ensp;<button type="submit" class="btn btn-block btn-primary"
                                            style="width: 10%;"><i class="fa fa-download"></i></button>
                                    </div>
                                </div>
                            </form>
                            <form action="admin/lap_tahunan" method="POST">
                                <div class="form-group">
                                    <label>Laporan Tahunan</label>
                                    <div class="row">
                                        <select class="form-control select2" style="width: 82%;" name="tahun">
                                            <?php
                      $i = date("Y") - 2;
                      for ($j = $i; $j < $i + 5; $j++) {
                        echo '<option value="' . $j . '">' . $j . '</option>';
                      }
                      ?>
                                        </select>
                                        &ensp;<button type="submit" class="btn btn-block btn-primary"
                                            style="width: 10%;"><i class="fa fa-download"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->

        <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>