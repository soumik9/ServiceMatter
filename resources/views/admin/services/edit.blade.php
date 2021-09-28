@extends('admin.layouts.master')
@section('title')
    {{ __('service.edit.title') }}
@endsection

@push('css')

@endpush

@section('content')
    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card breadcrumb-card">
                        <div class="row justify-content-between align-content-between" style="height: 100%;">
                            <div class="col-md-6">
                                <h3 class="page-title">{{ __('service.edit.title') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('services.index') }}">{{ __('service.index.title') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active-breadcrumb">
                                        <a href="{{ route('services.update', $service->id) }}">{{ __('service.edit.title') }}</a>
                                        </li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <div class="create-btn pull-right">
                                    <button type="submit"
                                        class="btn custom-create-btn">{{ __('default.form.update-button') }}</button>
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
                        <h4 class="card-title">Service Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-8">

                                <div class="form-group">
                                    <label for="name" class="required">{{ __('default.form.name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $service->name }}">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug" class="required">{{ __('default.form.slug') }}</label>
                                    <input type="text" class="form-control" disabled name="slug" id="slug" value="{{ $service->slug }}">

                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="service_category_id" class="required">{{ __('default.form.category') }}</label>

                                    <select name="service_category_id" id="service_category_id" class="select2">
                                        @foreach ($servicecategories as $servicecategory)
                                            <option value="{{ $servicecategory->id }}" @if($servicecategory->id == $service->service_category_id) selected @endif>{{ $servicecategory->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('service_category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="price" class="required">{{ __('default.form.price') }}</label>
                                    <input type="number" class="form-control" name="price" id="price" value="{{ $service->price }}" required>

                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="discount">{{ __('default.form.discount') }}</label>
                                    <input type="number" class="form-control" name="discount" id="discount" value="{{ $service->discount }}">

                                    @error('discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="discount_type">{{ __('default.form.discount_type') }}</label>

                                    <select name="discount_type" id="discount_type" class="select2">
                                        <option value="">Select discount type</option>
                                        <option value="fixed" @if($service->discount_type == 'fixed') selected @endif>Fixed</option>
                                        <option value="percent" @if($service->discount_type == 'percent') selected @endif>Percent</option>
                                    </select>

                                    @error('discount_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description" class="required">{{ __('default.form.description') }}</label>
                                    <textarea name="description" id="description" class="form-control" rows="20">{{ $service->description }}</textarea>

                                    @error('description')
										<span class="text-danger">{{ $message }}</span>
									@enderror
                                </div>

                                <div class="form-group">
                                    <label for="featured" class="required">{{ __('default.form.featured') }}</label>

                                    <select name="featured" id="featured" class="select2">
                                        <option value="1" @if($service->featured == 1) selected @endif>Active</option>
                                        <option value="0" @if($service->featured == 0) selected @endif>Inactive</option>
                                    </select>

                                    @error('featured')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status" class="required">{{ __('default.form.status') }}</label>

                                    <select name="status" id="status" class="select2">
                                        <option value="1" @if($service->status == 1) selected @endif>Active</option>
                                        <option value="0" @if($service->status == 0) selected @endif>Inactive</option>
                                    </select>

                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div><!-- end col-md-8 -->

                            <div class="col-md-4">
                                <!-- image start-->
                                <div class="row">
                                    <div class="col-md-10 col-sm-12" style="margin: auto;">
                                        <div class="input-group mb-5">

                                            @if(!empty($service->thumbnail))
                                                <img src="{{ $service->thumbnail }}" alt="..." id="image1_thumbnail_output" class="img-thumbnail rounded mx-auto d-block mb-3"   onerror="this.src='{{ asset('assets/admin/img/default-service.gif') }}';" style="width: 100%;">
                                            @else
                                                <img src="" alt="..." id="image1_thumbnail_output" class="img-thumbnail rounded mx-auto d-block mb-3"   onerror="this.src='{{ asset('assets/admin/img/default-service.gif') }}';" style="width: 100%;">
                                            @endif
                                           
                                            <input type="text" hidden id="image1_thumbnail" class="form-control" name="thumbnail">
                                            <div class="___class_+?44___" style="width: 100%;">
                                                <button class="btn btn-secondary btn-lg btn-block" type="button"
                                                    id="button-image-thumbnail">
                                                    <i data-feather="image" class="feather-icon"></i>
                                                    Select Thumbnail Image
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div><!-- image finish -->

                                 <!-- image start-->
                                 <div class="row">
                                    <div class="col-md-10 col-sm-12" style="margin: auto;">

                                        <div class="input-group mb-5">

                                            @if(!empty($service->image))
                                                <img src="{{  $service->image }}" alt="..." id="image_output" class="img-thumbnail rounded mx-auto d-block mb-3"  onerror="this.src='{{ asset('assets/admin/img/default-service.gif') }}';" style="width: 100%;">
                                            @else
                                                <img src="" alt="..." id="image_output" class="img-thumbnail rounded mx-auto d-block mb-3"  onerror="this.src='{{ asset('assets/admin/img/default-service.gif') }}';" style="width: 100%;">
                                            @endif
                                         
                                           
                                            <input type="text" hidden id="image1" class="form-control" name="image">
                                            <div class="___class_+?44___" style="width: 100%;">
                                                <button class="btn btn-secondary btn-lg btn-block" type="button"
                                                    id="button-image">
                                                    <i data-feather="image" class="feather-icon"></i>
                                                    Select Image
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div><!-- image finish -->
                            </div> <!-- end col-md-4 -->
                            
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

            document.getElementById('button-image-thumbnail').addEventListener('click', (event) => {
                event.preventDefault();

                inputId = 'image1_thumbnail';
                output = 'image1_thumbnail_output';
                
                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                inputId = 'image1';
                output = 'image_output';

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
