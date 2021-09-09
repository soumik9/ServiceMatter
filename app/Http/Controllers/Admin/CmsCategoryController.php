<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CmsCategory;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Brian2694\Toastr\Facades\Toastr;

class CmsCategoryController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:cmscategory-list', ['only' => ['index','store']]);
		$this->middleware('permission:cmscategory-create', ['only' => ['create','store']]);
		$this->middleware('permission:cmscategory-edit', ['only' => ['edit','update']]);
		$this->middleware('permission:cmscategory-delete', ['only' => ['destroy']]);

        $cmscategory_list = Permission::get()->filter(function($item) {
            return $item->name == 'cmscategory-list';
        })->first();
        $cmscategory_create = Permission::get()->filter(function($item) {
            return $item->name == 'cmscategory-create';
        })->first();
        $cmscategory_edit = Permission::get()->filter(function($item) {
            return $item->name == 'cmscategory-edit';
        })->first();
        $cmscategory_delete = Permission::get()->filter(function($item) {
            return $item->name == 'cmscategory-delete';
        })->first();


        if($cmscategory_list == null) {
            Permission::create(['name'=>'cmscategory-list']);
        }
        if ($cmscategory_create == null) {
            Permission::create(['name'=>'cmscategory-create']);
        }
        if ($cmscategory_edit == null) {
            Permission::create(['name'=>'cmscategory-edit']);
        }
        if ($cmscategory_delete == null) {
            Permission::create(['name'=>'cmscategory-delete']);
        }
	}

    public function index()
    {
        $cmscategories = CmsCategory::all();
        return view('admin.cms.cmscategories.index', compact('cmscategories'));
    }
 
    public function create()
    {
        return view('admin.cms.cmscategories.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' 			=> 'required|string',
			'slug' 		    => 'required|string|unique:cms_categories,slug',
			'status' 		=> 'required|numeric',
        ];

        $messages = [
            'name.required'    		=> __('default.form.validation.name.required'),
            'slug.required'    	    => __('default.form.validation.slug.required'),
            'slug.unique'    		=> __('default.form.validation.slug.unique'),
            'status.required'    	=> __('default.form.validation.status.required'),
        ];


        $this->validate($request, $rules, $messages);
		$input = request()->all();

		try {
			$cmscategory = CmsCategory::create($input);

            Toastr::success(__('cmscategory.message.store.success'));
		    return redirect()->route('cmscategories.index');
		} catch (Exception $e) {
            Toastr::error(__('cmscategory.message.store.error'));
		    return redirect()->route('cmscategories.index');
		}
    }

    public function edit($id)
    {
        $cmscategory = CmsCategory::find($id);
        return view('admin.cms.cmscategories.edit', compact('cmscategory'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' 			=> 'required|string',
			'slug' 		    => 'string|unique:cms_categories,slug,' . $id,
			'status' 		=> 'required|numeric',
        ];

        $messages = [
            'name.required'    		=> __('default.form.validation.name.required'),
            'slug.unique'    		=> __('default.form.validation.slug.unique'),
            'status.required'    	=> __('default.form.validation.status.required'),
        ];
               
        $this->validate($request, $rules, $messages);
		$input = $request->all();
		$cmscategory = CmsCategory::find($id);

		try {
			$cmscategory->update($input);
            Toastr::success(__('cmscategory.message.update.success'));
		    return redirect()->route('cmscategories.index');
		} catch (Exception $e) {
            Toastr::error(__('cmscategory.message.update.error'));
		    return redirect()->route('cmscategories.index');
		}
    }

    public function destroy($id)
    {
        try {
            $cmscategory = CmsCategory::find($id)->delete();
            return back()->with(Toastr::error(__('cmscategory.message.destroy.success')));
		} catch (Exception $e) {
            $error_msg = Toastr::error(__('cmscategory.message.destroy.error'));
			return redirect()->route('cmscategories.index')->with($error_msg);
		}
    }

    public function status_update(Request $request)
    {
        $cmscategory = CmsCategory::findOrFail($request->cmscategory_id);
        $cmscategory->status = $request->status;
        $cmscategory->save();

        if($request->status == 1)
        {
            return response()->json(['message' => 'Status activated successfully.']);
        }
        else{
            return response()->json(['message' => 'Status deactivated successfully.']);
        }  
    }
}
