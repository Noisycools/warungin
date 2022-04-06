<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="/css/style_template_pdf.css">
<script src="htpp://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="htpp://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<h1>
    <center></center>
</h1>
<section class="content content_content" style="width: 70%; margin: auto;">
    <section class="invoice">
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                Dari
                <address>
                    <strong>
                        WarungIn.
                    </strong>
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                Untuk
                <address>
                    Nama : <?= $transaksi->nama_penerima ?>
                    <br>
                    Alamat : <?= $transaksi->alamat ?>
                    <br>
                    Telepon : <?= $transaksi->no_hp ?>
                    <br>
                    Email : <?= $transaksi->email ?>
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Invoice</b><br>
                <br>
                <b>Kode : <?= $transaksi->kode_transaksi ?>
                    <br>
                    <b>Tanggal Pembayaran : <?= $transaksi->tgl_pembayaran ?>
                        <br>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Qty</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($barang->getResult() as $b) : ?>
                            <tr>
                                <td><?= $b->qty ?></td>
                                <td><?= $b->nama_barang ?></td>
                                <td><?= "Rp. " . number_format($b->harga_barang, 2, ',', '.') ?></td>
                                <td><?= "Rp. " . number_format((int)$b->qty * $b->harga_barang, 2, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Total: <?= "Rp. " . number_format($barang2['total_harga'], 2, ',', '.')  ?></th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- this row will not appear when printing -->
        <?php if (logged_in()) : ?>
            <?php if (in_groups('kurir')) : ?>
                <div class="row no-print">
                    <div class="col-xs-12">
                        <form action="<?= base_url('warungin/printPDF') ?>" method="post" target="_blank">
                            <input type="hidden" name="kodeTransaksi" value="<?= $transaksi->kode_transaksi ?>">
                            <button type="submit" class="btn btn-primary pull-right" style="margin-right: 5px;">Cetak PDF</button>
                        </form>
                        <!-- <a href="<?= base_url('warungin/printPDF') ?>" class="btn btn-primary pull-right" style="margin-right: 5px;">Cetak PDF</a> -->
                    </div>
                </div>
            <?php else : ?>
                <div class="row no-print">
                    <div class="col-xs-12">
                        <a href="/" class="btn btn-primary pull-right" style="margin-right: 5px;">Kembali</a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </section>
</section>