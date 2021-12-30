@extends('admin.layouts.master')
@section('title') 
    {{ __('hire.index.title') }} 
@endsection

@push('css')
    
@endpush

@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">

                <div class="card breadcrumb-card">
                    <div class="row justify-content-between align-content-between" style="height: 100%;">
                        <div class="col-md-6">

                            <h3 class="page-title">{{ __('hire.index.title') }} </h3>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active-breadcrumb">
                                    <a href="{{ route('customer.hires.index') }}">{{ __('hire.index.title') }}</a>
                                </li>
                                <li class="breadcrumb-item active-breadcrumb">
                                    <a href="{{ route('customer.hires.view', $hire->id) }}">{{ $hire->transaction_id }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                </div><!-- /card finish -->

            </div>
        </div>
    </div><!-- /Page Header -->

    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-body">


                    <div class="profile-header">
                        <div class="row align-items-center">
                            <div class="col-auto profile-image mr-3">
                                <a href="#">
                                    @if (!empty($hire->customer->image))
                                        <img class="rounded-circle" alt="User Image" src="{{ $hire->employee->image }}">
                                    @else
                                        <img class="rounded-circle" alt="User Image" src="{{ asset('assets/admin/img/default-user.png') }}">
                                    @endif
                                    
                                </a>
                            </div>
                            <div class="col ml-md-n2 profile-user-info">
                                <h4 class="user-name mb-0">{{ $hire->name }}</h4>
                                <h6 class="text-muted">{{ $hire->email }}</h6>
                                <h6 class="text-muted">{{ $hire->phone }}</h6>
                                @if (!empty( $hire->transaction_id))
                                    <div class="user-Location">
                                        <i class="fas fa-list"></i>
                                        {{ $hire->transaction_id }}
                                    </div>
                                @endif
                                <div class="about-text">{!! $hire->employee->bio !!}</div>
                            </div>
                        </div>
                    </div>

                                    
                    <!-- Edit Details Modal -->
                    <div class="mt-4 mb-4">
                        <h5 class="card-title">
                            <span>hire Details</span> 
                        </h5>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Service name:</p>
                                    <p class="col-sm-8">{{ $hire->name }}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Address:</p>
                                    <p class="col-sm-8">{{ $hire->address }}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Transaction id:</p>
                                    <p class="col-sm-8"> @if (!empty( $hire->transaction_id)) {{ $hire->transaction_id }} @else none @endif</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Date:</p>
                                    <p class="col-sm-8">{{date('d M Y | h i A', strtotime($hire->created_at)) }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Amount:</p>
                                    <p class="col-sm-8">{{ $hire->total_amount }} {{ $setting->currency->symbol }}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Hire Status:</p>
                                    <p class="col-sm-8">
                                        @if ($hire->status == 1)
                                            <span class="badge badge-warning" style="color: white;">Accepted</span>
                                        @elseif ($hire->status == 2)
                                            <span class="badge badge-primary">Processing</span>
                                        @else
                                            <span class="badge badge-success">Completed</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Payment Status:</p>
                                    <p class="col-sm-8">
                                        @if ($hire->payment_status == 0)
                                            <span class="badge badge-success">Pending</span>
                                        @else
                                            <span class="badge badge-success">Completed</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Completed Date:</p>
                                    <p class="col-sm-8">{{date('d M Y | h i A', strtotime($hire->updated_at)) }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /Edit Details Modal -->

                </div> <!-- end card body -->
            </div> <!-- end card -->

        </div>			
    </div>
@endsection

@push('scripts')

@endpush