<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Pesanan | Warungin Kurir</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/../../dist/css/adminlte.min.css">
</head>

<body>

    <div class="container">
        <div class="wrapper">
            <div class="container">
                <form action="/kurir/verifikasi" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <h1>
                        <i class="fas fa-check-circle"></i>
                        Verifikasi Pesanan
                    </h1>
                    <div class="form-group row">
                        <label for="kodeTransaksi" class="col-sm-2 col-form-label">Kode Transaksi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('kodeTransaksi')) ? 'is-invalid' : ''; ?>" id="kodeTransaksi" name="kodeTransaksi" autofocus value="<?= old('kodeTransaksi'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kodeTransaksi'); ?>
                            </div>
                        </div>
                    </div>
                    <div class=" form-group row">
                        <label for="fotoStruk" class="col-sm-2 col-form-label">Bukti Struk</label>
                        <div class="col">
                            <div class="col-sm-12">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('fotoStruk')) ? 'is-invalid' : ''; ?>" id="fotoStruk" name="fotoStruk" onchange="previewImgStruk()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('fotoStruk'); ?>
                                </div>
                                <label class="custom-file-label" for="fotoStruk">
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <img src="/img/default.jpg" class="img-thumbnail img-preview">
                        </div>
                    </div>
                    <div class=" form-group row">
                        <label for="fotoPengiriman" class="col-sm-2 col-form-label">Bukti Pengiriman</label>
                        <div class="col">
                            <div class="col-sm-12">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('fotoPengiriman')) ? 'is-invalid' : ''; ?>" id="fotoPengiriman" name="fotoPengiriman" onchange="previewImgPengiriman()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('fotoPengiriman'); ?>
                                </div>
                                <label class="custom-file-label" for="fotoPengiriman">
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <img src="/img/default.jpg" class="img-thumbnail img-preview-2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Verifikasi</button>
                            <button href="/kurir" class="btn btn-primary">Kembali</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url(); ?>/../../dist/js/demo.js"></script>
    <script>
        function previewImgStruk() {
            const fotoStruk = document.querySelector('#fotoStruk');
            const strukLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            strukLabel.textContent = fotoStruk.files[0].name;

            const fileFotoStruk = new FileReader();
            fileFotoStruk.readAsDataURL(fotoStruk.files[0]);

            fileFotoStruk.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function previewImgPengiriman() {
            const fotoPengiriman = document.querySelector('#fotoPengiriman');
            const pengirimanLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview-2');

            pengirimanLabel.textContent = fotoPengiriman.files[0].name;

            const fileFotoPengiriman = new FileReader();
            fileFotoPengiriman.readAsDataURL(fotoPengiriman.files[0]);

            fileFotoPengiriman.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>