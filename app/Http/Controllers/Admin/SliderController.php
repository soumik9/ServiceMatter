<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SliderController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:slider-list', ['only' => ['index','store']]);
		$this->middleware('permission:slider-create', ['only' => ['create','store']]);
		$this->middleware('permission:slider-edit', ['only' => ['edit','update']]);
		$this->middleware('permission:slider-delete', ['only' => ['destroy']]);

        $slider_list = Permission::get()->filter(function($item) {
            return $item->name == 'slider-list';
        })->first();
        $slider_create = Permission::get()->filter(function($item) {
            return $item->name == 'slider-create';
        })->first();
        $slider_edit = Permission::get()->filter(function($item) {
            return $item->name == 'slider-edit';
        })->first();
        $slider_delete = Permission::get()->filter(function($item) {
            return $item->name == 'slider-delete';
        })->first();


        if($slider_list == null) {
            Permission::create(['name'=>'slider-list']);
        }
        if ($slider_create == null) {
            Permission::create(['name'=>'slider-create']);
        }
        if ($slider_edit == null) {
            Permission::create(['name'=>'slider-edit']);
        }
        if ($slider_delete == null) {
            Permission::create(['name'=>'slider-delete']);
        }
	}

    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }
 
    public function create()
    {
        $roles = Role::all();
        return view('admin.sliders.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' 			=> 'required',
			'email' 		=> 'required|email|unique:sliders,email',
			'password' 		=> 'required|min:6|same:confirm-password',
			'roles' 		=> 'required',
			'nid' 		    => 'required|unique:sliders,nid',
			'mobile' 		=> 'required|string|unique:sliders,mobile',
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
            'roles.required'    	=> __('slider.form.validation.roles.required'),
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
			$slider = slider::create($input);

            if($request->roles)
            {
                $slider->assignRole($request->input('roles'));
            }

            Toastr::success(__('slider.message.store.success'));
		    return redirect()->route('sliders.index');
		} catch (Exception $e) {
            Toastr::error(__('slider.message.store.error'));
		    return redirect()->route('sliders.index');
		}
    }

    public function edit($id)
    {
        $slider = slider::find($id);
        $roles = Role::all();
        return view('admin.sliders.edit', compact('slider','roles'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' 			=> 'required',
			'email' 		=> 'required|email|unique:sliders,email,' . $id,
			'password' 		=> 'nullable|min:6|same:confirm-password',
			'roles' 		=> 'required',
			'nid' 		    => 'required|unique:sliders,nid,' . $id,
			'mobile' 		=> 'required|string|unique:sliders,mobile,' . $id,
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
            'roles.required'    	=> __('slider.form.validation.roles.required'),
            'mobile.required'    	=> __('default.form.validation.mobile.required'),
            'mobile.unique'    	    => __('default.form.validation.mobile.unique'),
            'nid.required'    	    => __('default.form.validation.nid.required'),
            'nid.unique'    	    => __('default.form.validation.nid.unique'),
            'status.required'    	=> __('default.form.validation.status.required'),
        ];
               
        $this->validate($request, $rules, $messages);
		$input = $request->all();
		$slider = slider::find($id);

		if (empty($input['image'])) {
			$input['image'] = $slider->image;
		}

		if(!empty($input['password'])){
			$input['password'] = Hash::make($input['password']);
		}else{
			$input['password'] = $slider->password;
		}

		try {
			$slider->update($input);
            $slider->roles()->detach(); //delete all the roles

            if($request->roles)
            {
                $slider->assignRole($request->input('roles'));
            }

            Toastr::success(__('slider.message.update.success'));
		    return redirect()->route('sliders.index');
		} catch (Exception $e) {
            Toastr::error(__('slider.message.update.error'));
		    return redirect()->route('sliders.index');
		}
    }

    public function destroy($id)
    {
        try {
            $slider = slider::find($id)->delete();
            return back()->with(Toastr::error(__('slider.message.destroy.success')));
		} catch (Exception $e) {
            $error_msg = Toastr::error(__('slider.message.destroy.error'));
			return redirect()->route('sliders.index')->with($error_msg);
		}
    }

    public function status_update(Request $request)
    {
        $slider = slider::findOrFail($request->slider_id);
        $slider->status = $request->status;
        $slider->save();

        if($request->status == 1)
        {
            return response()->json(['message' => 'Status activated successfully.']);
        }
        else{
            return response()->json(['message' => 'Status deactivated successfully.']);
        }  
    }
}
