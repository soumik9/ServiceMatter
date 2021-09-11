<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Setting;
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
        $setting = Setting::find(1);
        //dd($setting);
        $services = Service::orderBy('id', 'DESC')->get();
        return view('admin.services.index', compact('services', 'setting'));
    }
 
    public function create()
    {
        $servicecategories = ServiceCategory::where('status', 1)->get();
        return view('admin.services.create', compact('servicecategories'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' 			            => 'required',
			'slug' 		                => 'required|string|unique:services,slug',
			'service_category_id' 		=> 'required',
			'price' 		            => 'required',
			'description' 		        => 'required|string',
			'thumbnail' 		        => 'nullable',
			'image' 		            => 'nullable',
            'featured' 		            => 'required|numeric',
            'status' 		            => 'required|numeric',
        ];

        $messages = [
            'name.required'    		            => __('default.form.validation.name.required'),
            'slug.required'    	                => __('default.form.validation.slug.required'),
            'slug.unique'    		            => __('default.form.validation.slug.unique'),
            'service_category_id.required'    	=> __('default.form.validation.category.required'),
            'description.required'    	        => __('default.form.validation.description.required'),
            'price.required'    	            => __('default.form.validation.price.required'),
            'featured.required'    	            => __('default.form.validation.featured.required'),
            'status.required'    	            => __('default.form.validation.status.required'),
        ];

        $this->validate($request, $rules, $messages);
		$input = request()->all();

		try {
			$service = Service::create($input);
            Toastr::success(__('service.message.store.success'));
		    return redirect()->route('services.index');
		} catch (Exception $e) {
            Toastr::error(__('service.message.store.error'));
		    return redirect()->route('services.index');
		}
    }

    public function edit($id)
    {
        $service = Service::find($id);
        $servicecategories = ServiceCategory::where('status', 1)->get();
        return view('admin.services.edit', compact('service','servicecategories'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' 			            => 'required',
			'slug' 		                => 'nullable|string|unique:services,slug,' . $id,
			'service_category_id' 		=> 'required',
			'price' 		            => 'required',
			'description' 		        => 'required|string',
			'thumbnail' 		        => 'nullable',
			'image' 		            => 'nullable',
            'featured' 		            => 'required|numeric',
            'status' 		            => 'required|numeric',
        ];

        $messages = [
            'name.required'    		            => __('default.form.validation.name.required'),
            'slug.unique'    		            => __('default.form.validation.slug.unique'),
            'service_category_id.required'    	=> __('default.form.validation.category.required'),
            'description.required'    	        => __('default.form.validation.description.required'),
            'price.required'    	            => __('default.form.validation.price.required'),
            'featured.required'    	            => __('default.form.validation.featured.required'),
            'status.required'    	            => __('default.form.validation.status.required'),
        ];
               
        $this->validate($request, $rules, $messages);
		$input = $request->all();
		$service = Service::find($id);

		if (empty($input['image'])) {
			$input['image'] = $service->image;
		}

		if (empty($input['thumbnail'])) {
			$input['thumbnail'] = $service->thumbnail;
		}

		try {
			$service->update($input);
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
            $service = Service::find($id)->delete();
            return back()->with(Toastr::error(__('service.message.destroy.success')));
		} catch (Exception $e) {
            $error_msg = Toastr::error(__('service.message.destroy.error'));
			return redirect()->route('services.index')->with($error_msg);
		}
    }

    public function status_update(Request $request)
    {
        $service = Service::findOrFail($request->service_id);
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
