<form action="@if(isset($elementdata)){{ route('admin.setting.element.put',['elementupdate' => $element]) }}@else{{ route('admin.setting.element.store',['element' => $element]) }}@endif" method="post" enctype="multipart/form-data">
    @csrf
    {{-- @if(isset($elementdata)) @method('PUT')@endif --}}
    <input type="hidden" name="name" value="{{ $element }}">
    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Files</h3>
            </div></h3>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">  
            <div class="mb-3">
                <label for="file_types" class="form-label custom-file-label font-size-17">File Types</label>
                <input class="form-control custom-file-input" name="file_types" type="text" id="file_types"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->file_types  }}@endif">
                    <div>File types (ex: pdf,doc,docx,odt,...)</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <label for="min_file_size" class="form-label custom-file-label font-size-17">Min File Size</label>
                <input class="form-control custom-file-input" name="min_file_size" type="number" id="min_file_size"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->min_file_size  }}@endif">
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <label for="max_file_size" class="form-label custom-file-label font-size-17">Max File Size</label>
                <input class="form-control custom-file-input" name="max_file_size" type="number" id="max_file_size"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->max_file_size  }}@endif">
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Images</h3>
            </div></h3>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">  
            <div class="mb-3">
                <label for="image_types" class="form-label custom-file-label font-size-17">Image Types</label>
                <input class="form-control custom-file-input" name="image_types" type="text" id="image_types"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->image_types  }}@endif">
                    <div>Image types (ex: jpg,jpeg,gif,png,...)</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="image_quality" class="form-label custom-file-label font-size-17">Image Quality</label>
                @php $ImageQuality = config('upload.image_quality') @endphp
                <select name="image_quality" style="width: 100%"
                    class="image_quality form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                @foreach($ImageQuality as $key=>$iq)
                <option value="{{ $key }}" {{ @$elementdata->image_quality  == $key ? 'selected' : ''}}>{{ $iq }}</option>
                @endforeach
                </select>
                <div>Image quality for JPEG format</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="min_image_size" class="form-label custom-file-label font-size-17">Min Image Size</label>
                <input class="form-control custom-file-input" name="min_image_size" type="number" id="min_image_size"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->min_image_size  }}@endif">
            </div>
            <div></div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="max_image_size" class="form-label custom-file-label font-size-17">Max Image Size</label>
                <input class="form-control custom-file-input" name="max_image_size" type="number" id="max_image_size"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->max_image_size  }}@endif">
                    <div>Max Image Size (in KB)</div>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Images Resize</h3>
            </div></h3>
        </div>
        <div>Default Image Dimensions</div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="img_resize_width" class="form-label custom-file-label font-size-17">Width</label>
                <input class="form-control custom-file-input" name="img_resize_width" type="number" id="img_resize_width"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->img_resize_width  }}@endif">
                    <div>Width (in pixel)</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="img_resize_height" class="form-label custom-file-label font-size-17">Height</label>
                <input class="form-control custom-file-input" name="img_resize_height" type="number" id="img_resize_height"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->img_resize_height  }}@endif">
                    <div>Height (in pixel)</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="img_resize_ratio" value="0">
                    <input type="checkbox" value="1" name="img_resize_ratio" class="form-check-input" style="cursor: pointer;" {{@$elementdata->img_resize_ratio  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Aspect Ratio
                    </label>
                    <div class="form-text">Constraint the current aspect-ratio of the image.</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="img_resize_upsize" value="0">
                    <input type="checkbox" value="1" name="img_resize_upsize" class="form-check-input" style="cursor: pointer;" {{@$elementdata->img_resize_upsize  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        UpSize
                    </label>
                    <div class="form-text">Constraint the current aspect-ratio of the image.</div>
                </div>
            </div>
        </div>
    </div>


    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Logo Dimensions</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="img_resize_logo_width" class="form-label custom-file-label font-size-17">Width</label>
                <input class="form-control custom-file-input" name="img_resize_logo_width" type="number" id="img_resize_logo_width"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->img_resize_logo_width  }}@endif">
                    <div>Width (in pixel)</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="img_resize_logo_height" class="form-label custom-file-label font-size-17">Height</label>
                <input class="form-control custom-file-input" name="img_resize_logo_height" type="number" id="img_resize_logo_height"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->img_resize_logo_height  }}@endif">
                    <div>Height (in pixel)</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="img_resize_logo_ratio" value="0">
                    <input type="checkbox" value="1" name="img_resize_logo_ratio" class="form-check-input" style="cursor: pointer;" {{@$elementdata->img_resize_logo_ratio  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Aspect Ratio
                    </label>
                    <div class="form-text">Constraint the current aspect-ratio of the image.</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="img_resize_logo_upsize" value="0">
                    <input type="checkbox" value="1" name="img_resize_logo_upsize" class="form-check-input" style="cursor: pointer;" {{@$elementdata->img_resize_logo_upsize  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        UpSize
                    </label>
                    <div class="form-text">Constraint the current aspect-ratio of the image.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Categories Icons</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="img_resize_cat_width" class="form-label custom-file-label font-size-17">Width</label>
                <input class="form-control custom-file-input" name="img_resize_cat_width" type="number" id="img_resize_cat_width"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->img_resize_cat_width  }}@endif">
                    <div>Width (in pixel)</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="img_resize_cat_height" class="form-label custom-file-label font-size-17">Height</label>
                <input class="form-control custom-file-input" name="img_resize_cat_height" type="number" id="img_resize_cat_height"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->img_resize_cat_height  }}@endif">
                    <div>Height (in pixel)</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="img_resize_cat_ratio" value="0">
                    <input type="checkbox" value="1" name="img_resize_cat_ratio" class="form-check-input" style="cursor: pointer;" {{@$elementdata->img_resize_cat_ratio  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Aspect Ratio
                    </label>
                    <div class="form-text">Constraint the current aspect-ratio of the image.</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="img_resize_cat_upsize" value="0">
                    <input type="checkbox" value="1" name="img_resize_cat_upsize" class="form-check-input" style="cursor: pointer;" {{@$elementdata->img_resize_cat_upsize  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        UpSize
                    </label>
                    <div class="form-text">Constraint the current aspect-ratio of the image.</div>
                </div>
            </div>
        </div>
    </div>


    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Thumbnails Types</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <h4>A) Small Thumbnails (Listings pictures)</h4>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="img_resize_small_resize_type" class="form-label custom-file-label font-size-17">Type Of Resize</label>
                @php $TypeOfResize = config('upload.type_of_resize') @endphp
                <select name="img_resize_small_resize_type" style="width: 100%"
                    class="img_resize_small_resize_type form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach($TypeOfResize as $key=>$tor)
                    <option value="{{ $key }}" {{ @$elementdata->img_resize_small_resize_type  == $key ? 'selected' : ''}}>{{ $tor }}</option>
                    @endforeach
                </select>
            </div>
            <div>  
                <ul>
                <li><strong>Resize</strong>: Simple resize.</li>
                <li><strong>Fit</strong>: Crop and resize combined.</li>
                <li><strong>ResizeCanvas</strong>: Resize image boundaries.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="img_resize_small_width" class="form-label custom-file-label font-size-17">Width</label>
                <input class="form-control custom-file-input" name="img_resize_small_width" type="number" id="img_resize_small_width"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->img_resize_small_width  }}@endif">
                    <div>Width (in pixel)</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="img_resize_small_height" class="form-label custom-file-label font-size-17">Height</label>
                <input class="form-control custom-file-input" name="img_resize_small_height" type="number" id="img_resize_small_height"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->img_resize_small_height  }}@endif">
                    <div>Height (in pixel)</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="img_resize_small_ratio" value="0">
                    <input type="checkbox" value="1" name="img_resize_small_ratio" class="form-check-input" style="cursor: pointer;" {{@$elementdata->img_resize_small_ratio  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Aspect Ratio
                    </label>
                    <div class="form-text">Constraint the current aspect-ratio of the image.
                        NOTE: Only applied for the resize types: Resize and Fit.</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="img_resize_small_upsize" value="0">
                    <input type="checkbox" value="1" name="img_resize_small_upsize" class="form-check-input" style="cursor: pointer;" {{@$elementdata->img_resize_small_upsize  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        UpSize
                    </label>
                    <div class="form-text">Keep image from being upsized.
                        NOTE: Only applied for the resize types: Resize and Fit.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Position/Anchor</label>
                @php $Position = config('upload.position') @endphp
                <select name="img_resize_small_position" style="width: 100%"
                    class="img_resize_small_position form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach($Position as $key=>$p)
                    <option value="{{ $key }}" {{ @$elementdata->img_resize_small_position  == $key ? 'selected' : ''}}>{{ $p }}</option>
                    @endforeach
                </select>
                <div>Set a position where cutout will be positioned. Or set a point from where the image resizing is going to happen.
                    NOTE: Only applied for the resize types: Fit and ResizeCanvas.</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="img_resize_small_relative" value="0">
                    <input type="checkbox" value="1" name="img_resize_small_relative" class="form-check-input" style="cursor: pointer;" {{@$elementdata->img_resize_small_relative  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Relative
                    </label>
                    <div class="form-text">Determine that the resizing is going to happen in relative mode. Meaning that the values of width or height will be added or substracted from the current height of the image. NOTE: Only applied for the resize type: ResizeCanvas.</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <label for="formFile" class="form-label custom-file-label font-size-17 pt-3 ps-5">BG Color</label>
            <div class="mb-3">
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="img_resize_small_bg_color" value="{{ @$elementdata->img_resize_small_bg_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->img_resize_small_bg_color  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
       <h4>B) Medium Thumbnails (Listings pictures)</h4>
    </div>

    
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="img_resize_medium_resize_type" class="form-label custom-file-label font-size-17">Type Of Resize</label>
                @php $TypeOfResize = config('upload.type_of_resize') @endphp
                <select name="img_resize_medium_resize_type" style="width: 100%"
                    class="img_resize_medium_resize_type form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach($TypeOfResize as $key=>$tor)
                    <option value="{{ $key }}" {{ @$elementdata->img_resize_medium_resize_type  == $key ? 'selected' : ''}}>{{ $tor }}</option>
                    @endforeach
                </select>
            </div>
            <div>  
                <ul>
                <li><strong>Resize</strong>: Simple resize.</li>
                <li><strong>Fit</strong>: Crop and resize combined.</li>
                <li><strong>ResizeCanvas</strong>: Resize image boundaries.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="img_resize_medium_width" class="form-label custom-file-label font-size-17">Width</label>
                <input class="form-control custom-file-input" name="img_resize_medium_width" type="number" id="img_resize_medium_width"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->img_resize_medium_width  }}@endif">
                    <div>Width (in pixel)</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="img_resize_medium_height" class="form-label custom-file-label font-size-17">Height</label>
                <input class="form-control custom-file-input" name="img_resize_medium_height" type="number" id="img_resize_medium_height"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->img_resize_medium_height  }}@endif">
                    <div>Height (in pixel)</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="img_resize_medium_ratio" value="0">
                    <input type="checkbox" value="1" name="img_resize_medium_ratio" class="form-check-input" style="cursor: pointer;" {{@$elementdata->img_resize_medium_ratio  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Aspect Ratio
                    </label>
                    <div class="form-text">Constraint the current aspect-ratio of the image.
                        NOTE: Only applied for the resize types: Resize and Fit.</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="img_resize_medium_upsize" value="0">
                    <input type="checkbox" value="1" name="img_resize_medium_upsize" class="form-check-input" style="cursor: pointer;" {{@$elementdata->img_resize_medium_upsize  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        UpSize
                    </label>
                    <div class="form-text">Keep image from being upsized.
                        NOTE: Only applied for the resize types: Resize and Fit.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="img_resize_medium_position" class="form-label custom-file-label font-size-17">Position/Anchor</label>
                @php $Position = config('upload.position') @endphp
                <select name="img_resize_medium_position" style="width: 100%"
                    class="img_resize_medium_position form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach($Position as $key=>$p)
                    <option value="{{ $key }}" {{ @$elementdata->img_resize_medium_position  == $key ? 'selected' : ''}}>{{ $p }}</option>
                    @endforeach
                </select>
                <div>Set a position where cutout will be positioned. Or set a point from where the image resizing is going to happen.
                    NOTE: Only applied for the resize types: Fit and ResizeCanvas.</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="img_resize_medium_relative" value="0">
                    <input type="checkbox" value="1" name="img_resize_medium_relative" class="form-check-input" style="cursor: pointer;" {{@$elementdata->img_resize_medium_relative  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Relative
                    </label>
                    <div class="form-text">Determine that the resizing is going to happen in relative mode. Meaning that the values of width or height will be added or substracted from the current height of the image. NOTE: Only applied for the resize type: ResizeCanvas.</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <label for="formFile" class="form-label custom-file-label font-size-17 pt-3 ps-5">BG Color</label>
            <div class="mb-3">
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="img_resize_medium_bg_color" value="{{ @$elementdata->img_resize_medium_bg_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->img_resize_medium_bg_color  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <h4>C) Big Thumbnails (Listings pictures)</h4>
     </div>
 
     
     <div class="row">
         <div class="col-md-6">
             <div class="mb-3">
                 <label for="img_resize_big_resize_type" class="form-label custom-file-label font-size-17">Type Of Resize</label>
                 @php $TypeOfResize = config('upload.type_of_resize') @endphp
                 <select name="img_resize_big_resize_type" style="width: 100%"
                     class="img_resize_big_resize_type form-select select2_field select2-hidden-accessible" tabindex="-1"
                     aria-hidden="true">
                     @foreach($TypeOfResize as $key=>$tor)
                     <option value="{{ $key }}" {{ @$elementdata->img_resize_big_resize_type  == $key ? 'selected' : ''}}>{{ $tor }}</option>
                     @endforeach
                 </select>
             </div>
             <div>  
                 <ul>
                 <li><strong>Resize</strong>: Simple resize.</li>
                 <li><strong>Fit</strong>: Crop and resize combined.</li>
                 <li><strong>ResizeCanvas</strong>: Resize image boundaries.</li>
                 </ul>
             </div>
         </div>
     </div>
 
     <div class="row">
         <div class="col-md-6">
             <div class="mb-3">
                 <label for="img_resize_big_width" class="form-label custom-file-label font-size-17">Width</label>
                 <input class="form-control custom-file-input" name="img_resize_big_width" type="number" id="img_resize_big_width"
                     id="customFileUpload"
                     value="@if (isset($elementdata)){{ @$elementdata->img_resize_big_width  }}@endif">
                     <div>Width (in pixel)</div>
             </div>
         </div>
         <div class="col-md-6">
             <div class="mb-3">
                 <label for="img_resize_big_height" class="form-label custom-file-label font-size-17">Height</label>
                 <input class="form-control custom-file-input" name="img_resize_big_height" type="number" id="img_resize_big_height"
                     id="customFileUpload"
                     value="@if (isset($elementdata)){{ @$elementdata->img_resize_big_height  }}@endif">
                     <div>Height (in pixel)</div>
             </div>
         </div>
     </div>
 
     <div class="row">
         <div class="col-md-6">
             <div class="mb-3">
                 <div class="form-check form-switch" style="margin-top: 30px;">
                     <input type="hidden" name="img_resize_big_ratio" value="0">
                     <input type="checkbox" value="1" name="img_resize_big_ratio" class="form-check-input" style="cursor: pointer;" {{@$elementdata->img_resize_big_ratio  == 1 ? 'checked' : ''}}>
                     <label class="form-check-label fw-bolder">
                         Aspect Ratio
                     </label>
                     <div class="form-text">Constraint the current aspect-ratio of the image.
                         NOTE: Only applied for the resize types: Resize and Fit.</div>
                 </div>
             </div>
         </div>
         <div class="col-md-6">
             <div class="mb-3">
                 <div class="form-check form-switch" style="margin-top: 30px;">
                     <input type="hidden" name="img_resize_big_upsize" value="0">
                     <input type="checkbox" value="1" name="img_resize_big_upsize" class="form-check-input" style="cursor: pointer;" {{@$elementdata->img_resize_big_upsize == 1 ? 'checked' : ''}}>
                     <label class="form-check-label fw-bolder">
                         UpSize
                     </label>
                     <div class="form-text">Keep image from being upsized.
                         NOTE: Only applied for the resize types: Resize and Fit.</div>
                 </div>
             </div>
         </div>
     </div>
 
     <div class="row">
         <div class="col-md-4">
             <div class="mb-3">
                 <label for="img_resize_big_position" class="form-label custom-file-label font-size-17">Position/Anchor</label>
                 @php $Position = config('upload.position') @endphp
                 <select name="img_resize_big_position" style="width: 100%"
                     class="img_resize_big_position form-select select2_field select2-hidden-accessible" tabindex="-1"
                     aria-hidden="true">
                     @foreach($Position as $key=>$p)
                     <option value="{{ $key }}" {{ @$elementdata->img_resize_big_position  == $key ? 'selected' : ''}}>{{ $p }}</option>
                     @endforeach
                 </select>
                 <div>Set a position where cutout will be positioned. Or set a point from where the image resizing is going to happen.
                     NOTE: Only applied for the resize types: Fit and ResizeCanvas.</div>
             </div>
         </div>
 
         <div class="col-md-4">
             <div class="mb-3">
                 <div class="form-check form-switch" style="margin-top: 30px;">
                     <input type="hidden" name="img_resize_big_relative" value="0">
                     <input type="checkbox" value="1" name="img_resize_big_relative" class="form-check-input" style="cursor: pointer;" {{@$elementdata->img_resize_big_relative  == 1 ? 'checked' : ''}}>
                     <label class="form-check-label fw-bolder">
                         Relative
                     </label>
                     <div class="form-text">Determine that the resizing is going to happen in relative mode. Meaning that the values of width or height will be added or substracted from the current height of the image. NOTE: Only applied for the resize type: ResizeCanvas.</div>
                 </div>
             </div>
         </div>
 
         <div class="col-md-4">
             <label for="img_resize_big_bg_color" class="form-label custom-file-label font-size-17 pt-3 ps-5">BG Color</label>
             <div class="mb-3">
                 {{-- <input type="text" name="" class="color-select-input"> --}}
                 <input type="text" class="font-color-picker" name="img_resize_big_bg_color" value="{{ @$elementdata->img_resize_big_bg_color  }}" readonly>
                 <span class="color-picker">
                     <label for="colorPicker">
                       <input type="color" value="{{ @$elementdata->img_resize_big_bg_color  }}" class="colorPickerInput">
                     </label>
                 </span>
             </div>
         </div>
     </div>


    <div class="row mt-4">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary ms-3"> Submit</button>
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