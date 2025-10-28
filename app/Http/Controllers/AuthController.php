<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $rules = ['email' => 'required|email', 'password' => 'required|min:6'];

    public function login()
    {
        return view('login');
    }

    
    public function processLogin()
    {
        
    }
}
