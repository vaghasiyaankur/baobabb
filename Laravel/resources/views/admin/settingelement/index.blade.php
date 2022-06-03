@extends('admin.layouts.app')

@section('title') Settings @endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
    <style>
        .dataTables_length{
            display: none;
        }

[type='color'] {
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
  padding: 0;
  width: 15px;
  height: 15px;
  border: none;
}

[type='color']::-webkit-color-swatch-wrapper {
  padding: 0;
}

[type='color']::-webkit-color-swatch {
  border: none;
}
.font-color-picker{
   margin-left: 50px;
}
.color-picker {
  padding: 10px 15px;
  border-radius: 10px;
  border: 1px solid #ccc;
  background-color: #f8f9f9;
  /* margin-left: 50px; */
}
.color-picker  img{
   display: none;
}
label.form-label.custom-file-label.font-size-17 {
    width: 46%;
}
.title-setting-element{
   
   border-bottom: 1px solid;
   margin-bottom: 19px;
}
    </style>
@endpush

@section('content')

<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">{{ ucfirst($element) }}</h4>
         </div>
      </div>
   </div>
   <!-- end page title -->
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <!-- end card header -->
            {{-- {{$field_id}} --}}
            <div class="card-body">
               @include('admin.settingelement.element.'.$element)
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
        var page = 5;
        var table = $('#brand_list').DataTable({
            processing: true,
            serverSide: true,
            pageLength : page,
            ajax: "{{ route('admin.setting.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'value', name: 'value'},
                {data: 'action', name: 'action',orderable: true,searchable: true},
            ]
        });
    });

   //  document.querySelectorAll('input[type=color]').forEach(function(picker) {

   //    var targetLabel = document.querySelector('label[for="' + picker.id + '"]'),
   //    codeArea = document.createElement('span');

   //    codeArea.innerHTML = picker.value;
   //    targetLabel.appendChild(codeArea);

   //    picker.addEventListener('change', function() {
   //    codeArea.innerHTML = picker.value;
   //    targetLabel.appendChild(codeArea);
   //    });
   // });

   $(".colorPickerInput").on('change', function(){
      var inputbox = $(this).parents('.color-picker').siblings(".font-color-picker");
      // console.log($(this).parents('.color-picker'));
      $(inputbox).val($(this).val());
   });
   
</script>
@endpush
