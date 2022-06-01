@extends('user.layouts.app')
@section('content')

<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-flex align-items-center justify-content-between">
            {{-- <h4 class="mb-0">Total Product 45</h4> --}}
         </div>
      </div>
   </div>
   <!-- end page title -->
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header justify-content-between d-flex align-items-right">
               <a href="{{route('user.product.create')}}" class="btn btn-success">{{ __('messages.create_new_ad')}} <i class="mdi mdi-arrow-right align-middle"></i></a>
            </div>
            <!-- end card header -->
            <div class="card-body">
               <table id="brand_list" class="table table-hover responsive nowrap table-responsive " style="width:100%">
                  <thead>
                     <tr class="tr_bg">
                        <th>{{ __('messages.category_id')}}</th>
                        <th>{{ __('messages.name')}}</th>
                        {{-- <th>IMAGE</th> --}}
                        <th>{{ __('messages.action')}}</th>
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
<!-- fontawesome icons init -->
<script src="{{ asset('assets/js/pages/fontawesome.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"crossorigin="anonymous"></script>

<script>
     $(function () {
        var page = 10;
        var table = $('#brand_list').DataTable({
            processing: true,
            serverSide: true,
            pageLength : page,
            ajax: "{{ route('user.product.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
               //  {data: 'image', name: 'image'},
                {data: 'action', name: 'action',orderable: true,searchable: true},
            ]
            
        });
    });
</script>
@endsection


