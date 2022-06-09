<form action="@if(isset($elementdata)){{ route('admin.setting.element.put',['elementupdate' => $element]) }}@else{{ route('admin.setting.element.store',['element' => $element]) }}@endif" method="post" enctype="multipart/form-data">
    @csrf
    {{-- @if(isset($elementdata)) @method('PUT')@endif --}}
    <input type="hidden" name="name" value="{{ $element }}">
    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Ads</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="map_source" class="form-label custom-file-label font-size-17">Map Source</label>
                <select name="map_source" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                        <option value="google" {{ @$elementdata->map_source == 'google' ? 'selected' : '' }}>Google Maps</option>
                        <option value="mapbox" {{ @$elementdata->map_source == 'mapbox' ? 'selected' : '' }}>Mapbox</option>
                        <option value="osm" {{ @$elementdata->map_source == 'osm' ? 'selected' : '' }}>Open Street Map</option>
                </select>
                <div class="form-text">Select which maps you wish to use</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="map_api_key" class="form-label custom-file-label font-size-17">Map API Key</label>
                <input class="form-control custom-file-input" name="map_api_key" type="text" id="map_api_key"
                    value="@if (isset($elementdata)){{ @$elementdata->map_api_key }}@endif">
                <div class="form-text">Input API key of your selected map source</div>
            </div>
        </div>
        <div class="col-md-4 justify-content-center">
            <label for="" class="form-label custom-file-label font-size-17">Ad Types</label>
            <div class="mb-2 mx-5">
                <input type="hidden" name="ad_type[sell]" value="0">
                    <input type="checkbox" value="1" name="ad_type[sell]" class="form-check-input" id="ad_type[sell]"
                        style="cursor: pointer;" {{ @$elementdata->ad_type->sell == 1 ? 'checked' : '' }}>
                        <label for="ad_type[sell]">Sell</label>
            </div>
            <div class="mb-2 mx-5">
                <input type="hidden" name="ad_type[auction]" value="0">
                    <input type="checkbox" value="1" name="ad_type[auction]" class="form-check-input" id="ad_type[auction]"
                        style="cursor: pointer;" {{ @$elementdata->ad_type->auction == 1 ? 'checked' : '' }}>
                        <label for="ad_type[auction]">Auction</label>
            </div>
            <div class="mb-2 mx-5">
                <input type="hidden" name="ad_type[buy]" value="0">
                    <input type="checkbox" value="1" name="ad_type[buy]" class="form-check-input" id="ad_type[buy]"
                        style="cursor: pointer;" {{ @$elementdata->ad_type->buy == 1 ? 'checked' : '' }}>
                        <label for="ad_type[buy]">Buy</label>
            </div>
            <div class="mb-2 mx-5">
                <input type="hidden" name="ad_type[exchange]" value="0">
                    <input type="checkbox" value="1" name="ad_type[exchange]" class="form-check-input" id="ad_type[exchange]"
                        style="cursor: pointer;" {{ @$elementdata->ad_type->exchange == 1 ? 'checked' : '' }}>
                        <label for="ad_type[exchange]">Exchange</label>
            </div>
            <div class="mb-2 mx-5">
                <input type="hidden" name="ad_type[gift]" value="0">
                    <input type="checkbox" value="1" name="ad_type[gift]" class="form-check-input" id="ad_type[gift]"
                        style="cursor: pointer;" {{ @$elementdata->ad_type->gift == 1 ? 'checked' : '' }}>
                        <label for="ad_type[gift]">Gift</label>
            </div>
            <div class="mb-2 mx-5">
                <input type="hidden" name="ad_type[rent]" value="0">
                    <input type="checkbox" value="1" name="ad_type[rent]" class="form-check-input" id="ad_type[rent]"
                        style="cursor: pointer;" {{ @$elementdata->ad_type->rent == 1 ? 'checked' : '' }}>
                        <label for="ad_type[rent]">Rent</label>
            </div>
            <div class="mb-2 mx-5">
                <input type="hidden" name="ad_type[job_offer]" value="0">
                    <input type="checkbox" value="1" name="ad_type[job_offer]" class="form-check-input" id="ad_type[job_offer]"
                        style="cursor: pointer;" {{ @$elementdata->ad_type->job_offer == 1 ? 'checked' : '' }}>
                        <label for="ad_type[job_offer]">Job - Offer</label>
            </div>
            <div class="mb-2 mx-5">
                <input type="hidden" name="ad_type[job_wanted]" value="0">
                    <input type="checkbox" value="1" name="ad_type[job_wanted]" class="form-check-input" id="ad_type[job_wanted]"
                        style="cursor: pointer;" {{ @$elementdata->ad_type->job_wanted == 1 ? 'checked' : '' }}>
                        <label for="ad_type[job_wanted]">Job Wanted</label>
            </div>
            <div class="form-text">Select which ad types are alowed to be submitted. If none is selected all will be available</div>
        </div>
        <div class="col-md-4 justify-content-center">
            <label for="" class="form-label custom-file-label font-size-17">Rent Periods</label>
            <div class="mb-2 mx-5">
                <input type="hidden" name="rent_period[year]" value="0">
                    <input type="checkbox" value="1" name="rent_period[year]" class="form-check-input" id="rent_period[year]"
                        style="cursor: pointer;" {{ @$elementdata->rent_period->year == 1 ? 'checked' : '' }}>
                        <label for="rent_period[year]">Year</label>
            </div>
            <div class="mb-2 mx-5">
                <input type="hidden" name="rent_period[half_year]" value="0">
                    <input type="checkbox" value="1" name="rent_period[half_year]" class="form-check-input" id="rent_period[half_year]"
                        style="cursor: pointer;" {{ @$elementdata->rent_period->half_year == 1 ? 'checked' : '' }}>
                        <label for="rent_period[half_year]">Half Year</label>
            </div>
            <div class="mb-2 mx-5">
                <input type="hidden" name="rent_period[quaterly]" value="0">
                    <input type="checkbox" value="1" name="rent_period[quaterly]" class="form-check-input" id="rent_period[quaterly]"
                        style="cursor: pointer;" {{ @$elementdata->rent_period->quaterly == 1 ? 'checked' : '' }}>
                        <label for="rent_period[quaterly]">Quaterly</label>
            </div>
            <div class="mb-2 mx-5">
                <input type="hidden" name="rent_period[month]" value="0">
                    <input type="checkbox" value="1" name="rent_period[month]" class="form-check-input" id="rent_period[month]"
                        style="cursor: pointer;" {{ @$elementdata->rent_period->month == 1 ? 'checked' : '' }}>
                        <label for="rent_period[month]">Month</label>
            </div>
            <div class="mb-2 mx-5">
                <input type="hidden" name="rent_period[week]" value="0">
                    <input type="checkbox" value="1" name="rent_period[week]" class="form-check-input" id="rent_period[week]"
                        style="cursor: pointer;" {{ @$elementdata->rent_period->week == 1 ? 'checked' : '' }}>
                        <label for="rent_period[week]">Week</label>
            </div>
            <div class="mb-2 mx-5">
                <input type="hidden" name="rent_period[day]" value="0">
                    <input type="checkbox" value="1" name="rent_period[day]" class="form-check-input" id="rent_period[day]"
                        style="cursor: pointer;" {{ @$elementdata->rent_period->day == 1 ? 'checked' : '' }}>
                        <label for="rent_period[day]">Day</label>
            </div>
            <div class="mb-2 mx-5">
                <input type="hidden" name="rent_period[hour]" value="0">
                    <input type="checkbox" value="1" name="rent_period[hour]" class="form-check-input" id="rent_period[hour]"
                        style="cursor: pointer;" {{ @$elementdata->rent_period->hour == 1 ? 'checked' : '' }}>
                        <label for="rent_period[hour]">Hour</label>
            </div>
            <div class="form-text">Select which rent periods are available</div>
        </div>
        <div class="col-md-4 justify-content-center">
            <label for="" class="form-label custom-file-label font-size-17">Mandatory Fields</label>
            <div class="mb-2 mx-5">
                <input type="hidden" name="mandatory_field[year]" value="0">
                    <input type="checkbox" value="1" name="mandatory_field[year]" class="form-check-input" id="mandatory_field[year]"
                        style="cursor: pointer;" {{ @$elementdata->mandatory_field->year == 1 ? 'checked' : '' }}>
                        <label for="mandatory_field[year]">Phone</label>
            </div>
            <div class="mb-2 mx-5">
                <input type="hidden" name="mandatory_field[firstname]" value="0">
                    <input type="checkbox" value="1" name="mandatory_field[firstname]" class="form-check-input" id="mandatory_field[firstname]"
                        style="cursor: pointer;" {{ @$elementdata->mandatory_field->firstname == 1 ? 'checked' : '' }}>
                        <label for="mandatory_field[firstname]">First Name</label>
            </div>
            <div class="mb-2 mx-5">
                <input type="hidden" name="mandatory_field[lastname]" value="0">
                    <input type="checkbox" value="1" name="mandatory_field[lastname]" class="form-check-input" id="mandatory_field[lastname]"
                        style="cursor: pointer;" {{ @$elementdata->mandatory_field->lastname == 1 ? 'checked' : '' }}>
                        <label for="mandatory_field[lastname]">Last Name</label>
            </div>
            <div class="form-text">Select which fields are mandatory</div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="bidding_step" class="form-label custom-file-label font-size-17">Bidding Step</label>
                <input class="form-control custom-file-input" name="bidding_step" type="number" id="bidding_step"
                    value="@if (isset($elementdata)){{ @$elementdata->bidding_step }}@endif">
                <div class="form-text">Input value for bidding step</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="max_top_ads" class="form-label custom-file-label font-size-17">Maximum Top Ads</label>
                <input class="form-control custom-file-input" name="max_top_ads" type="number" id="max_top_ads"
                    value="@if (isset($elementdata)){{ @$elementdata->max_top_ads }}@endif">
                <div class="form-text">Input how many top ads places are available or leave empty for unlimited</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="similar_ad" class="form-label custom-file-label font-size-17">Similar Ads</label>
                <input class="form-control custom-file-input" name="similar_ad" type="number" id="similar_ad"
                    value="@if (isset($elementdata)){{ @$elementdata->similar_ad }}@endif">
                <div class="form-text">Input number of hom many similar ads to display on ad single page or leave empty to disable</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="max_home_map_ad" class="form-label custom-file-label font-size-17">Maximum Home Map Ads</label>
                <input class="form-control custom-file-input" name="max_home_map_ad" type="number" id="max_home_map_ad"
                    value="@if (isset($elementdata)){{ @$elementdata->max_home_map_ad }}@endif">
                <div class="form-text">Input how many home map ads pomotion places are available</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="ad_per_page" class="form-label custom-file-label font-size-17">Ads Per Page</label>
                <input class="form-control custom-file-input" name="ad_per_page" type="number" id="ad_per_page"
                    value="@if (isset($elementdata)){{ @$elementdata->ad_per_page }}@endif">
                <div class="form-text">Input number of ads to show per page on search results</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="ad_per_page_author" class="form-label custom-file-label font-size-17">Ads Per Page Author</label>
                <input class="form-control custom-file-input" name="ad_per_page_author" type="number" id="ad_per_page_author"
                    value="@if (isset($elementdata)){{ @$elementdata->ad_per_page_author }}@endif">
                <div class="form-text">Input number of ads to show per page on author listing page</div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="image" class="form-label custom-file-label font-size-17">Video Thumbnail</label>
                @if(@$elementdata->video_thumbnail)
                <input type="hidden" name="video_thumbnail" value="{{@$elementdata->video_thumbnail}}" id="login-background-image-update">
               @endif
                <input class="form-control custom-file-input"  name="video_thumbnail" type="file" id="login-background-image" id="customFileUpload" value="{{@$elementdata->video_thumbnail}}">
              </div>
              <div class="form_right_img text-center mb-4">
                <img src="{{ @$elementdata->video_thumbnail  ? asset(@$elementdata->video_thumbnail) : asset('assets/images/brand_add_new1.jpg') }}" style="border-radius: 10px; max-height:200px;" id="login-background-view" class="form_img" alt="brand image">
             </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="image" class="form-label custom-file-label font-size-17">Placeholder Image</label>
                @if(@$elementdata->placeholder_image)
                <input type="hidden" name="placeholder_image" value="{{@$elementdata->placeholder_image}}" id="login-background-image2-update">
               @endif
                <input class="form-control custom-file-input"  name="placeholder_image" type="file" id="login-background-image2" id="customFileUpload" value="{{@$elementdata->placeholder_image}}">
              </div>
              <div class="form_right_img text-center mb-4">
                <img src="{{ @$elementdata->placeholder_image  ? asset(@$elementdata->placeholder_image) : asset('assets/images/brand_add_new1.jpg') }}" style="border-radius: 10px; max-height:200px;" id="login-background-view2" class="form_img" alt="brand image">
             </div>
        </div>

        <div class="col-md-12">
            <div class="mb-3">
                <label for="formFile"
                    class="form-label custom-file-label font-size-17">Map Style</label>
                <textarea class="form-control" name="map_style" id="map_style"  cols="100" rows="10" >@if (isset($elementdata)){{ @$elementdata->map_style }}@endif</textarea>
                <div class="form-text">Paste your JavaScript code here to put it in the &lt;head&gt; section of HTML pages.</div>
            </div>  
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="map_language" class="form-label custom-file-label font-size-17">Map Language</label>
                <input class="form-control custom-file-input" name="map_language" type="text" id="map_language"
                    value="@if (isset($elementdata)){{ @$elementdata->map_language }}@endif">
                <div class="form-text">Input map language code, https://developers.google.com/maps/faq#languagesupport</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="enable_compare" class="form-label custom-file-label font-size-17">Enable Compare</label>
                <select name="enable_compare" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                        <option value="yes" {{ @$elementdata->enable_compare == 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ @$elementdata->enable_compare == 'no' ? 'selected' : '' }}>No</option>
                </select>
                <div class="form-text">Enable or disable comparing of the product</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="max_compare_ads" class="form-label custom-file-label font-size-17">Max Compare Ads</label>
                <input class="form-control custom-file-input" name="max_compare_ads" type="number" id="max_compare_ads"
                    value="@if (isset($elementdata)){{ @$elementdata->max_compare_ads }}@endif">
                <div class="form-text">Input maximum number of products to compare</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="default_search_listing" class="form-label custom-file-label font-size-17">Default Search Listing</label>
                <select name="default_search_listing" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                        <option value="grid" {{ @$elementdata->default_search_listing == 'grid' ? 'selected' : '' }}>Grid</option>
                        <option value="list" {{ @$elementdata->default_search_listing == 'list' ? 'selected' : '' }}>List</option>
                        <option value="card" {{ @$elementdata->default_search_listing == 'card' ? 'selected' : '' }}>Card</option>
                </select>
                <div class="form-text">Select default listing on search listing</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="more_search_toggle" class="form-label custom-file-label font-size-17">More/Less Search Toggle</label>
                <input class="form-control custom-file-input" name="more_search_toggle" type="number" id="more_search_toggle"
                    value="@if (isset($elementdata)){{ @$elementdata->more_search_toggle }}@endif">
                <div class="form-text">Input number if you want to limit list of category and predefined locations on search page or leave empty to show them all</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="logout_contact" class="form-label custom-file-label font-size-17">Logout Contact</label>
                <select name="logout_contact" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                        <option value="yes" {{ @$elementdata->logout_contact == 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ @$elementdata->logout_contact == 'no' ? 'selected' : '' }}>No</option>
                </select>
                <div class="form-text">Enable or disable comparing of the product</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="phone_visible" class="form-label custom-file-label font-size-17">Phone Visibility</label>
                <select name="phone_visible" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                        <option value="visible" {{ @$elementdata->phone_visible == 'visible' ? 'selected' : '' }}>Always Visible</option>
                        <option value="loged_user" {{ @$elementdata->phone_visible == 'loged_user' ? 'selected' : '' }}>Visible To Logged In Users</option>
                        <option value="hidden" {{ @$elementdata->phone_visible == 'hidden' ? 'selected' : '' }}>Always Hidden</option>
                </select>
                <div class="form-text">Set visibility level for phone contact on ad and profile pages</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="seller_ad_number" class="form-label custom-file-label font-size-17">Other Seller Ads Number</label>
                <input class="form-control custom-file-input" name="seller_ad_number" type="number" id="seller_ad_number"
                    value="@if (isset($elementdata)){{ @$elementdata->seller_ad_number }}@endif">
                <div class="form-text">Input number if you want to show some other author ads on ad single page ( it will dispay them random ) or leave empty to disable</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="price_filter_type" class="form-label custom-file-label font-size-17">Price Filter Type</label>
                <select name="price_filter_type" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                        <option value="sidebar" {{ @$elementdata->price_filter_type == 'sidebar' ? 'selected' : '' }}>Sidebar</option>
                        <option value="input_range" {{ @$elementdata->price_filter_type == 'input_range' ? 'selected' : '' }}>Input Range</option>
                </select>
                <div class="form-text">Select style of the price filter on search page which can be draggable slider or two inputs for min and max</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="user_deactive_account" class="form-label custom-file-label font-size-17">Can Users Deactivate Account</label>
                <select name="user_deactive_account" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                        <option value="yes" {{ @$elementdata->user_deactive_account == 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ @$elementdata->user_deactive_account == 'no' ? 'selected' : '' }}>No</option>
                </select>
                <div class="form-text">Enable or disable ability for users to delete their account and all what they have posted</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="logout_contact" class="form-label custom-file-label font-size-17">Address Direction</label>
                <select name="logout_contact" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                        <option value="0" {{ @$elementdata->logout_contact == '0' ? 'selected' : '' }}>Country, state, city, street, number</option>
                        <option value="1" {{ @$elementdata->logout_contact == '1' ? 'selected' : '' }}>Number, street, city, state, country</option>
                </select>
                <div class="form-text">Select elements order of the address</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="report_ad" class="form-label custom-file-label font-size-17">Reporting Of Ads</label>
                <select name="report_ad" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    <option value="all" {{ @$elementdata->report_ad == 'all' ? 'selected' : '' }}>By All</option>
                        <option value="logged" {{ @$elementdata->report_ad == 'logged' ? 'selected' : '' }}>By Logged In Users</option>
                </select>
                <div class="form-text">Select elements order of the address</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="filter_trigger" class="form-label custom-file-label font-size-17">Search Filter Trigger</label>
                <select name="filter_trigger" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    <option value="button" {{ @$elementdata->filter_trigger == 'button' ? 'selected' : '' }}>Clicking On A Button</option>
                        <option value="change" {{ @$elementdata->filter_trigger == 'change' ? 'selected' : '' }}>Any Change On Form</option>
                </select>
                <div class="form-text">Select what will trigger searching for results</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="category_selection" class="form-label custom-file-label font-size-17">Category Selection</label>
                <select name="category_selection" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    <option value="combined" {{ @$elementdata->category_selection == 'combined' ? 'selected' : '' }}>Combined</option>
                        <option value="separated" {{ @$elementdata->category_selection == 'separated' ? 'selected' : '' }}>Separated</option>
                </select>
                <div class="form-text">Combined - show all categories in single select box ( search will display radio button list ) Separated - load subcategories based on selected category ( search will display multiple select boxes. Search form element will display only top level categories )</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="show_username" class="form-label custom-file-label font-size-17">Show Username Only</label>
                <select name="show_username" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    <option value="yes" {{ @$elementdata->show_username == 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ @$elementdata->show_username == 'no' ? 'selected' : '' }}>No</option>
                </select>
                <div class="form-text">Select to display username instead for dispaly name ( First Name + Last Name )</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="comment_on_Ad" class="form-label custom-file-label font-size-17">Show Comments On Ads</label>
                <select name="comment_on_Ad" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    <option value="yes" {{ @$elementdata->comment_on_Ad == 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ @$elementdata->comment_on_Ad == 'no' ? 'selected' : '' }}>No</option>
                </select>
                <div class="form-text">Enable or disable comments on ads</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="redirect_after_ad_submit" class="form-label custom-file-label font-size-17">Redirect After Ad Submit</label>
                <select name="redirect_after_ad_submit" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    <option value="yes" {{ @$elementdata->redirect_after_ad_submit == 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ @$elementdata->redirect_after_ad_submit == 'no' ? 'selected' : '' }}>No</option>
                </select>
                <div class="form-text">Enable or disable redirect to author list of ads after ad has been submitted</div>
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

   $("#login-background-image2").change(function() {
        readLoginURL2(this);
   });

   function readLoginURL2(input) {
   if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function(e) {
         $('#login-background-view2').attr('src', e.target.result);
         console.log('dasd');
         $('#login-background-image2-update').remove();
         }
         reader.readAsDataURL(input.files[0]);
   } else {
         alert('select a file to see preview');
         $('#login-background-view2').attr('src', '');
   }
   }
</script>