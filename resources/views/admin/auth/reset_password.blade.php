@php
	$setting = \App\Models\Setting::find(1);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>@if(!empty($setting->website_title)){{ $setting->website_title }} @else Soumik @endif - Forgot Password</title>
		
		<!-- Favicon -->
        @if (!empty($setting->website_favicon))
        	<link rel="shortcut icon" type="image/x-icon" href="{{ $setting->website_favicon }}">
        @else 
			<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/img/icons/icon.png') }}">
        @endif

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('assets/admin/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.min.css') }}">
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
		

    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							@if (!empty($setting->website_logo_dark))
								<img class="img-fluid" src="{{ $setting->website_logo_dark }}" alt="Logo">
							@else 
								<img class="img-fluid" src="{{ asset('assets/admin/img/logo-def.png') }}" alt="Logo">
							@endif 
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Reset Password!</h1>
								<p class="account-subtitle">Enter your password to change</p>
								
								<!-- Form -->
								<form action="{{ route('admin.reset.password.submit') }}" method="POST">
								@csrf
                                <input type="hidden" name="token" value="{{ $token }}">

									<div class="form-group">
										<input type="email" class="form-control" name="email" id="email"  placeholder="Enter Email">
									</div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

									<div class="form-group">
										<input type="password" class="form-control" name="password" id="password"  placeholder="Password">
									</div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

									<div class="form-group">
										<input type="password" class="form-control" name="confirm-password" id="confirm-password"  placeholder="Confirm Password">
									</div>
                                    @error('confirm-password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" type="submit">Reset Password</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center dont-have">Remember your password? <a href="{{ route('admin.login') }}">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
		<!-- Bootstrap Core JS -->
        <script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
		<!-- Custom JS -->
		<script src="{{ asset('assets/admin/js/script.js') }}"></script>
		<script src="{{ asset('assets/admin/js/toastr.min.js') }}"></script>
		{!! Toastr::message() !!}
		
    </body>

</html>