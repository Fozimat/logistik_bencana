<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Berita extends BaseController
{
    public function index()
    {
        $data['title'] = 'Berita';
        return view('profil/berita', $data);
    }
}
