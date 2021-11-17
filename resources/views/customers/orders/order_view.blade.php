@extends('admin.layouts.master')
@section('title') 
    {{ __('order.index.title') }} 
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

                            <h3 class="page-title">{{ __('order.index.title') }} </h3>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active-breadcrumb">
                                    <a href="{{ route('customer.orders.index') }}">{{ __('order.index.title') }}</a>
                                </li>
                                <li class="breadcrumb-item active-breadcrumb">
                                    <a href="{{ route('customer.orders.view', $order->id) }}">{{ $order->transaction_id }}</a>
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
                                    @if (!empty($order->customer->image))
                                        <img class="rounded-circle" alt="User Image" src="{{ $order->customer->image }}">
                                    @else
                                        <img class="rounded-circle" alt="User Image" src="{{ asset('assets/admin/img/default-user.png') }}">
                                    @endif
                                    
                                </a>
                            </div>
                            <div class="col ml-md-n2 profile-user-info">
                                <h4 class="user-name mb-0">{{ $order->name }}</h4>
                                <h6 class="text-muted">{{ $order->email }}</h6>
                                <h6 class="text-muted">{{ $order->phone }}</h6>
                                <div class="user-Location">
                                    <i class="fas fa-list"></i>
                                    {{ $order->transaction_id }}
                                </div>
                                <div class="about-text">{!! $order->customer->bio !!}</div>
                            </div>
                            @if ($order->order_status == 3)
                                <div class="col-auto profile-btn">
                                    <a href="{{ route('customer.orders.review', $order->id) }}" class="btn btn-primary">
                                        Write a Review
                                    </a>
                                </div>
                            @endif
 
                        </div>
                    </div>

                                    
                    <!-- Edit Details Modal -->
                    <div class="mt-4 mb-4">
                        <h5 class="card-title">
                            <span>Order Details</span> 
                        </h5>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Service name:</p>
                                    <p class="col-sm-8">{{ $order->order_service->name }}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Address:</p>
                                    <p class="col-sm-8">{{ $order->address }}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Transaction id:</p>
                                    <p class="col-sm-8">{{ $order->transaction_id }}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Date:</p>
                                    <p class="col-sm-8">{{date('d M Y | h i A', strtotime($order->created_at)) }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Amount:</p>
                                    <p class="col-sm-8">{{ $order->amount }} {{ $setting->currency->symbol }}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Payment Status:</p>
                                    <p class="col-sm-8">
                                        @if ($order->status == 'Completed')
                                            <span class="badge badge-success">{{ $order->status }}</span>
                                        @else
                                            <span class="badge badge-primary">{{ $order->status }}</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Order Status:</p>
                                    <p class="col-sm-8">
                                        @if ($order->order_status == 1)
                                            <span class="badge badge-success">Accepted</span>
                                        @elseif($order->order_status == 2)
                                            <span class="badge badge-primary">Processing</span>
                                        @else
                                            <span class="badge badge-success">Completed</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Completed Date:</p>
                                    <p class="col-sm-8">{{date('d M Y | h i A', strtotime($order->updated_at)) }}</p>
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