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

    public function tentang()
    {
        $data['title'] = 'Tentang';
        return view('profil/tentang', $data);
    }

    public function siaga_bencana()
    {
        $data['title'] = 'Siaga Bencana';
        return view('profil/siaga', $data);
    }
}
