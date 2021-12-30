<?php

namespace App\Http\Controllers\Provider;

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
		$this->middleware('permission:provider-menu', ['only' => ['index','view']]);

        $provider_menu = Permission::get()->filter(function($item) {
            return $item->name == 'provider-menu';
        })->first();

        if($provider_menu == null) {
            Permission::create(['name'=>'provider-menu']);
        }
	}

    public function index()
    {
        $hires              = Hire::get();
        $setting            = Setting::find(1);
        $servicecategories  = ServiceCategory::where('status', 1)->get();

        return view('providers.hires.index', compact('hires', 'setting', 'servicecategories'));
    }

    public function view($id)
    {
        $hire = Hire::find($id);
        $setting = Setting::find(1);
        $servicecategories = ServiceCategory::where('status', 1)->get();

        return view('providers.hires.view', compact('hire', 'setting', 'servicecategories'));
    }
}
