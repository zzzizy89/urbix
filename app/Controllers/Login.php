<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        echo view('common/header');
        return view('login');
    }

    public function do_login()
    {
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $result = $userModel->where('email', $email)->first();

        if ($result !== null && $result->id > 0) {
            if (password_verify($password, $result->password)) {
                if ($email === 'tiagocomba@gmail.com' || $email === 'ezequielmonteverde@gmail.com') {
                    $this->session->set("user", $result);
                    return redirect()->to('/admin');
                } else {
                    $this->session->set("user", $result);
                    return redirect()->to('/dashboard');
                }
            } else {
                echo 'Invalid email or password';
            }
        } else {
            echo 'Invalid email or password';
        }
    }

    public function logout()
    {
        session_destroy();
    }
}




