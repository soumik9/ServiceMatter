@extends('frontend.layouts.master')
@section('title') 
    Empolyees
@endsection

@push('css')
<style>
    .card{
        width: 70%;
        margin-right: 20px;
        background-color: #f5f6fa;
        margin: 0 0px 30px 5px;
    }
    .e_card_img{
        width: 100%;
        height: 50%;
        justify-content: center;
    }
    .card-body{
        padding: 0 6px 5px 6px;
    }
    .card-text p{
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
                        <div class="col-md-4">

                            @foreach ($employees as $employee)
                                <div class="card">
                                    @if (!empty($employee->image))
                                        <img class="e_card_img" src="{{ $employee->image }}" alt="{{ $employee->name }}">
                                    @else
                                        <img class="e_card_img" src="{{ asset('assets/admin/img/default-user.png') }}" alt="{{ $employee->name }}">
                                    @endif
                                    
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $employee->name }}</h4>
                                        {{-- <p class="card-text"> {!! Str::substr($employee->bio, 0, 70) !!} <br>
                                            ...Read more </p> --}}

                                        <div class="card-text">
                                            <p>Address: {{ $employee->address }}</p>
                                            <p>Per hour charge: {{ $employee->per_hour_charge }} {{ $setting->currency->symbol }}</p>
                                            <p>Work Start Time: {{ $employee->work_start_time }}</p>
                                            <p>Work End Time: {{ $employee->work_end_time }}</p>
                                        </div>

                                        <div class="link">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="#" class="btn btn-primary">Hire</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            @endforeach
                          

                        </div>
                    </div> <!-- row end -->
                   
                </div>
            </div>
        </div>            
    </section>
</div>

@endsection