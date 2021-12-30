<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hire;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function index()
    {
        $total_hire    = Hire::get();
        $total_order   = Order::get();
        $total_service = Service::get();

        $roles_count = Role::withCount('users')->get();

        $customer_total_hire  = Hire::where('user_id', Auth::user()->id)->get();
        $customer_total_order = Order::where('user_id', Auth::user()->id)->get();

        $provider_total_hire  = Hire::where('employee_id', Auth::user()->id)->get();

        return view('admin.dashboard', compact('customer_total_hire','customer_total_order','total_hire','total_order','total_service','roles_count','provider_total_hire'));
    }
}
