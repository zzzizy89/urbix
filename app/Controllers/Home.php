<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        
        return view('inicio/inicio');
        
    }

    public function inicio()
    {
        
        return view('inicio/vista');
        
    }
}
