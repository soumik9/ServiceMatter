@extends('admin.layouts.master')
@section('title') 
    {{ __('cmscategory.index.title') }} 
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

                            <h3 class="page-title">{{ __('cmscategory.index.title') }} </h3>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active-breadcrumb">
                                    <a href="{{ route('cmscategories.index') }}">{{ __('cmscategory.index.title') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            @can('cmscategory-create')
                                <div class="create-btn pull-right">
                                    <a href="{{ route('cmscategories.create') }}" class="btn custom-create-btn">{{ __('cmscategory.form.add-button') }}</a>
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
                                    <th>{{ __('default.table.status') }}</th>
                                    @if(auth()->user()->can('cmscategory-edit') || auth()->user()->can('cmscategory-delete'))
                                        <th>{{ __('default.table.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cmscategories as $cmscategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cmscategory->name }}</td>

                                        <td>
                                            <input type="checkbox" class="cmscategory-status" data-id="{{ $cmscategory->id }}" {{ $cmscategory->status == 1 ? 'checked' : '' }} data-toggle="toggle" data-on="Active" data-off="De-active" data-onstyle="success" data-offstyle="danger" data-style="slow">
                                        </td>

                                        @if(auth()->user()->can('cmscategory-edit') || auth()->user()->can('cmscategory-delete'))
                                            <td>
                                                @can('cmscategory-edit')
                                                    <a href="{{ route('cmscategories.edit', $cmscategory->id) }}" class="custom-edit-btn mr-1">
                                                        <i data-feather="edit"></i>{{ __('default.table.edit') }}
                                                    </a> 
                                                @endcan

                                                @can('cmscategory-delete')
                                                    <a href="{{ route('cmscategories.destroy', $cmscategory->id) }}" class="custom-delete-btn delete-cmscategory">
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
    $('.cmscategory-status').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var cmscategory_id = $(this).data('id');  
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('cmscategories.status_update') }}',
            data: {'status': status, 'cmscategory_id': cmscategory_id},
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
    $('.delete-cmscategory').on('click', function (event) {
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