@extends('admin.layouts.master')
@section('title') 
    {{ __('user.index.title') }} 
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
                            <h3 class="page-title">{{ __('user.index.title') }} </h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active-breadcrumb">
                                    <a href="{{ route('users.index') }}">{{ __('user.index.title') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            @can('user-create')
                                <div class="create-btn pull-right">
                                    <a href="{{ route('users.create') }}" class="btn custom-create-btn">{{ __('user.form.add-button') }}</a>
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
                                    <th>{{ __('default.table.email') }}</th>
                                    <th>{{ __('default.table.mobile') }}</th>
                                    <th>{{ __('default.table.roles') }}</th>
                                    <th>{{ __('default.table.status') }}</th>
                                    @if(auth()->user()->can('user-edit') || auth()->user()->can('user-delete'))
                                        <th>{{ __('default.table.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if (!empty($user->image))
                                                <img class=" avatar avatar-sm mr-2avatar-img rounded-circle" src="{{ $user->image }}" alt="{{ $user->name }}">
                                            @else
                                                <img class=" avatar avatar-sm mr-2avatar-img rounded-circle" src="{{ asset('assets/admin/img/default-user.png') }}" alt="User Image">
                                            @endif
                                        </td>
                            
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->mobile }}</td>

                                        <td>
                                            @foreach ($user->roles as $roles)
                                                <span class="badge custom-badge">{{ $roles->name }}</span>
                                            @endforeach
                                        </td>

                                        <td>
                                            <input type="checkbox" class="user-status" data-id="{{ $user->id }}" {{ $user->status == 1 ? 'checked' : '' }} data-toggle="toggle" data-on="Active" data-off="De-active" data-onstyle="success" data-offstyle="danger" data-style="slow">
                                        </td>

                                        @if(auth()->user()->can('user-edit') || auth()->user()->can('user-delete'))
                                            <td>
                                                @can('user-edit')
                                                    <a href="{{ route('users.edit', $user->id) }}" class="custom-edit-btn mr-1">
                                                        <i data-feather="edit"></i>{{ __('default.table.edit') }}
                                                    </a> 
                                                @endcan

                                                @can('user-delete')
                                                    <a href="{{ route('users.destroy', $user->id) }}" class="custom-delete-btn delete-user">
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
    $('.user-status').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id');  
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('users.status_update') }}',
            data: {'status': status, 'user_id': user_id},
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
    $('.delete-user').on('click', function (event) {
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