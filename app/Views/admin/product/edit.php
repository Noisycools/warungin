<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Users</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/../../dist/css/adminlte.min.css">
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
                    <a href="index.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        x
                    </div>
                </li>
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
            <a href="../../index3.html" class="brand-link">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Warungin</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Nav Item - Pages Collapse Menu -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('admin/product'); ?>">
                                <i class="fas fa-clipboard-list"></i>
                                &ensp;&ensp;<span>Product</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('admin/customer'); ?>">
                                <i class="fas fa-user-tag"></i>
                                &ensp;<span>Customer</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('admin/transaction'); ?>">
                                <i class="fas fa-clipboard-check"></i>
                                &ensp;&ensp;<span>Transaction</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="col-8">
                                    <h2 class="my-3">Form Ubah Data</h2>
                                    <form action="/product/update/<?= $barang['barang_id']; ?>" method="POST" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="slug" value="<?= $barang['slug']; ?>">
                                        <input type="hidden" name="gambarLama" value="<?= $barang['foto_barang']; ?>">
                                        <div class="form-group row">
                                            <label for="nama_barang" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>" id="nama_barang" name="nama_barang" autofocus value="<?= (old('nama_barang')) ? old('nama_barang') : $barang['nama_barang'] ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama_barang'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kategori_barang" class="col-sm-2 col-form-label">Kategori</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="kategori_barang" name="kategori_barang" value="<?= (old('kategori_barang')) ? old('kategori_barang') : $barang['kategori_barang'] ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('kategori_barang'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="harga_barang" class="col-sm-2 col-form-label">Harga</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="harga_barang" name="harga_barang" value="<?= (old('harga_barang')) ? old('harga_barang') : $barang['harga_barang'] ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('harga_barang'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="satuan_barang" class="col-sm-2 col-form-label">Satuan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="satuan_barang" name="satuan_barang" value="<?= (old('satuan_barang')) ? old('satuan_barang') : $barang['satuan_barang'] ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('satuan_barang'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="stok" name="stok" value="<?= (old('stok')) ? old('stok') : $barang['stok'] ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('stok'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" form-group row">
                                            <label for="foto_barang" class="col-sm-2 col-form-label">Gambar</label>
                                            <div class="col">
                                                <div class="col-sm-12">
                                                    <input type="file" class="custom-file-input <?= ($validation->hasError('foto_barang')) ? 'is-invalid' : ''; ?>" id="foto_barang" name="foto_barang" onchange="previewImg()">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('foto_barang'); ?>
                                                    </div>
                                                    <label class="custom-file-label" for="foto_barang"><?= $barang['foto_barang']; ?></label>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <img src="/img/<?= $barang['foto_barang']; ?>" class="img-thumbnail img-preview">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Ubah Data</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url(); ?>/../../dist/js/demo.js"></script>
    <script>
        function previewImg() {
            const gambar = document.querySelector('#foto_barang');
            const gambarLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            gambarLabel.textContent = gambar.files[0].name;

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>