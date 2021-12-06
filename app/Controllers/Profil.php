<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profil extends BaseController
{
    public function visi()
    {
        $data['title'] = 'Visi Misi';
        return view('profil/visi', $data);
    }

    public function struktur_organisasi()
    {
        $data['title'] = 'Struktur Organisasi';
        return view('profil/struktur', $data);
    }

    public function sejarah()
    {
        $data['title'] = 'Sejarah';
        return view('profil/sejarah', $data);
    }
}
