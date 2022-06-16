@extends('layouts.app')
@section('content')
    <!-- LISTING SECTION START-->
   <!-- LISTING SECTION START-->
   <section class="search-listing py_5 all-categoriess_">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb  mb-4 pt-4">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Accueil</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Prestations de
                    services</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Artisant / Metieers
                    specialises </a></li>
        </ol>
    </nav>

    <!-------------- LEFT SECTION START ------------------->
    <div class="row">
        <div class="col-xl-9 mb-2">
            <!-- <img src="https://sl.baobabb.co/wp-content/uploads/2021/12/Electric-1-500x350.jpeg" class="img-fluid listing-img" alt=""> -->
            <div class="main overflow-hidden">
                <div class="slider slider-for">
                    {{-- <div><img src="{{ asset($product->image) }}" class="img-fluid listing-img" alt="">
                    </div> --}}
                    @foreach ($product->pictures as $img)
                    <div><img src="{{ asset($img->filename) }}"
                            class="img-fluid listing-img" alt="">
                    </div>
                    @endforeach
                    
                </div>
                <div class="slider slider-nav">
                    {{-- <div><img src="{{ asset($product->image) }}"
                            class="img-fluid listing-img" alt="">
                    </div> --}}
                    @foreach ($product->pictures as $img)
                    <div><img src="{{ asset($img->filename) }}"
                            class="img-fluid listing-img" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <!---------------SWIPER SLIERD END---------------->

            <div class="left-side-pera mt-5 bg-white py-4 px-4">
                <h4 class="fw-bold pb-4">{{ $product->name }} (Example d`annonces) </h4>
                    <h5 class="fw-bold pb-3 fs-3">Ce n`est pas une vriae annonce</h5>
                    <p>{{ $product->description }}</p>
                    <div class="d-flex flex-wrap justify-content-between mt-4 text-muted">
                        <div class="">
                            <i class="fa-solid fa-location-dot"></i><span
                                class="ps-1">{{ $product->city }},{{ $product->state }},{{ $product->country }}</span>
                        </div>
                        <div>
                            <span class="ps-1 pe-1"><i class="fa-solid fa-eye"></i>
                                {{ $product->impression }}</span>

                            <span class="ps-1 pe-1">#2746</span></a>
                            <i class="fa-solid fa-calendar"></i>
                            <span class="ps-1 ">{{ $product->created_at->format('Y-m-d') }}</span>
                        </div>
                    </div>
            </div>
        </div>

        <!----------------RIGHT SECTION START--------------->

        <div class="col-xl-3">
            <div class="mt-3 mt-lg-0">
                <h4 class="m-0">{{$product->name}}</h4>
            </div>

            <!-- AVTAR RATEING TEXT -->
            <div class="avtar-rateing pt-4 mb-2">
                    @if ($product->sale_price != null)
                        <span class="price-abs">{{ $product->currency->symbol }} {{ $product->price }}</span>
                        <h4 class=" fw-bold m-0">{{ $product->currency->symbol }} {{ $product->sale_price }}</h4>
                    @else
                        <h4 class=" fw-bold m-0">{{ $product->currency->symbol }} {{ $product->price }}</h4>
                    @endif
                <div class="avtar-tel py-3 px-3 mt-2">
                    <span class="text-white">
                        <span>{{$seller->phone}}</span>
                        <p class="m-0">{{ __('messages.click_reveal_phone_number')}}</p>
                    </span>
                </div>
                @auth 
                    @if($message <= 0)
                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#messageModel"><div class="avtar_bg_blue py-3 px-3 mt-3">
                            <span class="text-white">
                                <span>Contact Ad Owner</span>
                                <p class="m-0">Ask Questions about offer</p>
                            </span>
                        </div></a>
                    @else 
                    <a href="{{route('user.message')}}"><div class="avtar_bg_blue py-3 px-3 mt-3">
                        <input type="hidden" name="user_id" id="user_id" value="@auth 1 @else null @endif">
                        <span class="text-white">
                            <span>Contact Ad Owner</span>
                            <p class="m-0">Ask Questions about offer</p>
                        </span>
                    </div></a>
                    @endif
                @else
                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#loginModel"><div class="avtar_bg_blue py-3 px-3 mt-3">
                        <span class="text-white">
                            <span>Contact Ad Owner</span>
                            <p class="m-0">Ask Questions about offer</p>
                        </span>
                    </div></a>
                @endif
                {{-- Send Message Model --}}
                <div class="modal fade" id="messageModel" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered ">
                             <div class="modal-content p-3">
                                 <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"
                                     aria-label="Close"></button>
                                 <div class="modal-body login_modal p-2">
                                     <h5 class="modal-title mb-4" id="exampleModalLabel">Send Message</h5>
                                     <div class="ajax-form-result pb-3">
                                         <div class="alert-error" id="login_alert_error"></div>
                                     </div>
                                     <div class="ajax-form-result pb-3">
                                         <div class="alert-success" id="login_alert_success"></div>
                                     </div>
                                     <form name="login" action="{{ route('sendMessageInquiry') }}" method="post">
                                         @csrf
                                         <div class="row">
                                             <div class="col-12 col-sm-12">
                                                 <input type="hidden" name="to_user" value="{{$seller->id}}">
                                                 <input id="user_login" type="text" name="content" class="form-control border-0 border-bottom p-0 rounded-0" required>
                                                 <span class="error text-danger"></span>
                                             </div>
                                         </div>
                                         <div class="my-4">
                                            <button type="submit" id="login_btn"
                                                class="btn model_btn w-100 fw-bold" type="button">SEND</button>
                                        </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>
                <div class="d-flex align-items-center mt-4">
                    <div class="avtar pe-3">
                        <a href="javascript:;" class="text-dection-none"><img
                                src="{{asset($seller->avatar)}}"
                                alt=""></a>
                    </div>
                    <div class="avtar-text">
                        <a href="{{route('singleSeller',$seller->id)}}"><h5>{{$seller->name}}</h5></a>
                        <i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i
                            class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <h6 class="text-muted ms-3" style="align-self: end;
                    margin-bottom: 18px;"><i class="fa-solid fa-circle"></i> OFFLINE
                    </h6>
                </div>
                <div class="avtar_r_btns d-flex align-items-center py-3">
                    <div class="user_r_btn_ me-5 text-center">
                        <a href="javascript:;" >User Ads (<?php echo App\Models\Product::where('seller_id',$seller->id)->count(); ?>)</a>
                    </div>
                    <div class="user_r_btn_ text-center">
                        <a href="javascript:;">Follow</a>
                    </div>
                </div>
            </div>

            <!-- SECURE CHECK LIST -->
            <div class="secure-text mb-5">
                <div class="title py-3 px-3">
                    <h5 class="text-white ps-3 m-0">{{ __('messages.safety_tips')}}</h5>
                </div>
                <div class="secure-list bg-white py-3 px-3">
                    <p><i class="fa-solid fa-check pe-2"></i>{{ __('messages.meet_oublic_place')}}</p>
                    <p><i class="fa-solid fa-check pe-2"></i>{{ __('messages.verifier_object')}}</p>
                    <p><i class="fa-solid fa-check pe-2"></i>{{ __('messages.meet_unknown_public_place')}}</p>
                    <p><i class="fa-solid fa-check pe-2"></i>{{ __('messages.be_accomepage')}}</p>
                    <p class="m-0"><i class="fa-solid fa-check pe-2 mb-4"></i>{{ __('messages.show_intuitin')}}</p>
                    <a href="javascript:;" class="text-decoration-none" style="color: black;">
                        <h6>{{ __('messages.more_tips')}}<i class="fa-solid fa-arrow-right-long ps-3"></i></h6>
                    </a>
                </div>
            </div>

            <!-- ACTION ICON -->
            <div class="action-icon bg-white px-sm-3 py-3 ">
                <h5 class="fw-bold pb-3 ps-4">{{ __('messages.advertise_action')}}</h5>
                <div class="d-flex justify-content-evenly">
                    <div class="a_icon">
                        <a href="javascript:;" class="text-decoration-none text-muted"><i
                                class="fa-solid fa-timeline ps-3"></i>
                            <p class="m-0">{{ __('messages.to_share')}}</p>
                        </a>
                    </div>
                    <div class="a_icon">
                        <a href="javascript:;" class="text-decoration-none text-muted"><i
                                class="fa-solid fa-print ps-3"></i>
                            <p class="m-0">{{ __('messages.to_share')}}</p>
                        </a>
                    </div>
                    <div class="a_icon">
                        <a href="javascript:;" class="text-decoration-none text-muted"><i
                                class="fa-solid fa-heart ps-3"></i>
                            <p class="m-0">{{ __('messages.to_share')}}</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="map w-100 overflow-hidden pt-5 mb-5 text-center text-xl-start" style="max-height:390px;">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14877.469711075995!2d72.8869815!3d21.21727375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f6f08f9b693%3A0xd2f4780e70330cb0!2sMatrushree%20Ramuba%20Tejani%20and%20Matrushree%20Shantaba%20Vidiya%20Hospital!5e0!3m2!1sen!2sin!4v1651694646219!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <!--  -->
    <!---------- SUB SEARCH TITLE SWIPER --------->
    <div class="Swiper-serach_result_">
        <div class="add-title ms-3">
            <h4 class="fw-bold">{{ __('messages.realted_search')}}</h4>
        </div>
        <div class="swiper-container pt-3 w-100">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <a href="javascript:;" class="text-decoration-none">
                        <p class="m-0" style="color: #000;">Whirpool appliances</p>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" class="text-decoration-none">
                        <p class="m-0" style="color: #000;">Whirpool appliances</p>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" class="text-decoration-none">
                        <p class="m-0" style="color: #000;">Whirpool appliances</p>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" class="text-decoration-none">
                        <p class="m-0" style="color: #000;">Whirpool appliances </p>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" class="text-decoration-none">
                        <p class="m-0" style="color: #000;">Whirpool appliances</p>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" class="text-decoration-none">
                        <p class="m-0" style="color: #000;">Whirpool appliances</p>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" class="text-decoration-none">
                        <p class="m-0" style="color: #000;">Whirpool appliances</p>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" class="text-decoration-none">
                        <p class="m-0" style="color: #000;">Whirpool appliances</p>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" class="text-decoration-none">
                        <p class="m-0" style="color: #000;">Pet supplies</p>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="javascript:;" class="text-decoration-none">
                        <p class="m-0" style="color: #000;">Health & Beauty</p>
                    </a>
                </div>
            </div>
            <!-- If we need navigation buttons -->
            <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->
        </div>
    </div>

    <!----------- MORE ADD SECTION START ----------->
    <div class="more-add py-3 px-3">
        <div class="add-title">
            <h4 class="fw-bold">{{ __('messages.more_ads')}}</h4>
        </div>
        <div class="row">
            @foreach ($user_products as $product)
                    <div class="col-md-6 col-lg-4 col-xl-3 col-xxl-2 card_w_4 ">
                        @include('product-block')
                        {{-- <div class="card-box">
                            <img src="{{ asset($pr->image) }}" class="img-fluid card-img_height" alt="card-img">
                            <div class="card-inner bg-white">
                                <div class="flex-wrap d-flex justify-content-between pt-3 pb-2 text-muted">
                                    <span><i class="fa-solid fa-bullseye pe-2"></i>{{$pr->category->name}}</span>
                                    <span><i class="fa-solid fa-location-dot pe-2"></i>{{ $pr->city }}</span>
                                </div>
                                <a href="{{route('product',$pr->slug)}}"><p class="m-0 fw-bold pb-2">{{ $pr->name }}</p></a>
                                <div class="d-flex flex-wrap justify-content-between pb-2">
                                    <p class="m-0 text-danger fw-bold">{{ $pr->price }}</p>
                                    <div class="icon">
                                        <a class="wishlist-btn" href="javascript:;"
                                                data-id="{{ $pr->id }}"><i class="fa-regular fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
            @endforeach

            <h4 class="fw-bold">{{ __('messages.similar_ads')}}</h4>
            @foreach ($s_products as $product)
                    <div class="col-md-6 col-lg-4 col-xl-3 col-xxl-2 ">
                       @include('product-block')
                        {{-- <div class="card-box">
                            <img src="{{ asset($pr->image) }}" class="img-fluid" alt="card-img">
                            <div class="card-inner bg-white">
                                <div class="flex-wrap d-flex justify-content-between pt-3 pb-2 text-muted">
                                    <span><i class="fa-solid fa-bullseye pe-2"></i>{{$pr->category->name}}</span>
                                    <span><i class="fa-solid fa-location-dot pe-2"></i>{{ $pr->city }}</span>
                                </div>
                                <p class="m-0 fw-bold pb-2">{{ $pr->name }}</p>
                                <div class="d-flex flex-wrap justify-content-between pb-2">
                                    <p class="m-0 text-danger fw-bold">{{ $pr->price }}</p>
                                    <div class="icon">
                                        <a class="wishlist-btn" href="javascript:;"
                                                data-id="{{ $product->id }}"><i class="fa-regular fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
            @endforeach
        </div>
    </div>



</section>

    <!-- JQ JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <!-- BOOTSTARP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: false,
            infinite: false,
            arrows: false,
            centerMode: false,
            focusOnSelect: true
        });
    </script>

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
                // spaceBetween:0,
                slidesPerView: 7,
                centeredSlides: false,
                roundLengths: true,
                loop: false,
                loopAdditionalSlides: 9,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                }
            });
        });
    </script>
@endsection
