<?php

namespace App\Models;
use CodeIgniter\Model;

class ModelKasMasuk extends Model
{
    public function getkasmasuk()
    {
        $builder=$this->db->query("select id_kas_mesjid,kas_keluar,nama,tanggal,ket,kas_masuk,jenis_kas,status from tbl_kas_mesjid join tbl_donatur on iddonaturmasjid=iddonatur where status='Masuk'");
        return $builder;
    }
    public function getDonatur()
    {
        $builder=$this->db->table('tbl_donatur');
        return $builder->get();
    }
    public function insertData($data)
    {
        $this->db->table('tbl_kas_mesjid')->insert($data);
    }
    public function deletekasmasuk($id)
    {
        $query = $this->db->table('tbl_kas_mesjid')->delete(array('id_kas_mesjid' => $id));
        return $query;
    }
    public function updateagenda($data,$id)
    {
        $query = $this->db->table('tbl_kas_mesjid')->update($data,array('id_kas_mesjid' => $id));
        return $query;
    }
    public function getLaporanKasmasuk()
    {
        $builder = $this->db->query("select id_kas_mesjid,kas_keluar,nama,tanggal,ket,kas_masuk,jenis_kas,status from tbl_kas_mesjid join tbl_donatur on iddonaturmasjid=iddonatur");
        return $builder;
    }
    public function getLaporanperpiode($tgla,$tglb)
    {
        $b = $this->db->query("select id_kas_mesjid,kas_keluar,nama,tanggal,ket,kas_masuk,jenis_kas,status from tbl_kas_mesjid join tbl_donatur on iddonaturmasjid=iddonatur where tanggal >= '$tgla' and tanggal <= '$tglb'");
        return $b;
    }
    public function getLaporanperpiodeperjenis($tgla,$tglb,$jenis)
    {
        $b = $this->db->query("select id_kas_mesjid,kas_keluar,nama,tanggal,ket,kas_masuk,jenis_kas,status from tbl_kas_mesjid join tbl_donatur on iddonaturmasjid=iddonatur where tanggal >= '$tgla' and tanggal <= '$tglb' and jenis_kas= '$jenis' and status='Masuk'");
        return $b;
    }
}