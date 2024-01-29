<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelKasKeluar extends Model
{
    public function getkaskeluar()
    {
        $builder=$this->db->table('tbl_kas_mesjid')->where('status="Keluar"');
        return $builder->get();
    }
    public function getTotalkasanakyatim()
    {
        $builder=$this->db->query('SELECT SUM(kas_masuk) AS totalmasuk,SUM(kas_keluar) AS 
        totalkeluar,SUM(kas_masuk)-SUM(kas_keluar) AS totalsemua 
        FROM tbl_kas_mesjid WHERE jenis_kas="Anak Yatim"');
        return $builder;
    }
    public function getAgenda()
    {
        $builder=$this->db->query('select*from tbl_agenda where jeniskegiatan="Anak Yatim"');
        return $builder;
    }
    public function insertData($data)
    {
        $this->db->table('tbl_kas_mesjid')->insert($data);
    }
    public function deletekaskeluar($id)
    {
        $query = $this->db->table('tbl_kas_mesjid')->delete(array('id_kas_mesjid' => $id));
        return $query;
    }
    public function updateagenda($data,$id)
    {
        $query = $this->db->table('tbl_kas_mesjid')->update($data,array('id_kas_mesjid' => $id));
        return $query;
    }
    public function getLaporanKaskeluar()
    {
        $builder = $this->db->table('tbl_kas_keluar');
        return $builder->get();
    }
    public function getLaporanperpiode($tgla,$tglb)
    {
        $b = $this->db->query("select * from tbl_kas_mesjid where tanggal >= '$tgla' and tanggal <= '$tglb'");
        return $b;
    }
    public function getLaporanperpiodeperjenis($tgla,$tglb,$jenis)
    {
        $b = $this->db->query("select * from tbl_kas_mesjid where tanggal >= '$tgla' and tanggal <= '$tglb' and jenis_kas= '$jenis'");
        return $b;
    }
}