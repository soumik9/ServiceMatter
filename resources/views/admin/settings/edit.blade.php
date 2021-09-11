@extends('admin.layouts.master')
@section('title') 
    {{ __('setting.edit.title') }} 
@endsection

@push('css')
    
@endpush

@section('content')
    <form action="{{ route('settings.website.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- @method() --}}
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card breadcrumb-card">
                        <div class="row justify-content-between align-content-between" style="height: 100%;">
                            <div class="col-md-6">
                                <h3 class="page-title">{{ __('setting.index.title') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('settings.website.edit') }}">{{ __('setting.index.title') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active-breadcrumb">
                                        <a href="{{ route('settings.website.edit') }}">{{ __('setting.edit.title') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <div class="create-btn pull-right">
                                    <button type="submit" class="btn custom-create-btn">{{ __('default.form.update-button') }}</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- /card finish -->

                </div>
            </div>
        </div><!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">{{ __('setting.index.title') }}</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                {{-- Tab menu --}}
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="website-tab" data-toggle="tab" href="#website" role="tab" aria-controls="website" aria-selected="true">Website Setting</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">SEO Setting</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="currency-tab" data-toggle="tab" href="#currency" role="tab" aria-controls="currency" aria-selected="false">Currency Setting</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact Setting</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="social-tab" data-toggle="tab" href="#social" role="tab" aria-controls="social" aria-selected="false">Social Media</a>
                                    </li>
                                </ul>
                                 {{-- Tab menu end --}}

                                 {{-- Content start --}}
                                 <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="website" role="tabpanel" aria-labelledby="website-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">
                                                    Website Setting
                                                </h5>
                                            </div>
                                          
                                            <div class="card-body">
                                                    
                                                <div class="form-group">
                                                    <label for="website_title" class="required">{{__('default.form.website_title')}}:</label>
                                                    <input type="text" name="website_title" id="website_title" class="form-control" required value="{{$setting->website_title}}">
                
                                                    @error('website_title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                
                                                <div class="row">
                
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card-body text-center">
                                                                <div class="form-group">
                                                                    <label for="website_title" class="required">{{__('default.form.website_logo_dark')}}:</label>
                
                                                                    <div class="">
                                                                
                                                                        @if(!empty($setting->website_logo_dark))
                                                                            <img src="{{ $setting->website_logo_dark }}" alt="..." id="website_logo_dark_output" class="img-thumbnail mb-3"  onerror="this.src='{{ asset('assets/admin/img/logo.png') }}';">
                                                                        @else
                                                                            <img src="" alt="..." id="website_logo_dark_output" class="img-thumbnail mb-3" onerror="this.src='{{ asset('assets/admin/img/logo.png') }}';">
                                                                        @endif
                
                                                                        <input type="text" hidden id="website_logo_dark" class="form-control" name="website_logo_dark">
                                                                        <div class="" style="width: 100%;">
                                                                            <button class="btn btn-secondary" type="button" id="website_logo_dark_button_image">
                                                                            <i data-feather="image" class="feather-icon"></i>
                                                                            Change Logo Image
                                                                             </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> {{-- col-md-4 end --}}
                                                        
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card-body text-center">
                                                                <div class="form-group">
                                                                    <label for="website_title" class="required">{{__('default.form.website_logo_light')}}:</label>
                
                                                                    <div class="">
                                                                
                                                                        @if(!empty($setting->website_logo_light))
                                                                            <img src="{{ $setting->website_logo_light }}" alt="..." id="website_logo_light_output" class="img-thumbnail rounded mb-3"  onerror="this.src='{{ asset('assets/admin/img/logo-white.png') }}';" style="background-color: #ccc;">
                                                                        @else
                                                                            <img src="" alt="..." id="website_logo_light_output" class="img-thumbnail rounded mb-3" onerror="this.src='{{ asset('assets/admin/img/logo-white.png') }}';" style="background-color: #ccc;">
                                                                        @endif
                
                                                                        <input type="text" hidden id="website_logo_light" class="form-control" name="website_logo_light">
                                                                        <div class="" style="width: 100%;">
                                                                            <button class="btn btn-secondary" type="button" id="website_logo_light_button_image">
                                                                            <i data-feather="image" class="feather-icon"></i>
                                                                            Change Logo Image
                                                                             </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> {{-- col-md-4 end --}}
                                                            
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card-body text-center">
                                                                <div class="form-group">
                                                                    <label for="website_title" class="required">{{__('default.form.website_logo_small')}}:</label>
                
                                                                    <div class="">
                                                                
                                                                        @if(!empty($setting->website_logo_small))
                                                                            <img src="{{ $setting->website_logo_small }}" alt="..." id="website_logo_output" class="img-thumbnail rounded mb-3"  onerror="this.src='{{ asset('assets/admin/img/logo.png') }}';" style="height: 60px;">
                                                                        @else
                                                                            <img src="" alt="..." id="website_logo_small_output" class="img-thumbnail rounded mb-3" onerror="this.src='{{ asset('assets/admin/img/logo-small.png') }}';" style="height: 60px;">
                                                                        @endif
                
                                                                        <input type="text" hidden id="website_logo_small" class="form-control" name="website_logo_small">
                                                                        <div class="" style="width: 100%;">
                                                                            <button class="btn btn-secondary" type="button" id="website_logo_small_button_image">
                                                                            <i data-feather="image" class="feather-icon"></i>
                                                                            Change Small Logo Image
                                                                             </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> {{-- col-md-4 end --}}
                                                            
                                                    <div class="col-md-4">
                                                        <div class="card">
                                                            <div class="card-body text-center">
                                                                <div class="form-group">
                                                                    <label for="website_title" class="required">{{__('default.form.website_favicon')}}:</label>
                
                                                                    <div class="">
                                                                
                                                                        @if(!empty($setting->website_favicon))
                                                                            <img src="{{ $setting->website_favicon }}" alt="..." id="website_favicon_output" class="img-thumbnail mb-3"  onerror="this.src='{{ asset('assets/admin/img/favicon.png') }}';">
                                                                        @else
                                                                            <img src="" alt="..." id="website_favicon_output" class="img-thumbnail mb-3" onerror="this.src='{{ asset('assets/admin/img/favicon.png') }}';">
                                                                        @endif
                
                                                                        <input type="text" hidden id="website_favicon" class="form-control" name="website_favicon">

                                                                        <div style="width: 100%;">
                                                                            <button class="btn btn-secondary" type="button" id="website_favicon_button_image">
                                                                            <i data-feather="image" class="feather-icon"></i>
                                                                            Change Favicon Image
                                                                             </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>  {{-- col-md-4 end --}}
                
                                                </div>
                
                
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">
                                                    SEO Setting
                                                </h5>
                                            </div>
                                          
                                            <div class="card-body">
                                                        
                                                <div class="form-group">
                                                    <label for="meta_title">{{__('default.form.meta_title')}}:</label>
                                                    <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{$setting->meta_title}}">
                
                                                    @error('meta_title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                        
                                                        
                                                <div class="form-group">
                                                    <label for="meta_description">{{__('default.form.meta_description')}}:</label>
                                                    <textarea name="meta_description" id="meta_description" class="form-control">{{$setting->meta_description}}</textarea> 
                
                                                    @error('meta_description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                        
                                                        
                                                <div class="form-group">
                                                    <label for="meta_tag">{{__('default.form.meta_tag')}}:</label>
                                                    <input type="text" name="meta_tag" id="meta_tag" class="form-control" value="{{$setting->meta_tag}}">
                
                                                    @error('meta_tag')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="tab-pane fade" id="currency" role="tabpanel" aria-labelledby="currency-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">
                                                    Currency Setting
                                                </h5>
                                            </div>
                                          
                                            <div class="card-body">
                                                              
                                                <div class="form-group">
                                                    <label for="currency_id">{{__('default.form.currency')}}:</label>
                                                    <select name="currency_id" id="currency_id" class="form-control">
                                                    <option value="">Select Currency</option>
                                                        @foreach($currencies as $currency)
                                                            <option value="{{ $currency->id }}" @if($currency->id == $setting->currency_id) selected @endif>{{$currency->name}} ({{$currency->code}})</option>
                                                        @endforeach
                                                    </select>
                
                                                    @error('currency')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">
                                                    Contact Setting
                                                </h5>
                                            </div>
                                          
                                            <div class="card-body">
                                                        
                                                <div class="form-group">
                                                    <label for="address">{{__('default.form.address')}}</label>
                                                    <textarea name="address" id="address" class="form-control">{{$setting->address}}</textarea>
                
                                                    @error('address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                        
                                                <div class="form-group">
                                                    <label for="phone">{{__('default.form.phone')}}</label>
                                                    <input type="text" name="phone" id="phone" class="form-control" value="{{$setting->phone}}">
                
                                                    @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                        
                                                <div class="form-group">
                                                    <label for="email">{{__('default.form.email')}}</label>
                                                    <input type="text" name="email" id="email" class="form-control" value="{{$setting->email}}">
                
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">
                                                    Social Media
                                                </h5>
                                            </div>
                                          
                                            <div class="card-body">
                                                        
                                                <div class="form-group">
                                                    <label for="facebook">{{__('default.form.facebook')}}</label>
                                                    <input type="text" name="facebook" id="facebook" class="form-control" value="{{$setting->facebook}}">
                
                                                    @error('facebook')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                        
                                                <div class="form-group">
                                                    <label for="twitter">{{__('default.form.twitter')}}</label>
                                                    <input type="text" name="twitter" id="twitter" class="form-control" value="{{$setting->twitter}}">
                
                                                    @error('twitter')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                        
                                                <div class="form-group">
                                                    <label for="linkedin">{{__('default.form.linkedin')}}</label>
                                                    <input type="text" name="linkedin" id="linkedin" class="form-control" value="{{$setting->linkedin}}">
                
                                                    @error('linkedin')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                        
                                                <div class="form-group">
                                                    <label for="instagram">{{__('default.form.instagram')}}</label>
                                                    <input type="text" name="instagram" id="instagram" class="form-control" value="{{$setting->instagram}}">
                
                                                    @error('instagram')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="github">{{__('default.form.github')}}</label>
                                                    <input type="text" name="github" id="github" class="form-control">
                
                                                    @error('github')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                
                
                                </div>
                                 {{-- Content end --}}
            
                     

                            </div><!-- end col-md-12 -->
                        </div><!-- end row -->
                    </div> <!-- end card body -->
                
                </div> <!-- end card -->



            </div> <!-- end col-md-12 -->
        </div><!-- end row -->
    </form>
@endsection

@push('scripts')
    <script>
        var loadFileImageFront = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

        document.getElementById('website_logo_dark_button_image').addEventListener('click', (event) => {
            event.preventDefault();

            inputId = 'website_logo_dark';
            output = 'website_logo_dark_output';

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });

        document.getElementById('website_logo_light_button_image').addEventListener('click', (event) => {
            event.preventDefault();

            inputId = 'website_logo_light';
            output = 'website_logo_light_output';

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });

        document.getElementById('website_logo_small_button_image').addEventListener('click', (event) => {
            event.preventDefault();

            inputId = 'website_logo_small';
            output = 'website_logo_small_output';

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });



        document.getElementById('website_favicon_button_image').addEventListener('click', (event) => {
            event.preventDefault();

            inputId = 'website_favicon';
            output = 'website_favicon_output';

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });

        });

        // input
        let inputId = '';
        let output = '';

        // set file link
        function fmSetLink($url) {
        document.getElementById(inputId).value = $url;
        document.getElementById(output).src = $url;
        }
    </script>
@endpush