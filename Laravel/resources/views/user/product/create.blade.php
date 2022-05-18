@extends('user.layouts.app')

@section('title') @if(isset($product)) Product Edit @else Product Add @endif @endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
@endpush

@section('content')

<div class="card card-h-100">
   <div class="card-header justify-content-between d-flex align-items-center">
      <h4 class="card-title">@if(isset($product)) Product Edit @else Add New Product @endif</h4>
      <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs <i class="mdi mdi-arrow-right align-middle"></i></a> -->
   </div>
   <!-- end card header -->
   <div class="card-body">
      <div>
         <form action="@if(isset($product)){{ route('user.product.update',[$product->id]) }}@else{{ route('user.product.store') }}@endif" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($product)) @method('PUT') @endif
            <div class="row form_border">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Category</label>
                     <select class="form-control custom-file-input" name="category_id" value="@if(isset($product->category_id)){{$product->category_id}}@endif" id="category_id">
                        <option>Select Category</option>
                        @foreach($categories as $category)
                           <option value="{{$category->id}}" @if(isset($product->category_id)) @if($category->id == $product->category_id) selected @endif @endif>{{$category->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>

               <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Name</label>
                   <input class="form-control custom-file-input" name="name" value="@if(isset($product->name)){{$product->name}}@endif" type="text" id="name">
                </div>
             </div>

             <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Slug</label>
                  <input class="form-control custom-file-input" name="slug" value="@if(isset($product->slug)){{$product->slug}}@endif" type="text" id="slug">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Type of news</label>
                  <select class="form-control custom-file-input" name="type_of" value="@if(isset($product->type_of)){{$product->type_of}}@endif" id="type_of">
                     <option>- Select -</option>
                     <option value="sell" @if(isset($product->type_of)) @if('sell' == $product->type_of) selected @endif @endif>Sell (expires in 30 days)</option>
                     <option value="buy" @if(isset($product->type_of)) @if('buy' == $product->type_of) selected @endif @endif>Buy (expires in 30 days)</option>
                     <option value="exchange" @if(isset($product->type_of)) @if('exchange' == $product->type_of) selected @endif @endif>Exchange (expires in 30 days)</option>
                     <option value="gift" @if(isset($product->type_of)) @if('gift' == $product->type_of) selected @endif @endif>Gift (expires in 30 days)</option>
                     <option value="rental" @if(isset($product->type_of)) @if('rental' == $product->type_of) selected @endif @endif>Rental (expires in 30 days)</option>
                     <option value="services" @if(isset($product->type_of)) @if('services' == $product->type_of) selected @endif @endif>Services (expires in 30 days)</option>
                  </select>
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Conditions (If applicable)</label>
                  <select class="form-control custom-file-input" name="condition" value="@if(isset($product->condition)){{$product->condition}}@endif" id="condition">
                     <option>- Select -</option>
                     <option value="new" @if(isset($product->condition)) @if('new' == $product->condition) selected @endif @endif>New</option>
                     <option value="refurbished" @if(isset($product->condition)) @if('refurbished' == $product->condition) selected @endif @endif>Refurbished</option>
                     <option value="opportunity" @if(isset($product->condition)) @if('opportunity' == $product->condition) selected @endif @endif>Opportunity</option>
                     <option value="part" @if(isset($product->condition)) @if('part' == $product->condition) selected @endif @endif>Part</option>
                  </select>
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Cash</label>
                  <select class="form-control custom-file-input" name="cash" value="@if(isset($product->cash)){{$product->cash}}@endif" id="cash">
                     <option>Select Currency</option>
                        <option value="CFA (CFA)" @if(isset($product->cash)) @if('CFA (CFA)' == $product->cash) selected @endif @endif>CFA (CFA)</option>
                        <option value="USD ($)" @if(isset($product->cash)) @if('USD ($)' == $product->cash) selected @endif @endif>USD ($)</option>
                        <option value="USD (€)" @if(isset($product->cash)) @if('USD (€)' == $product->cash) selected @endif @endif>USD (€)</option>
                        {{-- <option value="{{$category->id}}" @if(isset($product->cash)) @if($cash->id == $product->cash) selected @endif @endif>{{$category->name}}</option> --}}
                  </select>
               </div>
            </div>

             <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Description</label>
                  <input class="form-control custom-file-input" name="description" value="@if(isset($product->description)){{$product->description}}@endif" type="text" id="description">
               </div>
            </div>

             <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Meta Title</label>
                  <input class="form-control custom-file-input" name="meta_title" value="@if(isset($product->meta_title)){{$product->meta_title}}@endif" type="text" id="meta_title">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Meta Description</label>
                  <input class="form-control custom-file-input" name="meta_description" value="@if(isset($product->meta_description)){{$product->meta_description}}@endif" type="text" id="meta_description">
               </div>
            </div>
            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Country</label>
                  <input class="form-control custom-file-input" name="country" value="@if(isset($product->country)){{$product->country}}@endif" type="text" id="country">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">State</label>
                  <input class="form-control custom-file-input" name="state" value="@if(isset($product->state)){{$product->state}}@endif" type="text" id="state">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">City</label>
                  <input class="form-control custom-file-input" name="city" value="@if(isset($product->city)){{$product->city}}@endif" type="text" id="city">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Location</label>
                  <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Select Location">
                  <input type="hidden" name="latitude" id="latitude" class="form-control">
                  <input type="hidden" name="longitude" id="longitude" class="form-control">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Price</label>
                  <input class="form-control custom-file-input" name="price" value="@if(isset($product->price)){{$product->price}}@endif" type="number" id="price">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Sale Price</label>
                  <input class="form-control custom-file-input" name="sale_price" value="@if(isset($product->sale_price)){{$product->sale_price}}@endif" type="number" id="sale_price">
               </div>
            </div>

             <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Image</label>
                   <input class="form-control custom-file-input" name="image" type="file" id="image">
                </div>
             </div>

             <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Gallery</label>
                   <input class="form-control custom-file-input" name="gallery[]" type="file" id="gallery" multiple>
                </div>
             </div>

             <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Video Link</label>
                  <input class="form-control custom-file-input" name="video" type="text" id="video" value="@if(isset($product->video)){{$product->video}}@endif">
               </div>
            </div>

               <!-- end col -->
               {{-- <div class="col-md-6">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Image</label>
                  <div class="form_right_img text-center mb-4">
                     <img src="@if(isset($product->image)){{asset($product->image)}}@else{{ asset('assets/images/brand_add_new1.jpg') }}@endif" style="border-radius: 10px; max-height:200px;" id="viewer" class="form_img" alt="brand image">
                  </div>
               </div> --}}
               <!-- end col -->

               <!-- end col -->
               {{-- <div class="col-md-6">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Image</label>
                  <div class="form_right_img text-center mb-4">
                     <img src="@if(isset($product->image)){{asset($product->image)}}@else{{ asset('assets/images/brand_add_new1.jpg') }}@endif" style="border-radius: 10px; max-height:200px;" id="viewer" class="form_img" alt="brand image">
                  </div>
               </div> --}}
               <!-- end col -->

            </div>
            <!-- end row -->
            <div class="mt-3">
               <button type="submit" class="btn btn-primary ms-3">@if(isset($product)) Update @else Save @endif</button>
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
      name = $('#slug').val();
      $(this).val(name.toLowerCase());
      $(this).val(name.replace(/ /g, "-"));
   });  
</script>


{{-- FOR AUTOCOMPLATE ADDRESS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
{{-- javascript code --}}
<script type='text/javascript'
src='https://maps.googleapis.com/maps/api/js?libraries=places&v=3&language=En&key=AIzaSyBZhREk9TESs69r99eYGKkIQ725IqOP8Zc&ver=5.9.3'>
</script>
<script>
    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {
        var input = document.getElementById('autocomplete');
        var options = {
            types: ['(cities)'],
            componentRestrictions: {
                country: "in"
            }
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            console.log(place)
            $('#latitude').val(place.geometry['location'].lat());
            $('#longitude').val(place.geometry['location'].lng());
            // // --------- show lat and long ---------------
            // $("#lat_area").removeClass("d-none");
            // $("#long_area").removeClass("d-none");
        });
    }
</script>


@endpush
