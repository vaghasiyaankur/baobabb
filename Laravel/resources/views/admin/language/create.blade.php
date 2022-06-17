@extends('admin.layouts.app')

@section('title') @if(isset($languagedata)) currency Edit @else currency Add @endif @endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
    {{--  flag  --}}
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>   
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet"/>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/css/flag-icon-css/flag-icon.min.css') }}">

    <style>
       .btn-input {
   display: block;
}

.btn-input .btn.form-control {
    text-align: left;
}

.btn-input .btn.form-control span:first-child {
   left: 10px;
   overflow: hidden;
   position: absolute;
   right: 25px;
}

.btn-input .btn.form-control .caret {
   margin-top: -1px;
   position: absolute;
   right: 10px;
   top: 50%;
}
.flag-list{
   height: 200px;
   overflow: scroll;
}
.panel.panel-default{
    width: 10px;
    border: none;
    box-shadow: none;
}
.panel-body{
    padding: 0px !important;
}
.form-select{
    font-size: 1.5rem;
}
    </style>
@endpush

@section('content')

<div class="card card-h-100">
   <div class="card-header justify-content-between d-flex align-items-center">
      <h4 class="card-title">@if(isset($languagedata)) Edit Language @else Add New Language @endif</h4>
      <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs </a> -->
   </div>
   <!-- end card header -->
   <div class="card-body">
      <div>
         <form action="@if(isset($languagedata)){{ route('admin.language.update',[$languagedata->id]) }}@else{{ route('admin.language.store') }}@endif" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($languagedata)) @method('PUT') @endif

            <div class="row">
               <div class="col-md-6">
                   <div class="mb-3">
                       <label for="formFile" class="form-label custom-file-label font-size-17">Language</label>
                       <select name="abbr" style="width: 100%"
                           class="abbr form-select select2_field select2-hidden-accessible" tabindex="-1"
                           aria-hidden="true">
                           <option value="">-</option>
                           @foreach(config('languages') as $short=>$language)
                           <option value="{{$short}}" {{ $short == @$languagedata->abbr ? 'selected' : '' }}>{{ $language }}</option>
                           @endforeach
                       </select>
                       <div class="form-text">The files of the languages with a check mark (✔) are included in the script by default.<br>List of languages whose files are included by default: en, fr, es, ar, pt, de, it, tr, ru, hi, bn, zh, ja, th, ro, ka</div>
                   </div>
               </div>
               <div class="col-md-6">
                   <div class="mb-3">
                       <label for="formFile"
                           class="form-label custom-file-label font-size-17">Native Name</label>
                       <input class="form-control custom-file-input" name="native" type="text" id="native"
                           value="@if (isset($languagedata)) {{ @$languagedata->native }} @endif" placeholder="Native Name">
                   </div>
               </div>
           </div>

           
           <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="formFile" class="form-label custom-file-label font-size-17">Locale Code (eg. en_US)</label>
                    <select name="locale" style="width: 100%"
                        class="locale form-select select2_field select2-hidden-accessible" tabindex="-1"
                        aria-hidden="true">
                        <option value="">-</option>
                        @foreach(config('locales') as $short=>$locale)
                        <option value="{{$short}}" {{ $short == @$languagedata->locale ? 'selected' : '' }}>{{ $locale.'-->'.$short }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
               {{-- <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Locale Code (eg. en_US)</label>
                   <select name="locale" style="width: 100%"
                       class="locale form-select select2_field select2-hidden-accessible" tabindex="-1"
                       aria-hidden="true">
                       <option value="">-</option>
                       @foreach(config('shortcode') as $shortcode)
                       <option value="{{$shortcode}}" {{ 'flag-icon-'.$shortcode == @$languagedata->flag ? 'selected' : '' }}><i class="flag-icon {{'flag-icon-'.$shortcode}}"></i></option>
                       @endforeach
                   </select>
               </div> --}}

               <label for="formFile" class="form-label custom-file-label font-size-17">Flag</label>
               <div class="panel panel-default">
                  <div class="panel-body flags-show-panel">
                     <div class="btn-group flgs-show">
                       <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                         <span data-bind="label">All Leagues</span>&nbsp;<span class="caret"></span>
                         <input type="hidden" name="flag" value="">
                       </button>
                       <ul class="dropdown-menu flag-list" role="menu">
                        @foreach(config('shortcode') as $shortcode)
                         <li><a href="#"><i class="flag-icon {{'flag-icon-'.$shortcode}}"></i>{{'-'.$shortcode}}</a></li>
                         @endforeach
                         <input type="hidden" name="selectFlag" id="selectFlag" value="{{@$languagedata->flag}}">
                       </ul>
                     </div>
                   </div>
                </div>
           </div>
           <div class="col-md-4">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Direction (eg. en_US)</label>
                <select name="direction" style="width: 100%"
                    class="direction form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    <option value="">-</option>
                    <option value="ltr" {{ 'ltr' == @$languagedata->direction ? 'selected' : '' }}>{{ 'ltr' }}</option>
                    <option value="ltr" {{ 'rtl' == @$languagedata->direction ? 'selected' : '' }}>{{ 'rtl' }}</option>
                </select>
            </div>
        </div>
        </div>

        <div class="row">
         <div class="col-md-12">
            <div class="mb-3">
                    <div class="form-check form-switch" style="margin-top: 30px;">
                       <input type="hidden" name="russian_pluralization" value="0">
                       <input type="checkbox" value="1" name="russian_pluralization" class="form-check-input" style="cursor: pointer;" {{@$languagedata->russian_pluralization == 1 ? 'checked' : ''}}>
                       <label class="form-check-label fw-bolder">
                        Russian Pluralization
                       </label>  
            </div>
        </div>
        </div>

        <div class="row">
         <div class="col-md-6">
             <div class="mb-3">
                 <label for="formFile" class="form-label custom-file-label font-size-17">Date Format</label>
                 <input class="form-control custom-file-input" name="date_format" type="text" id="date_format"
                     id="customFileUpload"
                     value="@if (isset($languagedata)) {{ @$languagedata->date_format }} @endif">
             </div>
         </div>

         <div class="col-md-6">
             <div class="mb-3">
                 <label for="formFile" class="form-label custom-file-label font-size-17">Date Time Format</label>
                 <input class="form-control custom-file-input" name="datetime_format" type="text" id="datetime_format"
                     id="customFileUpload"
                     value="@if (isset($languagedata)) {{ @$languagedata->datetime_format }} @endif">
             </div>
         </div>
     </div>
            <div class="mt-3">
               <button type="submit" class="btn btn-primary ms-3">@if(isset($languagedata)) Update @else Save @endif</button>
               <a href="{{route('admin.language.index')}}" class="btn btn-light ms-3">Back</a>
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

$(document).ready(function(){
    var val = $("#selectFlag").val();
    $("."+val).trigger('click');
});
$( document.body ).on( 'click', '.dropdown-menu li', function( event ) {

var $target = $( event.currentTarget );

$target.closest( '.btn-group' )
   .find( '[data-bind="label"]' ).html( '<i class="flag-icon flag-icon'+$target.text()+'">')
      .end()

   $("input[name=flag]").val('flag-icon'+$target.text());

   $(".flgs-show").removeClass('open');
//    $(".flag-list").removeClass('show');
return false;

});


    $(".js-example-theme-single").select2({
        theme: "classic"
    });

    $(".js-example-responsive").select2({
        width: 'resolve'
    });
</script>

@endpush
