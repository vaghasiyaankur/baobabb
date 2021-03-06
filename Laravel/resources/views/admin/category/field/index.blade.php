@extends('admin.layouts.app')

@section('title') Custom Fields  @endsection

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
            <h4 class="mb-0">{{$category->name}}  → Custom Fields</h4>
            <input type="hidden" value="{{$category->id}}" id="category_id" name="category_id">
         </div>
      </div>
   </div>
   <!-- end page title -->
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header d-flex align-items-right">
               <a href="{{route('admin.category.index')}}" class="btn btn-success m-2">Go to Parent Category</a>
               @can('field-create')
                  <a href="{{route('admin.category.custom_field.create',$category->id)}}" class="btn btn-success m-2">Add New Custom Field → {{$category->name}} </a>
               @endcan
            </div>
            <!-- end card header -->
            <div class="card-body">
               <table id="brand_list" class="table table-hover responsive nowrap table-responsive " style="width:100%">
                  <thead>
                     <tr class="tr_bg">
                        <th>ID</th>
                        <th>NAME</th>
                        <th>TYPE</th>
                        <th >ACTION</th>
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
        var category_id = $('#category_id').val()
        console.log(category_id)
        var page = 10;
        var table = $('#brand_list').DataTable({
            processing: true,
            serverSide: true,
            pageLength : page,
            ajax: "/admin/category/"+category_id+"/custom_field",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'type', name: 'type'},
                {data: 'action', name: 'action',orderable: true,searchable: true},
            ]
        });
    });
</script>
@endpush
