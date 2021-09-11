@extends('admin.layouts.master')
@section('title') 
   
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
                            <h3 class="page-title">{{ __('service.index.title') }} </h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active-breadcrumb">
                                    <a href="{{ route('services.index') }}">{{ __('service.index.title') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            @can('service-create')
                                <div class="create-btn pull-right">
                                    <a href="{{ route('services.create') }}" class="btn custom-create-btn">{{ __('service.form.add-button') }}</a>
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
                                    <th>{{ __('default.table.image') }}</th>
                                    <th>{{ __('default.table.name') }}</th>
                                    <th>{{ __('default.table.price') }}</th>
                                    <th>{{ __('default.table.category') }}</th>
                                    <th>{{ __('default.table.featured') }}</th>
                                    <th>{{ __('default.table.status') }}</th>
                                    @if(auth()->user()->can('service-edit') || auth()->user()->can('service-delete'))
                                        <th>{{ __('default.table.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if (!empty($service->image))
                                                <img class="avatar" src="{{ $service->image }}" alt="{{ $service->name }}">
                                            @else
                                                <img class="avatar" src="{{ asset('assets/admin/img/default-service.gif') }}" alt="{{ $service->name }}">
                                            @endif
                                        </td>
                            
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->price }} {{ $setting->currency->symbol }}</td>
                                        <td>{{ $service->service_category->name }}</td>

                                        <td>
                                            @if($service->featured == 1)
                                                <span class="custom-badge-success">Active</span>
                                            @else
                                                <span class="custom-badge-danger">Inactive</span>
                                            @endif
                                        </td>

                                        <td>
                                            <input type="checkbox" class="service-status" data-id="{{ $service->id }}" {{ $service->status == 1 ? 'checked' : '' }} data-toggle="toggle" data-on="Active" data-off="De-active" data-onstyle="success" data-offstyle="danger" data-style="slow">
                                        </td>

                                        @if(auth()->user()->can('service-edit') || auth()->user()->can('service-delete'))
                                            <td>
                                                @can('service-edit')
                                                    <a href="{{ route('services.edit', $service->id) }}" class="custom-edit-btn mr-1">
                                                        <i class="far fa-edit"></i>{{ __('default.table.edit') }}
                                                    </a> 
                                                @endcan

                                                @can('service-delete')
                                                    <a href="{{ route('services.destroy', $service->id) }}" class="custom-delete-btn delete-service">
                                                        <i class="far fa-trash-alt"></i>{{ __('default.table.delete') }}
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
    $('.service-status').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var service_id = $(this).data('id');  
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('services.status_update') }}',
            data: {'status': status, 'service_id': service_id},
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
    $('.delete-service').on('click', function (event) {
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