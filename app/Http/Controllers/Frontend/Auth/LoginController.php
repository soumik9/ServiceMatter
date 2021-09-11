<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }

    public function login_go()
    {

    }

    public function logout()
    {

    }
}
