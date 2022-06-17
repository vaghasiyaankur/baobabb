@extends('admin.layouts.app')

@section('title') @if(isset($blacklist)) Blacklist Edit @else Blacklist Add @endif @endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
@endpush

@section('content')

<div class="card card-h-100">
   <div class="card-header justify-content-between d-flex align-items-center">
      <h4 class="card-title">@if(isset($blacklist)) blacklist Edit @else Add New blacklist @endif</h4>
      <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs </a> -->
   </div>
   <!-- end card header -->
   <div class="card-body">
      <div>
         <form action="@if(isset($blacklist)){{ route('admin.blacklist.update',$blacklist->id) }}@else{{ route('admin.blacklist.store') }}@endif" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($blacklist)) @method('PUT') @endif
            <div class="row ">
               <div class="col-md-12">
                  <div class="mb-3">
                     <label for="type" class="form-label custom-file-label font-size-17">Type</label>
                     <input class="form-control custom-file-input" name="type" value="@if(isset($blacklist->type)){{$blacklist->type}}@endif" type="text" id="type">
                  </div>
               </div>
            </div>
            <div class="row ">
               <div class="col-md-12">
                  <div class="mb-3">
                     <label for="entry" class="form-label custom-file-label font-size-17">Entry</label>
                     <input class="form-control custom-file-input" name="entry" value="@if(isset($blacklist->entry)){{$blacklist->entry}}@endif" type="text" id="entry">
                  </div>
               </div>
            </div>
            <!-- end row -->
            <div class="mt-3">
               <button type="submit" class="btn btn-primary ms-3 ">@if(isset($blacklist)) Update @else Save @endif</button>
               <a href="{{route('admin.blacklist.index')}}" class="border btn btn-ligth ms-3">Back</a>
            </div>
         </form>
         <!-- end form -->
      </div>
   </div>
   <!-- end card body -->
</div>

@endsection


@push('script')
<script src="{{ asset('assets/js/pages/fontawesome.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"crossorigin="anonymous"></script>
<script src="{{asset('public/assets/back-end')}}/js/select2.min.js"></script>
@endpush
