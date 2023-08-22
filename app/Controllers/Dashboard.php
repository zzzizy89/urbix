<?php

namespace App\Controllers;

use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if(session('user')->id <1){
            return redirect()->to('login');
        }
        return view('users/dashboard');
    } 

    public function home()
    {
        return view('users/home');
    }

public function logout()
{
    session()->destroy();
    return redirect()->to('login');
}

 }