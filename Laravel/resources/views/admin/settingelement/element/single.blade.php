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
                <label for="formFile" class="form-label custom-file-label font-size-17">Listing Page Display Mode</label>
                <select name="publication_form_type" style="width: 100%"
                    class="publication_form_type form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    <option value="make-grid" {{ @$elementdata->publication_form_type  == 'make-grid' ? 'selected' : ''}}>Grid</option>
                </select>
            </div>
            <div>By selecting the "Single Step Form", the picture field can be mandatory or not.</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Title Min Length</label>
                <input class="form-control custom-file-input" name="title_min_length" type="number" id="title_min_length"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->title_min_length  }}@endif">
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Title Max Length</label>
                <input class="form-control custom-file-input" name="title_max_length" type="number" id="title_max_length"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->title_max_length  }}@endif">
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Description Min Length</label>
                <input class="form-control custom-file-input" name="description_min_length" type="number" id="description_min_length"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->description_min_length  }}@endif">
            </div>
        </div>
        <div class="col-md-3">
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

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="show_listings_tags" value="0">
                    <input type="checkbox" value="1" name="show_listings_tags" class="form-check-input" style="cursor: pointer;" {{@$elementdata->show_listings_tags  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Show listings tags
                    </label>
                </div>
            </div>
            <div class="form-text">Display the listings tags listed on every search results page.</div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="left_sidebar" value="0">
                    <input type="checkbox" value="1" name="left_sidebar" class="form-check-input" style="cursor: pointer;" {{@$elementdata->left_sidebar  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Listing Page Left Sidebar
                    </label>
                </div>
            </div>
        </div>
    </div>

     <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Price Filter (Min. Value)</label>
                <input class="form-control custom-file-input" name="min_price" type="number" id="min_price"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->min_price  }}@endif">
            </div>
            <div>Users will not be able to filter with a value lower than the one entered here.</div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Price Filter (Max. Value)</label>
                <input class="form-control custom-file-input" name="max_price" type="number" id="max_price"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->max_price  }}@endif">
            </div>
            <div>Users will not be able to filter with a value greater than the one entered here.</div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Price Slider Step</label>
                <input class="form-control custom-file-input" name="price_slider_step" type="number" id="price_slider_step"
                    id="customFileUpload"
                    value="@if (isset($elementdata)){{ @$elementdata->price_slider_step  }}@endif">
            </div>
            <div>Slider step in order to make the handles jump between intervals.</div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Count Listings (belonging to)</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="count_categories_listings" value="0">
                    <input type="checkbox" value="1" name="count_categories_listings" class="form-check-input" style="cursor: pointer;" {{@$elementdata->count_categories_listings  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Count listings belonging to categories
                    </label>
                </div>
            </div>
            <div>
                This option will be applied to the categories lists on the homepage and on the search results page.
                NOTE: This option is highly not recommended. By activating this you will have to deactivate the Enable the cities extended searches option bellow for better accuracy.
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="count_cities_listings" value="0">
                    <input type="checkbox" value="1" name="count_cities_listings" class="form-check-input" style="cursor: pointer;" {{@$elementdata->count_cities_listings  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Count listings belonging to cities
                    </label>
                </div>
            </div>
            <div>
                This option will be applied to the cities lists on the homepage and on the search results page.
                NOTE: This option is highly not recommended. By activating this you will have to deactivate the Enable the cities extended searches option bellow for better accuracy.
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Dates</h3>
            </div></h3>
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
            <div>
                e.g. 3 seconds ago, 6 minutes ago, 1 hour ago, 5 days ago, 3 months ago, 1 year ago.
                This will be applied for dates in the past from listing pages only.
                Note: Dates format can be edited from the Languages management area.
            </div>
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
            <div>
                This option will hide dates on the listing page and on the homepage.
            </div>
        </div>
    </div>


    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3><div class="mb-3 col-md-6">
                <h3>Distance</h3>
            </div></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="cities_extended_searches" value="0">
                    <input type="checkbox" value="1" name="cities_extended_searches" class="form-check-input" style="cursor: pointer;" {{@$elementdata->cities_extended_searches  == 1 ? 'checked' : ''}}>
                    <label class="form-check-label fw-bolder">
                        Enable the cities extended searches
                    </label>
                </div>
            </div>
            <div>
                Enable this option to allow the searches related to the cities to include results from nearby cities. Disable this option to only show the results related to selected cities (Independently).
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Showing the categories icons</label>
                <select name="distance_calculation_formula" style="width: 100%"
                    class="distance_calculation_formula form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    <option value="haversine" {{ @$elementdata->distance_calculation_formula  == 'haversine' ? 'selected' : ''}}>Haversine</option>
                    <option value="orthodromy" {{ @$elementdata->distance_calculation_formula  == 'orthodromy' ? 'selected' : ''}}>Orthodromy</option>
                    <option value="ST_Distance_Sphere" {{ @$elementdata->distance_calculation_formula  == 'ST_Distance_Sphere' ? 'selected' : ''}}>MySQL 5.7 Spherical Calculation</option>
                </select>
            </div>
            <ul>
                <li>Haversine: The haversine formula is an equation important in navigation, giving great-circle distances between two points on a sphere from their longitudes and latitudes. Requires MySQL 5.5 or greater.</li>
                <li>Orthodromy: An orthodromic or great-circle route on the Earth's surface is the shortest possible real way between any two points. Requires MySQL 5.5 or greater.</li>
                <li>MySQL 5.7 Spherical Calculation: Returns the mimimum spherical distance between two points and/or multipoints on a sphere. Requires MySQL 5.7.6 or greater.</li>
            </ul>    
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Showing the categories icons</label>
                <select name="search_distance_default" style="width: 100%"
                    class="search_distance_default form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    <option value="200" {{ @$elementdata->search_distance_default  == 200 ? 'selected' : ''}}>200</option>
                    <option value="100" {{ @$elementdata->search_distance_default  == 100 ? 'selected' : ''}}>100</option>
                    <option value="50" {{ @$elementdata->search_distance_default  == 50 ? 'selected' : ''}}>50</option>
                    <option value="25" {{ @$elementdata->search_distance_default  == 25 ? 'selected' : ''}}>25</option>
                    <option value="20" {{ @$elementdata->search_distance_default  == 20 ? 'selected' : ''}}>20</option>
                    <option value="10" {{ @$elementdata->search_distance_default  == 10 ? 'selected' : ''}}>10</option>
                    <option value="0" {{ @$elementdata->search_distance_default  == 0 ? 'selected' : ''}}>0</option>
                </select>
            </div>
            <div>Default search radius distance (in km or miles)</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Max Search Distance</label>
                <select name="search_distance_max" style="width: 100%"
                    class="search_distance_max form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    <option value="1000" {{ @$elementdata->search_distance_max  ==  1000 ? 'selected' : ''}}>1000</option>
                    <option value="900" {{ @$elementdata->search_distance_max  ==  900 ? 'selected' : ''}}>900</option>
                    <option value="800" {{ @$elementdata->search_distance_max  ==  800 ? 'selected' : ''}}>800</option>
                    <option value="700" {{ @$elementdata->search_distance_max  ==  700 ? 'selected' : ''}}>700</option>
                    <option value="600" {{ @$elementdata->search_distance_max  ==  600 ? 'selected' : ''}}>600</option>
                    <option value="500" {{ @$elementdata->search_distance_max  ==  500 ? 'selected' : ''}}>500</option>
                    <option value="400" {{ @$elementdata->search_distance_max  ==  400 ? 'selected' : ''}}>400</option>
                    <option value="300" {{ @$elementdata->search_distance_max  ==  300 ? 'selected' : ''}}>300</option>
                    <option value="200" {{ @$elementdata->search_distance_max  ==  200 ? 'selected' : ''}}>200</option>
                    <option value="100" {{ @$elementdata->search_distance_max  ==  100 ? 'selected' : ''}}>100</option>
                    <option value="50" {{ @$elementdata->search_distance_max  ==  50 ? 'selected' : ''}}>50</option>
                    <option value="0" {{ @$elementdata->search_distance_max  ==  0 ? 'selected' : ''}}>0</option>
                </select>

            </div>
            <div>Default search radius distance (in km or miles)</div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="formFile" class="form-label custom-file-label font-size-17">Distance Interval</label>
                <select name="search_distance_interval" style="width: 100%"
                    class="search_distance_interval form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    <option value="250" {{ @$elementdata->search_distance_interval  ==  250 ? 'selected' : ''}}>250</option>
                    <option value="200" {{ @$elementdata->search_distance_interval  ==  200 ? 'selected' : ''}}>200</option>
                    <option value="100" {{ @$elementdata->search_distance_interval  ==  100 ? 'selected' : ''}}>100</option>
                    <option value="50" {{ @$elementdata->search_distance_interval  ==  50 ? 'selected' : ''}}>50</option>
                    <option value="25" {{ @$elementdata->search_distance_interval  ==  25 ? 'selected' : ''}}>25</option>
                    <option value="20" {{ @$elementdata->search_distance_interval  ==  20 ? 'selected' : ''}}>20</option>
                    <option value="10" {{ @$elementdata->search_distance_interval  ==  10 ? 'selected' : ''}}>10</option>
                    <option value="5" {{ @$elementdata->search_distance_interval  ==  5 ? 'selected' : ''}}>5</option>
                </select>

            </div>
            <div>Default search radius distance (in km or miles)</div>
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