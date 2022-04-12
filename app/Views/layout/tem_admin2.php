<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Product</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/css/gambar.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('admin'); ?>" class="nav-link">Home</a>
                    <!-- </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a class="brand-link d-flex align-items-center justify-content-center">
                <img src="/img/WarungIn.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light mx-3">WARUNGIN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Nav Item - Pages Collapse Menu -->
                        <li class="nav-header"></li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('admin'); ?>">
                                &ensp;<i class="fas fa-fw fa-tachometer-alt"></i>
                                &ensp;<span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-header"></li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                &ensp;<i class="fas fa-clipboard-list"></i>
                                &ensp;<p>
                                    Product
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/product'); ?>" class="nav-link">
                                        &ensp;<i class="fas fa-cube nav-icon"></i>
                                        <p>Daftar Barang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/product/habis'); ?>" class="nav-link">
                                        &ensp;<i class="fas fa-calendar-times nav-icon"></i>
                                        <p>Habis</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('admin/customer'); ?>">
                                &ensp;<i class="fas fa-user-tag"></i>
                                &ensp;<span>Customer</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                &ensp;<i class="fas fa-envelope-open-text"></i>
                                &ensp;<p>
                                    Transaksi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/transaction/pesanan_masuk'); ?>" class="nav-link">
                                        &ensp;<i class="fas fa-download nav-icon"></i>
                                        <p>Pesanan Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/transaction/pesanan_proses'); ?>" class="nav-link">
                                        &ensp;<i class="fas fa-upload nav-icon"></i>
                                        <p>Diproses</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/transaction/pesanan_dikirim'); ?>" class="nav-link">
                                        &ensp;<i class="fas fa-shipping-fast nav-icon"></i>
                                        <p>Dikirim</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/transaction/pesanan_diterima'); ?>" class="nav-link">
                                        &ensp;<i class=" 	fas fa-truck nav-icon"></i>
                                        <p>Diterima</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/transaction/pesanan_selesai'); ?>" class="nav-link">
                                        &ensp;<i class="fas fa-check-circle nav-icon"></i>
                                        <p>Selesai</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">
                                &ensp;<i class="fas fa-sign-out-alt"></i>
                                &ensp;<span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <?= $this->renderSection('content'); ?>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url(); ?>/dist/js/demo.js"></script>
    <!-- Sweetalert -->
    <script src="<?= base_url(); ?>/js/sweetalert2.all.js"></script>
    <script src="<?= base_url(); ?>/js/sweetalert.js"></script>
    <!-- SweetAlert2 -->
    <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
</body>

</html>