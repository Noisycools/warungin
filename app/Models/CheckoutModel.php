<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class CheckoutModel extends Model
{
    protected $table = 'transaksi';
    protected $allowedFields = ['kode_transaksi', 'username', 'nama_penerima', 'nama_warung', 'alamat', 'no_hp', 'email', 'tgl_pembayaran', 'status', 'foto_struk'];
    protected $returnType    = '\App\Entities\Transaksi';
    protected $primaryKey = 'kode_transaksi';
    protected $useTimestamps = true;

    public function getData($kodeTransaksi = null)
    {
        if ($kodeTransaksi == null) {
            return $this->findAll();
        } else {
            $builder = $this->db->table($this->table);
            $builder->select('*');
            $builder->where('kode_transaksi', $kodeTransaksi);
            return $builder->get();
        }
    }

    public function getDataByUsername($username = null)
    {
        $today = Time::now('Asia/Jakarta');
        $hariIni = Time::parse($today, 'Asia/Jakarta');
        if ($username == null) {
            return $this->findAll();
        }
        $builder = $this->db->table('transaksi');
        $builder->select('*');
        $builder->where(['username' => $username, 'expired_date >' => $hariIni->toDateString()]);
        return $builder->get();
    }

    public function changeStatus($username = null)
    {
        $today = Time::now('Asia/Jakarta');
        $hariIni = Time::parse($today, 'Asia/Jakarta');
        if ($username == null) {
            return $this->findAll();
        }
        $builder = $this->db->table('transaksi');
        $builder->select('*');
        $builder->where(['username' => $username, 'expired_date >' => $hariIni->toDateString()]);
        return $builder->get();
    }

    public function getDataByUsername2($value, $username = null)
    {
        $today = Time::now('Asia/Jakarta');
        $hariIni = Time::parse($today, 'Asia/Jakarta');
        if ($username == null) {
            return $this->findAll();
        }
        $results = $this->where(['username' => $username, 'expired_date >' => $hariIni->toDateString()])->paginate($value);

        return $results;
    }

    public function getDataByDate()
    {
        $tgl = date("d M Y");
        return $this->db->query("SELECT * FROM transaksi WHERE tgl_pembayaran='$tgl' ORDER BY created_at DESC");
    }

    public function getDataByStatus($status = null)
    {
        $myTime = Time::now('Asia/Jakarta');
        $time = $myTime->toLocalizedString('d MMMM yyyy');
        if ($status == null) {
            return $this->findAll();
        } else {
            $builder = $this->db->table('transaksi');
            $builder->select('*');
            $builder->where(['status' => $status, 'tgl_pembayaran' => $time]);
            $builder->orderBy('waktu_created_at', 'asc');
            return $builder->get();
        }
    }

    public function search($keyword)
    {
        return $this->table($this->table)->like('kode_transaksi', $keyword);
    }

    public function add($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateStatus($data)
    {
        $builder = $this->db->table($this->table);
        $builder->where(['kode_transaksi' => $data['kode_transaksi']]);
        return $builder->update($data);
    }
}
