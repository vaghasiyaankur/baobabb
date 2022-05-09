@extends('admin.layouts.app')

@section('title') @if(isset($u)) User Edit @else User Add @endif @endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
@endpush

@section('content')

<div class="card card-h-100">
   <div class="card-header justify-content-between d-flex align-items-center">
      <h4 class="card-title">@if(isset($u)) User Edit @else Add New User @endif</h4>
      <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs <i class="mdi mdi-arrow-right align-middle"></i></a> -->
   </div>
   <!-- end card header -->
   <div class="card-body">
      <div>
         <form action="@if(isset($u)){{ route('admin.user.update',[$u->id]) }}@else{{ route('admin.user.store') }}@endif" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($u)) @method('PUT') @endif

            <div class="row form_border">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Name</label>
                     <input class="form-control custom-file-input" value="@if(isset($u->name)){{$u->name}}@endif" name="name" type="text" id="name" id="customFileUpload" required>
                  </div>
               </div>

               <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">email</label>
                   <input class="form-control custom-file-input" value="@if(isset($u->email)){{$u->email}}@endif" name="email" type="email" id="email" id="customFileUpload" required>
                </div>
             </div>

             <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">phone</label>
                  <input class="form-control custom-file-input" value="@if(isset($u->phone)){{$u->phone}}@endif" name="phone" type="number" id="phone" id="customFileUpload">
               </div>
            </div>

             <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">password</label>
                   <input class="form-control custom-file-input" value="" name="password" type="text" id="password" id="customFileUpload">
                </div>
             </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Facebook</label>
                  <input class="form-control custom-file-input" value="@if(isset($u->facebook)){{$u->facebook}}@endif" name="facebook" type="text" id="facebook" id="customFileUpload">
               </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Twitter</label>
                   <input class="form-control custom-file-input" name="twitter" value="@if(isset($u->twitter)){{$u->twitter}}@endif" type="text" id="twitter" id="customFileUpload">
                </div>
             </div>
             <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Youtube</label>
                  <input class="form-control custom-file-input" value="@if(isset($u->youtube)){{$u->youtube}}@endif" name="youtube" type="text" id="youtube" id="customFileUpload">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Linkedin</label>
                  <input class="form-control custom-file-input" value="@if(isset($u->linkedin)){{$u->linkedin}}@endif" name="linkedin" type="text" id="linkedin" id="customFileUpload">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Instagram</label>
                  <input class="form-control custom-file-input" value="@if(isset($u->instagram)){{$u->instagram}}@endif" name="instagram" type="text" id="instagram" id="customFileUpload">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Website</label>
                  <input class="form-control custom-file-input" value="@if(isset($u->website)){{$u->website}}@endif" name="website" type="text" id="website" id="customFileUpload">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Description</label>
                  <input class="form-control custom-file-input" value="@if(isset($u->description)){{$u->description}}@endif" name="description" type="text" id="description" id="customFileUpload">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Location</label>
                  <input class="form-control custom-file-input" value="@if(isset($u->location)){{$u->location}}@endif" name="Location" type="text" id="Location" id="customFileUpload">
               </div>
            </div>

             <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Country</label>
                  <input class="form-control custom-file-input" value="@if(isset($u->country)){{$u->country}}@endif" name="country" type="text" id="country" id="customFileUpload">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">state</label>
                  <input class="form-control custom-file-input" value="@if(isset($u->state)){{$u->state}}@endif" name="state" type="text" id="state" id="customFileUpload">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">City</label>
                  <input class="form-control custom-file-input" value="@if(isset($u->city)){{$u->city}}@endif" name="city" type="text" id="city" id="customFileUpload">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">street</label>
                  <input class="form-control custom-file-input" value="@if(isset($u->street)){{$u->street}}@endif" name="street" type="text" id="street" id="customFileUpload">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Avatar</label>
                  <input class="form-control custom-file-input"  name="avatar" type="file" id="avatar" id="customFileUpload">
               </div>
            </div>

            <!-- end col -->
            <div class="col-md-6">
               <label for="formFile" class="form-label custom-file-label font-size-17">Avatar</label>
               <div class="form_right_img text-center mb-4">
                  <img src="@if(isset($u->image)){{asset('storage/app/public/brand')}}/{{$u->image}}@else{{ asset('assets/images/brand_add_new1.jpg') }}@endif" style="border-radius: 10px; max-height:200px;" id="viewer" class="form_img" alt="brand image">
               </div>
            </div>
            <!-- end col -->
            </div>
            <!-- end row -->
            <div class="mt-3">
               <button type="submit" class="btn btn-primary ms-3">@if(isset($u)) Update @else Save @endif</button>
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
<script src="https://email.jquery.com/jquery-3.6.0.min.js"crossorigin="anonymous"></script>
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
