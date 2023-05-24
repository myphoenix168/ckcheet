<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('pages/dashboard');
    }
    public function signin()
    {   
        return view('auth/signin');
    }
    public function dashboard()
    {   
        return view('pages/dashboard');
    }

    
}
