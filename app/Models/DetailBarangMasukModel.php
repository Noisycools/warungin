<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailBarangMasukModel extends Model
{
    protected $table            = 'detail_barangmasuk';
    protected $primaryKey       = 'id_detail';
    protected $allowedFields    = ['det_faktur', 'det_idbarang', 'det_hargamasuk', 'det_hargajual', 'det_jml', 'det_subtotal'];
}
