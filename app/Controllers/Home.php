<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        
        return view('main/animation/intro2');
        
    }

    public function inicio()
    {
        
        return view('main/primary/home');
        
    }
    public function inicio2()
    {
        
        return view('inicio/vista');
        
    }

    public function catalogo()
    {
        
        return view('main/primary/catalogo');
        
    }
}
