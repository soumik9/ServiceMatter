@extends('admin.layouts.master')
@section('title') File-Manager @endsection

@push('css')
	<style type="text/css">
		.fm-navbar .btn{
			padding: 3px 6px 1px 6px !important;
		}
	</style>
@endpush


@section('content')
    <div class="card">
	    <div class="card-body">
		
			<div style="height: 600px;">
                <div id="fm"></div>
            </div>
	
	    </div>
    </div>
@endsection

