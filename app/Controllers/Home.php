<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'BPBD KABUPATEN LINGGA';
        return view('profil/home', $data);
    }
}
