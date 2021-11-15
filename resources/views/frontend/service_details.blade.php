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

    <div class="section-title-01 honmob">
        <div class="bg_parallax image_01_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>{{ $service->name }}</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>/</li>
                        <li>{{ $service->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 single-blog">
                            <div class="post-item">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="post-header">
                                            <div class="post-format-icon post-format-standard"
                                                style="margin-top: -10px;">
                                                <i class="fa fa-image"></i>
                                            </div>
                                            <div class="post-info-wrap">
                                                <h2 class="post-title">
                                                    <a href="#" title="Post Format: Standard" rel="bookmark">{{ $service->name }}: <span style="color: #39627F;">{{ $service->service_category->name }}</span> </a>
                                                </h2>
                                                <div class="post-meta" style="height: 10px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div id="single-carousel">
                                            <div class="img-hover">
                                                @if(!@empty($service->image))
                                                    <img src="{{ $service->image }}" alt="{{ $service->name }}" class="img-responsive">
                                                @else
                                                    <img src="{{ asset('assets/frontend/img/service.jpg') }}" alt="{{ $service->name }}" class="img-responsive">
                                                @endif 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="post-content">

                                            <h3>{{ $service->name }}</h3>
                                            <p>{!! $service->description  !!}</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <aside class="widget" style="margin-top: 18px;">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Booking Details</div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td style="border-top: none;">Price</td>
                                                <td style="border-top: none;">{{ $setting->currency->symbol }} {{ $service->price }}</td>
                                            </tr>

                                            @php $total = $service->price; @endphp

                                            @if($service->discount)
                                                @if($service->discount_type == 'fixed')
                                                    <tr>
                                                        <td>Discount</td>
                                                        <td>{{ $setting->currency->symbol }} {{ $service->discount }}</td>
                                                    </tr>
                                                    @php
                                                         $total = $service->price - $service->discount;
                                                    @endphp
                                                @elseif ($service->discount_type == 'percent')
                                                    <tr>
                                                        <td>Discount</td>
                                                        <td>{{ $service->discount }}%</td>
                                                    </tr>
                                                    @php
                                                         $total = $service->price - ($total * $service->discount / 100);
                                                    @endphp
                                                @endif
                                            @endif
                                          
                                            <tr>
                                                <td>Total</td>
                                                <td>{{ $setting->currency->symbol }} {{ $total }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="panel-footer">
                                        <form action="" method="POST">  
                                        @csrf
                                            @auth
                                                <a href="{{ route('payment', $service->slug) }}" class="btn btn-primary">Order Now</a>
                                            @endauth
                                          
                                            @guest
                                                <p style="color: red;">Login to order</p>
                                            @endguest                                             
                                           
                                        </form>
                                    </div>
                                </div>
                            </aside>
                            <aside>
                                @if (!empty($r_service))
                                    <h3>Related Service</h3>
                                    <div class="col-md-12 col-sm-6 col-xs-12 bg-dark color-white padding-top-mini"
                                        style="max-width: 360px">
                                        <a href="{{ route('home.service.details', $r_service->slug) }}">
                                            <div class="img-hover">
                                                @if(!@empty($r_service->image))
                                                    <img src="{{ $r_service->thumbnail }}" alt="{{ $r_service->name }}" class="img-responsive">
                                                @else
                                                    <img src="{{ asset('assets/frontend/img/thumbnail.jpg') }}" alt="{{ $r_service->name }}" class="img-responsive">
                                                @endif 
                                            </div>
                                            <div class="info-gallery">
                                                <h3>{{ $r_service->name }}</h3>
                                                <hr class="separator">
                                                <p>{{ $r_service->name }}</p>
                                                <div class="content-btn">
                                                    <a href="" class="btn btn-warning">View Details</a>
                                                </div>
                                                <div class="price">{{ $setting->currency->symbol }} {{ $r_service->price }}</div>
                                            </div>
                                        </a>
                                    </div> 
                                @endif 
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </section>
</div>

@endsection