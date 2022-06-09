<form action="@if(isset($elementdata)){{ route('admin.setting.element.put',['elementupdate' => $element]) }}@else{{ route('admin.setting.element.store',['element' => $element]) }}@endif" method="post" enctype="multipart/form-data">
    @csrf
    {{-- @if(isset($elementdata)) @method('PUT')@endif --}}
    <input type="hidden" name="name" value="{{ $element }}">
    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Phone Varification</h3>
            </div></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="enable_verification" class="form-label custom-file-label font-size-17">Enable Verification</label>
                <select name="enable_verification" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                        <option value="yes" {{ @$elementdata->enable_verification == 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ @$elementdata->enable_verification == 'no' ? 'selected' : '' }}>No</option>
                </select>
                <div class="form-text">Enable or disable phone verification</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="service_sid" class="form-label custom-file-label font-size-17">Service SID</label>
                <input class="form-control custom-file-input" name="service_sid" type="text" id="service_sid"
                    value="@if (isset($elementdata)){{ @$elementdata->service_sid }}@endif">
                <div class="form-text">Input your Twilio Service SID. To create new service visit this link https://www.twilio.com/console/verify/dashboard</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="account_sid" class="form-label custom-file-label font-size-17">Account SID</label>
                <input class="form-control custom-file-input" name="account_sid" type="text" id="account_sid"
                    value="@if (isset($elementdata)){{ @$elementdata->account_sid }}@endif">
                <div class="form-text">Input your Twilio Account SID. This info can be found here https://www.twilio.com/console/project/settings</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="auth_token" class="form-label custom-file-label font-size-17">Auth Token</label>
                <input class="form-control custom-file-input" name="auth_token" type="text" id="auth_token"
                    value="@if (isset($elementdata)){{ @$elementdata->auth_token }}@endif">
                <div class="form-text">Input your Twilio Auth Token. This info can be found here https://www.twilio.com/console/project/settings</div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary ms-3"> Submit</button>
        </div>
    </div>
</form>  