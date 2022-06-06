@extends('admin.layouts.app')

@section('title') @if(isset($role)) Role Edit @else Role Add @endif @endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
@endpush

@section('content')

<div class="card card-h-100">
   <div class="card-header justify-content-between d-flex align-items-center">
      <h4 class="card-title">@if(isset($role)) Role Edit @else Add New Role @endif</h4>
      <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs <i class="mdi mdi-arrow-right align-middle"></i></a> -->
   </div>
   <!-- end card header -->
   <div class="card-body">
      <div>
         <form action="@if(isset($role)){{ route('admin.role.update',[$role->id]) }}@else{{ route('admin.role.store') }}@endif" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($role)) @method('PUT') @endif

            <div class="row form_border">
               <div class="col-md-12">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Name</label>
                     <input class="form-control custom-file-input @error('name') is-invalid @enderror" value="@if(isset($role->name)){{$role->name}}@endif" name="name" type="text" id="name" >
                  </div>
                  @error('name')
                     <div class="invalid-feedback d-block">{{ $message }}</div>
                  @enderror
               </div>
            </div>
            <div class="row">
               @foreach($permissions as $permission)
               <?php 
                  if(isset($role))
                  {
                     $permission_id = App\Models\RoleHasPermission::where('role_id',$role->id)->where('permission_id',$permission->id)->first();
                  }
               ?>
                  <div class="col-md-3">
                     <div class="m-3 p-3">
                        <input type="checkbox" name="permission[]" id="permission-{{$permission->id}}" value="{{$permission->id}}" @if(isset($role))@if($permission_id != null) checked @endif @endif>
                        <label for="permission-{{$permission->id}}" class="form-label custom-file-label font-size-17">{{$permission->name}}</label>
                     </div>
                  </div>
               @endforeach
            </div>
            <!-- end row -->
            <div class="mt-3">
               <button type="submit" class="btn btn-primary ms-3">@if(isset($role)) Update @else Save @endif</button>
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

@endpush
