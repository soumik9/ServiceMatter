@php
	$setting = \App\Models\Setting::find(1);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@if(!empty($setting->website_title)){{ $setting->website_title }} @else Soumik @endif - Login</title>
    
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
    <!-- custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
</head>
<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
    
                <div class="loginbox">
                    <div class="login-left">
                        @if (!empty($setting->website_title))
                            <h5 style="color: white;">{{ $setting->website_title }} </h5>  
                        @else 
                            <p style="color: white;"> S</span>  ERVICE <span style="font-style: italic;">M</span> ATTER</p>  
                        @endif      
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>
                            
                            <!-- Form -->
                            <form action="{{ route('admin.login_go') }}" method="POST">
                            @csrf()
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Email" name="email" id="email" value="{{ old('email') }}" autocomplete="email" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Password" name="password" id="password" autocomplete="current-password" required>
                                </div>

                                <label class="checkbox">
                                    <input type="checkbox" id="remember" name="remember"{{ old('remember') ? 'checked' : '' }}> Remember me
                                </label>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-block login-btn" type="submit">Login</button>
                                </div>
                            </form>
                            <!-- /Form -->
                            
                            <div class="text-center forgotpass"><a href="{{ route('admin.forgot.password') }}">Forgot Password?</a></div>

                        </div>
                    </div> <!-- end login right -->
                </div> <!-- end login box -->

            </div><!-- end container -->
        </div><!-- end login wrapper -->
    </div><!-- /Main Wrapper -->
    
    <!-- jQuery -->
    <script src="{{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap Core JS -->
    <script src="{{ asset('assets/jadmin/s/popper.min.j') }}s"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/admin/js/script.js') }}"></script>
    <script src="{{ asset('assets/admin/js/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}

</body>
</html>