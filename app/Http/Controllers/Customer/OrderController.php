<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Review;
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
		$this->middleware('permission:customer-menu', ['only' => ['index','view','review','reviewStore']]);

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

    public function review($id)
    {
        $order = Order::find($id);

        return view('customers.orders.review', compact('order'));
    }

    public function reviewStore(Request $request)
    {
        $rules = [
            'name' 			=> 'required|string',
			'email' 		=> 'required|string',
        ];

        $messages = [
            'name.required'    		=> __('default.form.validation.name.required'),
            'email.required'        => __('default.form.validation.email.required'),

        ];

        $this->validate($request, $rules, $messages);
		$input = request()->all();

		try {
			$review = Review::create($input);

            Toastr::success(__('review.message.store.success'));
		    return redirect()->route('customer.orders.index');
		} catch (Exception $e) {
            Toastr::error(__('review.message.store.error'));
		    return redirect()->route('customer.orders.index');
		}
    }

    


}
