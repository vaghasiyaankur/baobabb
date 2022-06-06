<form action="@if(isset($elementdata)){{ route('admin.setting.element.put',['elementupdate' => $element]) }}@else{{ route('admin.setting.element.store',['element' => $element]) }}@endif" method="post" enctype="multipart/form-data">
    @csrf
    {{-- @if(isset($elementdata)) @method('PUT') @endif --}}
    <input type="hidden" name="name" value="{{ $element }}">
    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Front-End</h3>
            </div></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Front Skin</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="skin" value="{{ @$elementdata->skin  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->skin }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Custom Skin Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="custom_skin_color" value="{{ @$elementdata->custom_skin_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->custom_skin_color  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Global</h3>
            </div></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Body Background Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="body_background_color" value="{{ @$elementdata->body_background_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->body_background_color }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Body Text Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="body_text_color" value="{{ @$elementdata->body_text_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->body_text_color  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="image" class="form-label custom-file-label font-size-17">Body Background Image</label>
                @if(@$elementdata->body_background_image)
                <input type="hidden" name="body_background_image" value="{{@$elementdata->body_background_image}}" id="body-background-image-update">
                @endif
                <input class="form-control custom-file-input"  name="body_background_image" type="file" id="body-background-image" id="customFileUpload" value="{{@$elementdata->body_background_image}}">
              </div>
              <div class="form_right_img text-center mb-4">
                <img src="{{ @$elementdata->body_background_image  ? asset(@$elementdata->body_background_image) : asset('assets/images/brand_add_new1.jpg') }}" style="border-radius: 10px; max-height:200px;" id="body-background-view" class="form_img" alt="brand image">
             </div>
        </div>
    </div>

     <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="body_background_image_fixed" value="0">
                    <input type="checkbox" value="1" name="body_background_image_fixed" class="form-check-input" style="cursor: pointer;" {{@$elementdata->body_background_image_fixed  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Body Background Image Fixed
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Page Width</label>
                <input class="form-control custom-file-input" name="page_width" type="number" id="page_width"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->page_width  }}@endif">
            </div>
        </div>

     </div>

     <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Titles Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="title_color" value="{{ @$elementdata->title_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->title_color }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Progress Background Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="progress_background_color" value="{{ @$elementdata->progress_background_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->progress_background_color  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Links Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="link_color" value="{{ @$elementdata->link_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->link_color }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Links Color (Hover)</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="link_color_hover" value="{{ @$elementdata->link_color_hover  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->link_color_hover  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Header</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="header_sticky" value="0">
                    <input type="checkbox" value="1" name="header_sticky" class="form-check-input" style="cursor: pointer;" {{@$elementdata->header_sticky  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Header Sticky
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Header Height</label>
                <input class="form-control custom-file-input" name="header_height" type="number" id="header_height"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->header_height  }}@endif">
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Header Background Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="header_background_color" value="{{ @$elementdata->header_background_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->header_background_color  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Header Bottom Border Width</label>
                <input class="form-control custom-file-input" name="header_bottom_border_width" type="number" id="header_bottom_border_width"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->header_bottom_border_width  }}@endif">
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Header Bottom Border Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="header_bottom_border_color" value="{{ @$elementdata->header_bottom_border_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->header_bottom_border_color  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Header Links Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="header_link_color" value="{{ @$elementdata->header_link_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->header_link_color }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Header Links Color (Hover)</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="header_link_color_hover" value="{{ @$elementdata->header_link_color_hover  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->header_link_color_hover  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Logo</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Logo Width</label>
                <input class="form-control custom-file-input" name="logo_width" type="number" id="logo_width"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->logo_width  }}@endif">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Logo Height</label>
                <input class="form-control custom-file-input" name="logo_height" type="number" id="logo_height"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->logo_height  }}@endif">
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="logo_aspect_ratio" value="0">
                    <input type="checkbox" value="1" name="logo_aspect_ratio" class="form-check-input" style="cursor: pointer;" {{@$elementdata->logo_aspect_ratio  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Logo Aspect Ratio
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Footer</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Footer Background Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="footer_background_color" value="{{ @$elementdata->footer_background_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->footer_background_color }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Footer Text Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="footer_text_color" value="{{ @$elementdata->footer_text_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->footer_text_color  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Footer Titles Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="footer_title_color" value="{{ @$elementdata->footer_title_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->footer_title_color }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Footer Links Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="footer_link_color" value="{{ @$elementdata->footer_link_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->footer_link_color }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Footer Links Color (Hover)</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="footer_link_color_hover" value="{{ @$elementdata->footer_link_color_hover  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->footer_link_color_hover  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Payment Methods Icons Top Border Width</label>
                <input class="form-control custom-file-input" name="payment_icon_top_border_width" type="number" id="payment_icon_top_border_width"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->payment_icon_top_border_width  }}@endif">
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Payment Methods Icons Top Border Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="payment_icon_top_border_color" value="{{ @$elementdata->payment_icon_top_border_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->payment_icon_top_border_color  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Payment Methods Icons Bottom Border Width</label>
                <input class="form-control custom-file-input" name="payment_icon_bottom_border_width" type="number" id="payment_icon_bottom_border_width"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->payment_icon_bottom_border_width  }}@endif">
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Payment Methods Icons Bottom Border Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="payment_icon_bottom_border_color" value="{{ @$elementdata->payment_icon_bottom_border_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->payment_icon_bottom_border_color  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Gradient Background Top Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="btn_listing_bg_top_color" value="{{ @$elementdata->btn_listing_bg_top_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->btn_listing_bg_top_color }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Gradient Background Bottom Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="btn_listing_bg_bottom_color" value="{{ @$elementdata->btn_listing_bg_bottom_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->btn_listing_bg_bottom_color  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Button Border Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="btn_listing_border_color" value="{{ @$elementdata->btn_listing_border_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->btn_listing_border_color }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Button Text Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="btn_listing_text_color" value="{{ @$elementdata->btn_listing_text_color  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->btn_listing_text_color  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Gradient Background Top Color (Hover)</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="btn_listing_bg_top_color_hover" value="{{ @$elementdata->btn_listing_bg_top_color_hover  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->btn_listing_bg_top_color_hover }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Gradient Background Bottom Color (Hover)</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="btn_listing_bg_bottom_color_hover" value="{{ @$elementdata->btn_listing_bg_bottom_color_hover  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->btn_listing_bg_bottom_color_hover  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Button Border Color (Hover)</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="btn_listing_border_color_hover" value="{{ @$elementdata->btn_listing_border_color_hover  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->btn_listing_border_color_hover }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Button Text Color (Hover)</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="btn_listing_text_color_hover" value="{{ @$elementdata->btn_listing_text_color_hover  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->btn_listing_text_color_hover  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Raw CSS (Optional)</h3>
                
            </div></h3>
            <p>You can also add raw CSS to customize your website style by using the field below.
                If you want to add a large CSS code, you have to use the /public/css/custom.css file.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile"
                    class="form-label custom-file-label font-size-17">Custom Css</label>
                <textarea name="custom_css" id="custom_css"  cols="100" rows="10" > @if (isset($elementdata)) {{ @$elementdata->custom_css }} @endif</textarea>
            </div>  
        </div>
        <div class="form-text">Please <strong>do not</strong> include the &lt;style&gt; tags.</div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Admin Panel</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="image" class="form-label custom-file-label font-size-17">Login Page Background Image</label>
                @if(@$elementdata->login_bg_image)
                <input type="hidden" name="login_bg_image" value="{{@$elementdata->login_bg_image}}" id="login-background-image-update">
                @endif
                <input class="form-control custom-file-input"  name="login_bg_image" type="file" id="login-background-image" id="customFileUpload" value="{{@$elementdata->login_bg_image}}">
              </div>
              <div class="form_right_img text-center mb-4">
                <img src="{{ @$elementdata->login_bg_image  ? asset(@$elementdata->login_bg_image) : asset('assets/images/brand_add_new1.jpg') }}" style="border-radius: 10px; max-height:200px;" id="login-background-view" class="form_img" alt="brand image">
             </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Logo Background Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="admin_logo_bg" value="{{ @$elementdata->admin_logo_bg  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->admin_logo_bg }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">NavBar Background Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="admin_navbar_bg" value="{{ @$elementdata->admin_navbar_bg  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->admin_navbar_bg  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Sidebar Type</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="admin_sidebar_type" value="{{ @$elementdata->admin_sidebar_type  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->admin_sidebar_type }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Sidebar Background Color</label>
                {{-- <input type="text" name="" class="color-select-input"> --}}
                <input type="text" class="font-color-picker" name="admin_sidebar_bg" value="{{ @$elementdata->admin_sidebar_bg  }}" readonly>
                <span class="color-picker">
                    <label for="colorPicker">
                      <input type="color" value="{{ @$elementdata->admin_sidebar_bg  }}" class="colorPickerInput">
                    </label>
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="admin_sidebar_position" value="0">
                    <input type="checkbox" value="1" name="admin_sidebar_position" class="form-check-input" style="cursor: pointer;" {{@$elementdata->admin_sidebar_position  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Sidebar Position
                    </label>
                </div>
            </div>
            <div class="form-text">Checked means Fixed and Unchecked means absolute</div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="admin_header_position" value="0">
                    <input type="checkbox" value="1" name="admin_header_position" class="form-check-input" style="cursor: pointer;" {{@$elementdata->admin_header_position  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Header Position
                    </label>
                </div>
            </div>
            <div class="form-text">Checked means Fixed and Unchecked means absolute</div>
        </div>
    </div>

     <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="admin_boxed_layout" value="0">
                    <input type="checkbox" value="1" name="admin_boxed_layout" class="form-check-input" style="cursor: pointer;" {{@$elementdata->admin_boxed_layout  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Boxed Layout
                    </label>
                </div>
            </div>
            <div class="form-text">Checked means Boxed and Unchecked means Fluid</div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="admin_dark_theme" value="0">
                    <input type="checkbox" value="1" name="admin_dark_theme" class="form-check-input" style="cursor: pointer;" {{@$elementdata->admin_dark_theme  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Admin Dark Mode
                    </label>
                </div>
            </div>
            <div class="form-text">Checked means dark and Unchecked means light</div>
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