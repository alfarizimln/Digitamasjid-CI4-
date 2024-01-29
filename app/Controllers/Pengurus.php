<?php

namespace App\Controllers;

use App\Models\ModelPengurus;

class Pengurus extends BaseController
{
    public function index()
    {
        if(session()->get('masuk')==true){
        $model = new ModelPengurus();
        $data['pengurus'] = $model->getPengurus()->getResultArray();
        echo view('pengurus/v_pengurus', $data);
    }else{
        echo"<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
    }
    }

    public function save()
    {
        $model = new ModelPengurus();
        $data = array(
            'id_pengurus' => $this->request->getpost('kode'),
            'nama_pengurus' => $this->request->getpost('nama'),
            'jabatan' => $this->request->getpost('jab'),
            'alamat' => $this->request->getpost('al'),
            'no_hp' => $this->request->getpost('no'),
        );
        if(!$this->validate([
            'kode' => [
                'rules' => 'required|is_unique[tbl_pengurus.id_pengurus]',
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
        return redirect()->to('/pengurus');
    }
    public function delete()
    {
        $model = new ModelPengurus();
        $id = $this->request->getPost('id');
        $model->deletepengurus($id);
        return redirect()->to('/Pengurus/index');
    }
    public function update()
    {
        $model = new ModelPengurus();
        $id=$this->request->getPost('id');
        $data = array(
            'nama_pengurus' => $this->request->getpost('nama'),
            'jabatan' => $this->request->getpost('jab'),
            'alamat' => $this->request->getpost('al'),
            'no_hp' => $this->request->getpost('no'),
        );
        $model->updatepengurus($data,$id);
        return redirect()->to('/pengurus/index');
    }
}