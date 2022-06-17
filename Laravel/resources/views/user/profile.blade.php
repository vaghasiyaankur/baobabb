@extends('user.layouts.app')
@section('content')


<div class="card card-h-100">
   <div class="card-header justify-content-between d-flex align-items-center">
      <h4 class="card-title">User Edit</h4>
      <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs <i class="mdi mdi-arrow-right align-middle"></i></a> -->
   </div>
   <!-- end card header -->
   <div class="card-body">
      <div>
         <form action="{{ route('user.profile.update')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row form_border">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Name</label>
                     <input class="form-control custom-file-input" value="@if($user->name){{$user->name}}@endif" name="name" type="text" id="name" required>
                  </div>
               </div>

               <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">email</label>
                   <input class="form-control custom-file-input" value="@if($user->email){{$user->email}}@endif" name="email" type="email" id="email" required>
                </div>
             </div>

             <div class="col-md-6">
               <div class="mb-3">
                  <label for="phone" class="form-label custom-file-label font-size-17">phone</label>
                  {{-- <input type="text" id="mobile_code" class="form-control" placeholder="Phone Number" name="phone" value="@if($user->phone){{$user->phone}}@endif"> --}}
                  {{-- <input id="phone" type="tel"> --}}
                  <input class="form-control custom-file-input" value="@if($user->phone){{$user->phone}}@endif" name="phone" type="tel" id="phone" required>
               </div>
            </div>

             {{-- <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">password</label>
                   <input class="form-control custom-file-input" value="" name="password" type="text" id="password" required>
                </div>
             </div> --}}

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Facebook</label>
                  <input class="form-control custom-file-input" value="@if($user->facebook){{$user->facebook}}@endif" name="facebook" type="text" id="facebook">
               </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Twitter</label>
                   <input class="form-control custom-file-input" name="twitter" value="@if($user->twitter){{$user->twitter}}@endif" type="text" id="twitter">
                </div>
             </div>
             <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Youtube</label>
                  <input class="form-control custom-file-input" value="@if($user->youtube){{$user->youtube}}@endif" name="youtube" type="text" id="youtube">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Linkedin</label>
                  <input class="form-control custom-file-input" value="@if($user->linkedin){{$user->linkedin}}@endif" name="linkedin" type="text" id="linkedin">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Instagram</label>
                  <input class="form-control custom-file-input" value="@if($user->instagram){{$user->instagram}}@endif" name="instagram" type="text" id="instagram">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Website</label>
                  <input class="form-control custom-file-input" value="@if($user->website){{$user->website}}@endif" name="website" type="text" id="website">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Description</label>
                  <input class="form-control custom-file-input" value="@if($user->description){{$user->description}}@endif" name="description" type="text" id="description">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Location</label>
                  <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Select Location" value="@if(isset($user->location)){{$user->location}}@endif">
                  <input type="hidden" name="latitude" id="latitude" class="form-control">
                  <input type="hidden" name="longitude" id="longitude" class="form-control">
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Country</label>
                  <select class="form-control custom-file-input" name="country" id="country">
                     <option>Select Country</option>
                     @foreach($countries as $country)
                        <option value="{{$country->id}}" @if(isset($user->country)) @if($country->id == $user->country) selected @endif @endif>{{$country->name}}</option>
                     @endforeach
                  </select>
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">state</label>
                  <input class="form-control custom-file-input" value="@if($user->state){{$user->state}}@endif" name="state" type="text" id="state" required>
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">City</label>
                  <input class="form-control custom-file-input" value="@if($user->city){{$user->city}}@endif" name="city" type="text" id="city" required> 
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">street</label>
                  <input class="form-control custom-file-input" value="@if($user->street){{$user->street}}@endif" name="street" type="text" id="street" required>
               </div>
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Avatar</label>
                  <input class="form-control custom-file-input"  name="avatar" type="file" id="avatar">
               </div>
            </div>

            <!-- end col -->
            <div class="col-md-6">
               <label for="formFile" class="form-label custom-file-label font-size-17">Avatar</label>
               <div class="form_right_img text-center mb-4">
                  <img src="@if($user->avatar){{asset($user->avatar)}}@else{{ asset('assets/images/brand_add_new1.jpg') }}@endif" style="border-radius: 10px; max-height:200px;" id="viewer" class="form_img" alt="brand image">
               </div>
            </div>
            <!-- end col -->
            </div>
            <!-- end row -->
            <div class="mt-3">
               <button type="submit" class="btn btn-primary ms-3">Update</button>
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

<script>
   
var telInput = $("#phone"),
  errorMsg = $("#error-msg"),
  validMsg = $("#valid-msg");

// initialise plugin
telInput.intlTelInput({

  allowExtensions: true,
  formatOnDisplay: true,
  autoFormat: true,
  autoHideDialCode: true,
  autoPlaceholder: true,
  defaultCountry: "auto",
  ipinfoToken: "yolo",

  nationalMode: false,
  numberType: "MOBILE",
  //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  preferredCountries: ['sa', 'ae', 'qa','om','bh','kw','ma'],
  preventInvalidNumbers: true,
  separateDialCode: true,
  initialCountry: "auto",
  geoIpLookup: function(callback) {
  $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    var countryCode = (resp && resp.country) ? resp.country : "";
    callback(countryCode);
  });
},
   utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
});

var reset = function() {
  telInput.removeClass("error");
  errorMsg.addClass("hide");
  validMsg.addClass("hide");
};

// on blur: validate
telInput.blur(function() {
  reset();
  if ($.trim(telInput.val())) {
    if (telInput.intlTelInput("isValidNumber")) {
      validMsg.removeClass("hide");
    } else {
      telInput.addClass("error");
      errorMsg.removeClass("hide");
    }
  }
});

// on keyup / change flag: reset
telInput.on("keyup change", reset);


$('.selected-dial-code').change(function(){
   alert()
})


</script>

<script>
   $("#avatar").change(function() {
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

{{-- <script>
   // -----Country Code Selection
   $("#mobile_code").intlTelInput({
  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
});
</script> --}}
@endpush

@push('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet" media="screen">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>
@endpush