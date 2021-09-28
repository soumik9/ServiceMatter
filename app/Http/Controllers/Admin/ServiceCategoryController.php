<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ServiceCategoryController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:servicecategory-list', ['only' => ['index','store']]);
		$this->middleware('permission:servicecategory-create', ['only' => ['create','store']]);
		$this->middleware('permission:servicecategory-edit', ['only' => ['edit','update']]);
		$this->middleware('permission:servicecategory-delete', ['only' => ['destroy']]);

        $servicecategory_list = Permission::get()->filter(function($item) {
            return $item->name == 'servicecategory-list';
        })->first();
        $servicecategory_create = Permission::get()->filter(function($item) {
            return $item->name == 'servicecategory-create';
        })->first();
        $servicecategory_edit = Permission::get()->filter(function($item) {
            return $item->name == 'servicecategory-edit';
        })->first();
        $servicecategory_delete = Permission::get()->filter(function($item) {
            return $item->name == 'servicecategory-delete';
        })->first();


        if($servicecategory_list == null) {
            Permission::create(['name'=>'servicecategory-list']);
        }
        if ($servicecategory_create == null) {
            Permission::create(['name'=>'servicecategory-create']);
        }
        if ($servicecategory_edit == null) {
            Permission::create(['name'=>'servicecategory-edit']);
        }
        if ($servicecategory_delete == null) {
            Permission::create(['name'=>'servicecategory-delete']);
        }
	}

    public function index()
    {
        $servicecategories = ServiceCategory::orderBy('id', 'DESC')->get();
        return view('admin.services.categories.index', compact('servicecategories'));
    }
 
    public function create()
    {
        return view('admin.services.categories.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' 			=> 'required',
			'slug' 		    => 'required|string|unique:service_categories,slug',
			'image' 		=> 'nullable',
            'featured' 		=> 'required|numeric',
            'status' 		=> 'required|numeric',
        ];

        $messages = [
            'name.required'    		=> __('default.form.validation.name.required'),
            'slug.required'    	    => __('default.form.validation.slug.required'),
            'slug.unique'    		=> __('default.form.validation.slug.unique'),
            'featured.required'    	=> __('default.form.validation.featured.required'),
            'status.required'    	=> __('default.form.validation.status.required'),
        ];

        $this->validate($request, $rules, $messages);
		$input = request()->all();

		try {
			$servicecategory = ServiceCategory::create($input);
            Toastr::success(__('servicecategory.message.store.success'));
		    return redirect()->route('servicecategories.index');
		} catch (Exception $e) {
            Toastr::error(__('servicecategory.message.store.error'));
		    return redirect()->route('servicecategories.index');
		}
    }

    public function edit($id)
    {
        $servicecategory = ServiceCategory::find($id);
        return view('admin.services.categories.edit', compact('servicecategory'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' 			=> 'required',
			//'slug' 		    => 'nullable|string|unique:service_categories,slug,' . $id,
			'image' 		=> 'nullable',
            'featured' 		=> 'required|numeric',
            'status' 		=> 'required|numeric',
        ];

        $messages = [
            'name.required'    		=> __('default.form.validation.name.required'),
            //'slug.unique'    		=> __('default.form.validation.slug.unique'),
            'featured.required'    	=> __('default.form.validation.featured.required'),
            'status.required'    	=> __('default.form.validation.status.required'),
        ];
               
        $this->validate($request, $rules, $messages);
		$input = $request->all();
		$servicecategory = ServiceCategory::find($id);

		if (empty($input['image'])) {
			$input['image'] = $servicecategory->image;
		}

		try {
			$servicecategory->update($input);
            Toastr::success(__('servicecategory.message.update.success'));
		    return redirect()->route('servicecategories.index');
		} catch (Exception $e) {
            Toastr::error(__('servicecategory.message.update.error'));
		    return redirect()->route('servicecategories.index');
		}
    }

    public function destroy($id)
    {
        try {
            $servicecategory = ServiceCategory::find($id)->delete();
            return back()->with(Toastr::error(__('servicecategory.message.destroy.success')));
		} catch (Exception $e) {
            $error_msg = Toastr::error(__('servicecategory.message.destroy.error'));
			return redirect()->route('servicecategories.index')->with($error_msg);
		}
    }

    public function status_update(Request $request)
    {
        $servicecategory = ServiceCategory::findOrFail($request->servicecategory_id);
        $servicecategory->status = $request->status;
        $servicecategory->save();

        if($request->status == 1)
        {
            return response()->json(['message' => 'Status activated successfully.']);
        }
        else{
            return response()->json(['message' => 'Status deactivated successfully.']);
        }  
    }
}
