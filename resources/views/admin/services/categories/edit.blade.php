@extends('admin.layouts.master')
@section('title')
    {{ __('servicecategory.edit.title') }}
@endsection

@push('css')

@endpush

@section('content')
    <form action="{{ route('servicecategories.update', $servicecategory->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card breadcrumb-card">
                        <div class="row justify-content-between align-content-between" style="height: 100%;">
                            <div class="col-md-6">
                                <h3 class="page-title">{{ __('servicecategory.edit.title') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('servicecategories.index') }}">{{ __('servicecategory.index.title') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active-breadcrumb">
                                        <a href="{{ route('servicecategories.update', $servicecategory->id) }}">{{ __('servicecategory.edit.title') }}</a>
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
                        <h4 class="card-title">Service Category Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-8">

                                <div class="form-group">
                                    <label for="name" class="required">{{ __('default.form.name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $servicecategory->name }}">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug" class="required">{{ __('default.form.slug') }}</label>
                                    <input type="text" class="form-control" name="slug" id="slug" value="{{ $servicecategory->id }}">

                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="featured" class="required">{{ __('default.form.featured') }}</label>

                                    <select name="featured" id="featured" class="select2">
                                        <option value="1" @if($servicecategory->featured == 1) selected @endif>Active</option>
                                        <option value="0" @if($servicecategory->featured == 0) selected @endif>Inactive</option>
                                    </select>

                                    @error('featured')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status" class="required">{{ __('default.form.status') }}</label>

                                    <select name="status" id="status" class="select2">
                                        <option value="1" @if($servicecategory->status == 1) selected @endif>Active</option>
                                        <option value="0" @if($servicecategory->status == 0) selected @endif>Inactive</option>
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

                                            @if (!empty($servicecategory->image))
                                                <img src="{{ $servicecategory->image }}" alt="..." id="output" class="img-thumbnail rounded mx-auto d-block mb-3" onerror="this.src='{{ asset('assets/admin/img/default-service.gif') }}';" style="width: 100%;">
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
    <script type="text/javascript">
        $("#name").keyup(function(){
            var name = this.value;
            name = name.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();
            $("#slug").val(name);
        })
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
