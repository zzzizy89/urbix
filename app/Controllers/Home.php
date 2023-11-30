<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        
        return view('main/animation/intro');
        
    }

    public function intro_inicio()
    {

        return view('main/animation/intro_inicio');

    }

    public function intro_about()
    {

        return view('main/animation/intro_about');

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

    public function intro_dashboard()
    {

        return view('main/animation/intro_dashboard');

    }



    public function inicio()
    {
        
        return view('main/primary/pp');
        
    }

    public function about()
    {
        
        return view('main/primary/about');
        
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