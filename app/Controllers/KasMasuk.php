<?php

namespace App\Controllers;

use App\Models\ModelKasMasuk;

class KasMasuk extends BaseController
{
    public function index()
    {
        if(session()->get('masuk')==true ){
        if (session()->get('level')==1)
        {
        $model = new ModelKasMasuk();
        $data['kasmasuk'] = $model->getkasmasuk()->getResultArray();
        $data['data_donatur'] = $model->getDonatur()->getResult();
        echo view('KasMasuk/v_kasmasuk', $data);
        } else{
            echo"<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
        }
    }else{
        echo"<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
    }
    }

    public function save()
    {
        $model = new ModelKasMasuk();
        $data = array(
            'tanggal' => $this->request->getpost('tgl'),
            'ket' => $this->request->getpost('ket'),
            'kas_masuk' => $this->request->getpost('kmasuk'),
            'kas_keluar' => 0,
            'jenis_kas' => $this->request->getpost('jkas'),
            'status' => 'Masuk',
            'iddonaturmasjid'=>$this->request->getpost('iddonatur'),
        );
        $model->insertData($data);
        return redirect()->to('/KasMasuk');
    }
    public function delete()
    {
        $model = new ModelKasMasuk();
        $id = $this->request->getPost('id');
        $model->deletekasmasuk($id);
        return redirect()->to('/KasMasuk/index');
    }
    public function update()
    {
        $model = new ModelKasMasuk();
        $id = $this->request->getPost('id');
        $data = array(
            'tanggal' => $this->request->getpost('tgl'),
            'ket' => $this->request->getpost('ket'),
            'kas_masuk' => $this->request->getpost('kmasuk'),
            'kas_keluar' => 0,
            'jenis_kas' => $this->request->getpost('jkas'),
            'status' => 'Masuk',
        );
        $model->updateagenda($data, $id);
        return redirect()->to('/KasMasuk/index');
    }
    public function laporankasmasuk()
    {
        if(session()->get('masuk')==true ){
            if (session()->get('level')==1)
            {
        $model = new Modelkasmasuk();
        $data['data'] = $model->getLaporanKasmasuk()->getResultArray();
        echo view('KasMasuk/cetak_laporan', $data);
             } else{
        echo"<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
            }
        }else{
        echo"<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
    }
    }
    public function laporanperperiode()
    {
        if(session()->get('masuk')==true ){
            if (session()->get('level')==1)
            {
        echo view('KasMasuk/vlaporankasmasuk');
        } else{
            echo"<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
        }
    }else{
        echo"<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
    }
        }
    public function cetaklaporanperperiode()
    {
        if(session()->get('masuk')==true ){
            if (session()->get('level')==1)
            {
        $model = new ModelKasMasuk();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $query =$model->getLaporanperpiode($tgla,$tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'data' => $query
        ];
        echo view('kasmasuk/vcetaklaporanperperiode',$data);
            } else{
                echo"<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
            }
        }else{
            echo"<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
    public function laporanperperiodeperjeniskas()
    {
        if(session()->get('masuk')==true ){
            if (session()->get('level')==1)
            {
        echo view('KasMasuk/vlaporanperjeniskas');
            } else{
                echo"<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
            }
        }else{
            echo"<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
    public function cetaklaporanperperiodeperjenis()
    {
        if(session()->get('masuk')==true ){
            if (session()->get('level')==1)
            {
    
        $model = new ModelKasMasuk();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $jenis= $this->request->getPost('jeniskas');
        $query =$model->getLaporanperpiodeperjenis($tgla,$tglb,$jenis)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'jenis' => $jenis,
            'data' => $query
        ];
        echo view('kasmasuk/vlaporanperperiodeperjeniskas',$data);
            } else{
                echo"<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
            }
        }else{
            echo"<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
}