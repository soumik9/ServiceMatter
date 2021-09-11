@extends('frontend.layouts.master')
@section('title') 
    
@endsection

@push('css')
    
@endpush

@section('content')
<div>
    <div class="section-title-01 honmob">
                <div class="bg_parallax image_01_parallax"></div>
                <div class="opacy_bg_02">
                    <div class="container">
                        <h1>Service Categories</h1>
                        <div class="crumbs">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>/</li>
                                <li>Service Categories</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content-central">
                <div class="container">
                    <div class="row" style="margin-top: -30px;">
                        <div class="titles">
                            <h2>Service <span>Categories</span></h2>
                            <i class="fa fa-plane"></i>
                            <hr class="tall">
                        </div>
                    </div>
                </div>
                <div class="content_info" style="margin-top: -70px;">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="services-lines full-services">
                                @foreach ($scategories as $scategory)
                                    <li>
                                        <div class="item-service-line">
                                            <i class="fa">
                                                <a href="{{ route('home.servicesbycategories', $scategory->slug) }}">
                                                    @if(!@empty($scategory->image))
                                                        <img src="{{ $scategory->image }}" alt="{{ $scategory->name }}">
                                                    @else
                                                        <img src="{{ asset('assets/frontend/img/service-icon.png') }}" alt="{{ $scategory->name }}">
                                                    @endif 
                                                </a>
                                            </i>
                                            <h5>{{$scategory->name}}</h5>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content_info content_resalt">
                    <div class="container">
                        <div class="row">
                            <div class="titles">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    
    </div>
    
@endsection