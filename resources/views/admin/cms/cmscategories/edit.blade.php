@extends('admin.layouts.master')
@section('title') 
    {{ __('cmscategory.edit.title') }} 
@endsection

@push('css')
    
@endpush

@section('content')
    <form action="{{ route('cmscategories.update', $cmscategory->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card breadcrumb-card">
                        <div class="row justify-content-between align-content-between" style="height: 100%;">
                            <div class="col-md-6">
                                <h3 class="page-title">{{ __('cmscategory.index.title') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('cmscategories.index') }}">{{ __('cmscategory.index.title') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active-breadcrumb">
                                        <a href="{{ route('cmscategories.edit', $cmscategory->id) }}">{{ __('cmscategory.edit.title') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <div class="create-btn pull-right">
                                    <button type="submit" class="btn custom-create-btn">{{ __('default.form.update-button') }}</button>
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
                        <h4 class="card-title">CMS Category Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
            
                                <div class="form-group">
                                    <label for="name" class="required">{{ __('default.form.name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $cmscategory->name }}">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="slug" class="required">{{ __('default.form.slug') }}</label>
                                    <input type="text" class="form-control" name="slug" disabled id="slug" value="{{ $cmscategory->slug }}" >

                                    @error('slug')
										<span class="text-danger">{{ $message }}</span>
									@enderror
                                </div>

                                <div class="form-group">
                                    <label for="status" class="required">{{ __('default.form.status') }}</label>
                                    
                                    <select name="status" id="status" class="select2">
                                        <option value="1" @if($cmscategory->status == 1) selected @endif>Active</option>
                                        <option value="0" @if($cmscategory->status == 0) selected @endif>Inactive</option>
                                    </select>

                                    @error('status')
										<span class="text-danger">{{ $message }}</span>
									@enderror
                                </div>

                            </div><!-- end col-md-12 -->
                        </div><!-- end row -->
                    </div> <!-- end card body -->
                    
                </div> <!-- end card -->
            </div> <!-- end col-md-12 -->
        </div><!-- end row -->
    </form>
@endsection

@push('scripts')

@endpush