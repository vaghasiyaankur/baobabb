@extends('admin.layouts.app')

@section('title') @if(isset($reportType)) reportType Edit @else reportType Add @endif @endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
@endpush

@section('content')

<div class="card card-h-100">
   <div class="card-header justify-content-between d-flex align-items-center">
      <h4 class="card-title">@if(isset($reportType)) reportType Edit @else Add New reportType @endif</h4>
      <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs <i class="mdi mdi-arrow-right align-middle"></i></a> -->
   </div>
   <!-- end card header -->
   <div class="card-body">
      <div>
         <form action="@if(isset($reportType)){{ route('admin.report.type.update',$reportType->id) }}@else{{ route('admin.report.type.store') }}@endif" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($reportType)) @method('PUT') @endif
            <div class="row ">
               <div class="col-md-12">
                  <div class="mb-3">
                     <label for="name" class="form-label custom-file-label font-size-17">Name</label>
                     <input class="form-control custom-file-input" name="name" value="@if(isset($reportType->name)){{$reportType->name}}@endif" type="text" id="name">
                  </div>
               </div>
            </div>
            <!-- end row -->
            <div class="mt-3">
               <button type="submit" class="btn btn-primary ms-3 ">@if(isset($reportType)) Update @else Save @endif</button>
               <a href="{{route('admin.report.type.index')}}" class="border btn btn-ligth ms-3">Back</a>
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
