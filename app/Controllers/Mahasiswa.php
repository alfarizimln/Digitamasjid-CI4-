<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
    public function biodata(): string
    {
        return view('profilku');
    }
    public function nilai(): string
    {
        return view('inputnilai');
    }

}

