<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:user-list', ['only' => ['index','store']]);
		$this->middleware('permission:user-create', ['only' => ['create','store']]);
		$this->middleware('permission:user-edit', ['only' => ['edit','update']]);
		$this->middleware('permission:user-delete', ['only' => ['destroy']]);

        $user_list = Permission::get()->filter(function($item) {
            return $item->name == 'user-list';
        })->first();
        $user_create = Permission::get()->filter(function($item) {
            return $item->name == 'user-create';
        })->first();
        $user_edit = Permission::get()->filter(function($item) {
            return $item->name == 'user-edit';
        })->first();
        $user_delete = Permission::get()->filter(function($item) {
            return $item->name == 'user-delete';
        })->first();


        if($user_list == null) {
            Permission::create(['name'=>'user-list']);
        }
        if ($user_create == null) {
            Permission::create(['name'=>'user-create']);
        }
        if ($user_edit == null) {
            Permission::create(['name'=>'user-edit']);
        }
        if ($user_delete == null) {
            Permission::create(['name'=>'user-delete']);
        }
	}

    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index', compact('users','roles'));
    }
 
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' 			=> 'required',
			'email' 		=> 'required|email|unique:users,email',
			'password' 		=> 'required|min:6|same:confirm-password',
			'roles' 		=> 'required',
			'nid' 		    => 'required|unique:users,nid',
			'mobile' 		=> 'required|string|unique:users,mobile',
			'image' 		=> 'nullable',
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
            'roles.required'    	=> __('user.form.validation.roles.required'),
            'mobile.required'    	=> __('default.form.validation.mobile.required'),
            'mobile.unique'    	    => __('default.form.validation.mobile.unique'),
            'nid.required'    	    => __('default.form.validation.nid.required'),
            'nid.unique'    	    => __('default.form.validation.nid.unique'),
            'status.required'    	=> __('default.form.validation.status.required'),
        ];


        $this->validate($request, $rules, $messages);
		$input = request()->all();

		$input['password'] = Hash::make($input['password']);

		try {
			$user = User::create($input);

            if($request->roles)
            {
                $user->assignRole($request->input('roles'));
            }

            Toastr::success(__('user.message.store.success'));
		    return redirect()->route('users.index');
		} catch (Exception $e) {
            Toastr::error(__('user.message.store.error'));
		    return redirect()->route('users.index');
		}
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user','roles'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' 			=> 'required',
			'email' 		=> 'required|email|unique:users,email,' . $id,
			'password' 		=> 'nullable|min:6|same:confirm-password',
			'roles' 		=> 'required',
			'nid' 		    => 'required|unique:users,nid,' . $id,
			'mobile' 		=> 'required|string|unique:users,mobile,' . $id,
			'image' 		=> 'nullable',
            'status' 		=> 'required|numeric',
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
            'status.required'    	=> __('default.form.validation.status.required'),
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
            $user->roles()->detach(); //delete all the roles

            if($request->roles)
            {
                $user->assignRole($request->input('roles'));
            }

            Toastr::success(__('user.message.update.success'));
		    return redirect()->route('users.index');
		} catch (Exception $e) {
            Toastr::error(__('user.message.update.error'));
		    return redirect()->route('users.index');
		}
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id)->delete();
            return back()->with(Toastr::error(__('user.message.destroy.success')));
		} catch (Exception $e) {
            $error_msg = Toastr::error(__('user.message.destroy.error'));
			return redirect()->route('users.index')->with($error_msg);
		}
    }

    public function status_update(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();

        if($request->status == 1)
        {
            return response()->json(['message' => 'Status activated successfully.']);
        }
        else{
            return response()->json(['message' => 'Status deactivated successfully.']);
        }  
    }
}
