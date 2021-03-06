@extends('frontend.layouts.master')
@section('title') 
    
@endsection

@push('css')
    
@endpush

@section('content')
<section class="">

    <div class="content_info">
        <div class="padding-registration">
            <div class="container">
                <div class="row">

                    <div class="col-xs-12 col-sm-3 col-md-3 profile1">
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 profile1" style="min-height: 300px;">
                        <div class="thinborder-ontop">

                            
                            <form method="POST" action="{{ route('register_go') }}" class="registration-form"> 
                                @csrf                                   
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="confirm-password"
                                        class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                    <div class="col-md-6">
                                        <input id="confirm-password" type="password" class="form-control" name="confirm-password" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile</label>
                                    <div class="col-md-6">
                                        <input id="mobile" type="text" class="form-control" name="mobile" required>
                                    </div>
                                </div>          
                                
                                <div class="form-group row">
                                    <label for="utype" class="col-md-4 col-form-label text-md-right">Register As</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="utype" id="utype">
                                            <option value="CST">Customer</option>
                                            <option value="SVP">Service Provider</option>
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" class="form-control" name="status" value="1">

                                <div class="form-group row mb-0">
                                    <div class="col-md-10">
                                        <span style="font-size: 14px;">If you have already registered <a href="{{ route('login') }}" title="Login">click here</a> to login</span>
                                        <button type="submit" class="btn btn-primary pull-right">Register</button>
                                    </div>
                                </div>

                            </form>

                        </div>                                
                    </div>

                    <div class="col-xs-12 col-sm-3 col-md-3 profile1">
                    </div>
                </div>
            </div>
        </div>
    </div> 


</section>
@endsection