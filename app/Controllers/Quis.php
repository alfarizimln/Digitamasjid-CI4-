<?php

namespace App\Controllers;

class Quis extends BaseController
{
    public function quis()
    {
        return view('entriquis');
    }
    public function simpanquis()
    {
       $db=\Config\Database::connect();
       $data=[
        'kodebaju'=> $this->request->getpost('kode'),
        'jenisbaju'=> $this->request->getpost('jenis'),
        'hargabaju'=> $this->request->getpost('harga'),
        'jumlahbaju'=> $this->request->getpost('jumlah'),
        'total'=> $this->request->getpost('total'),
       ];
       $simpan=$db->table('baju')->insert($data);
       if($simpan= true){
        echo "<script>
        alert('data berhasil di simpan');
        window.location='/quis/tampilkanquis';
        </script>";
       }else{
        echo "<script>
        alert('data gagal di simpan'); 
        window.location='/Quis/quis';
        </script>";
      }
    }

    public function tampilkanquis()
    {
        $db=\Config\Database::connect();
        $builder=$db->table('baju');
        $query=$builder->get();
        $data['sppdok']=$query->getResultArray();
        return view('tampilbaju',$data);
    }
}