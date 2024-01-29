<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function mhs()
    {
        return view('tabelmhs');
    }
    public function proses()
    {
        $nobp = $this->request->getpost('nobp');
        $nama = $this->request->getpost('nama');
        $uts = $this->request->getpost('uts');
        $uas = $this->request->getpost('uas');
        echo "NoBP : $nobp <br>";
        echo "Nama : $nama <br>";
        echo "UTS : $uts <br>";
        echo "UAS : $uas <br>";
        $hasil = ($uas + $uts) / 2;
        echo $hasil;
    }
    public function baru()
    {
        return view('views');
    }
    public function hitungbiaya()
    {
        $kd = $this->request->getpost('kode');
        $agen = $this->request->getpost('agenda');
        $trans = $this->request->getpost('transportasi');
        $peng = $this->request->getpost('penginapan');
        $pokok = $this->request->getpost('pokok');
        $total = $this->request->getpost('total');
        echo "Kode Keberangkatan : $kd <br>";
        echo "Agenda             : $agen <br>";
        echo "Biaya Transportasi : $trans <br>";
        echo "Biaya Penginapan   : $peng <br>";
        echo "Biaya Pokok        : $pokok <br>";
        echo "Total              : $total <br>";

    }
    public function tambah()
    {
        return view('pembayaran');
    }
    public function hitung()
    {
        $bak = $this->request->getpost('bakso');
        $sio = $this->request->getpost('siomay');
        $ay = $this->request->getpost('ayam');
        $teh = $this->request->getpost('teh');
        $mem = $this->request->getpost('member');
        $diskon = $this->request->getpost('dis');
        $total = $this->request->getpost('tot');
        echo "<center><h2>FAKTUR PEMBAYARAN</h2>";
        echo "<table><tr><td>Harga Bakso :</td>
        <td><b>$bak</b></td><td>x Rp.10000</td></tr>";
        echo "<tr><td>Harga Siomay  :</td>
        <td><b>$sio</b></td><td> x Rp.12000</td></tr>";
        echo "<tr><td>Harga Mie Ayam :</td> 
        <td><b>$ay</b></td><td> x Rp.12000</td></tr>";
        echo "<tr><td>Harga Teh Es :</td> 
        <td><b>$teh</b></td><td> x Rp.4000</td></tr>";
        echo "<tr><td>Member : </td>
        <td><b>$mem</b> </td></tr>";
        echo "<tr><td>Diskon : </td>
        <td><b>$diskon</b> </td></tr>";
        echo "<tr><td>Total : </td>
        <td><b>$total</b></td></tr> </table></center><br>";
    }

    public function simpan()
    {
       $db=\Config\Database::connect();
       $data=[
        'kode'=> $this->request->getpost('kode'),
        'agenda'=> $this->request->getpost('agenda'),
        'btransportasi'=> $this->request->getpost('transportasi'),
        'bpenginapan'=> $this->request->getpost('penginapan'),
        'bpokok'=> $this->request->getpost('pokok'),
        'total'=> $this->request->getpost('total'),
       ];
       $simpan=$db->table('sppd')->insert($data);
       if($simpan= true){
        echo "<script>
        alert('data berhasil di simpan');
        window.location='/home/tampil';
        </script>";
       }else{
        echo "<script>
        alert('data gagal di simpan');
        window.location='/home/tampil';
        </script>";
      }
    }

    public function tampil()
    {
        $db=\Config\Database::connect();
        $builder=$db->table('sppd');
        $query=$builder->get();
        $data['sppdok']=$query->getResultArray();
        return view('tampilsppd',$data);
    }

    public function simpan1()
    {
       $db=\Config\Database::connect();
       $data=[
        'bakso'=> $this->request->getpost('bakso'),
        'siomay'=> $this->request->getpost('siomay'),
        'mie'=> $this->request->getpost('ayam'),
        'tehes'=> $this->request->getpost('teh'),
        'member'=> $this->request->getpost('member'),
        'total'=> $this->request->getpost('tot'),

       ];
       $simpan=$db->table('makan')->insert($data);
       if($simpan= true){
        echo "<script>
        alert('data berhasil di simpan');
        window.location='/home/tampil1';
        </script>";
       }else{
        echo "<script>
        alert('data gagal di simpan');
        window.location='/home/tampil1';
        </script>";
       }
    }
    public function tampil1()
    {
        $db=\Config\Database::connect();
        $builder=$db->table('makan');
        $query=$builder->get();
        $data['sppdok']=$query->getResultArray();
        return view('makan',$data);
    }
}



