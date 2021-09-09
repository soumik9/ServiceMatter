@extends('admin.layouts.master')
@section('title') 
    {{ __('cms.create.title') }} 
@endsection

@push('css')
    
@endpush

@section('content')
    <form action="{{ route('cms.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">

                    <div class="card breadcrumb-card">
                        <div class="row justify-content-between align-content-between" style="height: 100%;">
                            <div class="col-md-6">
                                <h3 class="page-name">{{ __('cms.index.title') }}</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('cms.index') }}">{{ __('cms.index.title') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active-breadcrumb">
                                        <a href="{{ route('cms.create') }}">{{ __('cms.create.title') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <div class="create-btn pull-right">
                                    <button type="submit" class="btn custom-create-btn">{{ __('default.form.save-button') }}</button>
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
                        <h4 class="card-name">CMS Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
            
                                <div class="form-group">
                                    <label for="title" class="required">{{ __('default.form.title') }}</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>

                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="slug" class="required">{{ __('default.form.slug') }}</label>
                                    <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}" required>

                                    @error('slug')
										<span class="text-danger">{{ $message }}</span>
									@enderror
                                </div>

                                <div class="form-group">
                                    <label for="cms_category_id" class="required">{{ __('default.form.category') }}</label>
                                    <select name="cms_category_id" id="cms_category_id" class="form-control select2">
                                        @foreach ($cmscategories as $cmscategory)
                                            <option value="{{ $cmscategory->id }}">{{ $cmscategory->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('cms_category_id')
										<span class="text-danger">{{ $message }}</span>
									@enderror
                                </div>

                                <div class="form-group">
                                    <label for="description" class="required">{{ __('default.form.description') }}</label>
                                    <textarea name="description" id="description" class="form-control" rows="20"></textarea>

                                    @error('description')
										<span class="text-danger">{{ $message }}</span>
									@enderror
                                </div>

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

                            </div><!-- end col-md-12 -->
                        </div><!-- end row -->
                    </div> <!-- end card body -->
                    
                </div> <!-- end card -->

                <div class="card">

                    <div class="card-header">
                        <h4 class="card-name">SEO Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
            
                                <div class="form-group">
                                    <label for="meta_title" class="required">{{ __('default.form.meta_title') }}</label>
                                    <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" required>

                                    @error('meta_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="meta_description" class="required">{{ __('default.form.meta_description') }}</label>
                                    <textarea name="meta_description" id="meta_description" class="form-control" rows="10"></textarea>

                                    @error('meta_keywords')
										<span class="text-danger">{{ $message }}</span>
									@enderror
                                </div>

                                <div class="form-group">
                                    <label for="meta_keywords" class="required">{{ __('default.form.meta_keywords') }}</label>
                                    <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" required>

                                    @error('meta_keywords')
										<span class="text-danger">{{ $message }}</span>
									@enderror
                                </div>


                            </div><!-- end col-md-12 -->
                        </div><!-- end row -->
                    </div> <!-- end card body -->
                    
                </div> <!-- end card -->

            </div> <!-- end col-md-12 -->
        </div><!-- end row -->
    </form>
@endsection

@push('scripts')
<script type="text/javascript">
    $("#title").keyup(function(){
        var title = this.value;
        title = title.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();
        $("#slug").val(title);
    })
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