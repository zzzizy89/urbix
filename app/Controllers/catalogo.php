<?php 
namespace App\Controllers;

use CodeIgniter\Controller;


class catalogo extends BaseController
{
    public function shop()
    {
        
        return view('catalogo/shop');
        
    }

    public function completado()
    {
        
        return view('main/catalogo/completado');
        
    }
}

