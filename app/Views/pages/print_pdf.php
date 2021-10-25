<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <table border="3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Satuan Barang</th>
                <th>Kategori Barang</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barang as $b) : ?>
                <tr>
                    <th><?= $b['barang_id']; ?></th>
                    <th><?= $b['nama_barang']; ?></th>
                    <th><?= $b['harga_barang']; ?></th>
                    <th><?= $b['satuan_barang']; ?></th>
                    <th><?= $b['kategori_barang']; ?></th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>