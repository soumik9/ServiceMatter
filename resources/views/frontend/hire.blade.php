@extends('frontend.layouts.master')
@section('title')
    Empolyees Hire ({{ $employee->name }})
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

                                <div class="profile1" style="min-height: 300px;">
                                    <div class="thinborder-ontop">
            
                                        <form method="POST" action="" class="registration-form"> 
                                            @csrf   
                                                                            
                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                                <div class="col-md-8">
                                                    <input id="name" type="text" class="form-control" name="name" value="">
                                                </div>
                                            </div>
            
                                            <div class="form-group row mb-0 mt-3">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary pull-right">Register</button>
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
