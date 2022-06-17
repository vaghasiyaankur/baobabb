@extends('admin.layouts.app')

@section('title') Category List @endsection

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
            <h4 class="mb-0">SubCategories → {{$category->name}}</h4>
            <input type="hidden" id="parent_id" name="parent_id" value="{{$category->id}}"> 
         </div>
      </div>
   </div>
   <!-- end page title -->
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header d-flex align-items-right">
               <a href="{{route('admin.category.index')}}" class="btn btn-success m-2">Go to Parent Category</a>
               <a href="{{route('admin.subcategory.create',$category->id)}}" class="btn btn-success m-2">Add New category</a>
            </div>
            <!-- end card header -->
            <div class="card-body">
               <table id="brand_list" class="table table-hover responsive nowrap table-responsive " style="width:100%">
                  <thead>
                     <tr class="tr_bg">
                        <th>CATEGORY ID</th>
                        <th>NAME</th>
                        <th>Custom Field</th>
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
        var parent_id = $('#parent_id').val()
        var page = 10;
        var table = $('#brand_list').DataTable({
            processing: true,
            serverSide: true,
            pageLength : page,
            ajax: "/admin/category/"+parent_id+"/subcategory",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'name', name: 'name'},
               //  {data: 'subCateories', name: 'category'},
                {data: 'action', name: 'action',orderable: true,searchable: true},
            ]
        });
    });
</script>
@endpush
