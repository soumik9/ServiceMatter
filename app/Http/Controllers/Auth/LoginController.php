<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   public function login()
   {
       return view('admin.auth.login');
   }

   public function login_go(Request $request)
    {
       
        $rules = [
            'email'     => 'required|email|max:255',
            'password'  => 'required',
            'remember'  => 'nullable',
        ];
        $messages = [
            'email.required'        => __('auth.form.validation.email.required'),
            'email.email'           => __('auth.form.validation.email.email'),
            'email.exists'          => __('auth.form.validation.email.exists'),
            'password.required'     => __('auth.form.validation.email.required'),
        ];

        $data = $this->validate($request, $rules, $messages);

        if (!isset(request()->remember)) {
            $data['remember'] = "off";
        }

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']], $request->get('remember'))) {
            if (Auth::user()->status == 1) {
                return redirect()->intended('/admin/dashboard');
            }else{
                Auth::logout();
                Toastr::error('Your account is Deactivated by Admin!');
                return redirect()->back();
            }
        }else{
            Toastr::error('Credentials Missmatch!');
            return redirect()->back();
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('admin/login');
    }
}
