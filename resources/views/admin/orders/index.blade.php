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
                                    <a href="{{ route('admin.orders.index') }}">{{ __('order.index.title') }}</a>
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
                                    <th>{{ __('default.table.sl') }}</th>
                                    <th>{{ __('default.table.transaction_id') }}</th>
                                    <th>{{ __('default.table.service_name') }}</th>
                                    <th>{{ __('default.table.ordered_by') }}</th>
                                    <th>{{ __('default.table.amount') }}</th>
                                    <th>{{ __('default.table.transaction_status') }}</th>
                                    <th>{{ __('default.table.order_status') }}</th>
                                    <th>{{ __('default.table.action') }}</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->transaction_id }}</td>
                                        <td>{{ $order->order_service->name }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->amount }} {{ $setting->currency->symbol }}</td>

                                        <td>
                                            @if ($order->status == 'Completed')
                                                <p class="badge badge-success">{{ $order->status }}</p>
                                            @else
                                                <p class="badge badge-primary">{{ $order->status }}</p>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($order->order_status == 1)
                                                <p class="badge badge-success">Aeccepted</p>
                                            @elseif($order->order_status == 2)
                                                <p class="badge badge-primary">Processing</p>
                                            @else
                                                <p class="badge badge-success">Completed</p>
                                            @endif
                                        </td>

                                        <td>
                                            @if(auth()->user()->can('order-edit') || auth()->user()->can('order-view') || auth()->user()->can('order-delete'))
                                                @can('order-view')
                                                    <a href="{{ route('admin.orders.view', $order->id) }}" class="custom-edit-btn mr-1">
                                                        <i class="far fa-eye"></i>
                                                    </a> 
                                                @endcan

                                                @can('order-edit')
                                                    <a href="{{ route('admin.orders.edit', $order->id) }}" class="custom-edit-btn mr-1">
                                                        <i class="far fa-edit"></i>
                                                    </a> 
                                                @endcan

                                                @can('order-delete')
                                                    <a href="{{ route('admin.orders.destroy', $order->id) }}" class="custom-delete-btn delete-order">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                @endcan
                                            @endif
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
<script type="text/javascript">
    $('.delete-order').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            dangerMode: true,
            buttons: true,

        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
@endpush