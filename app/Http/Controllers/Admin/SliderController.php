<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class sliderController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:slide-list', ['only' => ['index','store']]);
		$this->middleware('permission:slide-create', ['only' => ['create','store']]);
		$this->middleware('permission:slide-edit', ['only' => ['edit','update']]);
		$this->middleware('permission:slide-delete', ['only' => ['destroy']]);

        $slide_list = Permission::get()->filter(function($item) {
            return $item->name == 'slide-list';
        })->first();
        $slide_create = Permission::get()->filter(function($item) {
            return $item->name == 'slide-create';
        })->first();
        $slide_edit = Permission::get()->filter(function($item) {
            return $item->name == 'slide-edit';
        })->first();
        $slide_delete = Permission::get()->filter(function($item) {
            return $item->name == 'slide-delete';
        })->first();


        if($slide_list == null) {
            Permission::create(['name'=>'slide-list']);
        }
        if ($slide_create == null) {
            Permission::create(['name'=>'slide-create']);
        }
        if ($slide_edit == null) {
            Permission::create(['name'=>'slide-edit']);
        }
        if ($slide_delete == null) {
            Permission::create(['name'=>'slide-delete']);
        }
	}

    public function index()
    {
        $slides = Slider::all();
        return view('admin.slides.index', compact('slides'));
    }
 
    public function create()
    {
        return view('admin.slides.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' 		=> 'required',
			'image' 		=> 'nullable',
            'status' 		=> 'required|numeric',
        ];

        $messages = [
            'title.required'        => __('default.form.validation.name.required'),
            'status.required'    	=> __('default.form.validation.status.required'),
        ];


        $this->validate($request, $rules, $messages);
		$input = request()->all();


		try {
			$slide = Slider::create($input);
            Toastr::success(__('slide.message.store.success'));
		    return redirect()->route('slides.index');
		} catch (Exception $e) {
            Toastr::error(__('slide.message.store.error'));
		    return redirect()->route('slides.index');
		}
    }

    public function edit($id)
    {
        $slide = Slider::find($id);
        return view('admin.slides.edit', compact('slide'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' 		=> 'required',
			'image' 		=> 'nullable',
            'status' 		=> 'required|numeric',
        ];

        $messages = [
            'title.required'        => __('default.form.validation.name.required'),
            'status.required'    	=> __('default.form.validation.status.required'),
        ];
               
        $this->validate($request, $rules, $messages);
		$input = $request->all();
		$slide = Slider::find($id);

		if (empty($input['image'])) {
			$input['image'] = $slide->image;
		}

		try {
			$slide->update($input);
            Toastr::success(__('slide.message.update.success'));
		    return redirect()->route('slides.index');
		} catch (Exception $e) {
            Toastr::error(__('slide.message.update.error'));
		    return redirect()->route('slides.index');
		}
    }

    public function destroy($id)
    {
        try {
            $slide = Slider::find($id)->delete();
            return back()->with(Toastr::error(__('slide.message.destroy.success')));
		} catch (Exception $e) {
            $error_msg = Toastr::error(__('slide.message.destroy.error'));
			return redirect()->route('slides.index')->with($error_msg);
		}
    }

    public function status_update(Request $request)
    {
        $slide = Slider::findOrFail($request->slide_id);
        $slide->status = $request->status;
        $slide->save();

        if($request->status == 1)
        {
            return response()->json(['message' => 'Status activated successfully.']);
        }
        else{
            return response()->json(['message' => 'Status deactivated successfully.']);
        }  
    }
}
