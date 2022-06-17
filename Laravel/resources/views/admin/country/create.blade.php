@extends('admin.layouts.app')

@section('title')
    @if (isset($country))
        Country Edit
    @else
        Country Add
    @endif
@endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
@endpush

@section('content')
    <div class="card card-h-100">
        <div class="card-header justify-content-between d-flex align-items-center">
            <h4 class="card-title">
                @if (isset($country))
                    Edit Country
                @else
                    Add New Country
                @endif
            </h4>
            <!-- <a href="https://getbootstrap.com/docs/5.1/forms/layout/#utilities" target="_blank" class="btn btn-sm btn-soft-secondary">Docs </a> -->
        </div>
        <!-- end card header -->
        <div class="card-body">
            <div>
                {{-- <form action="@if (isset($country)){{ route('admin.country.update',[@$country->id]) }}@else{{ route('admin.country.store') }}@endif" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($country)) @method('PUT') @endif
            <div class="row">
               <div class="col-md-6">
                  <div class="mb-3">
                     <label for="formFile" class="form-label custom-file-label font-size-17">Name</label>
                     <input class="form-control custom-file-input" name="name" type="text" id="name" id="customFileUpload" value="@if (isset($country)){{@$country->name}}@endif">
                  </div>
               </div>

               <div class="col-md-6">
                <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Code</label>
                   <input class="form-control custom-file-input" name="code" type="text" id="code" id="customFileUpload" value="@if (isset($country)){{@$country->code}}@endif">
                </div>
             </div>
            </div>
            <div class="mt-3">
               <button type="submit" class="btn btn-primary ms-3">@if (isset($country)) Update @else Save @endif</button>
            </div>
         </form> --}}


                <form
                    action="@if (isset($country)) {{ route('admin.country.update', [@$country->id]) }}@else{{ route('admin.country.store') }} @endif"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($country))
                        @method('PUT')
                    @endif



                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="formFile" class="form-label custom-file-label font-size-17">Name</label>
                                <input class="form-control custom-file-input" name="name" type="text" id="name"
                                    id="customFileUpload"
                                    value="@if (isset($country)) {{ @$country->name }} @endif" placeholder="Enter the country name (In English)">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="formFile" class="form-label custom-file-label font-size-17">Code</label>
                                <input class="form-control custom-file-input" name="code" type="text" id="code"
                                    id="customFileUpload"
                                    value="@if (isset($country)) {{ @$country->code }} @endif" placeholder="Enter the country code (ISO Code)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="formFile"
                                    class="form-label custom-file-label font-size-17">Capital(optional)</label>
                                <input class="form-control custom-file-input" name="capital" type="text" id="capital"
                                    id="customFileUpload"
                                    value="@if (isset($country)) {{ @$country->capital }} @endif" placeholder="Capital">
                            </div>
                        </div>

                        ~
                    </div>

                    <div class="row">
                     <div class="col-md-6">
                         <div class="mb-3">
                             <label for="formFile"
                                 class="form-label custom-file-label font-size-17">TLD (Optional)</label>
                             <input class="form-control custom-file-input" name="tld" type="text" id="tld"
                                 id="customFileUpload"
                                 value="@if (isset($country)) {{ @$country->tld }} @endif" placeholder="Enter the country tld (E.g. .bj for Benin)">
                         </div>
                     </div>

                     <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formFile"
                                class="form-label custom-file-label font-size-17">Calling code (Optional)</label>
                            <input class="form-control custom-file-input" name="calling_code" type="text" id="calling_code"
                                id="customFileUpload"
                                value="@if (isset($country)) {{ @$country->calling_code }} @endif" placeholder="Enter the country calling code (E.g. +41 for Switzerland)">
                        </div>
                    </div>
                 </div>

               <div class="row">
                  <div class="col-md-12">
                      <div class="mb-3">
                          <label for="formFile" class="form-lab   el custom-file-label font-size-17">Currency Code</label>
                          <select name="currency_code" style="width: 100%"
                              class="currency_code form-select select2_field select2-hidden-accessible" tabindex="-1"
                              aria-hidden="true">
                              <option value="">-</option>
                              @foreach($currencies as $currency)
                              <option value="{{$currency->name}}" {{ $currency->name == @$country->currency_code ? 'selected' : '' }}>{{ $currency->name }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-md-12">
                      <div class="mb-3">
                          <label for="image" class="form-label custom-file-label font-size-17">Background Image</label>
                          <input class="form-control custom-file-input"  name="image" type="file" id="image" id="customFileUpload">
                        </div>
                        <div class="form_right_img text-center mb-4">
                          <img src="{{ @$country->image ? asset(@$country->image) : asset('assets/images/brand_add_new1.jpg') }}" style="border-radius: 10px; max-height:200px;" id="viewer" class="form_img" alt="brand image">
                       </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-md-6">
                      <div class="mb-3">
                          <label for="formFile"
                              class="form-label custom-file-label font-size-17">Languages</label>
                          <input class="form-control custom-file-input" name="language" type="text" id="capital"
                              id="customFileUpload"
                              value="@if (isset($country)) {{ @$country->language }} @endif" placeholder="eg. en,de,fr,it">
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="mb-3">
                          <label for="formFile" class="form-label custom-file-label font-size-17">Preferred Time Zone</label>
                          <select name="preferred_time" style="width: 100%"
                              class="preferred_time form-select select2_field select2-hidden-accessible" tabindex="-1"
                              aria-hidden="true">
                              <option value="">-</option>
                              @foreach($continents as $continent)
                              <option value="{{$continent->code}}" {{ $continent->code == @$country->preferred_time ? 'selected' : '' }}>{{ $continent->name }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
              </div>

              <div class="row">
               <div class="col-md-6">
                   <div class="mb-3">
                       <label for="formFile" class="form-label custom-file-label font-size-17">Date Format</label>
                       <input class="form-control custom-file-input" name="date_format" type="text" id="date_format"
                           id="customFileUpload"
                           value="@if (isset($country)) {{ @$country->date_format }} @endif">
                   </div>
               </div>

               <div class="col-md-6">
                   <div class="mb-3">
                       <label for="formFile" class="form-label custom-file-label font-size-17">Date Time Format</label>
                       <input class="form-control custom-file-input" name="time_format" type="text" id="time_format"
                           id="customFileUpload"
                           value="@if (isset($country)) {{ @$country->time_format }} @endif">
                   </div>
               </div>
           </div>

           <div class="row">
            <div class="col-md-6">
               <div class="mb-3">
                   <label for="formFile" class="form-label custom-file-label font-size-17">Administrative Division's Type</label>
                   <select name="admin_type" style="width: 100%"
                       class="admin_type form-select select2_field select2-hidden-accessible" tabindex="-1"
                       aria-hidden="true">
                       <option value="">-</option>
                       <option value="0" {{ @$country->admin_type == 0 ? 'selected' : '' }}>0</option>
                       <option value="1" {{ @$country->admin_type == 1 ? 'selected' : '' }}>1</option>
                       <option value="2" {{ @$country->admin_type == 2 ? 'selected' : '' }}>2</option>
                   </select>
                   <div class="form-text">eg. 0 =&gt; Default value, 1 =&gt; Admin. Division 1, 2 =&gt; Admin. Division 2</div>
               </div>
           </div>

            <div class="col-md-6">
                <div class="mb-3">
                        <div class="form-check form-switch" style="margin-top: 30px;">
                           <input type="hidden" name="admin_field_active" value="0">
                           <input type="checkbox" value="1" name="admin_field_active" class="form-check-input" style="cursor: pointer;" {{@$country->admin_field_active == 1 ? 'checked' : ''}}>
                           <label class="form-check-label fw-bolder">
                              Active Administrative Division's Field
                           </label>
                           <div class="form-text">Active the administrative division's field in the items form. You need to set the "Administrative Division's Type" to 1 or 2.</div>
                           </div>
                </div>
            </div>
        </div>



                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary ms-3">
                            @if (isset($country))
                                Update
                            @else
                                Save
                            @endif
                        </button>
                        <a href="{{route('admin.country.index')}}" class="btn btn-light ms-3">Back</a>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('public/assets/back-end') }}/js/select2.min.js"></script>
    <script>
        // $(".js-example-theme-single").select2({
        //     theme: "classic"
        // });

        // $(".js-example-responsive").select2({
        //     width: 'resolve'
        // });

        // $(".continent").select2({

        // });


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
