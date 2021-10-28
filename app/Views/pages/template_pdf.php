<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="/css/style_template_pdf.css">
<script src="htpp://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="htpp://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>Print PDF</title>
<!------ Include the above in your HEAD tag ---------->

<section class="content content_content" style="width: 70%; margin: auto;">
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12 logo">
                <h2 class="page-header">
                    <div class="col-md-6">
                        <div class="col-md-5 px-0">
                            <img class="img-fluid logo-img" src="/img/WarungIn.png">
                        </div>
                </h2>
            </div><!-- /.col -->
        </div>
        <small class="pull-right">Tanggal:</small>
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
                    Nama:
                    <br>
                    Alamat:
                    <br>
                    Telepon:
                    <br>
                    Email:
                </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Invoice</b><br>
                <br>
                <b>Kode Barang
                    <br>
                    <b>Tanggal Pembayaran
                        <br>
                        <b>Akun:</b>
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
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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
                                <th>Total:</th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i>Kirim Pembayaran </button>
                <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i>
                    Cetak PDF </button>
            </div>
        </div>
    </section>
</section>