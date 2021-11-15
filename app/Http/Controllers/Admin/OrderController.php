<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Setting;

class OrderController extends Controller
{
    function __construct()
	{
		$this->middleware('auth');
		$this->middleware('permission:order-list', ['only' => ['index']]);
		$this->middleware('permission:order-view', ['only' => ['view']]);
        $this->middleware('permission:order-edit', ['only' => ['edit','update']]);
		$this->middleware('permission:order-delete', ['only' => ['destroy']]);

        $order_list = Permission::get()->filter(function($item) {
            return $item->name == 'order-list';
        })->first();

        $order_view = Permission::get()->filter(function($item) {
            return $item->name == 'order-view';
        })->first();

        $order_edit = Permission::get()->filter(function($item) {
            return $item->name == 'order-edit';
        })->first();

        $order_delete = Permission::get()->filter(function($item) {
            return $item->name == 'order-delete';
        })->first();

        if($order_list == null) {
            Permission::create(['name'=>'order-list']);
        }

        if($order_view == null) {
            Permission::create(['name'=>'order-view']);
        }

        if($order_edit == null) {
            Permission::create(['name'=>'order-edit']);
        }

        if($order_delete == null) {
            Permission::create(['name'=>'order-delete']);
        }
	}

    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->get();;
        $setting = Setting::find(1);

        return view('admin.orders.index', compact('orders', 'setting'));
    }

    public function view($id)
    {
        $order = Order::find($id);
        $setting = Setting::find(1);

        return view('admin.orders.view', compact('setting','order'));
    }

    public function edit($id)
    {
        $order = Order::find($id);

        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
			'order_status' 		=> 'required|numeric',
        ];

        $messages = [
            'order_status.required'    		=> __('default.form.validation.order_status.required'),
        ];

        $this->validate($request, $rules, $messages);
		$input = $request->all();
		$order = Order::find($id);

		try {
			$order->update($input);
            Toastr::success(__('order.message.update.success'));
		    return redirect()->route('admin.orders.index');
		} catch (Exception $e) {
            Toastr::error(__('order.message.update.error'));
		    return redirect()->route('admin.orders.index');
		}
    }

    public function destroy($id)
    {
        try {
            $order = Order::find($id)->delete();
            return back()->with(Toastr::error(__('order.message.destroy.success')));
		} catch (Exception $e) {
            $error_msg = Toastr::error(__('order.message.destroy.error'));
			return redirect()->route('admin.orders.index')->with($error_msg);
		}
    }
}
