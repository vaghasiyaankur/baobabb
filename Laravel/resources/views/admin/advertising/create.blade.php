@extends('admin.layouts.app')

@section('title') @if(isset($advertising)) advertising Edit @else advertising Add @endif @endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
@endpush

@section('content')

<div class="card card-h-100">
   <div class="card-header justify-content-between d-flex align-items-center">
      <h4 class="card-title">@if(isset($advertising)) advertising Edit @else Add New advertising @endif</h4>
      <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs <i class="mdi mdi-arrow-right align-middle"></i></a> -->
   </div>
   <!-- end card header -->
   <div class="card-body">
      <div>
         <form action="@if(isset($advertising)){{ route('admin.advertising.update',$advertising->id) }}@else{{ route('admin.advertising.store') }}@endif" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($advertising)) @method('PUT') @endif
            <div class="row ">
               <div class="col-md-12">
                  <div class="mb-3">
                     <label for="provider_name" class="form-label custom-file-label font-size-17">Provider Name</label>
                     <input class="form-control custom-file-input" name="provider_name" value="@if(isset($advertising->provider_name)){{$advertising->provider_name}}@endif" type="text" id="provider_name">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="card text-white bg-primary rounded mb-3">
                     <div class="card-body">
                     This is a classic tracking code to display advertising in website top slot.
                     <br>NOTE: This advertising will be displayed on:
                     <ul>
                        <li>The search results page</li>
                        <li>The listings details page</li>
                        <li>The homepage (that can be hide of shown in the "Admin panel -&gt; Setup -&gt; Homepage").</li>
                     </ul>
                     </div>
                     </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="mb-3">
                     <label for="tracking_code_large"
                         class="form-label custom-file-label font-size-17">Tracking Code</label>
                        <textarea name="tracking_code_large" id="tracking_code_large" cols="20" rows="10" class="form-control custom-file-input" >@if (isset($advertising)){{ @$advertising->tracking_code_large }}@endif</textarea>
                 </div>
               </div>
            </div>
            <div class="row form_border">
               <div class="col-md-12 mb-3">
                  <div class="">
                     <input type="checkbox" id="is_responsive" class="m-2" name="is_responsive" value="1" @if(isset($advertising)) @if($advertising->is_responsive == 1) checked @endif @endif>
                     <label for="is_responsive"class="form-label custom-file-label font-size-17">Is it a responsive advertising?</label>
                  </div>
                  <span>
                     Check the field above if the adverting code is responsive. Them, you have to ignore the fields below.
                  </span>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12 my-3">
                  <div class="">
                     <label for="tracking_code_medium"
                         class="form-label custom-file-label font-size-17">Tracking Code (Tablet Format)</label>
                        <textarea name="tracking_code_medium" id="tracking_code_medium" cols="20" rows="10" class="form-control custom-file-input" >@if (isset($advertising)){{ @$advertising->tracking_code_medium }}@endif</textarea>
                 </div>
                  <span>This field is optional and is for advertising code can be display on small screens (e.g. Smartphones). NOTE: If the main code is responsive and the responsive field is checked, this code will be ignored.</span>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12 mb-3">
                  <div class="">
                     <label for="tracking_code_small"
                         class="form-label custom-file-label font-size-17">Tracking Code (Phone Format)</label>
                        <textarea name="tracking_code_small" id="tracking_code_small" cols="20" rows="10" class="form-control custom-file-input" >@if (isset($advertising)){{ @$advertising->tracking_code_small }}@endif</textarea>
                 </div>
                 <span>This field is optional and is for advertising code can be display on medium screens (e.g. Tablets). NOTE: If the main code is responsive and the responsive field is checked, this code will be ignored.</span>
               </div>
            </div>
            <div class="row form_border">
               <div class="col-md-12 ">
                  <div class="mb-3">
                     <input type="checkbox" id="active" class="m-2" name="status" value="1" @if(isset($advertising)) @if($advertising->active == 1) checked @endif @endif>
                     <label for="active"class="custom-file-label font-size-17">Active</label>
                  </div>
               </div>
            </div>
            <!-- end row -->
            <div class="mt-3">
               <button type="submit" class="btn btn-primary ms-3 ">@if(isset($advertising)) Update @else Save @endif</button>
               <a href="{{route('admin.advertising.index')}}" class="border btn btn-ligth ms-3">Back</a>
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
   $("#image").change(function() {
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
</script>

@endpush
