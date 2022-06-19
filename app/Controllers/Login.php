<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('auth/login', $data);
    }

    public function auth()
    {
        session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->where('password', $password)->first();
        if ($data) {
            $ses_data = [
                'user_id'       => $data->id,
                'username'    => $data->username,
                'logged_in'     => TRUE,
                'roles' => $data->roles
            ];
            session()->set($ses_data);
            if ($data->roles == 'ADMIN' || $data->roles == 'KASI') {
                return redirect()->to('admin/dashboard');
            } else {
                return redirect()->to('laporantanggapbencana');
            }
        } else {
            session()->setFlashdata('status', 'Username/Password salah');
            return redirect()->to('login');
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
