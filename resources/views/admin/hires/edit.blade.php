@extends('admin.layouts.master')
@section('title') 
    {{ __('hire.edit.title') }} 
@endsection

@push('css')
    
@endpush

@section('content')
    <form action="{{ route('admin.hires.update', $hire->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card breadcrumb-card">
                        <div class="row justify-content-between align-content-between" style="height: 100%;">
                            <div class="col-md-6">
                                <h3 class="page-name">{{ __('hire.edit.title') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('admin.hires.index') }}">{{ __('hire.index.title') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active-breadcrumb">
                                        <a href="{{ route('admin.hires.edit', $hire->id) }}">{{ __('hire.edit.title') }}</a>
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
                        <h4 class="card-name">hire no: <span class="text-danger">{{ $hire->transaction_id }}</span></h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
            
                                <div class="form-group">
                                    <label for="title">{{ __('default.form.service_name') }}</label>
                                    @foreach ($servicecategories as $servicecategory)
                                        @if ($servicecategory->id == $hire->employee->user_service_category_id)
                                            <input type="text" class="form-control" disabled value="{{ $servicecategory->name }}"> 
                                        @endif
                                    @endforeach
                                   
                                </div>

                                <div class="form-group">
                                    <label for="title">{{ __('default.form.payment_status') }}</label>

                                    <select name="status" id="status" class="select2" @if($hire->payment_status == 1) disabled  @endif>
                                        <option value="0" @if($hire->payment_status == 0) selected  @endif>Pending</option> 
                                        <option value="1" @if($hire->payment_status == 1) selected  @endif>Completed</option> 
                                    </select>

                                    @error('status')
										<span class="text-danger">{{ $message }}</span>
									@enderror
                                    
                                </div>

                                <div class="form-group">
                                    <label for="status" class="required">{{ __('default.form.order_status') }}</label>
                                    
                                    <select name="status" id="status" class="select2">
                                        <option value="1" @if($hire->status == 1) selected  @endif>Accepted</option>
                                        <option value="2" @if($hire->status == 2) selected  @endif>Processing</option> 
                                        <option value="3" @if($hire->status == 3) selected  @endif>Completed</option> 
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