@extends('admin.layouts.app')

@section('title') @if(isset($field)) Filed Edit @else Filed Add @endif @endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
@endpush

@section('content')

<div class="card card-h-100">
   <div class="card-header justify-content-between d-flex align-items-center">
      <h4 class="card-title">@if(isset($field)) Filed Edit @else Add New Filed @endif</h4>
      <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs </a> -->
   </div>
   <!-- end card header -->
   <div class="card-body">
      <div>
         <form action="@if(isset($field)){{ route('admin.custom.field.update',[$field->id]) }}@else{{ route('admin.custom.field.store') }}@endif" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($field)) @method('PUT') @endif
            <div class="row form_border">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Name</label>
                     <input class="form-control custom-file-input" name="name" value="@if(isset($field->name)){{$field->name}}@endif" type="text" id="name" id="customFileUpload" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Category</label>
                     <select class="form-control custom-file-input" name="category_id" value="@if(isset($field->category_id)){{$field->category_id}}@endif" id="category_id" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                           <option value="{{$category->id}}" @if(isset($field->category_id)) @if($category->id == $field->category_id) selected @endif @endif>{{$category->name}}</option>
                           <?php $childs=App\Models\Category::where('parent_id',$category->id)->get();?>
                           @foreach($childs as $child)
                              <option value="{{$child->id}}" @if(isset($field->category_id)) @if($child->id == $field->category_id) selected @endif @endif>----| {{$child->name}}</option>
                           @endforeach
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Type</label>
                     <select class="form-control custom-file-input" name="type" id="type" required>
                        <option value="">Select Type</option>
                        <option value="text" @if(isset($field->type)) @if($field->type == 'text') selected @endif @endif>Text</option>
                        <option value="textarea" @if(isset($field->type)) @if($field->type == 'textarea') selected @endif @endif>Textarea</option>
                        <option value="checkbox" @if(isset($field->type)) @if($field->type == 'checkbox') selected @endif @endif>Checkbox</option>
                        <option value="checkbox(multiple)" @if(isset($field->type)) @if($field->type == 'checkbox(multiple)') selected @endif @endif>Checkbox (Multiple)</option>
                        <option value="selectbox" @if(isset($field->type)) @if($field->type == 'selectbox') selected @endif @endif>SelectBox</option>
                        <option value="radio" @if(isset($field->type)) @if($field->type == 'radio') selected @endif @endif>Radio</option>
                        <option value="file" @if(isset($field->type)) @if($field->type == 'file') selected @endif @endif>File</option>
                        <option value="url" @if(isset($field->type)) @if($field->type == 'url') selected @endif @endif>URL</option>
                        <option value="number" @if(isset($field->type)) @if($field->type == 'number') selected @endif @endif>Number</option>
                        <option value="date" @if(isset($field->type)) @if($field->type == 'date') selected @endif @endif>Date</option>
                        <option value="datetime" @if(isset($field->type)) @if($field->type == 'datetime') selected @endif @endif>Date Time</option>
                        <option value="daterange" @if(isset($field->type)) @if($field->type == 'daterange') selected @endif @endif>Date Range</option>
                        <option value="video" @if(isset($field->type)) @if($field->type == 'video') selected @endif @endif>Video (YouTube)</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="fieldlength" class="form-label custom-file-label font-size-17">Field Length</label>
                     <input class="form-control custom-file-input" name="fieldlength" value="@if(isset($field->fieldlength)){{$field->fieldlength}}@endif" type="number" id="fieldlength">
                     <span>This will be applied for field types: <span class="text-danger">text</span>, <span class="text-danger">number</span> and <span class="text-danger">textarea</span>.</span>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="default" class="form-label custom-file-label font-size-17">Default Value</label>
                     <input class="form-control custom-file-input" name="default" value="@if(isset($field->default)){{$field->default}}@endif" type="text" id="default" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <input class="custom-file-input" name="required" value="1" type="checkbox" id="required" @if(isset($field->required))@if($field->required == 1) checked @endif @endif>
                     <label for="required" class="form-label custom-file-label font-size-17">Required</label>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="fieldlength" class="form-label custom-file-label font-size-17">Help</label>
                     <input class="form-control custom-file-input" name="help" value="@if(isset($field->help)){{$field->help}}@endif" type="text" id="help" required>
                     <span>Enter a hint text for the field. This will be appeared under the field.</span>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <input class="custom-file-input" name="filter" value="1" type="checkbox" id="filter" @if(isset($field->required))@if($field->required == 1) checked @endif @endif>
                     <label for="filter" class="form-label custom-file-label font-size-17">Use as filter</label>
                     <span><br>Use this field as filter in the sidebar on search results page. NOTE: It's not possible to use File and Video fields as filters. So this feature will be not applied for these fields types.</span>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <input class="custom-file-input" name="active" value="1" type="checkbox" id="active" @if(isset($field->active))@if($field->active == 1) checked @endif @endif>
                     <label for="active" class="form-label custom-file-label font-size-17">Active</label>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <input class="custom-file-input" name="disabled_in_subcategories" value="1" type="checkbox" id="disabled_in_subcategories" @if(isset($field->disabled_in_subcategories))@if($field->disabled_in_subcategories == 1) checked @endif @endif>
                     <label for="disabled_in_subcategories" class="form-label custom-file-label font-size-17">Disabled in subcategories</label>
                  </div>
               </div>
            </div>
            <!-- end row -->
            <div class="mt-3">
               <button type="submit" class="btn btn-primary ms-3">@if(isset($field)) Update @else Save @endif</button>
               <a href="{{route('admin.custom.field.index')}}" class="btn btn-light ms-3">Back</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"crossorigin="anonymous"></script>
<script src="{{asset('public/assets/back-end')}}/js/select2.min.js"></script>
<script>
    $(".js-example-theme-single").select2({
        theme: "classic"
    });

    $(".js-example-responsive").select2({
        width: 'resolve'
    });
</script>

<script>
   $("#slug").keyup(function () {  
      slug = $('#slug').val();
      $(this).val(slug.toLowerCase());
      $(this).val(slug.replace(/ /g, "-"));
   });  
</script>

@endpush
