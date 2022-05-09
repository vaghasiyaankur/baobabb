@extends('admin.layouts.app')

@section('title') @if(isset($c)) Country Edit @else Country Add @endif @endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
@endpush

@section('content')

<div class="card card-h-100">
   <div class="card-header justify-content-between d-flex align-items-center">
      <h4 class="card-title">Add New Country</h4>
      <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs <i class="mdi mdi-arrow-right align-middle"></i></a> -->
   </div>
   <!-- end card header -->
   <div class="card-body">
      <div>
         <form action="@if(isset($c)){{ route('admin.country.update',[$c->id]) }}@else{{ route('admin.country.store') }}@endif" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="row form_border">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Name</label>
                     <input class="form-control custom-file-input" name="name" type="text" id="name" id="customFileUpload">
                  </div>
               </div>

               <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Code</label>
                   <input class="form-control custom-file-input" name="code" type="text" id="code" id="customFileUpload">
                </div>
             </div>

             <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">ISO3</label>
                   <input class="form-control custom-file-input" name="iso3" type="text" id="iso3" id="customFileUpload">
                </div>
             </div>

             <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">ISO Numeric</label>
                   <input class="form-control custom-file-input" name="iso_numeric" type="text" id="iso_numeric" id="customFileUpload">
                </div>
             </div>

             <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Fips</label>
                   <input class="form-control custom-file-input" name="fips" type="text" id="fips" id="customFileUpload">
                </div>
             </div>

             <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Capital</label>
                   <input class="form-control custom-file-input" name="capital" type="text" id="capital" id="customFileUpload">
                </div>
             </div>

             <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Area</label>
                   <input class="form-control custom-file-input" name="area" type="text" id="area" id="customFileUpload">
                </div>
             </div>

               <!-- end col -->
               {{-- <div class="col-md-6">
                  <div class="form_right_img text-center mb-4">
                     <img src="@if(isset($c->image)){{asset('storage/app/public/brand')}}/{{$c->image}}@else{{ asset('assets/images/brand_add_new1.jpg') }}@endif" style="border-radius: 10px; max-height:200px;" id="viewer" class="form_img" alt="brand image">
                  </div>
               </div> --}}
               <!-- end col -->
            </div>
            <!-- end row -->
            <div class="mt-3">
               <button type="submit" class="btn btn-primary ms-3">@if(isset($c)) Update @else Save @endif</button>
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

@endpush
