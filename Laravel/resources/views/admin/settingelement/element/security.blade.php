<form action="@if(isset($elementdata)){{ route('admin.setting.element.put',['elementupdate' => $element]) }}@else{{ route('admin.setting.element.store',['element' => $element]) }}@endif" method="post" enctype="multipart/form-data">
    @csrf
    {{-- @if(isset($elementdata)) @method('PUT')@endif --}}
    <input type="hidden" name="name" value="{{ $element }}">
    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>CSRF Protection</h3>
            </div></h3>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="csrf_protection" value="0">
                    <input type="checkbox" value="1" name="csrf_protection" class="form-check-input" style="cursor: pointer;" {{@$elementdata->csrf_protection  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Enable CSRF Protection
                    </label>
                    <div class="form-text">Preventing CSRF Requests. More information <a href="https://laravel.com/docs/master/csrf" target="_blank">here</a>.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Captcha</h3>
            </div></h3>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="captcha" class="form-label custom-file-label font-size-17">Options</label>
                @php $CaptchaOption = config('security.captcha_option') @endphp
                <select name="captcha" style="width: 100%"
                    class="captcha form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach($CaptchaOption as $key=>$co)
                    <option value="{{ $key }}" {{ @$elementdata->captcha  == $key ? 'selected' : ''}}>{{ $co }}</option>
                    @endforeach
                </select>
                <div class="mb-3 col-md-12 recaptcha" style="display: block;">
                    Get reCAPTCHA site keys <a href="https://www.google.com/recaptcha/" target="_blank">here</a>.
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="recaptcha_version" class="form-label custom-file-label font-size-17">reCAPTCHA Version</label>
                @php $RecaptchVersion = config('security.recaptch_version') @endphp
                <select name="recaptcha_version" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach($RecaptchVersion as $key=>$rv)
                    <option value="{{ $key }}" {{ @$elementdata->recaptcha_version  == $key ? 'selected' : ''}}>{{ $rv }}</option>
                    @endforeach
                </select>
                <div class="form-text">Supported: "v2 (Checkbox)", "v3". Get more info <a href="https://developers.google.com/recaptcha/docs/versions" target="_blank">here</a>.
                    <br><strong>Warning:</strong> By selecting the v3, you have to check browser compatibility... The "fetch()" function has compatibility issues with some browser like IE.</div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">  
            <div class="mb-3">
                <label for="recaptcha_v2_site_key" class="form-label custom-file-label font-size-17">reCAPTCHA (v2) Site Key</label>
                <input class="form-control custom-file-input" name="recaptcha_v2_site_key" type="text" id="recaptcha_v2_site_key"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->recaptcha_v2_site_key  }}@endif">
            </div>
        </div>
        <div class="col-md-6">  
            <div class="mb-3">
                <label for="recaptcha_v2_secret_key" class="form-label custom-file-label font-size-17">reCAPTCHA (v2) Secret Key</label>
                <input class="form-control custom-file-input" name="recaptcha_v2_secret_key" type="text" id="recaptcha_v2_secret_key"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->recaptcha_v2_secret_key  }}@endif">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="recaptcha_skip_ips"
                    class="form-label custom-file-label font-size-17">reCAPTCHA Skip IPs</label>
                <textarea class="form-control" name="recaptcha_skip_ips" id="recaptcha_skip_ips"  cols="50" rows="5" >@if (isset($elementdata)){{ @$elementdata->recaptcha_skip_ips }}@endif</textarea>
                <div class="form-text">The reCAPTCHA challenge will be not taken account for these IPs address.
                    Enter one IP address per line or separate them by comma, semicolon or space.</div>
            </div>  
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Login</h3>
            </div></h3>
        </div>
    </div>

   <div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <div class="form-check form-switch" style="margin-top: 30px;">
                <input type="hidden" name="login_open_in_modal" value="0">
                <input type="checkbox" value="1" name="login_open_in_modal" class="form-check-input" style="cursor: pointer;" {{@$elementdata->login_open_in_modal  == 1 ? 'checked' : ''}}>
                <label class="form-check-label fw-bolder">
                    Open In Modal
                </label>
                <div class="form-text">Open the top login link into Modal</div>
            </div>
        </div>
    </div>
   </div>

   <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="login_max_attempts" class="form-label custom-file-label font-size-17">Max Attempts</label>
                @php $MaxAttempts = config('security.max_attempts') @endphp
                <select name="login_max_attempts" style="width: 100%"
                    class="login_max_attempts form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach($MaxAttempts as $key=>$ma)
                    <option value="{{ $key }}" {{ @$elementdata->login_max_attempts  == $key ? 'selected' : ''}}>{{ $ma }}</option>
                    @endforeach
                </select>
                <div class="form-text">The maximum number of attempts to allow</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="login_decay_minutes" class="form-label custom-file-label font-size-17">Decay Minutes</label>
                @php $DecayMinutes = config('security.decay_minutes') @endphp
                <select name="login_decay_minutes" style="width: 100%"
                    class="login_decay_minutes form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach($DecayMinutes as $key=>$dm)
                    <option value="{{ $key }}" {{ @$elementdata->login_decay_minutes  == $key ? 'selected' : ''}}>{{ $dm }}</option>
                    @endforeach
                </select>
                <div class="form-text">The number of minutes to throttle for</div>
            </div>
        </div>
    </div>  

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Password (Validator)</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="password_min_length" class="form-label custom-file-label font-size-17">Minimum characters</label>
                <input class="form-control custom-file-input" name="password_min_length" type="number" id="password_min_length"
                    id="customFileUpload"   min="0" step="1" max="100"
                    value="@if (isset($elementdata)){{ @$elementdata->password_min_length  }}@else 6 @endif">
                    <div>Minimum characters required. Default is 6.</div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="password_max_length" class="form-label custom-file-label font-size-17">Maximum characters</label>
                <input class="form-control custom-file-input" name="password_max_length" type="number" id="password_max_length"
                    id="customFileUpload" min="0" step="1" max="100"
                    value="@if (isset($elementdata)){{ @$elementdata->password_max_length  }}@else 60 @endif">
                    <div>Maximum characters required. Default is 60.</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="password_letters_required" value="0">
                    <input type="checkbox" value="1" name="password_letters_required" class="form-check-input" style="cursor: pointer;" {{@$elementdata->password_letters_required  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Letters
                    </label>
                    <div class="form-text">Require at least one letter...</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="password_mixedCase_required" value="0">
                    <input type="checkbox" value="1" name="password_mixedCase_required" class="form-check-input" style="cursor: pointer;" {{@$elementdata->password_mixedCase_required  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Mixed Case
                    </label>
                    <div class="form-text">Require at least one uppercase and one lowercase letter...</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="password_numbers_required" value="0">
                    <input type="checkbox" value="1" name="password_numbers_required" class="form-check-input" style="cursor: pointer;" {{@$elementdata->password_numbers_required  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Numbers
                    </label>
                    <div class="form-text">Require at least one letter...</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="password_symbols_required" value="0">
                    <input type="checkbox" value="1" name="password_symbols_required" class="form-check-input" style="cursor: pointer;" {{@$elementdata->password_symbols_required  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Symbols
                    </label>
                    <div class="form-text">Require at least one symbol...</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="password_uncompromised_required" value="0">
                    <input type="checkbox" value="1" name="password_uncompromised_required" class="form-check-input" style="cursor: pointer;" {{@$elementdata->password_uncompromised_required  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Uncompromised
                    </label>
                    <div class="form-text">Internally, the Password rule object uses the <a href="https://en.wikipedia.org/wiki/K-anonymity" target="_blank">k-Anonymity</a> model to determine if a password has been leaked via the <a href="https://haveibeenpwned.com/" target="_blank">haveibeenpwned.com</a> service without sacrificing the user's privacy or security. By default, if a password appears at least once in a data leak, it will be considered compromised. You can customize this threshold in the <code>Uncompromised Threshold</code> field.</div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="password_uncompromised_threshold" class="form-label custom-file-label font-size-17">Uncompromised Threshold</label>
                <input class="form-control custom-file-input" name="password_uncompromised_threshold" type="number" id="password_uncompromised_threshold"
                    id="customFileUpload"  min="0" step="1" max="10"
                    value="@if (isset($elementdata)){{ @$elementdata->password_uncompromised_threshold  }}@else 0 @endif">
                    <div>Number of time less than which the password can be appeared in the same data leak.</div>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Email Addresses (Validator)</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="email_validator_rfc" value="0">
                    <input type="checkbox" value="1" name="email_validator_rfc" class="form-check-input" style="cursor: pointer;" {{@$elementdata->email_validator_rfc  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        RFC
                    </label>
                    <div class="form-text">Uses standard RFC-like email validation.</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="email_validator_strict" value="0">
                    <input type="checkbox" value="1" name="email_validator_strict" class="form-check-input" style="cursor: pointer;" {{@$elementdata->email_validator_strict  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Strict
                    </label>
                    <div class="form-text">Uses RFC-like validation that will fail when warnings* are found.</div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="email_validator_dns" value="0">
                    <input type="checkbox" value="1" name="email_validator_dns" class="form-check-input" style="cursor: pointer;" {{@$elementdata->email_validator_dns  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        DNS
                    </label>
                    <div class="form-text">Will check if there are DNS records that signal that the server accepts emails. This does not entail that the email exists. NOTE: Requires the PHP <code>intl</code> extension.</div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="email_validator_spoof" value="0">
                    <input type="checkbox" value="1" name="email_validator_spoof" class="form-check-input" style="cursor: pointer;" {{@$elementdata->email_validator_spoof  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Spoof
                    </label>
                    <div class="form-text">Will check for multi-utf-8 chars that can signal an erroneous email name. NOTE: Requires the PHP <code>intl</code> extension.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="email_validator_filter" value="0">
                    <input type="checkbox" value="1" name="email_validator_filter" class="form-check-input" style="cursor: pointer;" {{@$elementdata->email_validator_filter  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Filter
                    </label>
                    <div class="form-text">Uses PHP's <code>filter_var()</code> function.</div>
                </div>
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