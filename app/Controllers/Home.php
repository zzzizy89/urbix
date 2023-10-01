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

    public function form()
    {
        
        return view('main/form/login');
        
    }

    public function catalogo()
    {
        
        return view('main/primary/catalogo');
        
    }

    public function contact()
    {
        
        return view('main/primary/contact');
        
    }
}