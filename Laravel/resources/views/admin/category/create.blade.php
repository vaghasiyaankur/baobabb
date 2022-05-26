@extends('admin.layouts.app')

@section('title') @if(isset($cat)) Category Edit @else Category Add @endif @endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
@endpush

@section('content')

<div class="card card-h-100">
   <div class="card-header justify-content-between d-flex align-items-center">
      <h4 class="card-title">@if(isset($cat)) Category Edit @else Add New Category @endif</h4>
      <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs <i class="mdi mdi-arrow-right align-middle"></i></a> -->
   </div>
   <!-- end card header -->
   <div class="card-body">
      <div>
         <form action="@if(isset($cat)){{ route('admin.category.update',[$cat->id]) }}@else{{ route('admin.category.store') }}@endif" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($cat)) @method('PUT') @endif
            <div class="row form_border">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Parent Category</label>
                     <select class="form-control custom-file-input" name="parent_id" value="@if(isset($product->category_id)){{$product->category_id}}@endif" id="parent_id">
                        <option>Select Parent Category</option>
                        @foreach($categories as $category)
                           <option value="{{$category->id}}" @if(isset($cat->parent_id)) @if($category->id == $cat->parent_id) selected @endif @endif>{{$category->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Name</label>
                     <input class="form-control custom-file-input" name="name" value="@if(isset($cat->name)){{$cat->name}}@endif" type="text" id="name" id="customFileUpload">
                  </div>
               </div>

               <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Slug</label>
                   <input class="form-control custom-file-input" name="slug" value="@if(isset($cat->slug)){{$cat->slug}}@endif" type="text" id="slug" id="customFileUpload">
                </div>
             </div>

             <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Icon</label>
                   <input class="form-control custom-file-input" name="icon" type="file" id="icon" id="customFileUpload">
                </div>
             </div>

             <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Image</label>
                   <input class="form-control custom-file-input" name="image" type="file" id="image" id="customFileUpload">
                </div>
             </div>

               <!-- end col -->
               <div class="col-md-6">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Icon</label>
                  <div class="form_right_img text-center mb-4">
                     <img src="@if(isset($cat->icon)){{asset($cat->icon)}}@else{{ asset('assets/images/brand_add_new1.jpg') }}@endif" style="border-radius: 10px; max-height:200px;" id="viewer" class="form_img" alt="brand image">
                  </div>
               </div>
               <!-- end col -->

               <!-- end col -->
               <div class="col-md-6">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Image</label>
                  <div class="form_right_img text-center mb-4">
                     <img src="@if(isset($cat->image)){{asset($cat->image)}}@else{{ asset('assets/images/brand_add_new1.jpg') }}@endif" style="border-radius: 10px; max-height:200px;" id="viewer" class="form_img" alt="brand image">
                  </div>
               </div>
               <!-- end col -->

            </div>
            <!-- end row -->
            <div class="mt-3">
               <button type="submit" class="btn btn-primary ms-3">@if(isset($cat)) Update @else Save @endif</button>
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
