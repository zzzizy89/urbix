<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('common/header');
        return view('home');
        echo view('common/header');
    }
}
