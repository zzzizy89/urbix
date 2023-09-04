<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        
        return view('inicio/intro2');
        
    }

    public function inicio()
    {
        
        return view('inicio/luigi');
        
    }
    public function inicio2()
    {
        
        return view('inicio/vista');
        
    }
}
