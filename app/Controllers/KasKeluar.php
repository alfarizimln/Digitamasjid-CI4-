<?php

namespace App\Controllers;

use App\Models\ModelKasKeluar;

class KasKeluar extends BaseController
{
    public function index()
    {
        if(session()->get('masuk')==true ){
            if (session()->get('level')==1)
            {
        $model = new ModelKasKeluar();
        $data['kaskeluar'] = $model->getkasKeluar()->getResultArray();
        $data['data_agenda'] = $model->getAgenda()->getResult();
        $data['anakyatim'] = $model->getTotalkasanakyatim()->getResult();
        echo view('KasKeluar/v_kaskeluar', $data);
            } else{
                echo"<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
            }
        }else{
            echo"<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }

    public function save()
    {
        $model = new ModelKasKeluar();
        $jumlah=$this->request->getPost('jumlah');
        $data['anakyatim'] = $model->getTotalkasanakyatim();
        $totalsemua = $data['anakyatim']->getRow()->totalsemua ?? 0;
        if ($jumlah > $totalsemua) {
            echo "<script>alert('Dana Kurang'); window.location.href='/Kaskeluar';</script>";
        } else {
            $data = array(
                'tanggal' => $this->request->getpost('tgl'),
                'ket' => $this->request->getpost('ket'),
                'kas_keluar' => $this->request->getpost('jumlah'),
                'kas_masuk' => 0,
                'jenis_kas' => 'Anak Yatim',
                'status' => 'Keluar',
            );
            $model->insertData($data);
            return redirect()->to('/KasKeluar');
        }
        
    }
    public function delete()
    {
        $model = new ModelKasKeluar();
        $id = $this->request->getPost('id');
        $model->deletekasKeluar($id);
        return redirect()->to('/KasKeluar/index');
    }
    public function update()
    {
        $model = new ModelKasKeluar();
        $id=$this->request->getPost('id');
        $data = array(
            'tanggal' => $this->request->getpost('tgl'),
            'ket' => $this->request->getpost('ket'),
            'kas_keluar' => $this->request->getpost('jumlah'),
            'kas_masuk' => 0,
            'status' => 'Keluar',
        );
        $model->updateagenda($data,$id);
        return redirect()->to('/KasKeluar/index');
    }
    public function laporankaskeluar()
    {
        if(session()->get('masuk')==true ){
            if (session()->get('level')==1)
            {
        $model = new Modelkaskeluar();
        $data['data'] = $model->getLaporanKasKeluar()->getResultArray();
        echo view('KasKeluar/cetak_laporan', $data);
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
        echo view('KasKeluar/vlaporankaskeluar');
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
        $model = new ModelKasKeluar();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $query =$model->getLaporanperpiode($tgla,$tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'data' => $query
        ];
        echo view('kaskeluar/vcetaklaporanperperiode',$data);
            } else{
                echo"<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
            }
        }else{
            echo"<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
    public function laporanperperiodeperjeniskas()
    {
        echo view('Kaskeluar/vlaporanperjeniskas');
    }
    public function cetaklaporanperperiodeperjenis()
    {
        if(session()->get('masuk')==true ){
            if (session()->get('level')==1)
            {    
        $model = new ModelKasKeluar();
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
        echo view('Kaskeluar/vlaporanperperiodeperjeniskas',$data);
            } else{
                echo"<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
            }
        }else{
            echo"<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
}