<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
{
    // Obtener el usuario de la sesión
    $user = session('user');

    // Verificar si el usuario no está autenticado
    if (!$user || $user->id_user < 1) {
        // Mostrar la vista de inicio de sesión si no está autenticado
        return view('main/form/login');
    } else {
        // Mostrar el panel de control si está autenticado
        return view('main/form/dashboard');
    }
}



public function do_login()
{
    $userModel = new UserModel();

    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    // Obtener el usuario por correo electrónico
    $result = $userModel->getUserByEmail($email);

    if ($result !== null && $result->id_user > 0) {
        // Verificar si la contraseña es correcta
        if (password_verify($password, $result->password)) {
            // Eliminar la propiedad 'password' antes de guardar en la sesión
            unset($result->password);
            // Contraseña correcta, establecer la sesión del usuario y redirigir al panel de control
            $this->session->set("user", $result);
            return redirect()->to('dashboard');
        } else {
            // Contraseña incorrecta
            $this->session->setFlashdata('error', 'Contraseña incorrecta');
        }
    } else {
        // Usuario no encontrado
        $this->session->setFlashdata('error', 'Correo electrónico no válido');
    }

    // Redirigir de nuevo a la página de inicio de sesión
    return redirect()->to('login');
}


    
}







