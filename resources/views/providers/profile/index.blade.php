@extends('admin.layouts.master')

@section('title') 
    {{ __('profile.index.title') }} 
@endsection

@push('css')
    
@endpush

@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">

                <div class="card breadcrumb-card">
                    <div class="row justify-content-between align-content-between" style="height: 100%;">

                        <div class="col-md-6">
                            <h3 class="page-title">{{ __('profile.index.title') }}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active-breadcrumb">
                                    <a href="{{ route('profiles.index') }}">{{ __('profile.index.title') }}</a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="col-md-3">
                            @can('profile-create')
                                <div class="create-btn pull-right">
                                    <a href="{{ route('profiles.create') }}" class="btn custom-create-btn">{{ __('profile.form.add-button') }}</a>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div><!-- /card finish -->

            </div>
        </div>
    </div><!-- /Page Header -->

    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-body">

                    <div class="profile-header">
                        <div class="row align-items-center">
                            <div class="col-auto profile-image mr-3">
                                <a href="#">
                                    @if (!empty( Auth::user()->image ))
                                        <img class="rounded-circle" alt="User Image" src="{{ Auth::user()->image }}">
                                    @else
                                        <img class="rounded-circle" alt="User Image" src="{{ asset('assets/admin/img/default-user.png') }}">
                                    @endif
                                    
                                </a>
                            </div>
                            <div class="col ml-md-n2 profile-user-info">
                                <h4 class="user-name mb-0">{{ Auth::user()->name }}</h4>
                                <h6 class="text-muted">{{ Auth::user()->email }}</h6>
                                <div class="user-Location">
                                    <i class="fas fa-tools"></i>
                                    @foreach ($servicecategories as $servicecategory)
                                        @if (Auth::user()->user_service_category_id == $servicecategory->id)
                                            {{ $servicecategory->name }}
                                        @endif
                                    @endforeach 
                                </div>
                                <div class="about-text">{!! Auth::user()->bio !!}</div>
                            </div>
                            <div class="col-auto profile-btn">
                                
                                <a href="{{ route('profiles.edit', Auth::user()->id) }}" class="btn btn-primary">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>

                                    
                    <!-- Edit Details Modal -->
                    <div class="mt-4 mb-4">
                        <h5 class="card-title">
                            <span>Personal Details</span> 
                        </h5>
                        <div class="row">
                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                            <p class="col-sm-10">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="row">
                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Address</p>
                            <p class="col-sm-10">{{ Auth::user()->address }}</p>
                        </div>
                        <div class="row">
                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                            <p class="col-sm-10">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="row">
                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                            <p class="col-sm-10">{{ Auth::user()->mobile }}</p>
                        </div>
                        <div class="row">
                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Service</p>
                            <p class="col-sm-10 mb-0">
                                @foreach ($servicecategories as $servicecategory)
                                    @if (Auth::user()->user_service_category_id == $servicecategory->id)
                                        {{ $servicecategory->name }}
                                    @endif
                                @endforeach 
                            </p>
                        </div>
                        <div class="row">
                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Per hour charger</p>
                            <p class="col-sm-10">{{ Auth::user()->per_hour_charge }}{{ $setting->currency->symbol }}</p>
                        </div>
                        <div class="row">
                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Work Start Time</p>
                            <p class="col-sm-10">{{ Auth::user()->work_start_time }}</p>
                        </div>
                        <div class="row">
                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Work End Time</p>
                            <p class="col-sm-10">{{ Auth::user()->work_end_time }}</p>
                        </div>
                    </div>
                    <!-- /Edit Details Modal -->

                        

                        
                    </div>


                </div> <!-- end card body -->
            </div> <!-- end card -->

        </div>			
    </div>
@endsection

@push('scripts')
<script type="text/javascript">
    $('.delete-profile').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            dangerMode: true,
            buttons: true,

        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
@endpush