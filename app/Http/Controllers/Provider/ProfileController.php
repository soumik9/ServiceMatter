<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

use function GuzzleHttp\Promise\all;

class ProfileController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:provider-menu', ['only' => ['index','edit','update']]);

        $provider_menu = Permission::get()->filter(function($item) {
            return $item->name == 'provider-menu';
        })->first();

        if($provider_menu == null) {
            Permission::create(['name'=>'provider-menu']);
        }
	}
    public function index()
    {
        $id = Auth::user()->id;
        $provider = User::where('utype', 'SVP')->where('id', $id)->first();
        $servicecategories = ServiceCategory::where('status', 1)->get();
        $setting = Setting::find(1);

        //dd($setting);

        return view('providers.profile.index', compact('provider','servicecategories','setting'));
    }

    public function edit($id)
    {
        $provider = User::find($id);
        $servicecategories = ServiceCategory::where('status', 1)->get();
        
        return view('providers.profile.edit', compact('provider','servicecategories'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $rules = [
            'name' 			                => 'required',
			'email' 		                => 'required|email|unique:users,email,' . $id,
			'password' 		                => 'nullable|min:6|same:confirm-password',
			'nid' 		                    => 'required|unique:users,nid,' . $id,
			'mobile' 		                => 'required|string|unique:users,mobile,' . $id,
			'image' 		                => 'nullable',
			'user_service_category_id' 		=> 'required|numeric',
        ];

        $messages = [
            'name.required'    		=> __('default.form.validation.name.required'),
            'email.required'    	=> __('default.form.validation.email.required'),
            'email.email'    		=> __('default.form.validation.email.email'),
            'email.unique'    		=> __('default.form.validation.email.unique'),
            'password.same'    		=> __('default.form.validation.password.same'),
            'password.min'    		=> __('default.form.validation.password.min'),
            'roles.required'    	=> __('user.form.validation.roles.required'),
            'mobile.required'    	=> __('default.form.validation.mobile.required'),
            'mobile.unique'    	    => __('default.form.validation.mobile.unique'),
            'nid.required'    	    => __('default.form.validation.nid.required'),
            'nid.unique'    	    => __('default.form.validation.nid.unique'),
            'user_service_category_id.required'    	    => __('default.form.validation.service.required'),
        ];
               
        $this->validate($request, $rules, $messages);
		$input = $request->all();
		$user = User::find($id);

		if (empty($input['image'])) {
			$input['image'] = $user->image;
		}

		if(!empty($input['password'])){
			$input['password'] = Hash::make($input['password']);
		}else{
			$input['password'] = $user->password;
		}

		try {
			$user->update($input);
            Toastr::success(__('user.message.update.success'));
		    return redirect()->route('profiles.index');
		} catch (Exception $e) {
            Toastr::error(__('user.message.update.error'));
		    return redirect()->route('profiles.index');
		}
    }
}
