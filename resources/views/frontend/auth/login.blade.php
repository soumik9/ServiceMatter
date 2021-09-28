@extends('frontend.layouts.master')
@section('title') 
   
@endsection

@push('css')
    
@endpush

@section('content')
<section class="">

    <div class="content_info">
        <div class="padding-login">
            <div class="container">
                <div class="row portfolioContainer">

                    <div class="col-xs-12 col-sm-3 col-md-3 profile1">
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 profile1" style="min-height: 300px;">
                        <div class="thinborder-ontop">

                            
                            <form id="userloginform" method="POST" action="{{ route('login_go') }}" class="login-form">   
                            @csrf        

                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required="" autocomplete="current-password" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" id="remember_me" name="remember"> Remember Me </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary pull-right">Login</button>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-10">
                                        <a class="" href="#">Forgot Your Password?</a>
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