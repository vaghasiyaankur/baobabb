<form action="@if(isset($elementdata)){{ route('admin.setting.element.put',['elementupdate' => $element]) }}@else{{ route('admin.setting.element.store',['element' => $element]) }}@endif" method="post" enctype="multipart/form-data">
    @csrf
    {{-- @if(isset($elementdata)) @method('PUT')@endif --}}
    <input type="hidden" name="name" value="{{ $element }}">
    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Location</h3>
            </div></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="location_search" class="form-label custom-file-label font-size-17">Location Search</label>
                <select name="location_search" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                        <option value="geo_search" {{ @$elementdata->location_search == 'geo_search' ? 'selected' : '' }}>Geo Search</option>
                        <option value="predefined_value" {{ @$elementdata->location_search == 'predefined_value' ? 'selected' : '' }}>Predefined Value</option>
                </select>
                <div class="form-text">Select whether you want to use map places or dropdown with predefined values for location search. If you set this option to Geo Search then make sure you have set Use Map Locations to Yes</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="use_map_location" class="form-label custom-file-label font-size-17">Use Map Locations</label>
                <select name="use_map_location" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                        <option value="yes" {{ @$elementdata->use_map_location == 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ @$elementdata->use_map_location == 'no' ? 'selected' : '' }}>No</option>
                </select>
                <div class="form-text">If this is set to No then map will not be displayed at all ( ad single, profile,... )</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="use_predefined_location" class="form-label custom-file-label font-size-17">Use Predefined Locations</label>
                <select name="use_predefined_location" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                        <option value="yes" {{ @$elementdata->use_predefined_location == 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ @$elementdata->use_predefined_location == 'no' ? 'selected' : '' }}>No</option>
                </select>
                <div class="form-text">If this is set to No then users will not be forced to select predefined location from the dropdown</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="zoom_location_ad" class="form-label custom-file-label font-size-17">Zoom Location On Single</label>
                <input class="form-control custom-file-input" name="zoom_location_ad" type="number" id="zoom_location_ad"
                    value="@if (isset($elementdata)){{ @$elementdata->zoom_location_ad }}@endif">
                <div class="form-text">Input zoom for the single ad page</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="zoom_location_profile" class="form-label custom-file-label font-size-17">Zoom Location On Profile</label>
                <input class="form-control custom-file-input" name="zoom_location_profile" type="number" id="zoom_location_profile"
                    value="@if (isset($elementdata)){{ @$elementdata->zoom_location_profile }}@endif">
                <div class="form-text">Input zoom for the profile ad page</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="radius_unit" class="form-label custom-file-label font-size-17">Radius Units</label>
                <select name="radius_unit" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                        <option value="miles" {{ @$elementdata->radius_unit == 'miles' ? 'selected' : '' }}>Miles</option>
                        <option value="km" {{ @$elementdata->radius_unit == 'km' ? 'selected' : '' }}>Kilometers</option>
                </select>
                <div class="form-text">Select units for the radius location search</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="max_radius_search" class="form-label custom-file-label font-size-17">Max Radius Search</label>
                <input class="form-control custom-file-input" name="max_radius_search" type="number" id="max_radius_search"
                    value="@if (isset($elementdata)){{ @$elementdata->max_radius_search }}@endif">
                <div class="form-text">Input max radius search distance</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="restrict_location_country" class="form-label custom-file-label font-size-17">Restrict Location To Country</label>
                <input class="form-control custom-file-input" name="restrict_location_country" type="text" id="restrict_location_country"
                    value="@if (isset($elementdata)){{ @$elementdata->restrict_location_country }}@endif">
                <div class="form-text">Input country code or comma separated list of country codes in which locations will be available</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="use_google_direction" class="form-label custom-file-label font-size-17">Use Google Directions</label>
                <select name="use_google_direction" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                        <option value="yes" {{ @$elementdata->use_google_direction == 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ @$elementdata->use_google_direction == 'no' ? 'selected' : '' }}>No</option>
                </select>
                <div class="form-text">Enable usage of map directions on single advert and on profile page</div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary ms-3"> Submit</button>
        </div>
    </div>
</form>   