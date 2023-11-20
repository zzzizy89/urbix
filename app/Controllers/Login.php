<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        $user = session('user');

        if (!$user || $user->id_user < 1) {
            return view('main/form/login');
        } else {
            return view('main/form/dashboard');
        }
    }


    public function do_login()
{
    $userModel = new UserModel();

    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $result = $userModel->getUserByEmail($email);

    if ($result !== null && $result->id_user > 0) {
        if (password_verify($password, $result->password)) {
            // Elimina la propiedad 'password' antes de guardar en la sesión
            unset($result->password);
            // Contraseña correcta, establece la sesión del usuario y redirige a la vista de dashboard
            $this->session->set("user", $result);
            return redirect()->to('dashboard');
        } else {
            // Contraseña incorrecta
            $this->session->setFlashdata('success', 'Contraseña incorrecta');
           

            
        }
    } else {
        // Usuario no encontrado
        $this->session->setFlashdata('success', 'Correo electrónico no válido');
  
        
    }
    return redirect()->to('login');
}


    public function logout()
    {
        session_destroy();
    }
}







