@extends('admin.layouts.master')
@section('title')
    {{ __('review.create.title') }}
@endsection

@push('css')

@endpush

@section('content')
    <form action="{{ route('customer.orders.review.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card breadcrumb-card">
                        <div class="row justify-content-between align-content-between" style="height: 100%;">
                            <div class="col-md-6">
                                <h3 class="page-title">{{ __('review.create.title') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('customer.orders.index') }}">{{ __('order.index.title') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active-breadcrumb">
                                        <a href="{{ route('customer.orders.review', $order->id) }}">Order no: {{ $order->transaction_id }}</a>
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
                        <h4 class="card-title">(<span class="text-danger">{{ $order->transaction_id }}</span>) Review Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="name" class="required">{{ __('default.form.name') }}</label>
                                    <input type="text" readonly class="form-control" name="name" id="name" value="{{ $order->name }}">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email" class="required">{{ __('default.form.email') }}</label>
                                    <input type="email" readonly class="form-control" name="email" id="email" value="{{ $order->email }}">

                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="service_name" class="required">{{ __('default.form.service_name') }}</label>
                                    <input type="text" readonly class="form-control" name="service_name" id="service_name" value="{{ $order->order_service->name }}">

                                    @error('service_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="rating" class="required">{{ __('default.form.service_rating') }}</label>

                                    <select name="rating" id="rating" class="select2">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>

                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="content" class="required">{{ __('default.form.content') }}</label>
                                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                                </div>

                                <input type="text" hidden readonly name="status" class="form-control" value="0">

                            </div><!-- end col-md-8 -->

                            
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
