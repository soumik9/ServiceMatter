<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Brian2694\Toastr\Facades\Toastr;

class CurrencyController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:currency-list', ['only' => ['index','store']]);
		$this->middleware('permission:currency-create', ['only' => ['create','store']]);
		$this->middleware('permission:currency-edit', ['only' => ['edit','update']]);
		$this->middleware('permission:currency-delete', ['only' => ['destroy']]);

        $currency_list = Permission::get()->filter(function($item) {
            return $item->name == 'currency-list';
        })->first();
        $currency_create = Permission::get()->filter(function($item) {
            return $item->name == 'currency-create';
        })->first();
        $currency_edit = Permission::get()->filter(function($item) {
            return $item->name == 'currency-edit';
        })->first();
        $currency_delete = Permission::get()->filter(function($item) {
            return $item->name == 'currency-delete';
        })->first();


        if($currency_list == null) {
            Permission::create(['name'=>'currency-list']);
        }
        if ($currency_create == null) {
            Permission::create(['name'=>'currency-create']);
        }
        if ($currency_edit == null) {
            Permission::create(['name'=>'currency-edit']);
        }
        if ($currency_delete == null) {
            Permission::create(['name'=>'currency-delete']);
        }
	}

    public function index()
    {
        $currencies = Currency::all();
        return view('admin.currencies.index', compact('currencies'));
    }
 
    public function create()
    {
        $roles = Role::all();
        return view('admin.currencies.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' 			=> 'required|string',
			'code' 		    => 'required|string|unique:currencies,code',
			'symbol' 	    => 'required|string|unique:currencies,symbol',
			'status' 		=> 'required|numeric',
        ];

        $messages = [
            'name.required'    		=> __('default.form.validation.name.required'),
            'code.required'    	    => __('default.form.validation.code.required'),
            'code.unique'    		=> __('default.form.validation.code.unique'),
            'symbol.required'    	=> __('default.form.validation.symbol.required'),
            'symbol.unique'    		=> __('default.form.validation.symbol.unique'),
            'status.required'    	=> __('default.form.validation.status.required'),
        ];


        $this->validate($request, $rules, $messages);
		$input = request()->all();

		try {
			$currency = Currency::create($input);

            Toastr::success(__('currency.message.store.success'));
		    return redirect()->route('currencies.index');
		} catch (Exception $e) {
            Toastr::error(__('currency.message.store.error'));
		    return redirect()->route('currencies.index');
		}
    }

    public function edit($id)
    {
        $currency = Currency::find($id);
        return view('admin.currencies.edit', compact('currency'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' 			=> 'required|string',
			'code' 		    => 'required|string|unique:currencies,code,' . $id,
			'symbol' 	    => 'required|string|unique:currencies,symbol,' . $id,
			'status' 		=> 'required|numeric',
        ];

        $messages = [
            'name.required'    		=> __('default.form.validation.name.required'),
            'code.required'    	    => __('default.form.validation.code.required'),
            'code.unique'    		=> __('default.form.validation.code.unique'),
            'symbol.required'    	=> __('default.form.validation.symbol.required'),
            'symbol.unique'    		=> __('default.form.validation.symbol.unique'),
            'status.required'    	=> __('default.form.validation.status.required'),
        ];
               
        $this->validate($request, $rules, $messages);
		$input = $request->all();
		$currency = Currency::find($id);

		try {
			$currency->update($input);
            Toastr::success(__('currency.message.update.success'));
		    return redirect()->route('currencies.index');
		} catch (Exception $e) {
            Toastr::error(__('currency.message.update.error'));
		    return redirect()->route('currencies.index');
		}
    }

    public function destroy($id)
    {
        try {
            $currency = Currency::find($id)->delete();
            return back()->with(Toastr::error(__('currency.message.destroy.success')));
		} catch (Exception $e) {
            $error_msg = Toastr::error(__('currency.message.destroy.error'));
			return redirect()->route('currencies.index')->with($error_msg);
		}
    }

    public function status_update(Request $request)
    {
        $currency = Currency::findOrFail($request->currency_id);
        $currency->status = $request->status;
        $currency->save();

        if($request->status == 1)
        {
            return response()->json(['message' => 'Status activated successfully.']);
        }
        else{
            return response()->json(['message' => 'Status deactivated successfully.']);
        }  
    }
}
