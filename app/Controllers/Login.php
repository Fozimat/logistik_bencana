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
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data->password;
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
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
                session()->setFlashdata('status', 'Password salah');
                return redirect()->to('login');
            }
        } else {
            session()->setFlashdata('status', 'Username tidak ditemukan');
            return redirect()->to('login');
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
