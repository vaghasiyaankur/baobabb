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
      <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs </a> -->
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
                     <input class="form-control custom-file-input @error('email') is-invalid @enderror " value="@if(isset($u->name)){{$u->name}}@endif" name="name" type="text" id="name"  >
                  </div>
                  @error('name')
                     <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
               </div>

               <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">email</label>
                   <input class="form-control custom-file-input @error('email') is-invalid @enderror" value="@if(old('email')){{old('email')}}@elseif(isset($u->email)){{$u->email}}@endif" name="email" type="email" id="email" >
                </div>
                @error('email')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
               @enderror
             </div>

             <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">phone</label>
                  <input class="form-control custom-file-input @error('email') is-invalid @enderror" value="@if(isset($u->phone)){{$u->phone}}@endif" name="phone" type="number" id="phone" >
               </div>
               @error('phone')
                  <div class="invalid-feedback d-block">{{ $message }}</div>
               @enderror
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  @if(isset($u))
                  @else
                     <label for="formFile" class="form-label custom-file-label font-size-17">password</label>
                     <input class="form-control custom-file-input @error('email') is-invalid @enderror" value="" name="password" type="password" id="password" >
                  @endif
                </div>
                @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
             @enderror
             </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Facebook</label>
                  <input class="form-control custom-file-input @error('email') is-invalid @enderror" value="@if(isset($u->facebook)){{$u->facebook}}@endif" name="facebook" type="text" id="facebook" >
               </div>
               @error('facebook')
               <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Twitter</label>
                   <input class="form-control custom-file-input @error('email') is-invalid @enderror" name="twitter" value="@if(isset($u->twitter)){{$u->twitter}}@endif" type="text" id="twitter" >
                </div>
                @error('twitter')
                <div class="invalid-feedback d-block">{{ $message }}</div>
             @enderror
             </div>
             <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Youtube</label>
                  <input class="form-control custom-file-input @error('email') is-invalid @enderror" value="@if(isset($u->youtube)){{$u->youtube}}@endif" name="youtube" type="text" id="youtube" >
               </div>
               @error('youtube')
               <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Linkedin</label>
                  <input class="form-control custom-file-input @error('email') is-invalid @enderror" value="@if(isset($u->linkedin)){{$u->linkedin}}@endif" name="linkedin" type="text" id="linkedin" >
               </div>
               @error('linkedin')
               <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Instagram</label>
                  <input class="form-control custom-file-input @error('email') is-invalid @enderror" value="@if(isset($u->instagram)){{$u->instagram}}@endif" name="instagram" type="text" id="instagram" >
               </div>
               @error('instagram')
               <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Website</label>
                  <input class="form-control custom-file-input @error('email') is-invalid @enderror" value="@if(isset($u->website)){{$u->website}}@endif" name="website" type="text" id="website" >
               </div>
               @error('website')
               <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Description</label>
                  <input class="form-control custom-file-input @error('email') is-invalid @enderror" value="@if(isset($u->description)){{$u->description}}@endif" name="description" type="text" id="description" >
               </div>
               @error('description')
               <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Location</label>
                  <input class="form-control custom-file-input @error('email') is-invalid @enderror" value="@if(isset($u->location)){{$u->location}}@endif" name="Location" type="text" id="autocomplete" >
                  <input type="hidden" name="latitude" id="latitude" class="form-control">
                  <input type="hidden" name="longitude" id="longitude" class="form-control">
               </div>
               @error('location')
               <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">country</label>
                  <select class="form-control custom-file-input @error('email') is-invalid @enderror" name="country" id="country" required>
                     <option value="">Select country</option>
                     @foreach($countries as $country)
                        <option value="{{$country->id}}" @if(isset($u->country)) @if($country->id == $u->country) selected @endif @endif>{{$country->name}}</option>
                     @endforeach
                  </select>
               </div>
               @error('country')
               <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Preferred Time Zone</label>
                  <select class="form-control custom-file-input @error('email') is-invalid @enderror" name="timezone" id="timezone" >
                     <option value="">Select TimeZone</option>
                     @foreach($timezones as $timezone)
                        <option value="{{$timezone}}" @if(isset($u->timezone)) @if($timezone == $u->timezone) selected @endif @endif>{{$timezone}}</option>
                     @endforeach
                  </select>
               </div>
               @error('timezone')
               <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">state</label>
                  <input class="form-control custom-file-input @error('email') is-invalid @enderror" value="@if(isset($u->state)){{$u->state}}@endif" name="state" type="text" id="state"  >
               </div>
               @error('state')
               <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">City</label>
                  <input class="form-control custom-file-input @error('email') is-invalid @enderror" value="@if(isset($u->city)){{$u->city}}@endif" name="city" type="text" id="city"  >
               </div>
               @error('city')
               <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">street</label>
                  <input class="form-control custom-file-input @error('email') is-invalid @enderror" value="@if(isset($u->street)){{$u->street}}@endif" name="street" type="text" id="street" >
               </div>
               @error('street')
               <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Avatar</label>
                  <input class="form-control custom-file-input @error('email') is-invalid @enderror"  name="avatar" type="file" id="avatar" >
               </div>
               @error('avatar')
               <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
            </div>

            <div class="col-md-6">
               <div class="mb-3">
                  <label for="formFile" class="form-label custom-file-label font-size-17">Select User Role</label>
                  @if(auth()->user()->role_id == 1)
                     <div class="row">
                        @foreach($roles as $role)
                           <div class="col-md-4">
                              <div class="m-3 p-3">
                                 <input type="radio" name="role_id" id="role-{{$role->id}}" value="{{$role->id}}" @if(isset($u))@if($u->role_id == $role->id) checked @endif @endif>
                                 <label for="role-{{$role->id}}" class="form-label custom-file-label font-size-17">{{$role->name}}</label>
                              </div>
                           </div>
                        @endforeach
                     </div>
                  @endif
               </div>
               @error('avatar')
               <div class="invalid-feedback d-block">{{ $message }}</div>
               @enderror
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
               <a href="{{route('admin.user.index')}}" class="btn btn-light ms-3">Back</a>
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
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
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

@endpush
