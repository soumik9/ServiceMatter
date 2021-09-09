<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use App\Models\CmsCategory;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Brian2694\Toastr\Facades\Toastr;

class CmsController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:cms-list', ['only' => ['index','store']]);
		$this->middleware('permission:cms-create', ['only' => ['create','store']]);
		$this->middleware('permission:cms-edit', ['only' => ['edit','update']]);
		$this->middleware('permission:cms-delete', ['only' => ['destroy']]);

        $cms_list = Permission::get()->filter(function($item) {
            return $item->name == 'cms-list';
        })->first();
        $cms_create = Permission::get()->filter(function($item) {
            return $item->name == 'cms-create';
        })->first();
        $cms_edit = Permission::get()->filter(function($item) {
            return $item->name == 'cms-edit';
        })->first();
        $cms_delete = Permission::get()->filter(function($item) {
            return $item->name == 'cms-delete';
        })->first();


        if($cms_list == null) {
            Permission::create(['name'=>'cms-list']);
        }
        if ($cms_create == null) {
            Permission::create(['name'=>'cms-create']);
        }
        if ($cms_edit == null) {
            Permission::create(['name'=>'cms-edit']);
        }
        if ($cms_delete == null) {
            Permission::create(['name'=>'cms-delete']);
        }
	}

    public function index()
    {
        $cms = Cms::all();
        return view('admin.cms.index', compact('cms'));
    }
 
    public function create()
    {
        $cmscategories = CmsCategory::all();
        return view('admin.cms.create', compact('cmscategories'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title' 		    => 'required|string',
			'slug' 		        => 'required|string|unique:cms_categories,slug',
			'cms_category_id' 	=> 'required|string',
			'description' 	    => 'required|string',
			'meta_title' 	    => 'required|string',
			'meta_description' 	=> 'required|string',
			'meta_keywords' 	=> 'required|string',
			'status' 		    => 'required|numeric',
        ];

        $messages = [
            'name.required'    		    => __('default.form.validation.name.required'),
            'slug.required'    	        => __('default.form.validation.slug.required'),
            'slug.unique'    		    => __('default.form.validation.slug.unique'),
            'cms_category_id.required'  => __('default.form.validation.category.required'),
            'description.required'      => __('default.form.validation.description.required'),
            'meta_title.required'       => __('default.form.validation.meta_title.required'),
            'meta_description.required' => __('default.form.validation.meta_description.required'),
            'meta_keywords.required'    => __('default.form.validation.meta_keywords.required'),
            'status.required'    	    => __('default.form.validation.status.required'),
        ];

        $this->validate($request, $rules, $messages);
		$input = request()->all();

		try {
			$cms = Cms::create($input);

            Toastr::success(__('cms.message.store.success'));
		    return redirect()->route('cms.index');
		} catch (Exception $e) {
            Toastr::error(__('cms.message.store.error'));
		    return redirect()->route('cms.index');
		}
    }

    public function edit($id)
    {
        $cms = cms::find($id);
        $cmscategories = CmsCategory::all();
        return view('admin.cms.edit', compact('cms','cmscategories'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' 		    => 'required|string',
			'slug' 		        => 'string|unique:cms_categories,slug,' . $id,
			'cms_category_id' 	=> 'required|string',
			'description' 	    => 'required|string',
			'meta_title' 	    => 'required|string',
			'meta_description' 	=> 'required|string',
			'meta_keywords' 	=> 'required|string',
			'status' 		    => 'required|numeric',
        ];

        $messages = [
            'name.required'    		    => __('default.form.validation.name.required'),
            'slug.required'    	        => __('default.form.validation.slug.required'),
            'slug.unique'    		    => __('default.form.validation.slug.unique'),
            'cms_category_id.required'  => __('default.form.validation.category.required'),
            'description.required'      => __('default.form.validation.description.required'),
            'meta_title.required'       => __('default.form.validation.meta_title.required'),
            'meta_description.required' => __('default.form.validation.meta_description.required'),
            'meta_keywords.required'    => __('default.form.validation.meta_keywords.required'),
            'status.required'    	    => __('default.form.validation.status.required'),
        ];
               
        $this->validate($request, $rules, $messages);
		$input = $request->all();
		$cms = Cms::find($id);

		try {
			$cms->update($input);
            Toastr::success(__('cms.message.update.success'));
		    return redirect()->route('cms.index');
		} catch (Exception $e) {
            Toastr::error(__('cms.message.update.error'));
		    return redirect()->route('cms.index');
		}
    }

    public function destroy($id)
    {
        try {
            $cms = Cms::find($id)->delete();
            return back()->with(Toastr::error(__('cms.message.destroy.success')));
		} catch (Exception $e) {
            $error_msg = Toastr::error(__('cms.message.destroy.error'));
			return redirect()->route('cms.index')->with($error_msg);
		}
    }

    public function status_update(Request $request)
    {
        $cms = Cms::findOrFail($request->cms_id);
        $cms->status = $request->status;
        $cms->save();

        if($request->status == 1)
        {
            return response()->json(['message' => 'Status activated successfully.']);
        }
        else{
            return response()->json(['message' => 'Status deactivated successfully.']);
        }  
    }
}
