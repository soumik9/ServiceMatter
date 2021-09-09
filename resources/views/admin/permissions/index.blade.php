@extends('admin.layouts.master')

@section('title') 
    {{ __('permission.index.title') }} 
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
                            <h3 class="page-title">{{ __('permission.index.title') }}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active-breadcrumb"><a href="{{ route('permissions.index') }}">{{ __('permission.index.title') }}</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            @can('permission-create')
                                <div class="create-btn pull-right">
                                    <a href="{{ route('permissions.create') }}" class="btn custom-create-btn">{{ __('permission.form.add-button') }}</a>
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
                                    {{-- <th>{{ __('default.table.status') }}</th> --}}
                                    @if(auth()->user()->can('permission-edit') || auth()->user()->can('permission-delete'))
                                        <th>{{ __('default.table.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>          
                                        <td>{{ $permission->name }}</td>

                                        {{-- <td>
                                            <div class="status-toggle">
                                                <input type="checkbox" id="status" name="status" class="check" checked>
                                                <label for="status" class="checktoggle">checkbox</label>
                                            </div>
                                        </td> --}}

                                        @if(auth()->user()->can('permission-edit') || auth()->user()->can('permission-delete'))
                                        <td>
                                            @can('permission-edit')
                                                <a href="{{ route('permissions.edit', $permission->id) }}" class="custom-edit-btn mr-1">
                                                    <i data-feather="edit"></i>{{ __('default.table.edit') }}
                                                </a> 
                                            @endcan

                                            @can('permission-delete')
                                                <a href="{{ route('permissions.destroy', $permission->id) }}" class="custom-delete-btn delete-permission">
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
        $('.delete-permission').on('click', function (event) {
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