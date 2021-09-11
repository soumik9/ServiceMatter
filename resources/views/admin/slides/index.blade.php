@extends('admin.layouts.master')
@section('title') 
    {{ __('slide.index.title') }} 
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

                            <h3 class="page-title">{{ __('slide.index.title') }} </h3>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active-breadcrumb">
                                    <a href="{{ route('slides.index') }}">{{ __('slide.index.title') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            @can('slide-create')
                                <div class="create-btn pull-right">
                                    <a href="{{ route('slides.create') }}" class="btn custom-create-btn">{{ __('slide.form.add-button') }}</a>
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
                                    <th>{{ __('default.table.title') }}</th>
                                    <th>{{ __('default.table.status') }}</th>
                                    @if(auth()->user()->can('slide-edit') || auth()->user()->can('slide-delete'))
                                        <th>{{ __('default.table.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slides as $slide)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            @if (!empty($slide->image))
                                                <img class="avatar avatar-sm" src="{{ $slide->image }}" alt="{{ $slide->name }}">
                                            @else
                                                <img class=" avatar avatar-sm" src="{{ asset('assets/admin/img/categories') }}/{{$slide->image}}" alt="{{ $slide->name }}">
                                            @endif
                                        </td>

                                        <td>{{ $slide->title }}</td>

                                        <td>
                                            <input type="checkbox" class="slide-status" data-id="{{ $slide->id }}" {{ $slide->status == 1 ? 'checked' : '' }} data-toggle="toggle" data-on="Active" data-off="De-active" data-onstyle="success" data-offstyle="danger" data-style="slow">
                                        </td>

                                        @if(auth()->user()->can('slide-edit') || auth()->user()->can('slide-delete'))
                                            <td>
                                                @can('slide-edit')
                                                    <a href="{{ route('slides.edit', $slide->id) }}" class="custom-edit-btn mr-1">
                                                        <i class="far fa-edit"></i>{{ __('default.table.edit') }}
                                                    </a> 
                                                @endcan

                                                @can('slide-delete')
                                                    <a href="{{ route('slides.destroy', $slide->id) }}" class="custom-delete-btn delete-slide">
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
    $('.slide-status').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var slide_id = $(this).data('id');  
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('slides.status_update') }}',
            data: {'status': status, 'slide_id': slide_id},
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
    $('.delete-slide').on('click', function (event) {
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