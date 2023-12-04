<?php

namespace App\Controllers;

use App\Models\Compras;


class Controlcompras extends BaseController
{
    public function index()
    {
        // Obtener el usuario de la sesión
        $user = session('user');
    
        // Verificar si el usuario no está autenticado
        if (!$user || $user->id_user < 1) {
            // Mostrar la vista de inicio de sesión si no está autenticado
            return view('main/form/login');
        } 
        // El usuario ha iniciado sesión, verificar su rol
        $rol = $user->rol;
    
        if ($rol == 1) {
            $comprasModel = new Compras();

            $compra = $comprasModel->controlcompras();
            $data['cabecera'] = view('templates/cabecera');
            $data['pie'] = view('templates/piepagina');

            $data['compra'] = $compra;

            return view('main/form/controldecompra', $data);
        } else {
            // Si el usuario no tiene rol 1, redirigir a la página dashboard
            return redirect()->to('/dashboard');
        }
    }
    public function gencompras()
    {
        // Obtener el usuario de la sesión
        $user = session('user');
    
        // Verificar si el usuario no está autenticado
        if (!$user || $user->id_user < 1) {
            // Mostrar la vista de inicio de sesión si no está autenticado
            return view('main/form/login');
        } 
        // El usuario ha iniciado sesión, verificar su rol
        $rol = $user->rol;
    
        if ($rol == 1) {
            $comprasModel = new Compras();

            $compra = $comprasModel->controlcompras();
            $data['cabecera'] = view('templates/cabecera');
            $data['pie'] = view('templates/piepagina');

            $data['compra'] = $compra;

            return view('main/form/generalcompras', $data);
        } else {
            // Si el usuario no tiene rol 1, redirigir a la página dashboard
            return redirect()->to('/dashboard');
        }
    }


    public function usercompras()
    {
        // Obtener el usuario de la sesión
        $user = session('user');
    
        // Verificar si el usuario no está autenticado
        if (!$user || $user->id_user < 1) {
            // Mostrar la vista de inicio de sesión si no está autenticado
            return view('main/form/login');
        } else{

            $id_user = $user->id_user;
            
            $comprasModel = new Compras();

            $compra = $comprasModel->usercompras($id_user);
            $data['cabecera'] = view('templates/cabecera');
            $data['pie'] = view('templates/piepagina');

            $data['compra'] = $compra;

            return view('main/form/usercompras', $data);
        }
    }
}