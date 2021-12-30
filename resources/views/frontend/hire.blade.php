@extends('frontend.layouts.master')
@section('title')
    Empolyees Hire
@endsection

@push('css')
    <style>
        .mt-3{
            margin-top: 3px !important;
        }

    </style>
@endpush

@php
    $setting = \App\Models\Setting::find(1);
@endphp

@section('content')
    <div>

        <div class="section-title-01 honmob">
            <div class="bg_parallax image_01_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Employees</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Employees</li>
                            <li>/</li>
                            <li>Hire ({{ $employee->name }})</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <section class="content-central">
            <div class="container">
                <div class="row" style="margin-top: -30px;">
                    <div class="titles">
                        <h2>Hire<span>Employee</span></h2>
                        <i class="fa fa-plane"></i>
                        <hr class="tall">
                    </div>
                </div>
            </div>
            <div class="content_info">
                <div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-2"></div>
                            <div class="col-md-8"> 

                                <div class="profile1" style="min-height: 500px;">
                                    <div class="thinborder-ontop">
            
                                        <form method="POST" action="{{ route('home.hire.confirm') }}" class="registration-form"> 
                                            @csrf() 
                                                                            
                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" readonly name="name" value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                                <div class="col-md-8">
                                                    <input type="email" class="form-control" readonly name="email" value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" readonly name="phone" value="{{ Auth::user()->mobile }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="employee_name" class="col-md-4 col-form-label text-md-right">Employee Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" readonly name="employee_name" value="{{ $employee->name }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="working_hour" class="col-md-4 col-form-label text-md-right">Working hour</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="working_hour">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="address">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="per_hour" class="col-md-4 col-form-label text-md-right">Per hour Charge</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="per_hour" readonly value="{{ $employee->per_hour_charge }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="per_hour" class="col-md-4 col-form-label text-md-right">Transaction By</label>
                                                <div class="col-md-8">
                                                    <select name="transaction_by" id="transaction_by" class="form-control">
                                                        <option value="cod">Cash on Deliver</option>
                                                        <option value="bkash">Bkash</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="per_hour" class="col-md-4 col-form-label text-md-right">Transaction ID (If payment by bkash)</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="transaction_id">
                                                </div>
                                            </div>

                                            <input type="text" readonly hidden name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="text" readonly hidden name="employee_id" value="{{ $employee->id }}">
            
                                            <div class="form-group row mb-0 mt-3">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary pull-right">Confirm</button>
                                                </div>
                                            </div>
            
                                        </form>
            
                                    </div>                                
                                </div>

                            </div>
                            <div class="col-md-2"></div>
                        </div> <!-- row end -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
