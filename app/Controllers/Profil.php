<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profil extends BaseController
{
    public function visi()
    {
        return view('profil/visi');
    }

    public function struktur_organisasi()
    {
        return view('profil/struktur');
    }
}
