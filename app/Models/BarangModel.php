<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table      = 'tabel_barang';
    protected $primaryKey = 'barang_id';
    protected $allowedFields = ['nama_barang', 'slug', 'harga_barang', 'satuan_barang', 'foto_barang', 'stok'];

    public function getAll()
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        return $builder->countAllResults();
    }

    public function getBarang($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        $builder = $this->db->table('tabel_barang');
        $builder->select('*');
        $builder->join('kategori_barang', 'kategori_barang.id_kategori = tabel_barang.id_kategori');
        $builder->where('slug', $slug);
        // dd($builder->get()->getResultArray());
        return $builder->get()->getFirstRow();
    }

    public function getBarang1($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function getBarangFull()
    {
        $builder = $this->db->table('tabel_barang');
        $builder->select('*');
        $builder->join('kategori_barang', 'kategori_barang.id_kategori = tabel_barang.id_kategori');
        $builder->orderBy('tabel_barang.barang_id');
        return $builder->get();
    }

    public function habis()
    {
        return $this->db->query("SELECT * FROM tabel_barang JOIN kategori_barang 
        ON tabel_barang.id_kategori=kategori_barang.id_kategori WHERE stok='0'");
    }

    public function search($keyword)
    {
        return $this->table('tabel_barang')->like('nama_barang', $keyword)->orLike('stok', $keyword);
    }
}