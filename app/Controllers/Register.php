<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Register extends BaseController
{
    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('auth/register', $data);
    }

    public function store()
    {
        $rules = [
            'username'  => 'required|is_unique[user.username]|min_length[3]|max_length[20]',
            'password'      => 'required|min_length[4]|max_length[200]',
            'confpassword'  => 'matches[password]',
        ];

        $messages = [
            'username' => [
                'is_unique' => "Username sudah digunakan"
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->to('register')->withInput();
        }
        $model = new UserModel();
        $data = [
            'username'     => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'roles' => 'PENGUNJUNG'
        ];
        $model->save($data);
        session()->setFlashdata('status', 'Register berhasil, silahkan login');
        return redirect()->to('login');
    }
}
