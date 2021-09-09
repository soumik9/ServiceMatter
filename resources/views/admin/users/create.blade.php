@extends('admin.layouts.master')
@section('title')
    {{ __('user.create.title') }}
@endsection

@push('css')

@endpush

@section('content')
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card breadcrumb-card">
                        <div class="row justify-content-between align-content-between" style="height: 100%;">
                            <div class="col-md-6">
                                <h3 class="page-title">{{ __('user.create.title') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('users.index') }}">{{ __('user.index.title') }}</a>
                                        </li>
                                    <li class="breadcrumb-item active-breadcrumb">
                                        <a href="{{ route('users.create') }}">{{ __('user.create.title') }}</a>
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
                        <h4 class="card-title">Users Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-8">

                                <div class="form-group">
                                    <label for="name" class="required">{{ __('default.form.name') }}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="required">{{ __('default.form.email') }}</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>

                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nid" class="required">{{ __('default.form.nid') }}</label>
                                    <input type="number" class="form-control" name="nid" id="nid" value="{{ old('nid') }}" required>

                                    @error('nid')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mobile" class="required">{{ __('default.form.mobile') }}</label>
                                    <input type="number" class="form-control" name="mobile" id="mobile" value="{{ old('mobile') }}" required>

                                    @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div><!-- end col-md-8 -->

                            <div class="col-md-4">
                                <!-- image start-->
                                <div class="row">
                                    <div class="col-md-10 col-sm-12" style="margin: auto;">

                                        <div class="input-group mb-5">

                                            <img src="" alt="..." id="output" class="img-thumbnail rounded mx-auto d-block mb-3"   onerror="this.src='{{ asset('assets/admin/img/default-user.png') }}';">

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

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Password</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="password" class="required">{{ __('default.form.password') }}</label>
                                    <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" required>

                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="confirm-password" class="required">{{ __('default.form.confirm-password') }}</label>
                                    <input type="password" class="form-control" name="confirm-password" id="confirm-password" value="{{ old('confirm-password') }}" required>

                                    @error('confirm-password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                            </div><!-- end col-md-12 -->
                        </div>
                    </div> <!-- end card body -->

                </div> <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Role</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="roles" class="required">{{ __('default.form.role') }}</label>

                                    <select name="roles[]" id="roles" class="select2" multiple="multiple">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('roles')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div><!-- end col-md-12 -->
                        </div>
                    </div> <!-- end card body -->

                </div> <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Status</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="status" class="required">{{ __('default.form.status') }}</label>

                                    <select name="status" id="status" class="select2">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>

                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

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
@endpush
