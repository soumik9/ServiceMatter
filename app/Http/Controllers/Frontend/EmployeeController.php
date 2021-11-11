<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employees()
    {
        $employees = User::where('utype', 'SVP')->where('status', 1)->get();

        return view('frontend.employees', compact('employees'));
    }
}
