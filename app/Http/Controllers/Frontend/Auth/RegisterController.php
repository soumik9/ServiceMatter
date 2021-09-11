<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('frontend.auth.register');
    }

    public function register_go()
    {

    }
}
