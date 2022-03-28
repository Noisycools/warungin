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
                            <form action="/transaction/update/<?= $transaksi['kode_transaksi']; ?>" method="POST" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="kode_transaksi" value="<?= $transaksi['kode_transaksi']; ?>">
                                <div class="form-group row">
                                    <label for="nama_penerima" class="col-sm-2 col-form-label">Nama Penerima</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control <?= ($validation->hasError('nama_penerima')) ? 'is-invalid' : ''; ?>" id="nama_penerima" name="nama_penerima" autofocus value="<?= (old('nama_penerima')) ? old('nama_penerima') : $transaksi['nama_penerima'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_penerima'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_warung" class="col-sm-2 col-form-label">Nama Warung</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_warung" name="nama_warung" value="<?= (old('nama_warung')) ? old('nama_warung') : $transaksi['nama_warung'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_warung'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= (old('alamat')) ? old('alamat') : $transaksi['alamat'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('alamat'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= (old('no_hp')) ? old('no_hp') : $transaksi['no_hp'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_hp'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="email" name="email" value="<?= (old('email')) ? old('email') : $transaksi['email'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                        </div>
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