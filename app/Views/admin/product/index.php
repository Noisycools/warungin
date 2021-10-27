<?= $this->extend('layout/temp_admin'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Daftar User</h1>
            <a href="/users/create" class="btn btn-primary mb-3">Tambah Data</a>
            <?php if (session()->getFlashData('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashData('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Created</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $u) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $u['email']; ?></td>
                            <td><?= $u['username']; ?></td>
                            <td><?= $u['created_at']; ?></td>
                            <td><a href="/users/edit/<?= $u['id']; ?>" class="btn btn-warning">Edit</a></td>
                            <td><a href="/users/<?= $u['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>