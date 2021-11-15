@extends('frontend.layouts.master')
@section('title') 
    Payment
@endsection

@push('css')
<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .content-central{
        overflow: hidden;
    }

    .mb-15{
        margin-bottom: 15px;
    }

    .mb-20{
        margin-bottom: 20px;
    }
    .mb-25{
        margin-bottom: 25px;
    }
    .mt-5{
        padding-top: 5px;
    }
    .pt-3{
        padding-top: 3px;
    }

</style>
@endpush

@php
    $setting = \App\Models\Setting::find(1);
@endphp

@section('content')

@auth
<div>
    <section class="">
        <div class="content_info" style="padding-bottom: 70px;">
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 order-md-2 mb-4 mt-5">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Order Details</span>
                            </h4>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Product name</h6>
                                        <h4>{{ $service->name }}</h4>
                                    </div>
                                    <span class="text-muted">Price: {{ $service->price }}{{ $setting->currency->symbol }}</span>
                                    <br>

                                    @php $total = $service->price; @endphp

                                    @if(!empty($service->discount))
                                        @if($service->discount_type == 'fixed')
                                            <span class="text-muted">Discount: {{ $setting->currency->symbol }} {{ $service->discount }}</span>
                                            <br>
                                            @php
                                                $total = $service->price - $service->discount;
                                            @endphp
                                        @elseif ($service->discount_type == 'percent')
                                            <span class="text-muted">Discount: {{ $service->discount }}%</span>
                                            <br>
                                            @php
                                                $total = $service->price - ($total * $service->discount / 100);
                                            @endphp
                                        @endif
                                    @endif

                                    <span class="text-muted">Discount Type: {{ $service->discount_type }}</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (BDT): </span>
                                    <strong>{{ $setting->currency->symbol }} {{ $total }}</strong>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8 order-md-1">
                            <h4 class="mb-3">Billing & Shipping address</h4>

                            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">

                                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                                <input type="text" hidden name="user_id" value="{{ Auth::user()->id }}"> 
                                <input type="text" hidden name="service_id" value="{{ $service->id }}"> 
                                <input type="text" hidden name="order_status" value="1"> 
                                <input type="hidden" name="amount3" value="{{ $total }}"> 
                                

                                <div class="row">
                                    <div class="col-md-12 mb-15">
                                        <label for="firstName">Full name</label>
                                        <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder=""
                                               value="{{ Auth::user()->name }}" required>
                                        {{-- <div class="invalid-feedback">
                                            Valid customer name is required.
                                        </div> --}}
                                    </div>
                                </div>
                
                                <div class="mb-15">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" name="customer_mobile" class="form-control" id="mobile" placeholder="Mobile"
                                               value="{{ Auth::user()->mobile }}" required>
                                    {{-- <div class="invalid-feedback" style="width: 100%;">
                                        Your Mobile number is required.
                                    </div> --}}
                                </div>
                
                                <div class="mb-15">
                                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                    <input type="email" name="customer_email" class="form-control" id="email"  value="{{ Auth::user()->email }}" required>
                                    {{-- <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div> --}}
                                </div>
                
                                <div class="mb-15">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="customer_address" id="address" value="{{ Auth::user()->address }}" required>
                                    {{-- <div class="invalid-feedback">
                                        Please enter your shipping address.
                                    </div> --}}
                                </div>
                
                                <hr class="mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="same-address">
                                    <input type="hidden" value="1200" name="amount" id="total_amount" required/>
                                    <label class="custom-control-label" for="same-address">Agree to terms & conditions.</label>
                                </div>
                                <hr class="mb-4">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout (Hosted)</button>
                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>            
    </section>
</div> 
@endauth

@guest
    <div class="container">
        <center style="padding: 100px 0 30px 0">
            <h2 style="color: red;">Please login to continue</h2>
        </center>
    </div>
@endguest

@endsection

