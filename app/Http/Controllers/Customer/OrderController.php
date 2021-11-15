<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
        $id = Auth::user()->id;
        $orders = Order::where('user_id', $id)->get();
        $setting = Setting::find(1);

        return view('customers.orders.orders', compact('orders', 'setting'));
    }

    public function view($id)
    {
        $order = Order::find($id);
        $setting = Setting::find(1);

        return view('customers.orders.order_view', compact('setting','order'));
    }
}
