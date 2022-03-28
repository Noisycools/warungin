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
                        <div class="col-8">
                            <h2 class="my-3">Form Tambah Data</h2>
                            <form action="/product/save" method="POST" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-group row">
                                    <label for="nama_barang" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>" id="nama_barang" name="nama barang" autofocus value="<?= old('nama_barang'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_barang'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kategori_barang" class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control <?= ($validation->hasError('kategori_barang')) ? 'is-invalid' : ''; ?>" id="kategori_barang" name="kategori_barang" autofocus value="<?= old('kategori_barang'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kategori_barang'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga_barang" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control <?= ($validation->hasError('harga_barang')) ? 'is-invalid' : ''; ?>" id="harga_barang" name="harga_barang" autofocus value="<?= old('harga_barang'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('harga_barang'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="satuan_barang" class="col-sm-2 col-form-label">Satuan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control <?= ($validation->hasError('satuan_barang')) ? 'is-invalid' : ''; ?>" id="satuan_barang" name="satuan_barang" autofocus value="<?= old('satuan_barang'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('satuan_barang'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" name="stok" autofocus value="<?= old('stok'); ?>">
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
                                            <label class="custom-file-label" for="foto_barang">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <img src="/img/default.jpg" class="img-thumbnail img-preview">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
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

<?= $this->endSection(); ?>