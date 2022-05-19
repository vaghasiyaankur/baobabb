@extends('admin.layouts.app')

@section('title') @if(isset($currency)) currency Edit @else currency Add @endif @endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
@endpush

@section('content')

<div class="card card-h-100">
   <div class="card-header justify-content-between d-flex align-items-center">
      <h4 class="card-title">@if(isset($currency)) Edit currency @else Add New currency @endif</h4>
      <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs <i class="mdi mdi-arrow-right align-middle"></i></a> -->
   </div>
   <!-- end card header -->
   <div class="card-body">
      <div>
         <form action="@if(isset($currency)){{ route('admin.currency.update',[$currency->id]) }}@else{{ route('admin.currency.store') }}@endif" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($currency)) @method('PUT') @endif
            <div class="row form_border">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Country</label>
                     <select class="form-control custom-file-input" name="country_id" id="country_id">
                        <option>Select country</option>
                        @foreach($countries as $country)
                           <option value="{{$country->id}}" @if(isset($currency->country_id)) @if($country->id == $currency->country_id) selected @endif @endif>{{$country->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Name</label>
                     <input class="form-control custom-file-input" name="name" type="text" id="name" id="customFileUpload" value="@if(isset($currency)){{$currency->name}}@endif">
                  </div>
               </div>


               <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Symbol</label>
                   <input class="form-control custom-file-input" name="symbol" type="text" id="symbol" id="customFileUpload" value="@if(isset($currency)){{$currency->symbol}}@endif">
                </div>
             </div>

               <!-- end col -->
               {{-- <div class="col-md-6">
                  <div class="form_right_img text-center mb-4">
                     <img src="@if(isset($currency->image)){{asset('storage/app/public/brand')}}/{{$currency->image}}@else{{ asset('assets/images/brand_add_new1.jpg') }}@endif" style="border-radius: 10px; max-height:200px;" id="viewer" class="form_img" alt="brand image">
                  </div>
               </div> --}}
               <!-- end col -->
            </div>
            <!-- end row -->
            <div class="mt-3">
               <button type="submit" class="btn btn-primary ms-3">@if(isset($currency)) Update @else Save @endif</button>
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
