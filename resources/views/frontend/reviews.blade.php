@extends('frontend.layouts.master')
@section('title')
    Reviews
@endsection

@push('css')
    <style>
        .mt-3{
            margin-top: 3px !important;
        }
        .reviews{
  padding: 15px;
  max-width: 768px;
  margin: 0 auto;
}

.review-item{
  background-color: white;
  padding: 15px;
  margin-bottom: 5px;
  box-shadow: 1px 1px 5px #343a40;
}

.review-item .review-date{
  color: #cecece;
}
.review-item .review-text{
  font-size: 16px;
  font-weight: normal;
  margin-top: 5px;
  color: #343a40;
}

.review-item .reviewer{
  width: 100px;
  height: 100px;
  border: 1px solid #cecece;
}

/****Rating Stars***/
.rate i{
    color: rgba( 255, 155, 0, 0.75 );
}
    </style>
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
                    <h1>Reviews</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>/</li>
                            <li>Reviews</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <section class="content-central">
            <div class="container">
                <div class="row" style="margin-top: -30px;">
                    <div class="titles">
                        <h2><span>Reviews</span></h2>
                        <i class="fa fa-plane"></i>
                        <hr class="tall">
                    </div>
                </div>
            </div>
            <div class="content_info">
                <div>
                    <div class="container">
                        <div class="row justify-content-center">

                            @foreach ($reviews as $review)
                            <div class="col-md-6">
                                <div class="reviews">
                                    <div class="row blockquote review-item">
                                      <div class="col-md-3 text-center">
                                        <img class="rounded-circle reviewer" src="http://standaloneinstaller.com/upload/avatar.png">
                                        <div class="caption">
                                          <small>by <a href="#joe">{{ $review->name }}</a></small>
                                        </div>
                                  
                                      </div>
                                      <div class="col-md-9">
                                        <h4>{{ $review->service_name }}</h4>
                                        <div class="rate">
                                            @if ($review->rating == 1)
                                                <i class="fa fa-star"></i>
                                            @elseif($review->rating == 2)
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            @elseif($review->rating == 3)
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            @elseif($review->rating == 4)
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            @endif
                                        </div>
                                        <p class="review-text">{{ $review->content }}</p>
                                  
                                        <small class="review-date">{{ $review->created_at }}</small>
                                      </div>                          
                                    </div>  
                                  </div>
                            </div>
                            @endforeach
                       
                        </div> <!-- row end -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
