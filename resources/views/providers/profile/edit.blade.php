@extends('admin.layouts.master')
@section('title') 
    {{ __('user.edit.title') }} 
@endsection

@push('css')
    
@endpush

@section('content')
    <form action="{{ route('profiles.update', $provider->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- @method() --}}
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card breadcrumb-card">
                        <div class="row justify-content-between align-content-between" style="height: 100%;">
                            <div class="col-md-6">
                                <h3 class="page-title">Users</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Profile</a></li>
                                    <li class="breadcrumb-item active-breadcrumb"><a href="{{ route('profiles.edit', $provider->id) }}">Profile Edit</a></li>
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
                        <h4 class="card-title">Users Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-8">
            
                                <div class="form-group">
                                    <label for="name" class="required">{{ __('default.form.name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $provider->name }}">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="required">{{ __('default.form.email') }}</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $provider->email }}" >

                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nid" class="required">{{ __('default.form.nid') }}</label>
                                    <input type="number" class="form-control" name="nid" id="nid" value="{{ $provider->nid }}" >

                                    @error('nid')
										<span class="text-danger">{{ $message }}</span>
									@enderror
                                </div>

                                <div class="form-group">
                                    <label for="mobile" class="required">{{ __('default.form.mobile') }}</label>
                                    <input type="number" class="form-control" name="mobile" id="mobile" value="{{ $provider->mobile }}" >

                                    @error('mobile')
										<span class="text-danger">{{ $message }}</span>
									@enderror
                                </div>

                                <div class="form-group">
                                    <label for="address" class="required">{{ __('default.form.address') }}</label>
                                    <input type="text" class="form-control" name="address" id="address" value="{{ $provider->address }}" >

                                    @error('address')
										<span class="text-danger">{{ $message }}</span>
									@enderror
                                </div>

                                <div class="form-group">
                                    <label for="user_service_category_id" class="required">{{ __('default.form.service') }}</label>
                                    
                                    <select name="user_service_category_id" id="user_service_category_id" class="select2">
                                        <option value="">Root</option>
                                        @foreach ($servicecategories as $servicecategory)
                                            <option value="{{ $servicecategory->id }}" @if(Auth::user()->user_service_category_id == $servicecategory->id) Selected @endif>{{ $servicecategory->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('user_service_category_id')
										<span class="text-danger">{{ $message }}</span>
									@enderror
                                </div>

                                <div class="form-group">
                                    <label for="bio" class="required">{{ __('default.form.bio') }}</label>
                                    <textarea name="bio" id="description" class="form-control" rows="8">{{ $provider->bio }}</textarea>

                                    @error('bio')
										<span class="text-danger">{{ $message }}</span>
									@enderror
                                </div>

                                <div class="form-group">
                                    <label for="per_hour_charge" class="required">{{ __('default.form.per_hour_charge') }}</label>
                                    <input type="text" class="form-control" name="per_hour_charge" id="per_hour_charge" value="{{ $provider->per_hour_charge }}">

                                    @error('per_hour_charge')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
											<label for="work_start_time" class="required">{{__("default.form.work_start_time")}}:</label>

											<input type="time" name="work_start_time" id="work_start_time" required="required" value="{{$provider->work_start_time}}">

											@error('work_start_time')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
											<label for="work_end_time" class="required">{{__("default.form.work_end_time")}}:</label>

											<input type="time" name="work_end_time" id="work_end_time" required="required" value="{{$provider->work_end_time}}">

											@error('work_end_time')
												<span class="text-danger">{{ $message }}</span>
											@enderror
										</div>
                                    </div>
                                </div>

                            </div><!-- end col-md-8 -->

                            <div class="col-md-4">
                                <!-- image start-->
                                <div class="row">
                                    <div class="col-md-10 col-sm-12" style="margin: auto;">

                                        <div class="input-group mb-5">

                                            @if (!empty($provider->image))
                                                <img src="" alt="..." id="output" class="img-thumbnail rounded mx-auto d-block mb-3" onerror="this.src='{{ $provider->image }}';">
                                            @else
                                                <img src="" alt="..." id="output" class="img-thumbnail rounded mx-auto d-block mb-3" onerror="this.src='{{ asset('assets/admin/img/default-user.png') }}';">
                                            @endif

                                           

                                            <input type="text" hidden id="image1" class="form-control" name="image" aria-label="Image" aria-describedby="button-image">
                                            <div class="" style="width: 100%;">
                                                <button class="btn btn-secondary btn-lg btn-block" type="button" id="button-image">
                                                <i data-feather="image" class="feather-icon"></i>
                                                Select Image
                                                </button>
                                            </div>

                                            <div class="text-center mt-1" style="width: 100%;">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- image finish -->
                            </div> <!-- end col-md-4 -->

                        </div><!-- end row -->
                    </div> <!-- end card body -->
                
                </div> <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Password</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
            
                                <div class="form-group">
                                    <label for="password">{{ __('default.form.password') }}</label>
                                    <input type="password" class="form-control" name="password" id="password">

                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="confirm-password">{{ __('default.form.confirm-password') }}</label>
                                    <input type="password" class="form-control" name="confirm-password" id="confirm-password">

                                    @error('confirm-password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                            </div><!-- end col-md-12 -->
                        </div>
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

        document.getElementById('button-image').addEventListener('click', (event) => {
            event.preventDefault();

            inputId = 'image1';

            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });

        });

        // input
        let inputId = '';
        let output = 'output';

        // set file link
        function fmSetLink($url) {
        document.getElementById(inputId).value = $url;
        document.getElementById(output).src = $url;
        }
    </script>

<script>
    tinymce.init({
      selector: '#description',

      browser_spellcheck : true,
      paste_data_images: false,
      responsive: true,
      plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste imagetools",
            "autosave codesample directionality wordcount"
        ],
        toolbar: "restoredraft insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image imagetools media| fullscreen preview code | codesample charmap ltr rtl",
        content_style: 'body { font-family:Poppins",sans-serif;}',
        imagetools_toolbar: "imageoptions",

        file_picker_callback (callback, value, meta) {
            let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
            let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight

            tinymce.activeEditor.windowManager.openUrl({
                url : '/file-manager/tinymce5',
                title : 'File manager',
                width : x * 0.8,
                height : y * 0.8,
                onMessage: (api, message) => {
                    callback(message.content, { text: message.text })
                }
            })
        }
    });
</script>
@endpush