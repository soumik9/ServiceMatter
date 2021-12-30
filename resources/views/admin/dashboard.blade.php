@extends('admin.layouts.master')

@section('title') 
   Dashboard
@endsection

@push('css')
<style>
    .card-counter{
        box-shadow: 2px 2px 10px #DADADA;
        margin: 5px;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }

  .card-dash{
    background: #FFFFFF;
    padding: 5px;
    margin-bottom: 15px;
  }

  .card-dash i{
    font-size: 58px;
  }
</style>
@endpush

@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">

                <div class="card breadcrumb-card">
                    <div class="row justify-content-between align-content-between" style="height: 100%;">

                        <div class="col-md-6">
                            <h3 class="page-title">Dashboard</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div><!-- /card finish -->

            </div>
        </div>
    </div><!-- /Page Header -->

    <div class="row">
        <div class="col-md-12">


            <div class="row">
                <div class="col-md-12">
                    
                    <div class="row">
        
                    @if(Auth::user()->hasRole('Customer'))
                        <!-- Customer Hire -->
                        <div class="col-md-3">
                            <div class="card-counter info">
                            <i class="fa fa-users"></i>
                            <span class="count-numbers">
                                    {{ count($customer_total_hire) }}
                            </span>
                            <span class="count-name">
                                Customer Hires
                            </span>
                            </div>
                        </div>
                        <!-- /Customer Hire -->

                        <!-- Customer Order -->
                        <div class="col-md-3">
                            <div class="card-counter info">
                            <i class="fa fa-users"></i>
                            <span class="count-numbers">
                                    {{ count($customer_total_order) }}
                            </span>
                            <span class="count-name">
                                Customer Orders
                            </span>
                            </div>
                        </div>
                        <!-- /Customer Order -->
                    @endif

                    @if(Auth::user()->hasRole('Provider'))
                        <!-- Customer Hire -->
                        <div class="col-md-3">
                            <div class="card-counter info">
                            <i class="fa fa-users"></i>
                            <span class="count-numbers">
                                    {{ count($provider_total_hire) }}
                            </span>
                            <span class="count-name">
                                Provider Hires
                            </span>
                            </div>
                        </div>
                        <!-- /Customer Hire -->
                    @endif

                    @if(Auth::user()->hasRole('Admin'))
                        <!-- roles -->
                        @foreach ($roles_count as $role_info)
                        <div class="col-md-3">
                            <div class="card-counter @if($loop->index == 1) success @elseif($loop->index == 2) info @else primary @endif">
                            <i class="fa fa-users"></i>
                            <span class="count-numbers">
                                    {{ $role_info->users_count }}
                            </span>
                            <span class="count-name">
                                {{ $role_info->name }}
                            </span>
                            </div>
                        </div>
                        @endforeach
                        <!-- /roles -->

                        <!-- Service -->
                        <div class="col-md-3">
                            <div class="card-counter info">
                            <i class="fa fa-users"></i>
                            <span class="count-numbers">
                                    {{ count($total_service) }}
                            </span>
                            <span class="count-name">
                                Services
                            </span>
                            </div>
                        </div>
                        <!-- /Service -->

                        <!-- Order -->
                        <div class="col-md-3">
                            <div class="card-counter info">
                            <i class="fa fa-users"></i>
                            <span class="count-numbers">
                                    {{ count($total_order) }}
                            </span>
                            <span class="count-name">
                                Orders
                            </span>
                            </div>
                        </div>
                        <!-- / Order -->

                        <!-- Hires -->
                        <div class="col-md-3">
                            <div class="card-counter info">
                            <i class="fa fa-users"></i>
                            <span class="count-numbers">
                                    {{ count($total_hire) }}
                            </span>
                            <span class="count-name">
                                Hires
                            </span>
                            </div>
                        </div>
                        <!-- / Hires -->
                    @endif
        
                    
                </div>  <!--/row end -->
        
                </div>
            </div>

        </div>			
    </div>
@endsection
