<table class="table table-sm table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Jumlah</th>
            <th>Sub Total</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1;
        foreach ($datatemp->getResultArray() as $row) :
            ?>
            <tr>
                <td><?= $nomor++; ?></td>
                <td><?= $row['barang_id']; ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td style="text-align: right;">
                    <?= number_format($row['det_hargajual'], 0, ",", ".") ?>
                </td>
                <td style="text-align: right;">
                    <?= number_format($row['det_hargamasuk'], 0, ",", ".") ?>
                </td>
                <td style="text-align: right;">
                    <?= number_format($row['det_jml'], 0, ",", ".") ?>
                </td>
                <td style="text-align: right;">
                    <?= number_format($row['det_subtotal'], 0, ",", ".") ?>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="hapusItem('<?= $row['id_detail'] ?>')"></button>
                    <i class="fa fa-trash-alt"></i>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>