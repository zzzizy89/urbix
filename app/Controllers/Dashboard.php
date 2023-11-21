<?php

namespace App\Controllers;

use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Verificar si el usuario está autenticado y tiene un ID de usuario válido
        $user = session('user');
    
        if (!$user || $user->id_user < 1) {
            // Redirigir a la página de inicio de sesión si el usuario no está autenticado
            return redirect()->to('login');
        } else {
            // Cargar la vista del panel de control si el usuario está autenticado
            return view('main/form/dashboard');
        }
    }
    

    public function home()
    {
        // Verificar si el usuario está autenticado y tiene un ID de usuario válido
        $user = session('user');
    
        if (!$user || $user->id_user < 1) {
            // Redirigir a la página de inicio si el usuario no está autenticado
            return redirect()->to('inicio');
        } else {
            // Cargar la vista de la página principal si el usuario está autenticado
            return view('main/form/home');
        }
    }
    
    public function logout()
    {
        // Destruir la sesión
        session()->destroy();
    
        // Redirigir a la página de inicio de sesión
        return redirect()->to('intro_inicio');
    }
    
    public function update()
{
    $userModel = new UserModel();

    $newUsername = $this->request->getPost('new_username');
    $newBio = $this->request->getPost('new_bio');
    $userId = session('user')->id_user;

    // Procesar la carga de la imagen
    $profileImage = $this->request->getFile('profile_image');

    $data = [];

    if (!empty($newUsername)) {
        $data['name'] = $newUsername;
    }

    if (!empty($newBio)) {
        $data['bio'] = $newBio;
    }

    if ($profileImage->isValid() && !$profileImage->hasMoved()) {
        $newName = $profileImage->getRandomName();
        $profileImage->move('./uploads', $newName);
        $data['perfil'] = $newName;
    }

    // Solo actualiza si hay datos para actualizar
    if (!empty($data)) {
        $userModel->updatedashboard($userId, $data);
    }

    // Actualiza la sesión solo con los campos que se han actualizado
    if (isset($data['name'])) {
        session('user')->name = $data['name'];
    }

    if (isset($data['bio'])) {
        session('user')->bio = $data['bio'];
    }

    if (isset($data['perfil'])) {
        session('user')->perfil = $data['perfil'];
    }

    return redirect()->to('dashboard');
}

    
    
    
 }