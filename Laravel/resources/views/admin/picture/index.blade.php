@extends('admin.layouts.app')

@section('title') Pictures @endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
    <style>
        .dataTables_length{
            display: none;
        }
    </style>
@endpush

@section('content')

<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Pictures</h4>
         </div>
      </div>
   </div>
   <!-- end page title -->
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header  d-flex align-items-right">
               <a href="{{route('admin.picture.create')}}" class="btn btn-success m-2">Insert Picture</a>
            </div>
            <!-- end card header -->
            {{-- {{$field_id}} --}}
            <div class="card-body">
               <table id="brand_list" class="table table-hover responsive nowrap table-responsive " style="width:100%">
                  <thead>
                     <tr class="tr_bg">
                        <th>ID</th>
                        <th>NAME</th>
                        <th>IMAGE</th>
                        <th>ACTION</th>
                     </tr>
                  </thead>
                  <tbody>
                  </tbody>
               </table>
            </div>
            <!-- end card body -->
         </div>
         <!-- end card -->
      </div>
      <!-- end col -->
   </div>
   <!-- end row -->
</div>
@endsection


@push('script')
<!-- fontawesome icons init -->
<script src="{{ asset('assets/js/pages/fontawesome.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"crossorigin="anonymous"></script>

<script>
     $(function () {
        var field = $('#field_id').val();
        var page = 10;
        var table = $('#brand_list').DataTable({
            processing: true,
            serverSide: true,
            pageLength : page,
            ajax: "{{route('admin.picture.index')}}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'image', name: 'image'},
                {data: 'product.name', name: 'product.name'},
                {data: 'action', name: 'action',orderable: true,searchable: true},
            ]
        });
    });
</script>
@endpush
