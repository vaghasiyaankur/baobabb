<!----- FOOTER SECTION START ------>
<footer class="footer-section ">
        <div class="row pb-3 b-bottom">
            <div class="col-sm-6 col-lg-7">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="f-text">
                            <p class="f_c_links_">{{ __('messages.footer_desc')}} </p>
                        </div>
                    </div>
                    <div class="col-lg-3 mx-auto">
                        <div class="f-links ">
                            <h6 class="mb-2">{{ __('messages.shope')}}</h6>
                            <p class="mb-1 "><a href="{{route('allcategory')}}" class="f_c_links_ "> {{ __('messages.categories')}}</a></p>
                            <p class="mb-1 "><a href="{{route('seller')}}" class="f_c_links_ "> {{ __('messages.our_sellers')}}</a></p>
                        </div>
                    </div>
                    <div class="col-lg-3 mx-auto">
                        <div class="f-links mt-3 mt-lg-0">
                            <h6>{{ __('messages.support')}}</h6>
                            <p class="mb-1 "><a href="#" class="f_c_links_ "> {{ __('messages.contact_us')}}</a></p>
                            <p class="mb-1 "><a href="#" class="f_c_links_ "> {{ __('messages.help_center')}}</a></p>
                            <p class="mb-1 "><a href="{{ URL::to('page/anti-scam')}}" class="f_c_links_ "> {{ __('messages.anti_scam')}}</a></p>
                            <p class="mb-1 "><a href="#" class="f_c_links_ "> {{ __('messages.service_status')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-5">
                <div class="row ">
                    <div class="col-lg-6 mt-3 mt-lg-0">
                        <h6>{{ __('messages.policy_center')}}</h6>
                        <p class="mb-1 "><a href="" class="f_c_links_ "> {{ __('messages.prohibited_items')}}</a></p>
                        <p class="mb-1 "><a href="" class="f_c_links_ "> {{ __('messages.prohibited_conduct')}} </a></p>
                        <p class="mb-1 "><a href="" class="f_c_links_ "> {{ __('messages.electronic_communications')}}</a></p>
                        <p class="mb-1 "><a href="" class="f_c_links_ "> {{ __('messages.information')}} </a></p>
                    </div>
                    <div class="col-lg-6 text-lg-end mt-3 mt-lg-0">
                        <h6>{{ __('messages.download_our_app')}}</h6>
                        <div class="f_app_links d-flex flex-wrap justify-content-lg-end justify-content-start align-items-center mb-3">
                            {{-- <a href="" class="text-white"> --}}
                                <div class="a-store d-flex align-items-center me-2 payment-icon">
                                    <div class="a_btn_img mx-1">
                                        <i class="fa-brands fa-apple fs-5"></i>
                                    </div>
                                    <div class="a_btn_text me-1">
                                        <p class="small_p m-0">{{ __('messages.download_on_the')}}</p>
                                        <p class="mb-0">{{ __('messages.app_store')}}</p>
                                    </div>
                                </div>
                            {{-- </a> --}}
                            {{-- <a href=""class="text-white"> --}}
                                <div class="g-store d-flex align-items-center text-start payment-icon">
                                    <div class="g_btn_img mx-1">
                                        <img src="{{asset('assets/img/google-play.png')}}" alt="">
                                    </div>
                                    <div class="g_btn_text me-1">
                                        <p class="small_p m-0">{{ __('messages.get_on')}}</p>
                                        <p class="mb-0">{{ __('messages.google_play')}}</p>
                                    </div>
                                </div>
                            {{-- </a> --}}
                        </div>
                        <h6 class="mb-1 mt-3 mt-lg-0">{{ __('messages.follow_us_online')}}</h6>
                        <div class="f_online_icon">
                            <a href="javascript:;"><i class="fa-brands fa-twitter-square hover_1"></i></a>
                            <a href="javascript:;"><i class="fa-brands fa-facebook-square hover_2"></i></a>
                            <a href="javascript:;"><i class="fa-brands fa-instagram hover_3"></i></a>
                            <a href="javascript:;"><i class="fa-brands fa-linkedin hover_4"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="second-footer py-4">
            <div class="footer-s-inner d-flex flex-wrap justify-content-between align-items-center">
                <div class="left-s-content d-flex align-items-center">
                    <img src="{{asset('assets/img/footer-logo.png')}}" class="f-s-logo" alt="">
                    <h6 class="m-0 ">{{ __('messages.copyright_text')}} </h6>
                </div>
                <div class="right-s-content">
                    <h6 class="m-0"><a href="{{ URL::to('page/privacy')}}" class="text-white">{{ __('messages.privacy_policy')}}</a> | <a href="{{ URL::to('page/terms')}}" class="text-white">{{ __('messages.term_of_sevices')}}</a>  </h6>
                </div>
            </div>
        </div>
    </footer>
<!----- FOOTER SECTION END ------>



<!-- SLICK SLIDER -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.0/js/swiper.js"></script>

<!-- JQ JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<!-- BOOTSTARP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

{{-- Lazy Load JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ asset('assets/js/dropzone.js') }}"></script>

<!---------SUB TITLE SWIPER JS--------->
<script>
    $(document).ready(function () {
        // Assign some jquery elements we'll need
        var $swiper = $(".swiper-container");
        var $bottomSlide = null; // Slide whose content gets 'extracted' and placed
        // into a fixed position for animation purposes
        var $bottomSlideContent = null; // Slide content that gets passed between the
        // panning slide stack and the position 'behind'
        // the stack, needed for correct animation style

        var mySwiper = new Swiper(".swiper-container", {
            spaceBetween: 1,
            slidesPerView: 9,
            centeredSlides: false,
            roundLengths: true,
            loop: false,
            loopAdditionalSlides: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });
    });
    
    var url = "{{ route('changeLang') }}";
    $(".languagess").click(function(){
        var id = $(this).data('id');
        window.location.href = url + "?lang="+ id;
    });
</script>

<!---------------- CREATE ACCOUNT MODAL SCRIPT ------------->
<script>
    $("#create_ac").click(function() {
        $(".login_modal").css("display", "none")
        $(".createAcc_modal").css("display", "block")
    });
    $("#login_ac").click(function() {
        $(".login_modal").css("display", "block")
        $(".createAcc_modal").css("display", "none")
    });
    $("#forget_pass").click(function() {
        $(".recover_pass_modal").css("display", "block")
        $(".createAcc_modal").css("display", "none")
        $(".login_modal").css("display", "none")
    });
    $("#login_acc").click(function() {
        $(".login_modal").css("display", "block")
        $(".createAcc_modal").css("display", "none")
        $(".recover_pass_modal").css("display", "none")
    });
</script>

{{-- FOR AUTOCOMPLATE ADDRESS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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

{{-- <script>
    $('#login_btn').click(function() {
        if ($('#user_login').val()) {
            var user = $('#user_login').val();
        } else {

        }
        if ($('#pass_login').val()) {
            var pass = $('#pass_login').val();
        } else {

        }
    })
</script> --}}

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- User Login --}}
<script>
    function loginUser() {
        var pass = $('#pass_login').val()
        var user = $('#user_login').val();
        var isValid = true;
        //Validate UserName
        if (user == "") {
            $("#user_login").siblings(".error").html("Please Enter Email")
            isValid = false;
        }
        //Validate Password
        if (pass == "") {
            $("#pass_login").siblings(".error").html("Please Enter password")
            isValid = false;
        }
        if (isValid == true) {
            $("#login_alert_error").html("")
            $("#login_alert_success").html("")
            $('#login_btn').prop('disabled', true);
            $('#login_btn').html('<i class="fa fa-spinner fa-spin"></i>');
            $.ajax({
                url: "{{ url('/login') }}",
                type: "POST",
                data: {
                    email: user,
                    password: pass,
                    _token: '{{ csrf_token() }}'
                },
                error: function($err) {
                    $("#login_alert_error").html("The credentials are invalid.")
                    $('#login_btn').prop('disabled', false);
                    $('#login_btn').html('LOGIN');
                    // Swal.fire({
                    //     icon: 'error',
                    //     title: 'credentials not match',
                    //     showConfirmButton: false,
                    //     timer: 1500
                    // })
                },
                success: function(result) {
                    $("#login_alert_error").html("")
                    $("#login_alert_success").html("You are connected, wait a second.")
                    setTimeout(function() {
                        location.reload(true);
                    }, 2000);
                }
            });
        }
    }
</script>

{{-- Register User --}}
<script>
    function register() {
        var user = $('#reg_username').val();
        var email = $('#reg_email').val();
        var pass = $('#reg_pass').val();
        var conf_pass = $('#reg_conf_pass').val();
        $("#reg_username").siblings(".error").html("")
        $("#reg_email").siblings(".error").html("")
        $("#reg_pass").siblings(".error").html("")
        $("#reg_conf_pass").siblings(".error").html("")
        var isValid = true;
        //Validate UserName
        if (user == "") {
            $("#reg_username").siblings(".error").html("Please Enter UserName")
            isValid = false;
        }
        //Validate Email
        if (email == "") {
            $("#reg_email").siblings(".error").html("Please Enter Email")
            isValid = false;
        }
        //Validate Password
        if (pass == "") {
            $("#reg_pass").siblings(".error").html("Please Enter password")
            isValid = false;
        }
        //Validate Confirm Password
        if (conf_pass == "") {
            $("#reg_conf_pass").siblings(".error").html("Please Enter Confirm password")
            isValid = false;
        }
        if (isValid == true) {
            $("#register_alert_success").html("")
            $("#register_alert_error").html("")
            $('#register_btn').prop('disabled', true);
            $('#register_btn').addClass('buttonload');
            $('#register_btn').html('<i class="fa fa-spinner fa-spin"></i>');
            $.ajax({
                url: "{{ route('register') }}",
                type: "POST",
                data: {
                    name: user,
                    email: email,
                    password: pass,
                    password_confirmation: conf_pass,
                    _token: '{{ csrf_token() }}'
                },
                error: function($err) {
                    $("#register_alert_error").html("Failed.")
                    $('#register_btn').prop('disabled', false);
                    $('#register_btn').html('REGISTER');
                    // Swal.fire({
                    //     icon: 'error',
                    //     title: 'failed',
                    //     showConfirmButton: false,
                    //     timer: 1000
                    // })
                    var error = $err['responseJSON']['errors']
                    if (error['email']) {
                        $("#reg_email").siblings(".error").html(error['email'][0])
                    }
                    if (error['password'][0]) {
                        $("#reg_pass").siblings(".error").html(error['password'][0])
                    }
                    if (error['password'][1]) {
                        $("#reg_conf_pass").siblings(".error").html(error['password'][1])
                    }
                    console.log(error)
                },
                success: function(result) {
                    $("#register_alert_error").html("")
                    $("#register_alert_success").html("Please verify your mail.")
                    // Swal.fire({
                    //     icon: 'success',
                    //     title: 'Register Sucessfull',
                    //     showConfirmButton: false,
                    //     timer: 3000
                    // })
                    setTimeout(function() {
                        location.reload(true);
                    }, 2000);
                }
            });
        }
    }
    $('#term_cond').change(function() {
        if ($(this).prop('checked')) {
            $('#register_btn').attr('disabled', false);
        } else {
            $('#register_btn').attr('disabled', true);
        }
    })
</script>

{{-- forgot password --}}

<script>
    $('#forget-email-submit').on('click', function() {
        var mail = $('#forget_email').val();
        var emailReg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (mail == "") {
            $("#forget_email").siblings(".error").html("Please Enter Email")
        } else if (!emailReg.test(mail)) {
            $("#forget_email").siblings(".error").html("Please Enter Valid Email")
        } else {
            $("#forgor_sent").html("")
            $('#forget-email-submit').prop('disabled', true);
            $('#forget-email-submit').html('<i class="fa fa-spinner fa-spin"></i>');
            $.ajax({
                url: "{{ route('user.forgot.password') }}",
                type: "POST",
                data: {
                    email: mail,
                    _token: '{{ csrf_token() }}'
                },
                error: function($err) {
                    $('#forget-email-submit').prop('disabled', false);
                    $('#forget-email-submit').html('RECOVER');
                    var error = $err['responseJSON']['errors']
                    console.log($err)
                    if (error['email']) {
                        $("#forget_email").siblings(".error").html("This Email is not Exist.")
                    }
                },
                success: function(result) {
                    $('#forget-email-submit').prop('disabled', false);
                    $('#forget-email-submit').html('Submit');
                    $("#forget_email").siblings(".error").html("")
                    $("#forgor_sent").html("Please Check your mail.")
                    // console.log(result)
                }
            });
        }

    })
</script>

{{-- add product in wishlist --}}
<script>
    $(document).ready(function() {
        // alert();
        $('.wishlist-btn').on('click', function() {
            var id = $(this).attr("data-id");
            var attr = $(this).children('i')
            $.ajax({
                url: "{{ route('user.wishlist.store') }}",
                type: "POST",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                error: function($err) {
                    console.log(error)
                },
                success: function(result) {
                    console.log(result)
                    if(result == 0)
                    {
                        // console.log(attr)
                        attr.removeClass('fa-solid text-danger fa-heart')
                        attr.addClass("fa-regular fa-heart")
                    }
                    else if(result == 1)
                    {
                        // console.log(1)
                        attr.removeClass('fa-regular fa-heart')
                        attr.addClass("fa-solid text-danger fa-heart")
                    }
                    // Swal.fire({
                    //     icon: 'success',
                    //     title: 'Product Added to Wishlist',
                    //     showConfirmButton: false,
                    //     timer: 1500
                    // })
                }
            });

        })
    })
</script>

<script>
    function getVals() {
        // Get slider values
        let parent = this.parentNode;
        let slides = parent.getElementsByTagName("input");
        let slide1 = parseFloat(slides[0].value);
        let slide2 = parseFloat(slides[1].value);
        // Neither slider will clip the other, so make sure we determine which is larger
        if (slide1 > slide2) {
            let tmp = slide2;
            slide2 = slide1;
            slide1 = tmp;
        }

        let displayElement = parent.getElementsByClassName("rangeValues")[0];
        displayElement.innerHTML = "$" + slide1 + " - $" + slide2;
    }

    window.onload = function() {
        // Initialize Sliders
        let sliderSections = document.getElementsByClassName("range-slider");
        for (let x = 0; x < sliderSections.length; x++) {
            let sliders = sliderSections[x].getElementsByTagName("input");
            for (let y = 0; y < sliders.length; y++) {
                if (sliders[y].type === "range") {
                    sliders[y].oninput = getVals;
                    // Manually trigger event first time to display values
                    sliders[y].oninput();
                }
            }
        }
    }
</script>

<!------SECOUND HEADER SWIPER STICKY JS ------->
<script>
    $(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
        $(".nav-bottom").addClass("sticky-header");
        $(".all-categoriess_").addClass("categories-padding");
    } else {
        $(".nav-bottom").removeClass("sticky-header");
        $(".all-categoriess_").removeClass("categories-padding");
    }
});
</script>
<!-- wlcome subswiper -->
<script>
    $(window).scroll(function() {    
    var scroll1 = $(window).scrollTop();

    if (scroll1 >= 600) {
        $(".wlcm-heder-swiper").addClass("sticky-wl-header");
        $(".swiper__padding").addClass("wl-categories-padding");
    } else {
        $(".wlcm-heder-swiper").removeClass("sticky-wl-header");
        $(".swiper__padding").removeClass("wl-categories-padding");
    }
});
</script>

</body>

</html>
