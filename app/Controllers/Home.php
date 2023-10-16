<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        
        return view('main/animation/urbix');
        
    }

    public function intro_catalogo()
    {

        return view('main/animation/intro_catalogo');

    }

    public function intro_contacto()
    {

        return view('main/animation/intro_contact');

    }

    public function intro_login()
    {

        return view('main/animation/intro_login');

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