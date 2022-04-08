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
              <h3>8</h3>
              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>60<sup style="font-size: 20px">%</sup></h3>
              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>4</h3>
              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>16</h3>
              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
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
                    <div class="input-group date" id="reservationdate" data-target-input="nearest" style="width: 80%;">
                      <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal" />
                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                    &ensp;<button type="submit" class="btn btn-block btn-primary" style="width: 15%;"><i class="fa fa-download"></i></button>
                  </div>
                </div>
              </form>
              <!-- Date range -->
              <div class="form-group">
                <label>Laporan mingguan:</label>
                <div class="row">
                  <div class="input-group" style="width: 80%;">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservation">
                  </div>
                  &ensp;<button type="button" class="btn btn-block btn-primary" style="width: 15%;"><i class="fa fa-download"></i></button>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
                <label>Laporan Bulanan</label>
                <div class="row">
                  <select class="form-control select2" style="width: 80%;">
                    <option selected="selected">Januari</option>
                    <option>Februari</option>
                    <option>Maret</option>
                    <option>April</option>
                    <option>Mei</option>
                    <option>Juni</option>
                    <option>Juli</option>
                    <option>Agustus</option>
                    <option>September</option>
                    <option>Oktober</option>
                    <option>November</option>
                    <option>Desember</option>
                  </select>
                  &ensp;<button type="button" class="btn btn-block btn-primary" style="width: 15%;"><i class="fa fa-download"></i></button>
                </div>
              </div>
              <div class="form-group">
                <label>Laporan Tahunan</label>
                <div class="row">
                  <select class="form-control select2" style="width: 80%;">
                    <?php
                    $i = date("Y") - 2;
                    for ($j = $i; $j < $i + 5; $j++) {
                      echo '<option value="' . $j . '">' . $j . '</option>';
                    }
                    ?>
                  </select>
                  &ensp;<button type="button" class="btn btn-block btn-primary" style="width: 15%;"><i class="fa fa-download"></i></button>
                </div>
              </div>
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