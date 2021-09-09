@extends('admin.layouts.master')
@section('title') {{ __('permission.create.title') }} @endsection

@push('css')
    
@endpush

@section('content')
    <form action="{{ route('permissions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf()
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card breadcrumb-card">
                        <div class="row justify-content-between align-content-between" style="height: 100%;">
                            <div class="col-md-6">
                                <h3 class="page-title">{{ __('permission.create.title') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">{{ __('permission.index.title') }}</a></li>
                                    <li class="breadcrumb-item active-breadcrumb"><a href="{{ route('permissions.create') }}">{{ __('permission.create.title') }}</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <div class="save-btn pull-right">
                                    <button type="submit" class="btn custom-create-btn">{{ __('default.form.save-button') }}</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- /card finish -->

                </div>
            </div>
        </div><!-- /Page Header -->

        <div class="row">

            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">Permissions Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
            
                                <div class="form-group">
                                    <label for="name" class="required">{{ __('default.form.name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter permission name" value="{{ old('name') }}">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                            </div><!-- end col-md-12 -->

                        </div>

                    </div> <!-- end card body -->
                
                </div> <!-- end card -->
            </div> <!-- end col-md-12 -->

        </div><!-- end row -->
    </form>
@endsection

@push('scripts')

@endpush