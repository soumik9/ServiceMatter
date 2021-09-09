@extends('admin.layouts.master')
@section('title') 
    {{ __('currency.index.title') }} 
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
                            <h3 class="page-title">Currencies</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active-breadcrumb">
                                    <a href="{{ route('currencies.index') }}">{{ __('currency.index.title') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            @can('currency-create')
                                <div class="create-btn pull-right">
                                    <a href="{{ route('currencies.create') }}" class="btn custom-create-btn">{{ __('currency.form.add-button') }}</a>
                                </div>
                            @endcan
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
                                    <th>{{ __('default.table.name') }}</th>
                                    <th>{{ __('default.table.code') }}</th>
                                    <th>{{ __('default.table.symbol') }}</th>
                                    <th>{{ __('default.table.status') }}</th>
                                    @if(auth()->user()->can('currency-edit') || auth()->user()->can('currency-delete'))
                                        <th>{{ __('default.table.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($currencies as $currency)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $currency->name }}</td>
                                        <td>{{ $currency->code }}</td>
                                        <td>{{ $currency->symbol }}</td>

                                        <td>
                                            <input type="checkbox" class="currency-status" data-id="{{ $currency->id }}" {{ $currency->status == 1 ? 'checked' : '' }} data-toggle="toggle" data-on="Active" data-off="De-active" data-onstyle="success" data-offstyle="danger" data-style="slow">
                                        </td>

                                        @if(auth()->user()->can('currency-edit') || auth()->user()->can('currency-delete'))
                                            <td>
                                                @can('currency-edit')
                                                    <a href="{{ route('currencies.edit', $currency->id) }}" class="custom-edit-btn mr-1">
                                                        <i data-feather="edit"></i>{{ __('default.table.edit') }}
                                                    </a> 
                                                @endcan

                                                @can('currency-delete')
                                                    <a href="{{ route('currencies.destroy', $currency->id) }}" class="custom-delete-btn delete-currency">
                                                        <i data-feather="trash"></i>{{ __('default.table.delete') }}
                                                    </a>
                                                @endcan
                                            </td>
                                        @endif
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
<script>
$(function() {
    $('.currency-status').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var currency_id = $(this).data('id');  
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('currencies.status_update') }}',
            data: {'status': status, 'currency_id': currency_id},
            success: function(data){
                if(status == 1){
                    toastr.success(data.message);
                }else{
                    toastr.error(data.message);
                } 
            }
        });
    })
  })
</script>

<script type="text/javascript">
    $('.delete-currency').on('click', function (event) {
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