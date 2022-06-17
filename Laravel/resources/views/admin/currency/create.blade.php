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
      <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs </a> -->
   </div>
   <!-- end card header -->
   <div class="card-body">
      <div>
         <form action="@if(isset($currency)){{ route('admin.currency.update',[$currency->id]) }}@else{{ route('admin.currency.store') }}@endif" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($currency)) @method('PUT') @endif

            <div class="row">

               <div class="col-md-12">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Code (ISO 4217)</label>
                     <input class="form-control custom-file-input" name="code" type="text" id="code" id="customFileUpload" value="@if(isset($currency)){{$currency->code}}@endif" placeholder="Enter the currency code (ISO Code)">
                  </div>
               </div>
            <div class="row">
               {{-- <div class="col-md-6">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Country</label>
                     <select class="form-control custom-file-input" name="country_id" id="country_id">
                        <option>Select country</option>
                        @foreach($countries as $country)
                           <option value="{{$country->id}}" @if(isset($currency->country_id)) @if($country->id == $currency->country_id) selected @endif @endif>{{$country->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div> --}}

               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Name</label>
                     <input class="form-control custom-file-input" name="name" type="text" id="name" id="customFileUpload" value="@if(isset($currency)){{$currency->name}}@endif" placeholder="Name">
                  </div>
               </div>


               <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Symbol</label>
                   <input class="form-control custom-file-input" name="symbol" type="text" id="symbol" id="customFileUpload" value="@if(isset($currency)){{$currency->symbol}}@endif" placeholder="Enter the symbol">
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



            <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Symbol's HTML Entities</label>
                     <input class="form-control custom-file-input" name="entities" type="text" id="entities" id="customFileUpload" value="@if(isset($currency)){{$currency->entities}}@endif" placeholder="Enter the Symbol's HTML Entities">
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="mb-3">
                          <div class="form-check form-switch" style="margin-top: 30px;">
                             <input type="hidden" name="symbol_left" value="0">
                             <input type="checkbox" value="1" name="symbol_left" class="form-check-input" style="cursor: pointer;" {{@$currency->symbol_left == 1 ? 'checked' : ''}}>
                             <label class="form-check-label fw-bolder">
                              Symbol in left
                             </label>
                             </div>
                  </div>
              </div>
            </div>

            <div class="row">
               <div class="col-md-4">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Decimal Places</label>
                     <input class="form-control custom-file-input" name="decimal_place" type="text" id="decimal_place" id="customFileUpload" value="@if(isset($currency)){{$currency->decimal_place}}@endif" placeholder="Enter the decimal places">
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Decimal Separator</label>
                     <input class="form-control custom-file-input" name="decimal_seprator" type="text" id="decimal_seprator" id="customFileUpload" value="@if(isset($currency)){{$currency->decimal_seprator}}@endif" placeholder="Enter the decimal separator">
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Thousand Separator</label>
                     <input class="form-control custom-file-input" name="thousand_operator" type="text" id="thousand_operator" id="customFileUpload" value="@if(isset($currency)){{$currency->thousand_operator}}@endif" placeholder="Enter the thousand separator">
                  </div>
               </div>

            </div>
            <!-- end row -->
            <div class="mt-3">
               <button type="submit" class="btn btn-primary ms-3">@if(isset($currency)) Update @else Save @endif</button>
               <a href="{{route('admin.currency.index')}}" class="btn btn-light ms-3">Back</a>
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
