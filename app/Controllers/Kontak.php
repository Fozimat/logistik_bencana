<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kontak extends BaseController
{
    public function index()
    {
        $data['title'] = 'Kontak';
        return view('profil/kontak', $data);
    }
}