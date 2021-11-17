<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employees()
    {
        $employees = User::where('utype', 'SVP')->where('status', 1)->get();
        $service_categories = ServiceCategory::where('status', 1)->get();

        return view('frontend.employees', compact('employees','service_categories'));
    }

    public function hireEmployee($id)
    {
       $employee = User::find($id);

        return view('frontend.hire', compact('employee'));
    }

    public function hireStore()
    {
       // return view('frontend.hire');
    }
}
