<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ServiceController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:service-list', ['only' => ['index','store']]);
		$this->middleware('permission:service-create', ['only' => ['create','store']]);
		$this->middleware('permission:service-edit', ['only' => ['edit','update']]);
		$this->middleware('permission:service-delete', ['only' => ['destroy']]);

        $service_list = Permission::get()->filter(function($item) {
            return $item->name == 'service-list';
        })->first();
        $service_create = Permission::get()->filter(function($item) {
            return $item->name == 'service-create';
        })->first();
        $service_edit = Permission::get()->filter(function($item) {
            return $item->name == 'service-edit';
        })->first();
        $service_delete = Permission::get()->filter(function($item) {
            return $item->name == 'service-delete';
        })->first();


        if($service_list == null) {
            Permission::create(['name'=>'service-list']);
        }
        if ($service_create == null) {
            Permission::create(['name'=>'service-create']);
        }
        if ($service_edit == null) {
            Permission::create(['name'=>'service-edit']);
        }
        if ($service_delete == null) {
            Permission::create(['name'=>'service-delete']);
        }
	}

    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }
 
    public function create()
    {
        $roles = Role::all();
        return view('admin.services.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' 			=> 'required',
			'email' 		=> 'required|email|unique:services,email',
			'password' 		=> 'required|min:6|same:confirm-password',
			'roles' 		=> 'required',
			'nid' 		    => 'required|unique:services,nid',
			'mobile' 		=> 'required|string|unique:services,mobile',
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
            'roles.required'    	=> __('service.form.validation.roles.required'),
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
			$service = service::create($input);

            if($request->roles)
            {
                $service->assignRole($request->input('roles'));
            }

            Toastr::success(__('service.message.store.success'));
		    return redirect()->route('services.index');
		} catch (Exception $e) {
            Toastr::error(__('service.message.store.error'));
		    return redirect()->route('services.index');
		}
    }

    public function edit($id)
    {
        $service = service::find($id);
        $roles = Role::all();
        return view('admin.services.edit', compact('service','roles'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' 			=> 'required',
			'email' 		=> 'required|email|unique:services,email,' . $id,
			'password' 		=> 'nullable|min:6|same:confirm-password',
			'roles' 		=> 'required',
			'nid' 		    => 'required|unique:services,nid,' . $id,
			'mobile' 		=> 'required|string|unique:services,mobile,' . $id,
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
            'roles.required'    	=> __('service.form.validation.roles.required'),
            'mobile.required'    	=> __('default.form.validation.mobile.required'),
            'mobile.unique'    	    => __('default.form.validation.mobile.unique'),
            'nid.required'    	    => __('default.form.validation.nid.required'),
            'nid.unique'    	    => __('default.form.validation.nid.unique'),
            'status.required'    	=> __('default.form.validation.status.required'),
        ];
               
        $this->validate($request, $rules, $messages);
		$input = $request->all();
		$service = service::find($id);

		if (empty($input['image'])) {
			$input['image'] = $service->image;
		}

		if(!empty($input['password'])){
			$input['password'] = Hash::make($input['password']);
		}else{
			$input['password'] = $service->password;
		}

		try {
			$service->update($input);
            $service->roles()->detach(); //delete all the roles

            if($request->roles)
            {
                $service->assignRole($request->input('roles'));
            }

            Toastr::success(__('service.message.update.success'));
		    return redirect()->route('services.index');
		} catch (Exception $e) {
            Toastr::error(__('service.message.update.error'));
		    return redirect()->route('services.index');
		}
    }

    public function destroy($id)
    {
        try {
            $service = service::find($id)->delete();
            return back()->with(Toastr::error(__('service.message.destroy.success')));
		} catch (Exception $e) {
            $error_msg = Toastr::error(__('service.message.destroy.error'));
			return redirect()->route('services.index')->with($error_msg);
		}
    }

    public function status_update(Request $request)
    {
        $service = service::findOrFail($request->service_id);
        $service->status = $request->status;
        $service->save();

        if($request->status == 1)
        {
            return response()->json(['message' => 'Status activated successfully.']);
        }
        else{
            return response()->json(['message' => 'Status deactivated successfully.']);
        }  
    }
}
