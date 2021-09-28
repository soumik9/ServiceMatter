<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RegisterController extends Controller
{
    public function register()
    {
        return view('frontend.auth.register');
    }

    public function register_go(Request $request)
    {
        $rules = [
            'name' 			=> 'required',
			'email' 		=> 'required|email|unique:users,email',
			'password' 		=> 'required|min:6|same:confirm-password',
			'mobile' 		=> 'required|string|unique:users,mobile',
            'utype' 		=> 'required',
            'status' 		=> 'required|numeric',
        ];

        $messages = [
            'name.required'    		=> __('default.form.validation.name.required'),
            'email.required'    	=> __('default.form.validation.email.required'),
            'email.email'    		=> __('default.form.validation.email.email'),
            'email.unique'    		=> __('default.form.validation.email.unique'),
            'password.required'    	=> __('default.form.validation.password.required'),
            'password.same'    		=> __('default.form.validation.password.same'),
            'password.min'    		=> __('default.form.validation.password.min'),
            'mobile.required'    	=> __('default.form.validation.mobile.required'),
            'mobile.unique'    	    => __('default.form.validation.mobile.unique'),
            'status.required'    	=> __('default.form.validation.status.required'),
        ];

        $this->validate($request, $rules, $messages);
		$input = request()->all();
        
		$input['password'] = Hash::make($input['password']);

		try {
			$user = User::create($input);

            if($request->utype == 'SVP')
            {
                $user->assignRole('Provider');
            }else{
                $user->assignRole('Customer');
            }

            Toastr::success(__('user.message.store.success'));
		    return redirect()->route('login');
		} catch (Exception $e) {
            Toastr::error(__('user.message.store.error'));
		    return redirect()->route('register');
		}
    }
}
