<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table      = 'tabel_barang';
    protected $primaryKey = 'barang_id';
    protected $allowedFields = ['nama_barang', 'slug', 'harga_barang', 'satuan_barang', 'foto_barang', 'kategori_barang', 'stok'];

    public function getBarang($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function habis()
    {
        return $this->db->query("SELECT * FROM tabel_barang WHERE stok='0'");
    }

    public function search($keyword)
    {
        return $this->table('tabel_barang')->like('nama_barang', $keyword)->orLike('kategori_barang', $keyword)->orLike('stok', $keyword);
    }
}
