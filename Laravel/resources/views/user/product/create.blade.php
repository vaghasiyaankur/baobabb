@include('user.layouts.partials.head')
@include('user.layouts.partials.header')
    <div class="add-post-section ">
        <ul class="nav nav-pills flex-wrap mb-3 px-3" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-ads-tab" data-bs-toggle="pill" data-bs-target="#pills-ads"
                    type="button" role="tab" aria-controls="pills-ads" aria-selected="true">Post your Ad</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-type-tab" data-bs-toggle="pill" data-bs-target="#pills-type"
                    type="button" role="tab" aria-controls="pills-type" aria-selected="false">Post Type</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-category-tab" data-bs-toggle="pill" data-bs-target="#pills-category"
                    type="button" role="tab" aria-controls="pills-category" aria-selected="false">Category</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-media-tab" data-bs-toggle="pill" data-bs-target="#pills-media"
                    type="button" role="tab" aria-controls="pills-media" aria-selected="false">Media</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-description-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description"
                    aria-selected="false">Description</button>
            </li>
        </ul>
        <div class="post-ad-details mb-5">
            <form action="@if(isset($product)){{ route('user.product.update',$product->id) }}@else{{route('user.product.store')}}@endif" id="product" method="POST" enctype="multipart/form-data">
                @if(isset($product)) @method('PUT') @endif
                @csrf
                <div class="row">
                    <!-- post type ads start -->
                    <div class="col-lg-9 " id="step1">
                        <div class="l-ad-content">
                            <h5 class="fw-bold mb-4 ms-4">Post Your Ad</h5>
                            <div class="add-types border-top d-flex flex-wrap justify-content-center align-items-center ">
                                <p class="mb-0 me-4 fw-bold fs-4">Ad type</p>
                                <select id="type_of" name="type_of" class="form-select w-75 fs-4"
                                    aria-label="Default select example">
                                    <option value="" selected>Please select your ad type</option>
                                    <option value="sell"
                                        @if (isset($product->type_of)) @if ('sell' == $product->type_of) selected @endif
                                        @endif>Sell (expires in 30 days)</option>
                                    <option value="buy"
                                        @if (isset($product->type_of)) @if ('buy' == $product->type_of) selected @endif
                                        @endif>Buy (expires in 30 days)</option>
                                    <option value="exchange"
                                        @if (isset($product->type_of)) @if ('exchange' == $product->type_of) selected @endif
                                        @endif>Exchange (expires in 30 days)</option>
                                    <option value="gift"
                                        @if (isset($product->type_of)) @if ('gift' == $product->type_of) selected @endif
                                        @endif>Gift (expires in 30 days)</option>
                                    <option value="rental"
                                        @if (isset($product->type_of)) @if ('rental' == $product->type_of) selected @endif
                                        @endif>Rental (expires in 30 days)</option>
                                    <option value="services"
                                        @if (isset($product->type_of)) @if ('services' == $product->type_of) selected @endif
                                        @endif>Services (expires in 30 days)</option>
                                </select>
                            </div>
                            <span class="error text-danger d-flex justify-content-center type_of"></span>
                            <div class="ad-n-btn d-flex flex-wrap justify-content-center align-items-center">
                                <a href="javascript:;" onclick="next_step1()" class="next_btn nextbtn_ text-white">Next</a>
                            </div>
                        </div>
                    </div>
                    <!-- post type of post start -->
                    <div class="col-lg-9 " id="step2" style="display:none;">
                        <div class="l-ad-content">
                            <h5 class="fw-bold mb-4 ms-4">Type Of Post</h5>
                            <div class="type-checklist border-top mx-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type_of_post" id="sell" value="sell"
                                        checked>
                                    <label class="form-check-label" for="sell">
                                        Sell (This ad type to sell and items)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type_of_post" id="wanted"
                                        value="wanted">
                                    <label class="form-check-label" for="wanted">
                                        Wanted (This ad type to sell and items)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type_of_post" id="services"
                                        value="services">
                                    <label class="form-check-label" for="services">
                                        Services (This ad type is for a service you provide)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type_of_post" id="gift" value="gift">
                                    <label class="form-check-label" for="gift">
                                        Gift (This ad type is for an item you are donating, not selling)
                                    </label>
                                </div>
                            </div>
                            <div class="ad-n-btn d-flex justify-content-center align-items-center">
                                <div class="">
                                    <a href="javascript:;" onclick="pre_step2()"
                                        class="previous_btn me-4 nextbtn_ ">Previous</a>
                                </div>
                                <a href="javascript:;" onclick="next_step2()" class=" next_btn nextbtn_ text-white">Next</a>
                            </div>
                        </div>
                    </div>
                    <!-- post Category of post start -->
                    <div class="col-lg-9" id="step3" style="display:none;">
                        <div class="l-ad-content">
                            <h5 class="fw-bold mb-4 ms-4">Category</h5>
                            <div class="category-check_ border-top">
                                <div id="list1" class="dropdown-check-list" tabindex="100">
                                    @foreach ($categories as $category)
                                        <?php $childs = App\Models\Category::where('parent_id', $category->id)->get(); ?>
                                        @if ($childs->count() > 0)
                                            <span class="anchor w-100"
                                                data-id="{{ $category->id }}">{{ $category->name }}</span>
                                            <ul class="items child" id="{{ $category->id }}" style="display: none;"
                                                data-id="123">
                                                @foreach ($childs as $child)
                                                    <li class="ms-4"><input type="radio" id="{{ $child->id }}"
                                                            value="{{ $child->id }}" name="category_id"
                                                            class="me-3" @if (isset($product->category_id)) @if($child->id == $product->category_id) checked @endif @endif><label
                                                            for="{{ $child->id }}">{{ $child->name }}</label></li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="one-anchor w-100"><input type="radio" id="{{ $category->id }}"
                                                    value="{{ $category->id }}" name="category_id"
                                                    class="me-3 item" @if(isset($product->category_id)) @if($category->id == $product->category_id) checked @endif @endif><label
                                                    for="{{ $category->id }}">{{ $category->name }}</label></span>
                                        @endif
                                    @endforeach
                                </div>
                                <span class="error text-danger d-flex justify-content-center category_id"></span>
                            </div>

                            <div class="ad-n-btn d-flex flex-wrap justify-content-center align-items-center">
                                <a href="javascript:;" onclick="pre_step3()"
                                    class="previous_btn me-4 nextbtn_ ">Previous</a>
                                <a href="javascript:;" onclick="next_step3()" class="next_btn nextbtn_ text-white">Next</a>
                            </div>
                        </div>
                    </div>
                    <!-- post User-media start -->
                    <div class="col-lg-9" id="step4" style="display:none;">
                        <div class="l-ad-content">
                            <h5 class="fw-bold mb-4 ms-4">Uoload Your Media</h5>
                            <!--  -->
                            <div class="upload-file_input border-top">
                                <div id="dropBox">
                                    <p><i class="fa-solid fa-cloud-arrow-up upload-file-icon"></i>
                                        <br> Select a file to upload
                                        <br />OR
                                        <br />Drag a file into this box
                                    </p>
                                    <form class="imgUploader">
                                        <input type="file" id="imgUpload" name="image[]" multiple accept="image/*"
                                            onchange="filesManager(this.files)">
                                        <label class="button" for="imgUpload">Browse File</label>
                                    </form>
                                    <div id="gallery">
                                        
                                    </div>
                                </div>
                                {{-- <form id="file-upload-form"> --}}
                                <progress id="file-progress" value="0">
                                    <span>0</span>%
                                </progress>
                                <output for="file-upload" id="messages"></output>
                                {{-- </form> --}}
                                <div class="v-input d-flex flex-wrap justify-content-center align-items-center">
                                    <div class="me-2">
                                        <label for="inputPassword6" class="col-form-label">Videos (1 max)</label>
                                    </div>
                                    <div class="w-50">
                                        <input type="text" id="inputtext6" class="form-control" name="video" id="video"
                                            aria-describedby="textHelpInline">
                                    </div>
                                </div>
                                <span class="error text-danger d-flex justify-content-center image_upload"></span>
                            </div>

                            <div class="ad-n-btn p-0 d-flex flex-wrap justify-content-center align-items-center">
                                <a href="javascript:;" onclick="pre_step4()"
                                    class="previous_btn me-4 nextbtn_ ">Previous</a>
                                <a href="javascript:;" onclick="next_step4()" class="next_btn nextbtn_ text-white">Next</a>
                            </div>
                        </div>
                    </div>
                    <!-- post Description start -->
                    <div class="col-lg-9" id="step5" style="display:none;">
                        <div class="l-ad-content">
                            <h5 class="fw-bold mb-4 ms-4">Provide The Description</h5>
                            <div class="descript-section border-top">
                                <div class="d-flex  align-items-center mt-4 mb-3">
                                    <label class="" for="name">Name*</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="@if(isset($product->name)){{ $product->name }}@endif"
                                        style="width: 92%;">
                                </div>
                                <div class="mb-3 d-flex ">
                                    <label for="description" class="">Description*</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" style="height:273px;width: 92%;">@if(isset($product->description)){{$product->description }}@endif</textarea>
                                    <span class="error text-danger d-flex justify-content-start description"></span>
                                </div>
                                <div class="d-flex align-items-center mt-4 mb-1">
                                    <label class="me-2" for="specificSizeSelect">Condition*</label>
                                    <select class="form-select " id="condition" name="condition">
                                        <option value="" selected>Select Condition</option>
                                        <option value="new"
                                            @if (isset($product->condition)) @if ('new' == $product->condition) selected @endif
                                            @endif>New</option>
                                        <option value="refurbished"
                                            @if (isset($product->condition)) @if ('refurbished' == $product->condition) selected @endif
                                            @endif>Manufacturer Refurbished</option>
                                        <option value="used"
                                            @if (isset($product->condition)) @if ('used' == $product->condition) selected @endif
                                            @endif>Used</option>
                                        <option value="part"
                                            @if (isset($product->condition)) @if ('part' == $product->condition) selected @endif
                                            @endif>For Parts Or Not Working</option>
                                    </select>
                                    <label class="text-end p-2" for="specificSizeSelect">Curency*</label>
                                    <select class="form-select" style="width:233px;" id="currency" name="currency">
                                        <option value="">Select Currency</option>
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->id }}"
                                                @if (isset($product->cash)) @if ($currency->id == $product->cash) selected @endif
                                                @endif>{{ $currency->symbol }}
                                                {{ $currency->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="error text-danger d-flex justify-content-start currency"></span>
                                </div>
                                <div class="price-div d-flex flex-wrap justify-content-between align-items-center ">
                                    <div class="d-flex align-items-center mt-3">
                                        <label class="" for="specificSizeInputName">Price*</label>
                                        <input type="number" class="form-control w-50" id="price" name="price"
                                            value="@if(isset($product->price)){{ $product->price }}@endif">
                                        <div class="">
                                            <div class="price_div_check-box">
                                                <input class="form-check-input" type="checkbox" name="negotiable"
                                                    id="negotiable">
                                                <label class="form-check-label mb-0" for="autoSizingCheck2">
                                                    Negotiable
                                                </label>
                                            </div>
                                        </div>
                                        <!-- <span class="error text-danger d-flex justify-content-center price"></span> -->
                                    </div>
                                    <div class="d-flex align-items-center mt-3">
                                        <label class="my-2 me-3" for="specificSizeSelect">Sale Price</label>
                                        <input type="number" class="form-control" id="sale_price" name="sale_price"
                                            value="@if(isset($product->sale_price)){{ $product->sale_price }}@endif"
                                            style="width: 90%;">
                                    </div>
                                </div>

                                <div class="d-flex align-items-center pt-3">
                                    <label class="" for="specificSizeInputName">Location*</label>
                                    <input type="text" name="autocomplete" class="form-control" style="width: 92%;"
                                        id="autocomplete">
                                    <input type="hidden" name="latitude" id="latitude" class="form-control">
                                    <input type="hidden" name="longitude" id="longitude" class="form-control">
                                </div>

                                <span class="error text-danger d-flex justify-content-start condition"></span>
                                <div class="d-flex  align-items-center mt-4 mb-3">
                                    {{-- <label class="" for="country">Country*</label>
                                    <input type="text" name="country" class="form-control" id="country" style="width: 40%;"> --}}
                                    <label class="me-3" for="state">State*</label>
                                    <input type="text" name="state" class="form-control" id="state" style="width: 40%;"
                                        value="@if (isset($product->state)) {{ $product->state }} @endif">
                                    <label class="text-center" for="city">City*</label>
                                    <input type="text" name="city" class="form-control" id="city" style="width: 50%;"
                                        value="@if (isset($product->city)) {{ $product->city }} @endif">
                                </div>

                                <span class="error text-danger d-flex justify-content-start city"></span>
                                <div class="d-flex align-items-center ">
                                    <label class="" for="specificSizeInputName">Tags</label>
                                    <input type="text" name="tag" class="form-control" style="width: 92%;"
                                        value="@if (isset($product->tags)) {{ $product->tags }} @endif"
                                        id="specificSizeInputName">
                                </div>
                                <span class="term_and_condition pl-5">Enter the tags seprect by commans or process the
                                    Enter button on
                                    your keybord
                                    after each tags. <br> The number of tags cannot exect 15. </span>
                                <div class="d-flex align-items-center  mt-3 ms-1">
                                    <div class="form-check term_and_condition">
                                        <input class="form-check-input" type="checkbox" id="term_cond">
                                        <label for="term_cond" style="width: 100%;">I have read and agree to the <b>Terms
                                                &amp;
                                                Conditions</b></label>
                                    </div>
                                </div>
                            </div>
                            <div class="ad-n-btn d-flex flex-wrap justify-content-center align-items-center p-0">
                                <div class="previous_btn me-4">
                                    <a href="javascript:;" class="nextbtn_" onclick="pre_step5()">Previous</a>
                                </div>
                                <div class="next_btn" id="submit-div" style="background-color: #9a9ea1;">
                                    <a href="javascript:;" id="submit" class="nextbtn_ text-white" onclick="next_step5()"
                                        style="pointer-events: none;">Submit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="r-ad-content">
                            <div class="r-ad-title-text text-center">
                                <h5 class="mb-0">Tips & Tricks</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- fontawesome icons init -->
    <script src="{{ asset('assets/js/pages/fontawesome.init.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('public/assets/back-end') }}/js/select2.min.js"></script>
    {{-- <script>
        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script> --}}

    <script>
        $("#slug").keyup(function() {
            name = $('#slug').val();
            $(this).val(name.toLowerCase());
            $(this).val(name.replace(/ /g, "-"));
        });
    </script>


    {{-- FOR AUTOCOMPLATE ADDRESS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    {{-- javascript code --}}
    <script type='text/javascript'
        src='https://maps.googleapis.com/maps/api/js?libraries=places&v=3&language=En&key=AIzaSyBZhREk9TESs69r99eYGKkIQ725IqOP8Zc&ver=5.9.3'>
    </script>
    <script>
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var input = document.getElementById('autocomplete');
            var options = {
                types: ['(cities)'],
                componentRestrictions: {
                    country: "in"
                }
            };
            var autocomplete = new google.maps.places.Autocomplete(input, options);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place)
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());
                // // --------- show lat and long ---------------
                // $("#lat_area").removeClass("d-none");
                // $("#long_area").removeClass("d-none");
            });
        }
    </script>



    <!-------category select-checkboc js--------->
    <script>
        $('.anchor').on('click', function() {
            var id = $(this).attr('data-id');
            id = '#' + id
            if ($(id).css("display") == "none") {
                $(id).css("display", "block");
            } else {
                $(id).css("display", "none");
            }
        })
    </script>

    <!-------UPLOAD FILE INPUT JS--------->
    <script>
        let dropBox = document.getElementById('dropBox');

        // modify all of the event types needed for the script so that the browser
        // doesn't open the image in the browser tab (default behavior)
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(evt => {
            dropBox.addEventListener(evt, prevDefault, false);
        });

        function prevDefault(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        // remove and add the hover class, depending on whether something is being
        // actively dragged over the box area
        ['dragenter', 'dragover'].forEach(evt => {
            dropBox.addEventListener(evt, hover, false);
        });
        ['dragleave', 'drop'].forEach(evt => {
            dropBox.addEventListener(evt, unhover, false);
        });

        function hover(e) {
            dropBox.classList.add('hover');
        }

        function unhover(e) {
            dropBox.classList.remove('hover');
        }

        // the DataTransfer object holds the data being dragged. it's accessible
        // from the dataTransfer property of drag events. the files property has
        // a list of all the files being dragged. put it into the filesManager function
        dropBox.addEventListener('drop', mngDrop, false);

        function mngDrop(e) {
            let dataTrans = e.dataTransfer;
            let files = dataTrans.files;
            filesManager(files);
        }
        // use the FileReader API to get the image data, create an img element, and add
        // it to the gallery div. The API is asynchronous so onloadend is used to get the
        // result of the API function
        function previewFile(file) {
            // only allow images to be dropped
            let imageType = /image.*/;
            if (file.type.match(imageType)) {
                let fReader = new FileReader();
                let gallery = document.getElementById('gallery');
                // reads the contents of the specified Blob. the result attribute of this
                // with hold a data: URL representing the file's data
                fReader.readAsDataURL(file);
                // handler for the loadend event, triggered when the reading operation is
                // completed (whether success or failure)
                fReader.onloadend = function() {
                    let wrap = document.createElement('div');
                    let img = document.createElement('img');
                    // set the img src attribute to the file's contents (from read operation)
                    img.src = fReader.result;
                    let imgCapt = document.createElement('p');
                    // the name prop of the file contains the file name, and the size prop
                    // the file size. convert bytes to KB for the file size
                    let fSize = (file.size / 1000) + ' KB';
                    imgCapt.innerHTML =
                        `<span class="fName">${file.name}</span><span class="fSize">${fSize}</span><span class="fType">${file.type}</span>`;
                    gallery.appendChild(wrap).appendChild(img);
                    gallery.appendChild(wrap).appendChild(imgCapt);
                }
            } else {
                console.error("Only images are allowed!", file);
            }
        }

        function filesManager(files) {
            // spread the files array from the DataTransfer.files property into a new
            // files array here
            files = [...files];
            // send each element in the array to both the upFile and previewFile
            // functions
            // files.forEach(upFile);
            files.forEach(previewFile);
        }
    </script>


    {{-- change step of product --}}
    <script>
        function next_step1() {
            var type_of = $('#type_of').val()
            var submit = true
            if (type_of == null || type_of == "") {
                $(".type_of").html("Please select Type of Ad")
                submit = false
            }
            if (submit == true) {
                $("#step1").css("display", "none");
                $("#step2").css("display", "block");
            }
        }

        function next_step2() {
            var type = $('input[name=type_of_post]:checked').val()
            if (type == 'gift') {
                console.log(type)
                $("#step2").css("display", "none");
                $("#step4").css("display", "block");
            } else {
                submit = true
                if (submit == true) {
                    $("#step2").css("display", "none");
                    $("#step3").css("display", "block");
                }
            }
        }

        function next_step3() {
            submit = true
            var category_id = $('input[name=category_id]:checked').val()
            if (category_id == null || category_id == "") {
                $(".category_id").html("Please select Category")
                submit = false
            }
            if (submit == true) {
                $("#step3").css("display", "none");
                $("#step4").css("display", "block");
            }
        }

        function next_step4() {
            submit = true
            var image = $('#imgUpload').val();
            if (image == null || image == "") {
                $(".image_upload").html("Please select Image")
                submit = false
            }
            if (submit == true) {
                $("#step4").css("display", "none");
                $("#step5").css("display", "block");
            }
        }

        function next_step5() {
            var submit = true
            var name = $('#name').val()
            $('#name').removeClass('border border-danger')
            var des = $('#description').val()
            $('#description').removeClass('border border-danger')
            var currency = $('#currency').val()
            $('#currency').removeClass('border border-danger')
            var price = $('#price').val()
            $('#price').removeClass('border border-danger')
            var condition = $('#condition').val()
            $('#condition').removeClass('border border-danger')
            // var country = $('#country').val()
            // $('#country').removeClass('border border-danger')
            var state = $('#state').val()
            $('#state').removeClass('border border-danger')
            var city = $('#city').val()
            // console.log(city)
            $('#city').removeClass('border border-danger')
            var autocomplete = $('#autocomplete').val()
            $('#autocomplete').removeClass('border border-danger')

            if (name == null || name == "") {
                $("#name").addClass("border border-danger")
                submit = false
            }
            if (des == null || des == "") {
                $("#description").addClass("border border-danger")
                submit = false
            }
            if (currency == null || currency == "") {
                $("#currency").addClass("border border-danger")
                submit = false
            }
            if (price == null || price == "") {
                $("#price").addClass("border border-danger")
                submit = false
            }
            if (condition == null || condition == "") {
                $("#condition").addClass("border border-danger")
                submit = false
            }
            // if (country == null || country == "") {
            //     $("#country").addClass("border border-danger")
            //     submit = false
            // }
            if (state == null || state == "") {
                $("#state").addClass("border border-danger")
                submit = false
            }
            if (city == null || city == "") {
                $("#city").addClass("border border-danger")
                submit = false
            }
            if (autocomplete == null || autocomplete == "") {
                $("#autocomplete").addClass("border border-danger")
                submit = false
            }
            if (submit == true) {
                $("#product").submit();
            }
        }

        function pre_step2() {
            $("#step2").css("display", "none");
            $("#step1").css("display", "block");
        }

        function pre_step3() {
            $("#step2").css("display", "block");
            $("#step3").css("display", "none");
        }

        function pre_step4() {
            var type = $('input[name=type_of_post]:checked').val()
            if (type == 'gift') {
                $("#step2").css("display", "block");
            } else {
                $("#step3").css("display", "block");
            }
            $("#step4").css("display", "none");
        }

        function pre_step5() {
            $("#step4").css("display", "block");
            $("#step5").css("display", "none");
        }


        $('#term_cond').change(function() {
            if ($(this).prop('checked')) {
                // alert()
                $('#submit').css('pointer-events', '');
                $('#submit-div').css('background-color', '#364b5a');
            } else {
                $('#submit').css('pointer-events', 'none');
                $('#submit-div').css('background-color', '#9a9ea1');
            }
        })
    </script>
@include('user.layouts.partials.footer')
