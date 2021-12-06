<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Galeri extends BaseController
{
    public function index()
    {
        $data['title'] = 'Galeri';
        return view('profil/galeri', $data);
    }
}
