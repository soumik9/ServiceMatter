@php
    $setting = \App\Models\Setting::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@if(!@empty($setting->website_title)) {{ $setting->website_title }} @else S ervice M atter - Online Service Provider for your House Needs @endif</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @if(!@empty($setting->website_favicon))
        <link rel="icon" href="{{ $setting->website_favicon }}" type="image/gif" sizes="16x16">
    @else
        <link rel="icon" href="{{ asset('assets/admin/img/icons/icon.png') }}" type="image/gif" sizes="16x16">
    @endif
   
    <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/frontend/css/chblue.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/frontend/css/theme-responsive.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/frontend/css/dtb/jquery.dataTables.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/frontend/css/select2.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('assets/frontend/css/toastr.min.css')}}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.min.css') }}">
    {{-- <!-- Payment -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <link href="{{asset('assets/frontend/css/custom.css')}}" rel="stylesheet" media="screen">
    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery-ui.1.10.4.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/frontend/js/modernizr.js')}}"></script>

    @stack('css')

</head>

<body>

    <div id="layout">

        <div class="info-head">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        <ul class="visible-md visible-lg text-left">
                            <li>
                                <a href="tel:+911234567890">
                                    <i class="fa fa-phone"></i>@if(!@empty($setting->phone)) {{ $setting->phone }} @else +91-1234567890 @endif
                                </a>
                            </li>
                            <li>
                                <a href="mailto:contact@servicematter.in">
                                    <i class="fa fa-envelope"></i>@if(!@empty($setting->email)) {{ $setting->email }} @else contact@servicematter.in @endif
                                </a>
                            </li>
                        </ul>

                        <ul class="visible-xs visible-sm">
                            <li class="text-left">
                                <a href="tel:+911234567890">
                                    <i class="fa fa-phone"></i>@if(!@empty($setting->phone)) {{ $setting->phone }} @else +91-1234567890 @endif
                                </a>
                            </li>
                            <li class="text-right">
                                <a href="#">
                                    <i class="fa fa-map-marker"></i>@if(!@empty($setting->address)) {{ $setting->address }} @else Rajshahi, Bangladesh @endif 
                                </a>
                            </li>
                        </ul>

                    </div>
                    <div class="col-md-6">

                        <ul class="visible-md visible-lg text-right">
                            <li>
                                <i class="fa fa-comment"></i> Live Chat
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-map-marker"></i>@if(!@empty($setting->address)) {{ $setting->address }} @else Rajshahi, Bangladesh @endif
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <header id="header" class="header-v3">
            <nav class="flat-mega-menu">
                <label for="mobile-button"> <i class="fa fa-bars"></i></label>
                <input id="mobile-button" type="checkbox">

                <ul class="collapse">
                    <li class="title">
                        <a href="/"><span style="font-style: italic;">S</span>  ERVICE <span style="font-style: italic;">M</span> ATTER </a>
                    </li>
                    <li> <a href="{{ route('home.employees') }}">Employees</a></li>
                    <li> <a href="{{ route('home.service.categories') }}">Service Categories</a></li>
                    

                     {{-- @if (Route::has('admin.login')) --}}
                        @auth
                            {{-- @if (Auth::user()->utype === 'ADM') --}}
                                <li> <a href="#">My Account ({{ Auth::user()->name }})</a>
                                    <ul class="drop-down one-column hover-fade">
                                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        <li><a href="{{ route('logout') }}">Logout</a></li>
                                    </ul>
                                </li>
                            {{-- @elseif (Auth::user()->utype === 'SVP')
                                <li> <a href="#">My Account (Provider)</a>
                                    <ul class="drop-down one-column hover-fade">
                                        <li><a href="{{ route('provider.dashboard') }}">Dashboard</a></li>
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    </ul>
                                </li>
                            @else
                                <li> <a href="#">My Account (Customer)</a>
                                    <ul class="drop-down one-column hover-fade">
                                        <li><a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    </ul>
                                </li>
                            @endif --}}
                            {{-- <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                @csrf
                            </form> --}}
                        @else
                            <li class="login-form"> <a href="{{ route('register') }}" title="Register">Register</a></li>
                            <li class="login-form"> <a href="{{ route('login') }}" title="Login">Login</a></li>
                        @endauth
                    {{-- @endif --}}

                </ul>
            </nav>
        </header>

        @yield('content')

        <footer id="footer" class="footer-v1">
            <div class="container">
                <div class="row visible-md visible-lg">
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>APPLIANCE SERVICES </h3>
                        <ul>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/12.html">TV</a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/14.html">Geyser</a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/13.html">Refrigerator</a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/21.html">Washing Machine</a>
                            </li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/22.html">Microwave Oven</a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/10.html">Water Purifier</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>AC SERVICES </h3>
                        <ul>
                            <li><i class="fa fa-check"></i> <a
                                    href="service-details/ac-installation.html">Installation</a></li>
                            <li><i class="fa fa-check"></i> <a
                                    href="service-details/ac-uninstallation.html">Uninstallation</a></li>
                            <li><i class="fa fa-check"></i> <a href="service-details/ac-repair.html">AC Repair</a></li>
                            <li><i class="fa fa-check"></i> <a href="service-details/ac-gas-refill.html">Gas Refill</a>
                            </li>
                            <li><i class="fa fa-check"></i> <a href="service-details/ac-wet-servicing.html">Wet
                                    Servicing</a></li>
                            <li><i class="fa fa-check"></i> <a href="service-details/ac-dry-servicing.html">Dry
                                    Servicing </a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>HOME NEEDS </h3>
                        <ul>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/19.html">Laundry </a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/4.html">Electrical</a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/8.html">Pest Control </a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/7.html">Carpentry </a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/3.html">Plumbing </a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/20.html">Painting </a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>CONTACT US</h3>
                        <ul class="contact_footer">
                            <li class="location">
                                <i class="fa fa-map-marker"></i> 
                                <a href="#">@if(!@empty($setting->address)){{ $setting->address }} @else Rajshahi, Bangladesh @endif</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i> 
                                <a href="mailto:contact@servicematter.in">@if(!@empty($setting->email)) {{ $setting->email }} @else contact@servicematter.in @endif</a>
                            </li>
                            <li>
                                <i class="fa fa-headphones"></i> 
                                <a href="tel:+911234567890">@if(!@empty($setting->phone)) {{ $setting->phone }} @else +91-1234567890 @endif</a>
                            </li>
                        </ul>
                        <h3 style="margin-top: 10px">FOLLOW US</h3>
                        <ul class="social">
                            <li class="facebook">
                                @if(!@empty($setting->facebook))
                                    <a href="{{ $setting->facebook }}"><span><i class="fa fa-facebook"></i></span></a>
                                @else
                                    <a href="#"><span><i class="fa fa-facebook"></i></span></a>
                                @endif
                            </li>
                            <li class="twitter">
                                @if(!@empty($setting->twitter))
                                    <a href="{{ $setting->twitter }}"><span><i class="fa fa-twitter"></i></span></a>
                                @else
                                    <a href="#"><span><i class="fa fa-twitter"></i></span></a>
                                @endif
                            </li>
                            <li class="github">
                                @if(!@empty($setting->instagram))
                                    <a href="{{ $setting->instagram }}" target="_blank"><span><i class="fa fa-instagram"></i></span></a>
                                @else
                                    <a href="#"><span><i class="fa fa-instagram"></i></span></a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row visible-sm visible-xs">
                    <div class="col-md-6">
                        <h3 class="mlist-h">CONTACT US</h3>
                        <ul class="contact_footer mlist">
                            <li class="location">
                                <i class="fa fa-map-marker"></i> 
                                <a href="#">@if(!@empty($setting->address)){{ $setting->address }} @else Rajshahi, Bangladesh @endif</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i> 
                                <a href="mailto:contact@servicematter.in">@if(!@empty($setting->email)) {{ $setting->email }} @else contact@servicematter.in @endif</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i> 
                                <a href="tel:+911234567890">@if(!@empty($setting->phone)) {{ $setting->phone }} @else +91-1234567890 @endif</a>
                            </li>
                        </ul>
                        <ul class="social mlist-h">
                            <li class="facebook">
                                @if(!@empty($setting->facebook))
                                    <a href="{{ $setting->facebook }}"><span><i class="fa fa-facebook"></i></span></a>
                                @else
                                    <a href="#"><span><i class="fa fa-facebook"></i></span></a>
                                @endif
                            </li>
                            <li class="twitter">
                                @if(!@empty($setting->twitter))
                                    <a href="{{ $setting->twitter }}"><span><i class="fa fa-twitter"></i></span></a>
                                @else
                                    <a href="#"><span><i class="fa fa-twitter"></i></span></a>
                                @endif
                            </li>
                            <li class="github">
                                @if(!@empty($setting->instagram))
                                    <a href="{{ $setting->instagram }}"><span><i class="fa fa-instagram"></i></span></a>
                                @else
                                    <a href="#"><span><i class="fa fa-instagram"></i></span></a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-down">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="nav-footer">
                                <li><a href="about-us.html">About Us</a> </li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="terms-of-use.html">Terms of Use</a></li>
                                <li><a href="privacy.html">Privacy</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <p class="text-xs-center crtext">&copy; 2021 {{ $setting->website_title }}. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <script type="text/javascript" src="{{asset('assets/frontend/js/nav/jquery.sticky.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/totop/jquery.ui.totop.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/accordion/accordion.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/maps/gmap3.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/fancybox/jquery.fancybox.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/carousel/carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/filters/jquery.isotope.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/twitter/jquery.tweet.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/flickr/jflickrfeed.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/theme-options/theme-options.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/theme-options/jquery.cookies.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/bootstrap/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/bootstrap/bootstrap-slider.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/dtb/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/dtb/jquery.table2excel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/dtb/script.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/validation-rule.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/bootstrap3-typeahead.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontend/js/main.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/frontend/js/toastr.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/toastr.min.js') }}"></script>
    {!! Toastr::message() !!}



    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('.tp-banner').show().revolution({
                dottedOverlay: "none",
                delay: 5000,
                startwidth: 1170,
                startheight: 480,
                minHeight: 250,
                navigationType: "none",
                navigationArrows: "solo",
                navigationStyle: "preview1"
            });
        });
    </script>

    @stack('scripts')

</body>
<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
</html>
