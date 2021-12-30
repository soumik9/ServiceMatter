<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hire;
use App\Models\ServiceCategory;
use App\Models\Setting;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class HireController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:hire-list', ['only' => ['index']]);
		$this->middleware('permission:hire-view', ['only' => ['view']]);
        $this->middleware('permission:hire-edit', ['only' => ['edit','update']]);
		$this->middleware('permission:hire-delete', ['only' => ['destroy']]);

        $hire_list = Permission::get()->filter(function($item) {
            return $item->name == 'hire-list';
        })->first();

        $hire_view = Permission::get()->filter(function($item) {
            return $item->name == 'hire-view';
        })->first();

        $hire_edit = Permission::get()->filter(function($item) {
            return $item->name == 'hire-edit';
        })->first();

        $hire_delete = Permission::get()->filter(function($item) {
            return $item->name == 'hire-delete';
        })->first();

        if($hire_list == null) {
            Permission::create(['name'=>'hire-list']);
        }

        if($hire_view == null) {
            Permission::create(['name'=>'hire-view']);
        }

        if($hire_edit == null) {
            Permission::create(['name'=>'hire-edit']);
        }

        if($hire_delete == null) {
            Permission::create(['name'=>'hire-delete']);
        }
	}

    public function index()
    {
        $hires = Hire::orderBy('id', 'DESC')->get();;
        $setting = Setting::find(1);
        $servicecategories = ServiceCategory::where('status', 1)->get();

        return view('admin.hires.index', compact('hires', 'setting', 'servicecategories'));
    }

    public function view($id)
    {
        $hire = Hire::find($id);
        $setting = Setting::find(1);
        $servicecategories = ServiceCategory::where('status', 1)->get();

        return view('admin.hires.view', compact('hire', 'setting', 'servicecategories'));
    }

    public function edit($id)
    {
        $hire = hire::find($id);
        $servicecategories = ServiceCategory::where('status', 1)->get();
        return view('admin.hires.edit', compact('hire','servicecategories'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
			'status' 		=> 'required|numeric',
        ];

        $messages = [
            'status.required'    		=> __('default.form.validation.hire_status.required'),
        ];

        $this->validate($request, $rules, $messages);
		$input = $request->all();
		$hire = Hire::find($id);

		try {
			$hire->update($input);
            Toastr::success(__('hire.message.update.success'));
		    return redirect()->route('admin.hires.index');
		} catch (Exception $e) {
            Toastr::error(__('hire.message.update.error'));
		    return redirect()->route('admin.hires.index');
		}
    }

    public function destroy($id)
    {
        try {
            $hire = hire::find($id)->delete();
            return back()->with(Toastr::error(__('hire.message.destroy.success')));
		} catch (Exception $e) {
            $error_msg = Toastr::error(__('hire.message.destroy.error'));
			return redirect()->route('admin.hires.index')->with($error_msg);
		}
    }
}
