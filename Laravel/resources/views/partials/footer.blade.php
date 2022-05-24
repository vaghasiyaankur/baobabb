<!----- FOOTER SECTION START ------>
<footer class="footer-section py_5">
    <div class="row  align-items-center py-3 text-center text-lg-start ">
        <div class="col-md-4 col-12 pb-2 pb-sm-0">
            <h6 class="m-0 pe-lg-5">Copyright © 2022 Baobabb | Hello Media Group </h6>
        </div>
        <div class="col-md-6 col-12">
            <nav class="nav justify-content-center justify-content-lg-start flex-column flex-sm-row">
                <a class="nav-link text-white" aria-current="page" href="#">Privacy policy</a>
                <a class="nav-link text-white" href="#">Tearm of Service</a>
                <a class="nav-link text-white" href="#">Help Desk</a>
                <a class="nav-link text-white" href="#">Service Status</a>
            </nav>
        </div>
        <div class="col-md-2 col-12 ">
            <div
                class="footer-icon d-flex flex-direction-row justify-content-lg-end justify-content-center pt-3 pt-sm-0">
                <i class="fa-brands fa-facebook-square px-2"></i>
                <i class="fa-brands fa-twitter px-2"></i>
                <i class="fa-brands fa-instagram px-2"></i>
                <i class="fa-brands fa-linkedin-in px-2"></i>
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
                    console.log($err)
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
            $.ajax({
                url: "{{ route('user.forgot.password') }}",
                type: "POST",
                data: {
                    email: mail,
                    _token: '{{ csrf_token() }}'
                },
                error: function($err) {
                    var error = $err['responseJSON']['errors']
                    console.log($err)
                    if (error['email']) {
                        $("#forget_email").siblings(".error").html("This Email is not Exist.")
                    }
                },
                success: function(result) {
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
        $('.wishlist-btn').on('click', function() {
            // alert($(this).attr())
            var id = $(this).attr("data-id");
            console.log($(this).attr("data-id"));

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
                    Swal.fire({
                        icon: 'success',
                        title: 'Product Added to Wishlist',
                        showConfirmButton: false,
                        timer: 1500
                    })
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

</body>

</html>
