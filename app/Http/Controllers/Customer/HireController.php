<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Hire;
use App\Models\ServiceCategory;
use App\Models\Setting;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
 
class HireController extends Controller
{

    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:customer-menu', ['only' => ['index','view']]);

        $customer_menu = Permission::get()->filter(function($item) {
            return $item->name == 'customer-menu';
        })->first();

        if($customer_menu == null) {
            Permission::create(['name'=>'customer-menu']);
        }
	}

    public function index()
    {
        $hires = Hire::get();
        $setting = Setting::find(1);
        $servicecategories = ServiceCategory::where('status', 1)->get();

        return view('customers.hire.index', compact('hires', 'setting', 'servicecategories'));
    }

    public function view($id)
    {
        $hire = Hire::find($id);
        $setting = Setting::find(1);
        $servicecategories = ServiceCategory::where('status', 1)->get();

        return view('customers.hire.hire_view', compact('hire', 'setting', 'servicecategories'));
    }
}
