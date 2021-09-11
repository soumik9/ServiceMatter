@extends('admin.layouts.master')
@section('title') 
    {{ __('servicecategory.index.title') }} 
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
                            <h3 class="page-title">{{ __('servicecategory.index.title') }} </h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active-breadcrumb">
                                    <a href="{{ route('servicecategories.index') }}">{{ __('servicecategory.index.title') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            @can('servicecategory-create')
                                <div class="create-btn pull-right">
                                    <a href="{{ route('servicecategories.create') }}" class="btn custom-create-btn">{{ __('servicecategory.form.add-button') }}</a>
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
                                    <th>{{ __('default.table.featured') }}</th>
                                    <th>{{ __('default.table.status') }}</th>
                                    @if(auth()->user()->can('servicecategory-edit') || auth()->user()->can('servicecategory-delete'))
                                        <th>{{ __('default.table.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicecategories as $servicecategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if (!empty($servicecategory->image))
                                                <img class="avatar avatar-sm" src="{{ $servicecategory->image }}" alt="{{ $servicecategory->name }}">
                                            @else
                                                <img class=" avatar avatar-sm" src="{{ asset('assets/admin/img/default-service.gif') }}" alt="{{ $servicecategory->name }}">
                                            @endif
                                        </td>
                            
                                        <td>{{ $servicecategory->name }}</td>

                                        <td>
                                            @if($servicecategory->featured == 1)
                                                <span class="custom-badge-success">Active</span>
                                            @else
                                                <span class="custom-badge-danger">Inactive</span>
                                            @endif
                                        </td>

                                        <td>
                                            <input type="checkbox" class="servicecategory-status" data-id="{{ $servicecategory->id }}" {{ $servicecategory->status == 1 ? 'checked' : '' }} data-toggle="toggle" data-on="Active" data-off="De-active" data-onstyle="success" data-offstyle="danger" data-style="slow">
                                        </td>

                                        @if(auth()->user()->can('servicecategory-edit') || auth()->user()->can('servicecategory-delete'))
                                            <td>
                                                @can('servicecategory-edit')
                                                    <a href="{{ route('servicecategories.edit', $servicecategory->id) }}" class="custom-edit-btn mr-1">
                                                        <i class="far fa-edit"></i>{{ __('default.table.edit') }}
                                                    </a> 
                                                @endcan

                                                @can('servicecategory-delete')
                                                    <a href="{{ route('servicecategories.destroy', $servicecategory->id) }}" class="custom-delete-btn delete-servicecategory">
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
    $('.servicecategory-status').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var servicecategory_id = $(this).data('id');  
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('servicecategories.status_update') }}',
            data: {'status': status, 'servicecategory_id': servicecategory_id},
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
    $('.delete-servicecategory').on('click', function (event) {
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