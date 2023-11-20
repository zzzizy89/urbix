<?php

namespace App\Controllers;

use \App\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
   
        return view('main/form/register');
    }
    
    public function do_register()
{
    $userModel = new UserModel();

    $name = $this->request->getPost('name');
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    
    // Verificar si el correo electrónico ya está registrado
    if ($userModel->isEmailTaken($email)) {
        $this->session->setFlashdata('error', 'El correo electrónico ya está registrado.');
        return;
    }
    
    $password = password_hash($password, PASSWORD_BCRYPT);

    $data = ['name' => $name, 'email' => $email, 'password' => $password];
    $ra=($data);
    if ($ra)
{   
    $userModel->register($ra);
    $this->session->setFlashdata('success', 'Usuario registrado exitosamente!');

}
else
{
    $this->session->setFlashdata('error', 'Error durante el registro');
}

    return redirect()->to('login');
}
}





