<form action="@if(isset($elementdata)){{ route('admin.setting.element.put',['elementupdate' => $element]) }}@else{{ route('admin.setting.element.store',['element' => $element]) }}@endif" method="post" enctype="multipart/form-data">
    @csrf
    {{-- @if(isset($elementdata)) @method('PUT') @endif --}}
    <input type="hidden" name="name" value="{{ $element }}">
    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Publication</h3>
            </div></h3>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Form Type</label>
                @php $FormType = config('single.form_type') @endphp
                <select name="publication_form_type" style="width: 100%"
                    class="publication_form_type form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach($FormType as $key=>$ft)
                    <option value="{{ $key }}" {{ @$elementdata->publication_form_type  == $key ? 'selected' : ''}}>{{ $ft }}</option>
                    @endforeach
                </select>
            </div>
            <div>By selecting the "Single Step Form", the picture field can be mandatory or not.</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Title Min Length</label>
                <input class="form-control custom-file-input" name="title_min_length" type="number" id="title_min_length"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->title_min_length  }}@endif">
            </div>
        </div>
        <div class="col-md-2">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Title Max Length</label>
                <input class="form-control custom-file-input" name="title_max_length" type="number" id="title_max_length"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->title_max_length  }}@endif">
            </div>
        </div>
        <div class="col-md-2">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Description Min Length</label>
                <input class="form-control custom-file-input" name="description_min_length" type="number" id="description_min_length"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->description_min_length  }}@endif">
            </div>
        </div>
        <div class="col-md-2">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Description Max Length</label>
                <input class="form-control custom-file-input" name="description_max_length" type="number" id="description_max_length"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->description_max_length  }}@endif">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="picture_mandatory" value="0">
                    <input type="checkbox" value="1" name="picture_mandatory" class="form-check-input" style="cursor: pointer;" {{@$elementdata->picture_mandatory  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Make the picture field mandatory
                    </label>
                </div>
            </div>
            <div class="form-text">By enabling this option, at least one picture in the pictures field will be mandatory.</div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Pictures Limit</label>
                <input class="form-control custom-file-input" name="pictures_limit" type="number" id="pictures_limit"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->pictures_limit  }}@endif">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Tags Limit</label>
                <input class="form-control custom-file-input" name="tags_limit" type="number" id="tags_limit"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->tags_limit  }}@endif">
            </div>
            <div>NOTE: The 'tags' column type in the 'posts' table is: TEXT</div>
        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Tags Min Length</label>
                <input class="form-control custom-file-input" name="tags_min_length" type="number" id="tags_min_length"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->tags_min_length  }}@endif">
            </div>
            <div>Minimum length for each tag.</div>
        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Tags Max Length</label>
                <input class="form-control custom-file-input" name="tags_max_length" type="number" id="tags_max_length"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->tags_max_length  }}@endif">
            </div>
        </div>
        <div>Minimum length for each tag.</div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="guests_can_post_listings" value="0">
                    <input type="checkbox" value="1" name="guests_can_post_listings" class="form-check-input" style="cursor: pointer;" {{@$elementdata->guests_can_post_listings  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Allow Guests to post Listings
                    </label>
                </div>
            </div>
            <div class="form-text">Allow guests to post listings. If unchecked, only registered users can post listings.</div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="listings_review_activation" value="0">
                    <input type="checkbox" value="1" name="listings_review_activation" class="form-check-input" style="cursor: pointer;" {{@$elementdata->listings_review_activation  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Allow listings to be reviewed by Admins
                    </label>
                </div>
            </div>
            <div class="form-text">If enabled, all new listings will need to be approved by an admin user before going to public.</div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Allow Permanent Listings</label>
                @php $AllowPermanentListening = config('single.allow_permanent_listings') @endphp
                <select name="permanent_listings_enabled" style="width: 100%"
                    class="permanent_listings_enabled form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach($AllowPermanentListening as $key=>$apl)
                    <option value="{{ $key }}" {{ @$elementdata->permanent_listings_enabled  == $key ? 'selected' : ''}}>{{ $apl }}</option>
                    @endforeach
                </select>
            </div>
            <div>Permanent listings can not be cleared (removed) automatically by the cron job after global expiration time.</div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Pricing Page</label>
                @php $PricingPage = config('single.pricing_page') @endphp
                <select name="pricing_page_enabled" style="width: 100%"
                    class="pricing_page_enabled form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach($PricingPage as $key=>$pp)
                    <option value="{{ $key }}" {{ @$elementdata->pricing_page_enabled  == $key ? 'selected' : ''}}>{{ $pp }}</option>
                    @endforeach
                </select>
            </div>
            <div>Before enabling the Pricing Page you need to have at least one Package and one Payment Method activated.</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="allow_emojis" value="0">
                    <input type="checkbox" value="1" name="allow_emojis" class="form-check-input" style="cursor: pointer;" {{@$elementdata->allow_emojis  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Allow Emojis
                    </label>
                </div>
            </div>
            <div class="form-text">Allow Emojis in listings' title and description.</div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="show_listing_types" value="0">
                    <input type="checkbox" value="1" name="show_listing_types" class="form-check-input" style="cursor: pointer;" {{@$elementdata->show_listing_types  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Show Listings Types
                    </label>
                </div>
            </div>
            <div class="form-text">Show Listings Types in Listing creation/edition forms and in search results pages.</div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="enable_post_uniqueness" value="0">
                    <input type="checkbox" value="1" name="enable_post_uniqueness" class="form-check-input" style="cursor: pointer;" {{@$elementdata->enable_post_uniqueness  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Enable Listing Uniqueness By User
                    </label>
                </div>
            </div>
            <div class="form-text">Enable listing uniqueness by logged user. This option prevent listing title duplication by logged user.</div>
        </div>
    </div>


    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Guests Auto Registration</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Auto Registration Options</label>
                @php $AutoRegistrationOptions = config('single.auto_registration_options') @endphp
                <select name="auto_registration" style="width: 100%"
                    class="auto_registration form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach($AutoRegistrationOptions as $key=>$aro)
                    <option value="{{ $key }}" {{ @$elementdata->auto_registration  == $key ? 'selected' : ''}}>{{ $aro }}</option>
                    @endforeach
                </select>
            </div>
            <div>Enable or Disable auto-registration option by submitting the listing form.</div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Edition</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">WYSIWYG Editor</label>
                @php $wysiwygEditor = config('single.allow_a_WYSIWYG_editor') @endphp
                <select name="wysiwyg_editor" style="width: 100%"
                    class="wysiwyg_editor form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach($wysiwygEditor as $key=>$we)
                    <option value="{{ $key }}" {{ @$elementdata->wysiwyg_editor  == $key ? 'selected' : ''}}>{{ $we }}</option>
                    @endforeach
                </select>
            </div>
            <div>This need to be disabled to activate other WYSIWYG Editor.</div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Remove Links and URLs</h3>
            </div></h3>
        </div>
        <p>Remove all links and URLs from the description. Note: This will not apply for admin users content.</p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="remove_url_before" value="0">
                    <input type="checkbox" value="1" name="remove_url_before" class="form-check-input" style="cursor: pointer;" {{@$elementdata->remove_url_before  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Before the content saving
                    </label>
                </div>
            </div>
            <div class="form-text">Remove the elements during the form sending.</div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="remove_url_after" value="0">
                    <input type="checkbox" value="1" name="remove_url_after" class="form-check-input" style="cursor: pointer;" {{@$elementdata->remove_url_after  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        During the content rendering
                    </label>
                </div>
            </div>
            <div class="form-text">Remove the elements during the content rendering.</div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Remove Email Addresses</h3>
            </div></h3>
        </div>
        <p>Remove all email addresses from the description. Note: This will not apply for admin users content.</p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="remove_email_before" value="0">
                    <input type="checkbox" value="1" name="remove_email_before" class="form-check-input" style="cursor: pointer;" {{@$elementdata->remove_email_before  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Before the content saving
                    </label>
                </div>
            </div>
            <div class="form-text">Remove the elements during the form sending.</div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="remove_email_after" value="0">
                    <input type="checkbox" value="1" name="remove_email_after" class="form-check-input" style="cursor: pointer;" {{@$elementdata->remove_email_after  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        During the content rendering
                    </label>
                </div>
            </div>
            <div class="form-text">Remove the elements during the content rendering.</div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Remove Phone Numbers (Experimental)</h3>
            </div></h3>
        </div>
        <p>Remove all phone numbers from the description. This is an experimental feature, so don't expect a foolproof result. Note: This will not apply for admin users content.</p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="remove_phone_before" value="0">
                    <input type="checkbox" value="1" name="remove_phone_before" class="form-check-input" style="cursor: pointer;" {{@$elementdata->remove_phone_before  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Before the content saving
                    </label>
                </div>
            </div>
            <div class="form-text">Remove the elements during the form sending.</div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="remove_phone_after" value="0">
                    <input type="checkbox" value="1" name="remove_phone_after" class="form-check-input" style="cursor: pointer;" {{@$elementdata->remove_phone_after  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        During the content rendering
                    </label>
                </div>
            </div>
            <div class="form-text">Remove the elements during the content rendering.</div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Phone Numbers Protection</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="convert_phone_number_to_img" value="0">
                    <input type="checkbox" value="1" name="convert_phone_number_to_img" class="form-check-input" style="cursor: pointer;" {{@$elementdata->convert_phone_number_to_img  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Display Phone Numbers as Images
                    </label>
                </div>
            </div>
            <div class="form-text">This option will convert the phone numbers to images on live.</div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Hide the Phone Numbers</label>
                @php $HideThePhoneNumbers = config('single.hide_the_phone_numbers') @endphp
                <select name="hide_phone_number" style="width: 100%"
                    class="hide_phone_number form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                @foreach($HideThePhoneNumbers as $key=>$HTPN)
                <option value="{{ $key }}" {{ @$elementdata->hide_phone_number  == $key ? 'selected' : ''}}>{{ $HTPN }}</option>
                @endforeach
                </select>
            </div>
            <div>This option will allow to hide the Phone Numbers on page loading.
                <ul>
                <li>Disabled: +123456789012</li>
                <li>Skip the X last characters: XXXXXXXXX012</li>
                <li>Skip the X first characters: +12XXXXXXXXX</li>
                <li>All: XXXXXXXXXXXX</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Around Phone Number</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="show_security_tips" value="0">
                    <input type="checkbox" value="1" name="show_security_tips" class="form-check-input" style="cursor: pointer;" {{@$elementdata->show_security_tips  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Show Security Tips
                    </label>
                </div>
            </div>
            <div class="form-text">Show security tips by clicking on phone button. NOTE: This cancels the "Phone Number as Image" feature.</div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="enable_whatsapp_btn" value="0">
                    <input type="checkbox" value="1" name="enable_whatsapp_btn" class="form-check-input" style="cursor: pointer;" {{@$elementdata->enable_whatsapp_btn  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Enable WhatsApp Chat Button
                    </label>
                </div>
            </div>
            <div class="form-text">WhatsApp's click to chat feature allows users to begin a chat with someone without having their phone number saved in their phone's address book. NOTE:
                <ul>
                <li>The button will be not shown if the phone number is hidden above.</li>
                <li>The button will be not shown for guests if the option "Allow Guests to contact listings Authors" is disabled.</li>
                </ul></div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="pre_filled_whatsapp_message" value="0">
                    <input type="checkbox" value="1" name="pre_filled_whatsapp_message" class="form-check-input" style="cursor: pointer;" {{@$elementdata->pre_filled_whatsapp_message  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Pre-filled WhatsApp Message
                    </label>
                </div>
            </div>
            <div class="form-text">The pre-filled message will automatically appear in the text field of a chat.</div>
        </div>
    </div>


    
    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Dates</h3>
            </div></h3>
        </div>
        <div class="card-body">
            <h4 class="mt-0">Dates Translation Notes</h4>
            <p>Using the <strong>PHP-specific dates format</strong>, the support of a locale for dates is driven by locales installed in your operating system. The installed locales can be checked with the command line: <code>locale -a</code>. If the right locale is not installed, the dates will not appeared or will be appeared in English instead of the selected language.
            <br>Use the <strong>ISO format</strong> rather than PHP-specific format and use inner translations rather than language packages you need to install on every machine where you deploy your application.</p>
            </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="elapsed_time_from_now" value="0">
                    <input type="checkbox" value="1" name="elapsed_time_from_now" class="form-check-input" style="cursor: pointer;" {{@$elementdata->elapsed_time_from_now  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Display Date as "Elapsed Time From Now"
                    </label>
                </div>
            </div>
            <div class="form-text">e.g. 3 seconds ago, 6 minutes ago, 1 hour ago, 5 days ago, 3 months ago, 1 year ago.
                This will be applied for dates in the past from listings' details page only.
                Note: Dates format can be edited from the Languages management area.</div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="hide_dates" value="0">
                    <input type="checkbox" value="1" name="hide_dates" class="form-check-input" style="cursor: pointer;" {{@$elementdata->hide_dates  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Hide the Dates
                    </label>
                </div>
            </div>
            <div class="form-text">This option will hide dates on the listings' details page.</div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Others</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Pictures Slider</label>
                @php $PicturesSlider = config('single.pictures_slider') @endphp
                <select name="pictures_slider" style="width: 100%"
                    class="pictures_slider form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                @foreach($PicturesSlider as $key=>$ps)
                <option value="{{ $key }}" {{ @$elementdata->pictures_slider  == $key ? 'selected' : ''}}>{{ $ps }}</option>
                @endforeach
                </select>
            </div>
            <div>Select a type of pictures slider for listings' pictures displaying.</div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Similar Listings</label>
                @php $SimilarListings = config('single.similar_listings') @endphp
                <select name="similar_listings" style="width: 100%"
                    class="similar_listings form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                @foreach($SimilarListings as $key=>$sl)
                <option value="{{ $key }}" {{ @$elementdata->similar_listings  == $key ? 'selected' : ''}}>{{ $sl }}</option>
                @endforeach
                </select>
            </div>
            <div>This will appear at bottom in the listing page.</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Similar Posts Limit</label>
                <input class="form-control custom-file-input" name="similar_listings_limit" type="number" id="similar_listings_limit"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->similar_listings_limit  }}@endif">
            </div>
        </div>


        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="similar_listings_in_carousel" value="0">
                    <input type="checkbox" value="1" name="similar_listings_in_carousel" class="form-check-input" style="cursor: pointer;" {{@$elementdata->similar_listings_in_carousel  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Similar Posts in Carousel
                    </label>
                </div>
            </div>
            <div class="form-text">Display the similar listings in carousel or use the classic view.</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="guests_can_contact_authors" value="0">
                    <input type="checkbox" value="1" name="guests_can_contact_authors" class="form-check-input" style="cursor: pointer;" {{@$elementdata->guests_can_contact_authors  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Allow Guests to contact listings Authors
                    </label>
                </div>
            </div>
            <div class="form-text">Allow guests to contact listings authors. If unchecked, only registered users can contact listings authors and can see the listings authors phone number.</div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="auth_required_to_report_abuse" value="0">
                    <input type="checkbox" value="1" name="auth_required_to_report_abuse" class="form-check-input" style="cursor: pointer;" {{@$elementdata->auth_required_to_report_abuse  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Authentication required to report abuses
                    </label>
                </div>
            </div>
            <div class="form-text">Allow only logged users to report abuses.</div>
        </div>
    </div>


    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>External Services</h3>
            </div></h3>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="show_listing_on_googlemap" value="0">
                    <input type="checkbox" value="1" name="show_listing_on_googlemap" class="form-check-input" style="cursor: pointer;" {{@$elementdata->show_listing_on_googlemap  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Show Listings on Google Maps (Single Page Only)

                    </label>
                </div>
            </div>
            <div class="form-text">You have to enter your Google Maps API key at:
                Admin panel → Settings → General → Others → Google Maps.</div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="activation_facebook_comments" value="0">
                    <input type="checkbox" value="1" name="activation_facebook_comments" class="form-check-input" style="cursor: pointer;" {{@$elementdata->activation_facebook_comments  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Allow Facebook Comments (Single Page Only)

                    </label>
                </div>
            </div>
            <div class="form-text">You have to configure the Login with Facebook at:
                Admin panel → Settings → General → Social Login → Facebook.</div>
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