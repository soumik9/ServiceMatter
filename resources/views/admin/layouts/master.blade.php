@php
	$setting = \App\Models\Setting::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">
    
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>@if (!empty($setting->website_title)){{ $setting->website_title }} @else Soumik @endif - @yield('title')</title>
		
		@if (!empty($setting->website_favicon))
			<link rel="shortcut icon" type="image/x-icon" href="{{ $setting->website_favicon }}">
		@else 
			<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/img/icons/icon.png') }}">
		@endif

		<!-- css -->
		<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
		<link rel="stylesheet" href="{{ asset('assets/admin/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables/datatables.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/admin/css/select2.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/admin/css/toggle.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
		@stack('css')
	</head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="{{ route('dashboard') }}" class="logo">
						@if (!empty($setting->website_logo_dark))
							<img src="{{ $setting->website_logo_dark }}" alt="Logo">
						@else
							<img src="{{ asset('assets/admin/img/logo.png') }}" alt="Logo">
						@endif
						
					</a>
					<a href="{{ route('dashboard') }}" class="logo logo-small">
						<img src="{{ asset('assets/admin/img/logo-small.png') }}" alt="Logo" width="30" height="30">
					</a>
                </div><!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i data-feather="align-left"></i>
				</a>
				
				<div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Search here">
						<button class="btn" type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">
					
					<!-- Notifications -->
					<li class="nav-item dropdown noti-dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i data-feather="bell"></i> <span class="badge badge-pill">3</span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('assets/admin/img/doctors/doctor-thumb-01.jpg') }}">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>
													<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="#">View all Notifications</a>
							</div>
						</div>
					</li>
					<!-- /Notifications -->
					
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img">
								@if(!empty(Auth::user()->image))
									<img class="rounded-circle" src="{{ Auth::user()->image }}" width="31" alt="{{ Auth::user()->name }}">
								@else
									<img class="rounded-circle" src="{{ asset('assets/admin/img/default-user.png') }}" width="31">
								@endif
								
							</span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								{{-- <div class="avatar avatar-sm">
									<img src="{{ asset('assets/admin/img/profiles/avatar-01.jpg') }}" alt="User Image" class="avatar-img rounded-circle">
								</div> --}}
								<div class="user-text">
									<h6>@if(!empty(Auth::user()->name)){{ Auth::user()->name }} @else Jhon @endif</h6>
									{{-- <p class="text-muted mb-0">Administrator</p> --}}
								</div>
							</div>
							<a class="dropdown-item" href="#">Profile</a>
							<a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div><!-- /Header -->
			
			<!-- Sidebar -->
            @include('admin.layouts.sidebar')
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
                    @yield('content')
				</div>	
			</div><!-- /Page Wrapper -->

        </div><!-- /Main Wrapper -->
		
		<!-- scripts -->
		<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
		<script src="{{ asset('assets/admin/js/feather.min.js') }}"></script>
		<script src="{{ asset('assets/admin/js/tinymce.min.js') }}"></script>

        <script src="{{ asset('assets/admin/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>

		<script src="{{ asset('assets/admin/plugins/datatables/datatables.min.js') }}"></script>
		<script src="{{ asset('assets/admin/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
		 {{-- <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script> --}}

		<script src="{{ asset('assets/admin/js/select2.min.js') }}"></script>
		<script src="{{ asset('assets/admin/js/sweetalert.min.js') }}"></script>
		<script src="{{ asset('assets/admin/js/toastr.min.js') }}"></script>
		<script src="{{ asset('assets/admin/js/toggle.min.js') }}"></script>
	
		<script src="{{ asset('assets/admin/js/script.js') }}"></script>
		{!! Toastr::message() !!}

        <script>
            feather.replace()
        </script>

        <script>
			$(document).ready(function() {
				$('.select2').select2();
			});
        </script>

		<script>
			$(document).ready(function() {        
				$('#datatable').DataTable({
					"sDom": '<"top"i>rt<"bottom"flp><"clear">'
				} );
				
			} );
		</script>
		
        @stack('scripts')
		
    </body>
</html>

