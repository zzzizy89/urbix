<?php

namespace App\Controllers;

use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $user = session('user');
    
        if (!$user || $user->id < 1) {
            return redirect()->to('login');
        } else {
            return view('main/form/dashboard');
        }
    }
    public function home()
    {
        return view('users/home');
    }

public function logout()
{
    session()->destroy();
    return redirect()->to('login');
}

public function update()
{
    $userModel = new UserModel();

    $newUsername = $this->request->getPost('new_username');
    $userId = $_SESSION['user']->id; // Ajustar esto según tu estructura de datos

    $data = ['name' => $newUsername];
    $userModel->update($userId, $data);

    // Actualiza el nombre en la sesión
    $_SESSION['user']->name = $newUsername;

    return redirect()->to('dashboard');
}



 }