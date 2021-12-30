<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hire;
use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class EmployeeController extends Controller
{
    public function serviceCategoriesEmployee()
    {
        $scategories = ServiceCategory::where('status', 1)->get();
        return view('frontend.service_categories_employee', compact('scategories'));
    }

    public function employees($slug)
    {
        $specifc_service_categories = ServiceCategory::where('slug', $slug)->where('status', 1)->first();
        $service_categories = ServiceCategory::where('status', 1)->get();
        $employees = User::where('utype', 'SVP')->where('user_service_Category_id', $specifc_service_categories->id)->where('status', 1)->get();
       // dd($employees);

        return view('frontend.employees', compact('employees','service_categories'));
    }

    public function hireEmployee($id)
    {
        $employee = User::find($id);
        return view('frontend.hire', compact('employee'));
    }

    public function hire_confirm(Request $request)
    {
        $rules = [
            'address' 			    => 'required|string',
			'working_hour' 		    => 'required|string',
        ];

        $messages = [
            'address.required'    		    => __('default.form.validation.address.required'),
            'working_hour.required'    	    => __('default.form.validation.working_hour.required'),
        ];


        $this->validate($request, $rules, $messages);
		$input = request()->all();

        if(!empty($request->transaction_id))
        {
            $payment_status = 1;
        }else{
            $payment_status = 0;
        }

		try {
			$hire = Hire::create([
                'name'              => $request->name,
                'email'             => $request->email,
                'phone'             => $request->phone,
                'per_hour'          => $request->per_hour,
                'working_hour'      => $request->working_hour,
                'total_amount'      => $request->working_hour * $request->per_hour,
                'address'           => $request->address,
                'transaction_by'    => $request->transaction_by,
                'transaction_id'    => $request->transaction_id,
                'employee_id'       => $request->employee_id,
                'user_id'           => $request->user_id,
                'status'            => 1,
                'payment_status'    => $payment_status,
            ]);

            Toastr::success('Hire employee request successfully');
		    return redirect()->route('home');
		} catch (Exception $e) {
            Toastr::error('Error');
		    return redirect()->route('home');
		}
    }

}
