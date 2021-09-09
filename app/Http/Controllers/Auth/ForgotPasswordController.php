<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('admin.auth.forgot_password');
    }

    public function submitForgetPasswordEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $check_user = User::where('email', $request->email)->first();

        if(!empty($check_user)){
            $token = Str::random(64);

            DB::table('password_resets')->insert([
                'email' => $request->email, 
                'token' => $token,
              ]);
    
            Mail::send('emails.forgot_password', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Reset Password');
            });
    
            Toastr::success('We have mailed reset link!');
            return back();
        }else{
            Toastr::error('You are not a registred member!');
            return redirect()->route('admin.forgot.password');
        }
    }

    public function ResetPasswordIndex($token)
    {
        return view('admin.auth.reset_password', ['token' => $token]);
    }

    public function ResetPasswordSubmit(Request $request)
    {
        $request->validate([
            'email'                 => 'required|email',
            'password'              => 'required|string|min:6|same:confirm-password',
            'confirm-password'      => 'required'
        ]);

        $updatePassword = DB::table('password_resets')->where([
                              'email' => $request->email, 
                              'token' => $request->token
                            ])->first();

        if(!empty($updatePassword)){
            $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
            DB::table('password_resets')->where(['email'=> $request->email])->delete();

            Toastr::success('Password Reset!');
            return redirect(route('admin.login'));
        }else{
            Toastr::error('Invalid token!');
            return back()->withInput();
        }

    }
}
