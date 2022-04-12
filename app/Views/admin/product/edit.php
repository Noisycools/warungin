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
                            <h2 class="my-3">Form Ubah Data</h2>
                            <form action="/product/update/<?= $barang->barang_id; ?>" method="POST"
                                enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="slug" value="<?= $barang->slug; ?>">
                                <input type="hidden" name="gambarLama" value="<?= $barang->foto_barang; ?>">
                                <div class="form-group row">
                                    <label for="nama_barang" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>"
                                            id="nama_barang" name="nama_barang" autofocus
                                            value="<?= (old('nama_barang')) ? old('nama_barang') : $barang->nama_barang; ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_barang'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga_barang" class="col-sm-2 col-form-label">Harga</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="harga_barang" name="harga_barang"
                                            value="<?= (old('harga_barang')) ? old('harga_barang') : $barang->harga_barang ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('harga_barang'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="satuan_barang" class="col-sm-2 col-form-label">Satuan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="satuan_barang" name="satuan_barang"
                                            value="<?= (old('satuan_barang')) ? old('satuan_barang') : $barang->satuan_barang ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('satuan_barang'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="stok" name="stok"
                                            value="<?= (old('stok')) ? old('stok') : $barang->stok ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('stok'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <label for="foto_barang" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col">
                                        <div class="col-sm-12">
                                            <input type="file"
                                                class="custom-file-input <?= ($validation->hasError('foto_barang')) ? 'is-invalid' : ''; ?>"
                                                id="foto_barang" name="foto_barang" onchange="previewImg()">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('foto_barang'); ?>
                                            </div>
                                            <label class="custom-file-label"
                                                for="foto_barang"><?= $barang->foto_barang; ?></label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <img src="/img/<?= $barang->foto_barang; ?>" class="img-thumbnail img-preview">
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