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
                                    <a href="{{ route('provider.hire.index') }}">{{ __('hire.index.title') }}</a>
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

                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0 custom-table">
                            <thead>
                                <tr>
                                    <th>{{ __('default.table.order_no') }}</th>
                                    <th>{{ __('default.table.given_Service') }}</th>
                                    <th>{{ __('default.table.employee_name') }}</th>
                                    <th>{{ __('default.table.hired_by') }}</th>
                                    <th>{{ __('default.table.total_charge') }}</th>
                                    <th>{{ __('default.table.status') }}</th>
                                    <th>{{ __('default.table.payment_status') }}</th>
                                    <th>{{ __('default.table.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hires as $hire)
                                    <tr>
                                        <td>{{ $hire->id }}</td>
                                        <td>
                                            @foreach ($servicecategories as $servicecategory)
                                                @if ($servicecategory->id == $hire->employee->user_service_category_id)
                                                    {{ $servicecategory->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $hire->employee->name }}</td>
                                        <td>{{ $hire->name }}</td>
                                        <td>{{ $hire->total_amount }} {{ $setting->currency->symbol }}</td>
                                        
                                        <td>
                                            @if ($hire->status == 1)
                                                <p class="badge badge-warning" style="color: white;">Accepted</p>
                                            @elseif ($hire->status == 2)
                                                <p class="badge badge-primary">Processing</p>
                                            @else
                                                <p class="badge badge-success">Completed</p>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($hire->payment_status == 0)
                                                <p class="badge badge-success">Pending</p>
                                            @else
                                                <p class="badge badge-success">Completed</p>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('provider.hires.view', $hire->id) }}" class="custom-edit-btn mr-1">
                                                <i class="far fa-eye"></i>{{ __('default.table.view') }}
                                            </a> 
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div> <!-- end card body -->
            </div> <!-- end card -->

        </div>			
    </div>
@endsection

@push('scripts')

@endpush