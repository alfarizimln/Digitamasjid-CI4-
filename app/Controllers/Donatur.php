<?php

namespace App\Controllers;

use App\Models\ModelDonatur;

class Donatur extends BaseController
{
    public function index()
    {
        if(session()->get('masuk')==true ){
            if (session()->get('level')==1)
            {    
        $model = new ModelDonatur();
        $data['donatur'] = $model->getDonatur()->getResultArray();
        echo view('donatur/v_donatur', $data);
            } else{
                echo"<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
            }
        }else{
            echo"<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
    

    public function save()
    {
        $model = new ModelDonatur();
        $data = array(
            'iddonatur' => $this->request->getpost('kode'),
            'nama' => $this->request->getpost('nama'),
            'alamat' => $this->request->getpost('al'),
            'nohp' => $this->request->getpost('no'),
        );
        if(!$this->validate([
            'kode' => [
                'rules' => 'required|is_unique[tbl_donatur.iddonatur]',
                'errors' => [
                    'required'=> '{field} Harus diisi',
                    'is_unique'=> '{field} Sudah Ada'
                ]
            ]
        ])) {
            session()->setFlashdata('error',$this->validator->listErrors());
            return redirect()->back()->withInput();
        }else{
            print_r($this->request->getVar());
        }
        $model->insertData($data);
        return redirect()->to('/donatur');
    }
    public function delete()
    {
        $model = new ModelDonatur();
        $id = $this->request->getPost('id');
        $model->deletedonatur($id);
        return redirect()->to('/donatur/index');
    }
    public function update()
    {
        $model = new ModelDonatur();
        $id=$this->request->getPost('id');
        $data = array(
            'nama' => $this->request->getpost('nama'),
            'alamat' => $this->request->getpost('al'),
            'nohp' => $this->request->getpost('no'),
        );
        $model->updatedonatur($data,$id);
        return redirect()->to('/donatur/index');
    }
}