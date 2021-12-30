@extends('frontend.layouts.master')
@section('title') 
    
@endsection

@push('css')
    
@endpush

@php
    $setting = \App\Models\Setting::find(1);
@endphp

@section('content')
<div>
    <section class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                @foreach ($slides as $slide)
                <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="{{ $slide->title }}">
                    <img src="{{ $slide->image }}" alt="{{ $slide->title }}" data-bgposition="center center" data-kenburns="on" data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130" data-bgfitend="100" data-bgpositionend="right center">
                </li>
                @endforeach
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
        <div class="filter-title">
            <div class="title-header">
                <h2 style="color:#fff;">BOOK A SERVICE</h2>
                <p class="lead">Book a service at very affordable price, </p>
            </div>
            <div class="filter-header">
                <form id="sform" action="{{ route('searchService') }}" method="POST"> 
                @csrf                       
                    <input type="text" id="q" name="q" required="required" placeholder="What Services do you want?" class="input-large typeahead" autocomplete="off">
                    <input type="submit" name="submit" value="Search">
                </form>
            </div>
        </div>
    </section>

    <section class="content-central">
        <div class="content_info content_resalt">
            <div class="container" style="margin-top: 40px;">
                <div class="row">
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul id="sponsors" class="tooltip-hover">
                            @foreach ($scategories as $scategory)
                                <li data-toggle="tooltip" title="" data-original-title="{{ $scategory->name }}">
                                    <a href="{{ route('home.servicesbycategories', $scategory->slug) }}">
                                        @if(!@empty($scategory->image))
                                            <img src="{{ $scategory->image }}" alt="{{ $scategory->name }}">
                                        @else
                                            <img src="{{ asset('assets/frontend/img/service-icon.png') }}" alt="{{ $scategory->name }}">
                                        @endif 
                                    </a>
                                </li> 
                            @endforeach 
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        @if (count($featured_services) > 0)
            <div class="semiboxshadow text-center">
                <img src="{{asset('frontend/assets/img/img-theme/shp.png')}}" class="img-responsive" alt="">
            </div>
            <div class="content_info">
                <div>
                    <div class="container">
                        <div class="row">
                            <div class="titles">
                                <h2>Service Matter <span>Choice</span> of Services</h2>
                                <i class="fa fa-plane"></i>
                                <hr class="tall">
                            </div>
                        </div>
                        <div class="portfolioContainer" style="margin-top: -50px;">

                            @foreach ($featured_services as $featured_service)
                                <div class="col-xs-6 col-sm-4 col-md-3 hsgrids" style="padding-right: 5px;padding-left: 5px;">
                                    <a class="g-list" href="{{ route('home.service.details', $featured_service->slug) }}">
                                    <div class="img-hover">
                                        @if (!empty($featured_service->thumbnail))
                                            <img src="{{ $featured_service->thumbnail }}" alt="{{ $featured_service->name }}" class="img-responsive" style="height: 200px;">
                                        @else
                                            <img src="{{ asset('assets/frontend/img/thumbnail.jpg') }}" alt="{{ $featured_service->name }}" class="img-responsive" style="height: 200px;">
                                        @endif
                                    
                                    </div>
                                    <div class="info-gallery">
                                        <h3>{{ $featured_service->name }}</h3>
                                        <hr class="separator">
                                        <p>{{ $featured_service->tagline }}</p>
                                       
                                            {{-- @auth --}}
                                                <div class="content-btn">
                                                    <a href="{{ route('home.service.details', $featured_service->slug) }}" class="btn btn-primary">Book Now</a>
                                                </div>
                                            {{-- @endauth
                                          
                                            @guest
                                                <p style="color: red;">Login to order</p>
                                            @endguest --}}
                                           
                                        <div class="price">{{ $setting->currency->symbol }} {{ $featured_service->price }}</div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (count($featured_categories) > 0)
            <div class="content_info">
                <div class="bg-dark color-white border-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 ">
                                <div class="services-lines-info">
                                    <h2>WELCOME TO <br> SERVICE MATTER</h2>
                                    <p class="lead">
                                        Book best services at one place.
                                        <span class="line"></span>
                                    </p>

                                    <p>Find a wide variety of home services.</p>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <ul class="services-lines">
                                    @foreach ($featured_categories as $featured_category)
                                        <li>
                                            <a href="{{ route('home.servicesbycategories', $scategory->slug) }}">
                                                <div class="item-service-line">
                                                    <i class="fa">
                                                        @if (!empty($featured_category->image))
                                                            <img class="icon-img" src="{{ $featured_category->image }}">
                                                        @else
                                                            <img class="icon-img" src="{{asset('assets/frontend/img/service-icon.png')}}"> 
                                                        @endif
                                                    </i>
                                                    <h5>{{ $featured_category->name }}</h5>
                                                </div>
                                            </a>
                                        </li>  
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif
     
        @if (count($appliance_services) > 0)
            <div>
                <div class="container">
                    <div class="row">
                        <div class="titles">
                            <h2><span>Appliance</span>Services</h2>
                            <i class="fa fa-plane"></i>
                            <hr class="tall">
                        </div>
                    </div>
                </div>
                <div id="boxes-carousel">
                    @foreach ($appliance_services as $appliance_service)
                        <div class="col-md-3" style="margin-top: 15px;">
                            <a class="g-list" href="{{ route('home.service.details', $appliance_service->slug) }}">
                                <div class="img-hover">
                                    @if (!empty($appliance_service->thumbnail))
                                        <img src="{{ $appliance_service->thumbnail }}" alt="{{ $appliance_service->name }}" class="img-responsive">
                                    @else
                                        <img src="{{ asset('assets/frontend/img/thumbnail.jpg') }}" alt="{{ $appliance_service->name }}" class="img-responsive">
                                    @endif
                                
                                </div>

                                <div class="info-gallery">
                                    <h3>{{ $appliance_service->name }}</h3>
                                    <hr class="separator">
                                    <p>{{ $appliance_service->tagline }}</p>
                                    <div class="content-btn">
                                        <a href="{{ route('home.service.details', $appliance_service->slug) }}"class="btn btn-primary">Book Now</a>
                                    </div>
                                    <div class="price">{{ $setting->currency->symbol }} {{ $appliance_service->price }}</div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>
</div>

@push('scripts')
    <script type="text/javascript">

        var path = "{{ route('autocomplete') }}";

        $('input.typeahead').typeahead({
            source: function(query, process){
                return $.get(path,{query:query},function(data){
                    return process(data);
                });
            }
        });


    </script>    
@endpush

@endsection