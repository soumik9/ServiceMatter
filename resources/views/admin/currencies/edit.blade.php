@extends('admin.layouts.master')
@section('title') 
    {{ __('currency.edit.title') }} 
@endsection

@push('css')
    
@endpush

@section('content')
    <form action="{{ route('currencies.update', $currency->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card breadcrumb-card">
                        <div class="row justify-content-between align-content-between" style="height: 100%;">
                            <div class="col-md-6">
                                <h3 class="page-title">Currencies</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('currencies.index') }}">{{ __('currency.index.title') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active-breadcrumb">
                                        <a href="{{ route('currencies.edit', $currency->id) }}">{{ __('currency.edit.title') }}</a>
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
                        <h4 class="card-title">Currency Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
            
                                <div class="form-group">
                                    <label for="name" class="required">{{ __('default.form.name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $currency->name }}">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="code" class="required">{{ __('default.form.code') }}</label>
                                    <input type="text" class="form-control" name="code" id="code" value="{{ $currency->code }}" >

                                    @error('code')
										<span class="text-danger">{{ $message }}</span>
									@enderror
                                </div>

                                <div class="form-group">
                                    <label for="symbol" class="required">{{ __('default.form.symbol') }}</label>
                                    <input type="text" class="form-control" name="symbol" id="symbol" value="{{ $currency->symbol }}" >

                                    @error('symbol')
										<span class="text-danger">{{ $message }}</span>
									@enderror
                                </div>

                                <div class="form-group">
                                    <label for="status" class="required">{{ __('default.form.status') }}</label>
                                    
                                    <select name="status" id="status" class="select2">
                                        <option value="1" @if($currency->status == 1) selected @endif>Active</option>
                                        <option value="0" @if($currency->status == 0) selected @endif>Inactive</option>
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