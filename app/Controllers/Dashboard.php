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
        return view('main/form/home');
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
        $newEmail = $this->request->getPost('new_email');
        $newBio = $this->request->getPost('new_bio');
        $userId = $_SESSION['user']->id; // Ajustar esto según tu estructura de datos
    
        // Procesar la carga de la imagen
        $profileImage = $this->request->getFile('profile_image');
        if ($profileImage->isValid() && !$profileImage->hasMoved()) {
            $newName = $profileImage->getRandomName();
            $profileImage->move('./uploads', $newName);
            $data = [
                'name' => $newUsername,
                'email' => $newEmail,
                'bio' => $newBio,
                'perfil' => $newName // Guarda el nombre de la imagen en la base de datos
            ];
            $userModel->update($userId, $data);
        } else {
            // Si ocurre algún error en la carga de la imagen, se actualizan solo los otros campos
            $data = [
                'name' => $newUsername,
                'email' => $newEmail,
                'bio' => $newBio
            ];
            $userModel->update($userId, $data);
        }
    
        // Actualiza el nombre, correo electrónico, descripción y foto de perfil en la sesión
        $_SESSION['user']->name = $newUsername;
        $_SESSION['user']->email = $newEmail;
        $_SESSION['user']->bio = $newBio;
        $_SESSION['user']->perfil = $newName; // Asegúrate de manejar la lógica de actualización de perfil de acuerdo con tu estructura de datos
    
        return redirect()->to('dashboard');
    }
    
    
 }