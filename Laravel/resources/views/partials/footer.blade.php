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

<!-- JQ JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<!-- BOOTSTARP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


<script>
    $(document).ready(function() {
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
            centeredSlides: true,
            roundLengths: true,
            loop: false,
            loopAdditionalSlides: 30,
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
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    {{-- javascript code --}}
        <script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?libraries=places&v=3&language=En&key=AIzaSyBZhREk9TESs69r99eYGKkIQ725IqOP8Zc&ver=5.9.3'></script>
    <script>
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var input = document.getElementById('autocomplete');
            var options = {
		        types: ['(cities)'],
		        componentRestrictions: {country: "in"}
		    };
            var autocomplete = new google.maps.places.Autocomplete(input,options);
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

</body>

</html>
