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
                    <h3><b>Others</b></h3>
                </div>
            </h3>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Alerts Boxes (Cookie Consent, Tips, etc.)</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="cookie_consent_enabled" value="0">
                    <input type="checkbox" value="1" name="cookie_consent_enabled" class="form-check-input"
                        style="cursor: pointer;" {{ @$elementdata->cookie_consent_enabled == 1 ? 'checked' : '' }}>
                    <label class="form-check-label fw-bolder">Cookie Consent Enabled</label>
                    <div class="form-text">Enable Cookie Consent Alert to comply for EU law.</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="show_tips_messages" value="0">
                    <input type="checkbox" value="1" name="show_tips_messages" class="form-check-input"
                        style="cursor: pointer;" {{ @$elementdata->show_tips_messages == 1 ? 'checked' : '' }}>
                    <label class="form-check-label fw-bolder">Show Tips Notification Messages</label>
                    <div class="form-text">e.g. SITENAME is also available in your country: COUNTRY. Starting good deals here now!<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login for faster access to the best deals. Click here if you do not have an account.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Google Maps</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="googlemaps_key" class="form-label custom-file-label font-size-17">Google Maps Key</label>
                <input class="form-control custom-file-input" name="googlemaps_key" type="text" id="googlemaps_key"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->googlemaps_key  }}@endif">
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Chat (Messenger)</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="timer_new_messages_checking" class="form-label custom-file-label font-size-17">Timer for New Messages Checking</label>
                <input class="form-control custom-file-input" name="timer_new_messages_checking" type="text" id="timer_new_messages_checking"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->timer_new_messages_checking  }}@endif">
                    <div class="form-text">Timer (in milliseconds). Enter multiple of <code>1000</code>. Or enter <code>0</code> to disable the auto-checking feature.</div>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Textarea Editor (for Pages)</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="wysiwyg_editor" class="form-label custom-file-label font-size-17">Allow a WYSIWYG Editor</label>
                @php $RecaptchVersion = config('other.wysiwyg_editor') @endphp
                <select name="wysiwyg_editor" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach ($RecaptchVersion as $key => $rv)
                        <option value="{{ $key }}"
                            {{ @$elementdata->wysiwyg_editor == $key ? 'selected' : '' }}>{{ $rv }}</option>
                    @endforeach
                </select>
                <div class="form-text">This need to be disabled to activate other WYSIWYG Editor.</div>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Mobile Apps URLs</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="ios_app_url" class="form-label custom-file-label font-size-17">App Store</label>
                <input class="form-control custom-file-input" name="ios_app_url" type="text" id="ios_app_url"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->ios_app_url  }}@endif">
                    <div class="form-text">Available on the App Store with the given URL</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="android_app_url" class="form-label custom-file-label font-size-17">Google Play</label>
                <input class="form-control custom-file-input" name="android_app_url" type="text" id="android_app_url"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->android_app_url}}@endif">
                    <div class="form-text">Available on Google Play with the given URL</div>
            </div>
        </div>
    </div>
    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Number Format</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="decimals_superscript" value="0">
                    <input type="checkbox" value="1" name="decimals_superscript" class="form-check-input"
                        style="cursor: pointer;" {{ @$elementdata->decimals_superscript == 1 ? 'checked' : '' }}>
                    <label class="form-check-label fw-bolder">Decimals Superscript</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Cookies</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="cookie_expiration" class="form-label custom-file-label font-size-17">Cookie Expiration Time</label>
                <input class="form-control custom-file-input" name="cookie_expiration" type="number" id="cookie_expiration"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->cookie_expiration  }}@endif">
                    <div class="form-text">Cookie Expiration Time (in minutes)</div>
            </div>
        </div>
    </div>
    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>JavaScript (in the &lt;head&gt; section)</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formFile"
                    class="form-label custom-file-label font-size-17">JavaScript Code</label>
                <textarea class="form-control" name="js_code" id="js_code"  cols="100" rows="10" >@if (isset($elementdata)){{ @$elementdata->js_code }}@endif</textarea>
            </div>  
        </div>
        <div class="form-text">Paste your JavaScript code here to put it in the &lt;head&gt; section of HTML pages.</div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary ms-3"> Submit </button>
        </div>
    </div>
</form>
