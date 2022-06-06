<form
    action="@if (isset($elementdata)) {{ route('admin.setting.element.put', ['elementupdate' => $element]) }}@else{{ route('admin.setting.element.store', ['element' => $element]) }} @endif"
    method="post" enctype="multipart/form-data">
    @csrf
    {{-- @if (isset($elementdata)) @method('PUT') @endif --}}
    <input type="hidden" name="name" value="{{ $element }}">
    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3>
                <div class="mb-3 col-md-6">
                    <h3><b>SEO</b></h3>
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
                        style="cursor: pointer;" {{ @$elementdata->social_login_activation == 1 ? 'checked' : '' }}>
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
                <h4>Verification Tools</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="google_site_verification" class="form-label custom-file-label font-size-17">Google site
                    verification content</label>
                <input class="form-control custom-file-input" name="google_site_verification" type="text"
                    id="google_site_verification" id="customFileUpload"
                    value="@if (isset($elementdata)) {{ @$elementdata->google_site_verification }} @endif">
                <div class="form-text">NOTE: This site verification is related to meta tag verification. So, enter
                    the meta content value.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="alexa_verify_id" class="form-label custom-file-label font-size-17">Alexa site verification
                    content</label>
                <input class="form-control custom-file-input" name="alexa_verify_id" type="text" id="alexa_verify_id"
                    id="customFileUpload"
                    value="@if (isset($elementdata)) {{ @$elementdata->alexa_verify_id }} @endif">
                <div class="form-text">NOTE: This site verification is related to meta tag verification. So, enter
                    the meta content value.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="msvalidate" class="form-label custom-file-label font-size-17">Bing site verification
                    content</label>
                <input class="form-control custom-file-input" name="msvalidate" type="text" id="msvalidate"
                    id="customFileUpload"
                    value="@if (isset($elementdata)) {{ @$elementdata->msvalidate }} @endif">
                <div class="form-text">NOTE: This site verification is related to meta tag verification. So, enter
                    the meta content value.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="yandex_verification" class="form-label custom-file-label font-size-17">Yandex site
                    verification content</label>
                <input class="form-control custom-file-input" name="yandex_verification" type="text"
                    id="yandex_verification" id="customFileUpload"
                    value="@if (isset($elementdata)) {{ @$elementdata->yandex_verification }} @endif">
                <div class="form-text">NOTE: This site verification is related to meta tag verification. So, enter
                    the meta content value.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="twitter_username" class="form-label custom-file-label font-size-17">Twitter Username</label>
                <input class="form-control custom-file-input" name="twitter_username" type="text" id="twitter_username"
                    id="customFileUpload"
                    value="@if (isset($elementdata)) {{ @$elementdata->twitter_username }} @endif">
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Robots.txt File</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-md-12">
            The "robots.txt" file is available at: <a href="https://demo.laraclassifier.com/robots.txt"
                target="_blank">https://demo.laraclassifier.com/robots.txt</a>.
        </div>
        <div class="mb-3 col-md-12">
            <label class="form-label fw-bolder">Robots.txt file content</label>
            <textarea name="robots_txt" rows="5" class="form-control">User-agent: * Disallow: /</textarea>


            <div class="form-text">Please enter one statement per line. For more information about the statements
                please check out these links:
                <ul>
                    <li><a href="https://support.google.com/webmasters/answer/6062596?hl=en"
                            target="_blank">https://support.google.com/webmasters/answer/6062596?hl=en</a></li>
                    <li><a href="http://www.robotstxt.org/robotstxt.html"
                            target="_blank">http://www.robotstxt.org/robotstxt.html</a></li>
                </ul>
            </div>
        </div>
        <div class="mb-3 col-md-12">
            <div class="form-check form-switch" style="margin-top: 30px;">
                <input type="hidden" name="robots_txt_sm_indexes" value="0">
                <input type="checkbox" value="1" name="robots_txt_sm_indexes" class="form-check-input"
                    style="cursor: pointer;" {{ @$elementdata->robots_txt_sm_indexes == 1 ? 'checked' : '' }}>
                <label for="robots_txt_sm_indexes" class="form-check-label fw-bolder">Append the sitemaps indexes in the robots.txt</label>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>No-Index (Don't Index On Search Engines)</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-md-6">
            <div class="form-check form-switch" style="margin-top: 30px;">
                <input type="hidden" name="no_index_categories" value="0">
                <input type="checkbox" value="1" name="no_index_categories" class="form-check-input"
                    style="cursor: pointer;" {{ @$elementdata->no_index_categories == 1 ? 'checked' : '' }}>
                <label class="form-check-label fw-bolder">
                    Categories Pages (from Permalink)
                </label>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="form-check form-switch" style="margin-top: 30px;">
                <input type="hidden" name="no_index_categories_qs" value="0">
                <input type="checkbox" value="1" name="no_index_categories_qs" class="form-check-input"
                    style="cursor: pointer;" {{ @$elementdata->no_index_categories_qs == 1 ? 'checked' : '' }}>
                <label class="form-check-label fw-bolder">
                    Categories Pages (from QueryString)
                </label>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="form-check form-switch" style="margin-top: 30px;">
                <input type="hidden" name="no_index_cities" value="0">
                <input type="checkbox" value="1" name="no_index_cities" class="form-check-input"
                    style="cursor: pointer;" {{ @$elementdata->no_index_cities == 1 ? 'checked' : '' }}>
                <label class="form-check-label fw-bolder">
                    Cities Pages (from Permalink)
                </label>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="form-check form-switch" style="margin-top: 30px;">
                <input type="hidden" name="no_index_cities_qs" value="0">
                <input type="checkbox" value="1" name="no_index_cities_qs" class="form-check-input"
                    style="cursor: pointer;" {{ @$elementdata->no_index_cities_qs == 1 ? 'checked' : '' }}>
                <label class="form-check-label fw-bolder">
                    Cities Pages (from QueryString)
                </label>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="form-check form-switch" style="margin-top: 30px;">
                <input type="hidden" name="no_index_users" value="0">
                <input type="checkbox" value="1" name="no_index_users" class="form-check-input"
                    style="cursor: pointer;" {{ @$elementdata->no_index_users == 1 ? 'checked' : '' }}>
                <label class="form-check-label fw-bolder">
                    Users Pages (Listings list by user's ID)
                </label>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="form-check form-switch" style="margin-top: 30px;">
                <input type="hidden" name="no_index_users_username" value="0">
                <input type="checkbox" value="1" name="no_index_users_username" class="form-check-input"
                    style="cursor: pointer;" {{ @$elementdata->no_index_users_username == 1 ? 'checked' : '' }}>
                <label class="form-check-label fw-bolder">
                    Users Pages (Listings list by user's username)
                </label>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="form-check form-switch" style="margin-top: 30px;">
                <input type="hidden" name="no_index_tags" value="0">
                <input type="checkbox" value="1" name="no_index_tags" class="form-check-input" style="cursor: pointer;" {{ @$elementdata->no_index_tags == 1 ? 'checked' : '' }}>
                <label class="form-check-label fw-bolder">
                    Tags Pages
                </label>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="form-check form-switch" style="margin-top: 30px;">
                <input type="hidden" name="no_index_filters_orders" value="0">
                <input type="checkbox" value="1" name="no_index_filters_orders" class="form-check-input"
                    style="cursor: pointer;" {{ @$elementdata->no_index_filters_orders == 1 ? 'checked' : '' }}>
                <label class="form-check-label fw-bolder">
                    Filters (and Orders) on Listings Pages (Except Pagination)
                </label>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="form-check form-switch" style="margin-top: 30px;">
                <input type="hidden" name="no_index_no_result" value="0">
                <input type="checkbox" value="1" name="no_index_no_result" class="form-check-input"
                    style="cursor: pointer;" {{ @$elementdata->no_index_no_result == 1 ? 'checked' : '' }}>
                <label class="form-check-label fw-bolder">
                    "No result." (Empty Searches Results Pages)
                </label>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="form-check form-switch" style="margin-top: 30px;">
                <input type="hidden" name="no_index_listing_report" value="0">
                <input type="checkbox" value="1" name="no_index_listing_report" class="form-check-input"
                    style="cursor: pointer;" {{ @$elementdata->no_index_listing_report == 1 ? 'checked' : '' }}>
                <label class="form-check-label fw-bolder">
                    Listing Report Pages
                </label>
            </div>
        </div>
        <div class="mb-3 col-12">
            <div class="form-check form-switch" style="margin-top: 30px;">
                <input type="hidden" name="no_index_all" value="0">
                <input type="checkbox" value="1" name="no_index_all" checked="checked" class="form-check-input"
                    style="cursor: pointer;" {{ @$elementdata->no_index_all == 1 ? 'checked' : '' }}>
                <label class="form-check-label fw-bolder">
                    All Website Pages (<span style="color: red;">Not recommended</span>)
                </label>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Permalinks Settings</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-md-12">
            <div class="card bg-light-warning rounded mb-0">
                <div class="card-body">
                    <p>By changing these values, your <code>config/routes.php</code> file will be reset. <br>And this
                        will impact your links already indexed on search engines. However, you can use the
                        <code>/public/.htaccess</code> to redirect old links to the new link format.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="listing_permalink" class="form-label custom-file-label font-size-17">Listings
                    Permalink</label>
                @php $RecaptchVersion = config('seo.listing_permalink') @endphp
                <select name="listing_permalink" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach ($RecaptchVersion as $key => $rv)
                        <option value="{{ $key }}"
                            {{ @$elementdata->listing_permalink == $key ? 'selected' : '' }}>{{ $rv }}
                        </option>
                    @endforeach
                </select>
                <div class="form-text">Which method should be used for storing and retrieving cached items.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="facebook_client_id" class="form-label custom-file-label font-size-17">Listings
                    Permalink</label>
                @php $RecaptchVersion = config('seo.listing_permalink_ext') @endphp
                <select name="listing_permalink_ext" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    <option value=""></option>
                    @foreach ($RecaptchVersion as $key => $rv)
                        <option value="{{ $key }}"
                            {{ @$elementdata->listing_permalink == $key ? 'selected' : '' }}>{{ $rv }}
                        </option>
                    @endforeach
                </select>
                <div class="form-text">Which method should be used for storing and retrieving cached items.</div>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="form-check form-switch" style="margin-top: 30px;">
                <input type="hidden" name="listing_hashed_id_enabled" value="0">
                <input type="checkbox" value="1" name="listing_hashed_id_enabled" 
                    class="form-check-input" style="cursor: pointer;" {{ @$elementdata->no_index_all == 1 ? 'checked' : '' }}>
                <label class="form-check-label fw-bolder">
                    Hash/Hide the Listings' IDs in URL
                </label>
                <div class="form-text">Hash/Hide the Listings' IDs in URL as YouTube-like IDs from numbers.</div>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="form-check form-switch" style="margin-top: 30px;">
                <input type="hidden" name="listing_hashed_id_seo_redirection" value="0">
                <input type="checkbox" value="1" name="listing_hashed_id_seo_redirection"
                    class="form-check-input" style="cursor: pointer;" {{ @$elementdata->listing_hashed_id_seo_redirection == 1 ? 'checked' : '' }}>
                <label class="form-check-label fw-bolder">
                    Hash/Hide the Listings' IDs in URL
                </label>
                <div class="form-text">Hash/Hide the Listings' IDs in URL as YouTube-like IDs from numbers.</div>
            </div>
        </div>
    </div>
    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Multi-countries URLs Optimization</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-md-12">
            <div class="card text-white bg-warning rounded mb-0">
                <div class="card-body">
                    <p><strong style="font-weight: bold;">Warning!</strong> This option is useless if you use the app
                        for only one country, and it should only be activated when launching your website. By enabling
                        this option several days after launching your site, many of the URLs on your site will be
                        changed, which could lead to several 404 errors with old URLs indexed by search engines. <br>And
                        by changing this value, your "config/routes.php" file will be reset.</p>
                </div>
            </div>
        </div>
        <div class="mb-3 col-md-12">
            <div class="form-check form-switch" style="margin-top: 30px;">
                <input type="hidden" name="multi_countries_urls" value="0">
                <input type="checkbox" value="1" name="multi_countries_urls" class="form-check-input"
                    style="cursor: pointer;" {{ @$elementdata->multi_countries_urls == 1 ? 'checked' : '' }}>
                <label class="form-check-label fw-bolder">
                    Enable The Multi-countries URLs Optimization
                </label>


                <div class="form-text">Enabling this option will optimize your website's URLs for the
                    multi-country functionality and allow the indexation of content for each enabled country.</div>
            </div>
        </div>
        <div class="mb-3 col-md-12">
            <div class="card text-white bg-primary rounded mb-0">
                <div class="card-body">
                    <p><strong style="font-weight: bold;">Note:</strong>
                    </p>
                    <ul>
                        <li>Some links from search engines could generate 404 errors.</li>
                        <li>This feature will not be taken into account if the "Domain Mapping" plugin is installed.
                        </li>
                    </ul>
                    <p></p>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary ms-3"> Submit </button>
        </div>
    </div>
</form>
