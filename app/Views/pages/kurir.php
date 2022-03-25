<?= $this->extend('layout/tem_kurir'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Histori Pemesanan Hari Ini</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Transaksi</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama Penerima</th>
                        <th scope="col">Nama Warung</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($transaksi->getResult('array') as $t) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $t['kode_transaksi']; ?></td>
                            <td><?= $t['username']; ?></td>
                            <td><?= $t['nama_penerima']; ?></td>
                            <td><?= $t['nama_warung']; ?></td>
                            <td><?= $t['alamat']; ?></td>
                            <td><?= $t['no_hp']; ?></td>
                            <td><?= $t['email']; ?></td>
                            <td><?= $t['status']; ?></td>
                            <td><a href="/pages/detail_transaksi/<?= $t['kode_transaksi']; ?>" class="btn btn-info"><i class="fas fa-eye"></i></a></td>
                            <td><button href="/pages/kurir_verif/<?= $t['kode_transaksi']; ?>" class="btn btn-warning"><i class="fas fa-pen"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>