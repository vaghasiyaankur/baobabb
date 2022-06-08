<form
    action="@if (isset($elementdata)){{ route('admin.setting.element.put', ['elementupdate' => $element]) }}@else{{ route('admin.setting.element.store', ['element' => $element]) }}@endif"
    method="post" enctype="multipart/form-data">
    @csrf
    {{-- @if (isset($elementdata))@method('PUT')@endif --}}
    <input type="hidden" name="name" value="{{ $element }}">
    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3>
                <div class="mb-3 col-md-6">
                    <h3><b>Watermark</b></h3>
                </div>
            </h3>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Watermark File</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <div class="form_right_img text-center mb-4">
                  <img src="{{ @$elementdata->watermark  ? asset(@$elementdata->watermark) : asset('assets/images/brand_add_new1.jpg') }}" style="border-radius: 10px; max-height:200px;" id="body-background-view" class="form_img" alt="brand image">
               </div>
                <label for="image" class="form-label custom-file-label font-size-17">Watermark Picture</label>
                @if(@$elementdata->watermark)
                <input type="hidden" name="watermark" value="{{@$elementdata->watermark}}" id="body-background-image-update">
               @endif
                <input class="form-control custom-file-input"  name="watermark" type="file" id="body-background-image" id="customFileUpload" value="{{@$elementdata->watermark}}">
              </div>
        </div>
        <div class="mb-3 col-md-12">These settings will be applied to the watermark picture.</div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="width" class="form-label custom-file-label font-size-17">Width</label>
                <input class="form-control custom-file-input" name="width" type="number" id="width"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->width  }}@endif">
                    <div class="form-text">Related to the default pictures width (ie: 300)</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="height" class="form-label custom-file-label font-size-17">Height</label>
                <input class="form-control custom-file-input" name="height" type="number" id="height"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->height  }}@endif">
                    <div class="form-text">Related to the default pictures height (ie: 300)</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="percentage_reduction" class="form-label custom-file-label font-size-17">Size Reduction</label>
                @php $RecaptchVersion = config('watermark.percentage_reduction') @endphp
                <select name="percentage_reduction" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach ($RecaptchVersion as $key => $rv)
                        <option value="{{ $key }}"
                            {{ @$elementdata->percentage_reduction == $key ? 'selected' : '' }}>{{ $rv }}</option>
                    @endforeach
                </select>
                <div class="form-text">Watermark will be X% (selected percentage) less than the actual dimensions of images. e.g. Select "70%" will reduce the watermark 70% less than actual images.<br>NOTE: After percentage reduction applied, if the watermark's reduced width is greater than the original width (depending on the actual images dimensions), the original dimensions of the watermark will be used. So you have to increase the watermark's default dimensions (Width &amp; Height) above.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="opacity" class="form-label custom-file-label font-size-17">Opacity</label>
                @php $RecaptchVersion = config('watermark.opacity') @endphp
                <select name="opacity" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach ($RecaptchVersion as $key => $rv)
                        <option value="{{ $key }}"
                            {{ @$elementdata->opacity == $key ? 'selected' : '' }}>{{ $rv }}</option>
                    @endforeach
                </select>
                <div class="form-text">Set the opacity in percent of the watermark ranging from 100% for opaque and 0% for full transparency.
                </div>
            </div>
        </div>
    </div>
    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Watermark Position</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-md-12">
            These settings will be applied on the listings pictures.
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="position" class="form-label custom-file-label font-size-17">Position</label>
                @php $RecaptchVersion = config('watermark.position') @endphp
                <select name="position" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach ($RecaptchVersion as $key => $rv)
                        <option value="{{ $key }}"
                            {{ @$elementdata->position == $key ? 'selected' : '' }}>{{ $rv }}</option>
                    @endforeach
                </select>
                <div class="form-text">The watermark will be added on the actual images with the selected position. By selecting "Random", a random position will be selected for each image.</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <label for="position_x" class="form-label custom-file-label font-size-17">Position X</label>
                <input class="form-control custom-file-input" name="position_x" type="number" id="position_x"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->position_x  }}@endif">
                    <div class="form-text">Integer Only (eg 20)</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <label for="position_y" class="form-label custom-file-label font-size-17">Position Y</label>
                <input class="form-control custom-file-input" name="position_y" type="number" id="position_y"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->position_y  }}@endif">
                    <div class="form-text">Integer Only (eg 20)</div>
            </div>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary ms-3"> Submit </button>
        </div>
    </div>
</form>


<script>
    $("#body-background-image").change(function() {
       readURL(this);
    });
 
    function readURL(input) {
       if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
          $('#body-background-view').attr('src', e.target.result);
          $('#body-background-image-update').remove();
          }
          reader.readAsDataURL(input.files[0]);
       } else {
          alert('select a file to see preview');
          $('#body-background-view').attr('src', '');
       }
    }
 
 
    $("#login-background-image").change(function() {
         readLoginURL(this);
    });
 
    function readLoginURL(input) {
    if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
          $('#login-background-view').attr('src', e.target.result);
          console.log('dasd');
          $('#login-background-image-update').remove();
          }
          reader.readAsDataURL(input.files[0]);
    } else {
          alert('select a file to see preview');
          $('#login-background-view').attr('src', '');
    }
    }
 </script>