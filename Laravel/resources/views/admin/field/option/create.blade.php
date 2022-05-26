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
      <h4 class="card-title">@if(isset($field)) Filed Edit @else Add New Filed @endif -> {{$field->name}}</h4>
      <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs <i class="mdi mdi-arrow-right align-middle"></i></a> -->
   </div>
   <!-- end card header -->
   <div class="card-body">
      <div>
         <form action="@if(isset($option)){{ route('admin.custom.field.option.update',[$field->id,$option->id]) }}@else{{ route('admin.custom.field.option.store',$field->id) }}@endif" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($option)) @method('PUT') @endif
            <div class="row form_border">
               <div class="col-md-12">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Value</label>
                     <input class="form-control custom-file-input" name="value" value="@if(isset($option->value)){{$option->value}}@endif" type="text" id="value">
                  </div>
               </div>
            </div>
            <!-- end row -->
            <div class="mt-3">
               <button type="submit" class="btn btn-primary ms-3">@if(isset($option)) Update @else Save @endif</button>
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
