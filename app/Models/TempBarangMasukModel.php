<?php

namespace App\Models;

use CodeIgniter\Model;

class TempBarangMasukModel extends Model
{
    protected $table            = 'temp_barangmasuk';
    protected $primaryKey       = 'id_detail';
    protected $allowedFields    = ['det_faktur', 'det_idbarang', 'det_hargamasuk', 'det_hargajual', 'det_jml', 'det_subtotal'];

    public function tampilDataTemp($faktur)
    {
        return $this->table('temp_barangmasuk')->join('tabel_barang', 'barang_id=det_idbarang')->where(['detfaktur' => $faktur])->get();
    }
}
