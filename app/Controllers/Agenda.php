<?php

namespace App\Controllers;

use App\Models\Modelagenda;

class Agenda extends BaseController
{
    public function index()
    {
        if(session()->get('masuk')==true ){
            if (session()->get('level')==1)
            {
        $model = new ModelAgenda();
        $data['agenda'] = $model->getagenda()->getResultArray();
        echo view('agenda/v_agenda', $data);
            } else{
                echo"<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
            }
        }else{
            echo"<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
    public function save()
    {
        $model = new ModelAgenda();
        $data = array(
            'idagenda' => $this->request->getpost('id'),
            'namakegiatan' => $this->request->getpost('nama'),
            'tanggal' => $this->request->getpost('tanggal'),
            'jam' => $this->request->getpost('jam'),
            
        );
        if(!$this->validate([
            'id' => [
                'rules' => 'required|is_unique[tbl_agenda.idagenda]',
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
        return redirect()->to('/agenda');
    }
    public function delete()
    {
        $model = new ModelAgenda();
        $id = $this->request->getPost('id');
        $model->deleteagenda($id);
        return redirect()->to('/agenda/index');
    }
    public function update()
    {
        $model = new ModelAgenda();
        $id=$this->request->getPost('id');
        $data = array(
            'namakegiatan' => $this->request->getpost('nama'),
            'tanggal' => $this->request->getpost('tanggal'),
            'jam' => $this->request->getpost('jam'),
        );
        $model->updateagenda($data,$id);
        return redirect()->to('/agenda/index');
    }
}