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
                    <h3><b>Social Login</b></h3>
                </div>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="social_login_activation" value="0">
                    <input type="checkbox" value="1" name="social_login_activation" class="form-check-input"
                        style="cursor: pointer;"
                        {{ @$elementdata->social_login_activation == 1 ? 'checked' : '' }}>
                    <label class="form-check-label fw-bolder">
                        Enable Social Login
                    </label>
                </div>
            </div>
            <div class="form-text">Allow users to connect via social networks. NOTE: Let empty the fields of a
                social network to disable it (him alone).</div>
        </div>
    </div>

    

    {{-- Facebook --}}
    <div class="row title-setting-element">
        <div class="col-md-6">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Facebook</h4>
            </div>
        </div>
    </div>
    <div class="form-text my-3">Create a Facebook App <a href="https://developers.facebook.com/" target="_blank">here</a>. The "OAuth redirect URI" is: (http:// or https://) yoursite.com/auth/facebook/callback or www.yoursite.com/auth/facebook/callback</div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="facebook_client_id" class="form-label custom-file-label font-size-17">Facebook Client ID</label>
                <input class="form-control custom-file-input" name="facebook_client_id" type="text" id="facebook_client_id"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->facebook_client_id  }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="facebook_client_secret" class="form-label custom-file-label font-size-17">Facebook Client Secret</label>
                <input class="form-control custom-file-input" name="facebook_client_secret" type="text" id="facebook_client_secret"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->facebook_client_secret  }}@endif">
            </div>
        </div>
    </div>

    {{-- Linkedin --}}
    <div class="row title-setting-element">
        <div class="col-md-6">
            <div class="mb-1 col-md-6 mt-5">
                <h4>LinkedIn</h4>
            </div>
        </div>
    </div>
    <div class="form-text my-3">Create a LinkedIn App <a href="https://www.linkedin.com/developer/apps" target="_blank">here</a>. The "OAuth redirect URI" is: (http:// or https://) yoursite.com/auth/linkedin/callback or www.yoursite.com/auth/linkedin/callback</div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="linkedin_client_id" class="form-label custom-file-label font-size-17">LinkedIn Client ID</label>
                <input class="form-control custom-file-input" name="linkedin_client_id" type="text" id="linkedin_client_id"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->linkedin_client_id  }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="linkedin_client_secret" class="form-label custom-file-label font-size-17">LinkedIn Client Secret</label>
                <input class="form-control custom-file-input" name="linkedin_client_secret" type="text" id="linkedin_client_secret"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->linkedin_client_secret  }}@endif">
            </div>
        </div>
    </div>

    {{-- Twitter --}}
    <div class="row title-setting-element">
        <div class="col-md-6">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Twitter</h4>
            </div>
        </div>
    </div>
    <div class="form-text my-3">Create a Twitter App <a href="https://apps.twitter.com/" target="_blank">here</a>. The "OAuth redirect URI" is: (http:// or https://) yoursite.com/auth/twitter/callback or www.yoursite.com/auth/twitter/callback</div>
    <div class="form-text my-3">NOTE: Before configuring your Twitter app in the script, you have to change its Permissions (on developer.twitter.com) by enabling the "Request email address from users" option.</div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="twitter_client_id" class="form-label custom-file-label font-size-17">Twitter Client ID</label>
                <input class="form-control custom-file-input" name="twitter_client_id" type="text" id="twitter_client_id"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->twitter_client_id  }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="twitter_client_secret" class="form-label custom-file-label font-size-17">Twitter Client Secret</label>
                <input class="form-control custom-file-input" name="twitter_client_secret" type="text" id="twitter_client_secret"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->twitter_client_secret  }}@endif">
            </div>
        </div>
    </div>

    {{-- Google --}}
    <div class="row title-setting-element">
        <div class="col-md-6">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Google</h4>
            </div>
        </div>
    </div>
    <div class="form-text my-3">Configure your Google console <a href="https://console.developers.google.com/" target="_blank">here</a>. The "Authorized Redirect URI" is: (http:// or https://) yoursite.com/auth/google/callback or www.yoursite.com/auth/google/callback</div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="google_client_id" class="form-label custom-file-label font-size-17">Google Client ID</label>
                <input class="form-control custom-file-input" name="google_client_id" type="text" id="google_client_id"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->google_client_id  }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="google_client_secret" class="form-label custom-file-label font-size-17">Google Client Secret</label>
                <input class="form-control custom-file-input" name="google_client_secret" type="text" id="google_client_secret"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->google_client_secret  }}@endif">
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary ms-3"> Submit </button>
        </div>
    </div>
</form>
