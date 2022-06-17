@extends('admin.layouts.app')

@section('title')
    @if (isset($pagedata))
        currency Edit
    @else
        currency Add
    @endif
@endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
    {{-- flag --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/flag-icon-css/flag-icon.min.css') }}">

    <style>
        .btn-input {
            display: block;
        }

        .btn-input .btn.form-control {
            text-align: left;
        }

        .btn-input .btn.form-control span:first-child {
            left: 10px;
            overflow: hidden;
            position: absolute;
            right: 25px;
        }

        .btn-input .btn.form-control .caret {
            margin-top: -1px;
            position: absolute;
            right: 10px;
            top: 50%;
        }

        .flag-list {
            height: 200px;
            overflow: scroll;
        }

        .panel.panel-default {
            width: 10px;
            border: none;
            box-shadow: none;
        }

        .panel-body {
            padding: 0px !important;
        }

        .form-select {
            font-size: 1.5rem;
        }
    </style>
@endpush

@section('content')
    <div class="card card-h-100">
        <div class="card-header justify-content-between d-flex align-items-center">
            <h4 class="card-title">
                @if (isset($pagedata))
                    Edit Language
                @else
                    Add New Language
                @endif
            </h4>
            <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs </a> -->
        </div>
        <!-- end card header -->
        <div class="card-body">
            <div>
                <form
                    action="@if (isset($pagedata)) {{ route('admin.pages.update', [$pagedata->id]) }}@else{{ route('admin.pages.store') }} @endif"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($pagedata))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="formFile" class="form-label custom-file-label font-size-17">Name</label>
                                <input class="form-control custom-file-input" name="name" type="text" id="name"
                                    value="@if (isset($pagedata)) {{ @$pagedata->name }} @endif"
                                    placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="formFile" class="form-label custom-file-label font-size-17">Slug</label>
                                <input class="form-control custom-file-input" name="slug" type="text" id="slug"
                                    value="@if (isset($pagedata)) {{ @$pagedata->slug }} @endif"
                                    placeholder="Slug">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="formFile" class="form-label custom-file-label font-size-17">External
                                    Link</label>
                                <input class="form-control custom-file-input" name="external_link" type="text"
                                    id="	external_link"
                                    value="@if (isset($pagedata)) {{ @$pagedata->external_link }} @endif"
                                    placeholder="External Link">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="formFile" class="form-label custom-file-label font-size-17">Title</label>
                                <input class="form-control custom-file-input" name="title" type="text" id="title"
                                    value="@if (isset($pagedata)) {{ @$pagedata->title }} @endif"
                                    placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="formFile" class="form-label custom-file-label font-size-17">Content</label>
                                <textarea name="content" id="content" cols="30" rows="10" class="tinymce">@if (isset($pagedata)){{ @$pagedata->content }}@endif</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="formFile" class="form-label custom-file-label font-size-17">Type</label>
                                <select name="type" class="form-select">
                                    <option value="standard" {{ @$pagedata->type == 'standard' ? 'selected' : '' }}>
                                        standard</option>
                                    <option value="terms" {{ @$pagedata->type == 'terms' ? 'selected' : '' }}>terms
                                    </option>
                                    <option value="privacy" {{ @$pagedata->type == 'privacy' ? 'selected' : '' }}>privacy
                                    </option>
                                    <option value="tips" {{ @$pagedata->type == 'tips' ? 'selected' : '' }}>tips
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="picture" class="form-label custom-file-label font-size-17">Picture</label>
                                <input class="form-control custom-file-input" name="picture" type="file" id="picture"
                                    id="customFileUpload">
                            </div>
                            <div class="form_right_img text-center mb-4">
                                <img src="{{ @$pagedata->picture ? asset(@$pagedata->picture) : asset('assets/images/brand_add_new1.jpg') }}"
                                    style="border-radius: 10px; max-height:200px;" id="viewer" class="form_img"
                                    alt="brand image">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check form-switch" style="margin-top: 30px;">
                                    <input type="hidden" name="target_blank" value="0">
                                    <input type="checkbox" value="1" name="target_blank" class="form-check-input"
                                        style="cursor: pointer;" {{ @$pagedata->target_blank == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bolder">
                                        Open the link in new window
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="formFile" class="form-label custom-file-label font-size-17">SEO Title</label>
                                <input class="form-control custom-file-input" name="seo_title" type="text"
                                    id="seo_title"
                                    value="@if (isset($pagedata)) {{ @$pagedata->seo_title }} @endif"
                                    placeholder="SEO Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="formFile" class="form-label custom-file-label font-size-17">SEO Description</label>
                            <div class="mb-3">
                                <textarea class="form-control" name="seo_description" id="seo_description">@if (isset($pagedata)){{ @$pagedata->seo_description }}@endif</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="formFile" class="form-label custom-file-label font-size-17">SEO Keywords</label>
                            <div class="mb-3">
                                <textarea class="form-control" name="seo_keywords" id="seo_keywords">@if (isset($pagedata)){{ @$pagedata->seo_keywords }}@endif</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-check form-switch" style="margin-top: 30px;">
                                    <input type="hidden" name="excluded_from_footer" value="0">
                                    <input type="checkbox" value="1" name="excluded_from_footer"
                                        class="form-check-input" style="cursor: pointer;"
                                        {{ @$pagedata->excluded_from_footer == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bolder">
                                        Exclude from footer
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-check form-switch" style="margin-top: 30px;">
                                    <input type="hidden" name="active" value="0">
                                    <input type="checkbox" value="1" name="active" class="form-check-input"
                                        style="cursor: pointer;" {{ @$pagedata->active == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bolder">
                                        Exclude from footer
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name_color"
                        class="form-label custom-file-label font-size-17">Page Name Color</label>
                    <input class="form-control custom-file-input" name="name_color" type="text" id="name_color"
                        value="@if (isset($pagedata)) {{ @$pagedata->name_color }} @endif" placeholder="Native Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name_color"
                        class="form-label custom-file-label font-size-17">Page Title Color</label>
                    <input class="form-control custom-file-input" name="name_color" type="text" id="	name_color"
                        value="@if (isset($pagedata)) {{ @$pagedata->name_color }} @endif" placeholder="Native Name">
                </div>
            </div>
           </div> --}}


                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary ms-3">
                            @if (isset($pagedata))
                                Update
                            @else
                                Save
                            @endif
                        </button>
                        <a href="{{route('admin.pages.index')}}" class="btn btn-light ms-3">Back</a>
                    </div>
                </form>
                <!-- end form -->
            </div>
        </div>
        <!-- end card body -->
    </div>
@endsection


@push('script')
    <!-- fontawesome icons init -->
    <script src="{{ asset('assets/js/pages/fontawesome.init.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('public/assets/back-end') }}/js/select2.min.js"></script>
    <script src="{{ asset('assets/js/tinyMCE/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            height: 200,
            width: "100%",
            image_advtab: true,
            valid_elements: '*[*]',
            selector: 'textarea.tinymce',
            plugins: 'image imagetools media wordcount save fullscreen code',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | code',
        });

        $(document).ready(function() {
            var val = $("#selectFlag").val();
            $("." + val).trigger('click');
        });
        $(document.body).on('click', '.dropdown-menu li', function(event) {

            var $target = $(event.currentTarget);

            $target.closest('.btn-group')
                .find('[data-bind="label"]').html('<i class="flag-icon flag-icon' + $target.text() + '">')
                .end()

            $("input[name=flag]").val('flag-icon' + $target.text());

            $(".flgs-show").removeClass('open');
            //    $(".flag-list").removeClass('show');
            return false;

        });


        $("#picture").change(function() {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#viewer').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                alert('select a file to see preview');
                $('#viewer').attr('src', '');
            }
        }


        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script>
@endpush
