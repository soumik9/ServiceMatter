@extends('admin.layouts.master')
@section('title')
    {{ __('slide.edit.title') }}
@endsection

@push('css')

@endpush

@section('content')
    <form action="{{ route('slides.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card breadcrumb-card">
                        <div class="row justify-content-between align-content-between" style="height: 100%;">
                            <div class="col-md-6">
                                <h3 class="page-title">{{ __('slide.edit.title') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('slides.index') }}">{{ __('slide.index.title') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active-breadcrumb">
                                        <a href="{{ route('slides.update', $slide->id) }}">{{ __('slide.edit.title') }}</a>
                                        </li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <div class="create-btn pull-right">
                                    <button type="submit"
                                        class="btn custom-create-btn">{{ __('default.form.save-button') }}</button>
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
                        <h4 class="card-title">Slide Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-8">

                                <div class="form-group">
                                    <label for="title" class="required">{{ __('default.form.title') }}</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $slide->title }}" required>

                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status" class="required">{{ __('default.form.status') }}</label>

                                    <select name="status" id="status" class="select2">
                                        <option value="1" @if($slide->status == 1) selected @endif>Active</option>
                                        <option value="0" @if($slide->status == 0) selected @endif>Inactive</option>
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

                                            @if (!empty($slide->image))
                                                <img src="{{ $slide->image }}" alt="..." id="output" class="img-thumbnail rounded mx-auto d-block mb-3" onerror="this.src='{{ asset('assets/admin/img/default-service.gif') }}';">
                                            @else
                                                <img src="" alt="..." id="output" class="img-thumbnail rounded mx-auto d-block mb-3"   onerror="this.src='{{ asset('assets/admin/img/default-service.gif') }}';">
                                            @endif

                                            <input type="text" hidden id="image1" class="form-control" name="image">
                                            <div class="___class_+?44___" style="width: 100%;">
                                                <button class="btn btn-secondary btn-lg btn-block" type="button"
                                                    id="button-image">
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
@endpush
