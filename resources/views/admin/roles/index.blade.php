@extends('admin.layouts.master')

@section('title') 
    {{ __('role.index.title') }} 
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
                            <h3 class="page-title">{{ __('role.index.title') }}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active-breadcrumb">
                                    <a href="{{ route('roles.index') }}">{{ __('role.index.title') }}</a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="col-md-3">
                            @can('role-create')
                                <div class="create-btn pull-right">
                                    <a href="{{ route('roles.create') }}" class="btn custom-create-btn">{{ __('role.form.add-button') }}</a>
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
                                    @if(auth()->user()->can('role-edit') || auth()->user()->can('role-delete'))
                                        <th>{{ __('default.table.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>          
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->code }}</td>

                                        @if(auth()->user()->can('role-edit') || auth()->user()->can('role-delete'))
                                            <td>
                                                @can('role-edit')
                                                    <a href="{{ route('roles.edit', $role->id) }}" class="custom-edit-btn mr-1">
                                                        <i data-feather="edit"></i>{{ __('default.table.edit') }}
                                                    </a> 
                                                @endcan

                                                @can('role-delete')
                                                    <a href="{{ route('roles.destroy', $role->id) }}" class="custom-delete-btn delete-role">
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
<script type="text/javascript">
    $('.delete-role').on('click', function (event) {
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