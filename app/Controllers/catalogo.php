<?php 
namespace App\Controllers;

use CodeIgniter\Controller;


class catalogo extends BaseController
{
    public function shop()
    {
        
        return view('catalogo/shop');
        
    }

    public function completado($parametro1, $parametro2, $parametro3, $parametro4, $parametro5, $parametro6, $parametro7) {
        // Realiza las acciones necesarias con los parámetros
        echo $parametro1 . ' ' . $parametro2 . ' ' . $parametro3 . ' ' . $parametro4 . ' ' . $parametro5 . ' ' . $parametro6 . ' ' . $parametro7;
        // Puedes mostrar el resultado o redirigir a una vista si es necesario
        // return view('main/catalogo/completado');
    }
    
    
}

