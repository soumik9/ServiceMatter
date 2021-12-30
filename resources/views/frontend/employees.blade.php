@extends('frontend.layouts.master')
@section('title')
    Empolyees
@endsection

@push('css')
    <style>
        .card {
            width: 70%;
            margin-right: 20px;
            background-color: #f5f6fa;
            margin: 0 0px 30px 5px;
        }

        .e_card_img {
            width: 100%;
            height: 50%;
            justify-content: center;
        }

        .card-body {
            padding: 0 6px 5px 6px;
        }

        .card-text p {
            margin: 0 !important;
            padding: 0 0 10px 0 !important;
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
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <section class="content-central">
            <div class="container">
                <div class="row" style="margin-top: -30px;">
                    <div class="titles">
                        <h2>Employees<span>Services</span></h2>
                        <i class="fa fa-plane"></i>
                        <hr class="tall">
                    </div>
                </div>
            </div>
            <div class="content_info">
                <div>
                    <div class="container">

                        <div class="row">
                            <div class="col-md-12">

                                @if (count($employees) > 0)
                                    @foreach ($employees as $employee)
                                        <div class="card" style="width: 100%; padding: 20px 25px; border-radius:25px;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3>{{ $employee->name }}</h3>
                                                        <h4>Service: 
                                                            @foreach ($service_categories as $service_category)
                                                                @if ($service_category->id == $employee->user_service_category_id)
                                                                    <span class="text-danger">{{ $service_category->name }}</span>
                                                                @endif     
                                                            @endforeach
                                                        </h4>
                                                        <h5>Service details</h5>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <ul class="list-styles">
                                                                    <li><i class="fa fa-check"></i> Address: <span class="text-danger">{{ $employee->address }}</span></li>
                                                                    <li><i class="fa fa-check"></i> Per hour charge: <span class="text-danger">{{ $employee->per_hour_charge }} {{ $setting->currency->symbol }}</span></li>
                                                                    <li><i class="fa fa-check"></i> Work Start Time: <span class="text-danger">{{ $employee->work_start_time }}</span></li>
                                                                    <li><i class="fa fa-check"></i> Work End Time: <span class="text-danger">{{ $employee->work_end_time }}</span></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-6">
                                                            </div>
                                                        </div>

                                                        <div class="link">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    @auth
                                                                        <a href="{{ route('home.employee.hire', $employee->id) }}" class="btn btn-primary" style="width: 100%;">Hire</a>
                                                                    @else
                                                                        <a href="{{ route('login') }}" class="text-danger" style="text-decoration: none;">Login to continue</a>
                                                                    @endauth
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-4">
                                                        <div id="" style="width: 100%; height: 100%;">
                                                            @if (!empty($employee->image))
                                                                <img class="e_card_img" src="{{ $employee->image }}"
                                                                    alt="{{ $employee->name }}">
                                                            @else
                                                                <img class="e_card_img"
                                                                    src="{{ asset('assets/admin/img/default-user.png') }}"
                                                                    alt="{{ $employee->name }}">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-md-12" style="margin-top: 15px;">
                                        <h4 class="text-center text-danger">There is no service</h4>
                                    </div>
                                @endif
                               

                            </div>
                        </div> <!-- row end -->

                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
