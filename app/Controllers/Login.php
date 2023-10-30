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

    $result = $userModel->where('email', $email)->first();

    if ($result !== null && $result->id_user > 0) {
        if (password_verify($password, $result->password)) {
            // Contraseña correcta, establece la sesión del usuario y redirige a la vista de dashboard
            $this->session->set("user", $result);
            return redirect()->to('dashboard');
        } else {
            // Contraseña incorrecta
            echo 'Contraseña incorrecta';
        }
    } else {
        // Usuario no encontrado
        echo 'Correo electrónico no válido';
    }
}


    public function logout()
    {
        session_destroy();
    }
}







