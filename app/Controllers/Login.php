<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        
        return view('main/form/login');
    }

    public function do_login()
    {
        $userModel = new UserModel();
    
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $rol = $this->request->getPost('rol');
    
            $result = $userModel->where('email', $email)->first();
    
            if ($result !== null && $result->id_user > 0) {
                if (password_verify($password, $result->password)) {
                echo $rol;
                   
                    if ($result->rol == 1) {
                        $this->session->set("user", $result);
                        return redirect()->to('listar');
                    } else {
                        $this->session->set("user", $result);
                        return redirect()->to('/dashboard');
                    }
                } else {
                    echo 'contraseña o email incorrecto';
                }
            } else {
                echo 'contraseña o email incorrecto';
            }
        
    }

    public function logout()
    {
        session_destroy();
    }
}







