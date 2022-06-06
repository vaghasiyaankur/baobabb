@extends('layouts.app')
@section('content')
    <section class="seller-section py_5 all-categoriess_">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pt-4 pb-4 m-0">
                <li class="breadcrumb-item fs-5"><a href="{{route('home')}}" class="text-decoration-none text-muted">{{ __('messages.home')}}</a></li>
                <li class="breadcrumb-item fs-5"><a href="{{route('seller')}}" class="text-decoration-none text-muted">{{ __('messages.seller')}}</a></li>
                <li class="breadcrumb-item fs-5">{{$seller->name}}</li>
            </ol>
        </nav>
        <div class="avtar-seller bg-white py-3 px-3">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="d-flex justify-content-evenly align-items-center border-right">
                        <div class="avtar pe-lg-5">
                            <img src="{{ asset($seller->avatar) }}" alt="">
                        </div>
                        <div class="avtar-text">
                            <h5>{{ $seller->name }}</h5>
                            <i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i
                                class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-light"></i>
                            <h6 class="text-secondary pt-2"><i class="fa-solid fa-circle text-light fs-6"></i> OFFLINE
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="py-3 px-3 border-right text-center text-md-start">
                        <h5><i class="fa-solid fa-location-dot pe-2"></i>Location :</h5>
                        <h5>{{ $seller->city }},{{ $seller->state }},{{ $seller->countries->name }}</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="avtar-tel py-3 px-3 ">
                        <span class="text-white">
                            <span>{{ $seller->phone }}</span>
                            <p class="m-0">{{ __('messages.click_reveal_phone_number')}}</p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="seller-about bg-white py-4 px-4 mt-5">
            <div class="seller-title d-flex justify-content-between  ">
                <div class="">
                    <h4 class="fw-bold">{{ __('messages.about_seller')}}</h4>
                </div>
                <div class="fs-5 justify-content-evenly align-items-center">
                    <span><i class="fa-brands fa-twitter"></i></span>
                    <span><i class="fa-brands fa-youtube"></i></span>
                    <span><i class="fa-brands fa-linkedin-in pe-1"></i></span>
                    <span><i class="fa-brands fa-instagram"></i></span>
                    <span><i class="fa-solid fa-crop"></i></span>
                </div>
            </div>
            <h5 class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit blanditiis,
                accusantium
                nesciunt autem qui in saepe voluptatem reprehenderit adipisci. Ipsam suscipit quas facilis quod totam
                ipsum voluptate quos tempora pariatur.
                Sit corporis, exercitationem id ex mollitia non deleniti ab laborum velit voluptatibus aliquam ratione
                autem iusto aperiam odit cum veniam. Ullam consequatur tempore qui cupiditate provident, ipsa animi.
                Error, dolor.
                Maiores dolorem suscipit soluta debitis doloribus sint voluptas, ipsam quibusdam facilis. Magnam, nihil
                quisquam? Reiciendis nisi tempora, aspernatur harum natus commodi nam molestiae qui! Modi saepe
                quibusdam suscipit minus dolor?</h5>
        </div>
        {{---------------------------------Testimonials--------------------------}}
        <div class="seller-add d-flex justify-content-between align-items-center py-4 px-4 bg-white mt-5">
            <div class="">
                <h4 class="fw-bold m-0">{{ __('messages.testimonial')}}</h4>
            </div>
            <div class="">
                {{-- <input type="email" class="form-control border-0 border-bottom" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search for..."> --}}
            </div>
        </div>
        <div class="row">
            @foreach($ratings as $rating)
            <?php $child = App\Models\Rating::where('parent_id',$rating->id)->first(); ?>
                <div class="col-lg-6 p-5">
                    <div class="position-relative">
                        <div class="">
                            <span class="fa-star fa-regular @if($rating->rate >= 1) checked @endif"></span>
                            <span class="fa-star fa-regular @if($rating->rate >= 2) checked @endif"></span>
                            <span class="fa-star fa-regular @if($rating->rate >= 3) checked @endif"></span>
                            <span class="fa-star fa-regular @if($rating->rate >= 4) checked @endif"></span>
                            <span class="fa-star fa-regular @if($rating->rate >= 5) checked @endif"></span>
                        </div>
                        <div class="feedback-user">
                            <span class="d-flex justify-content-end text-muted">By {{$rating->from_user->name}}</span>
                        </div>
                    </div>
                    <div class="feed-b-card p-4 bg-white mt-3 rounded-3">
                        <div class="feed_card_title d-flex align-items-center justify-content-between pb-3">
                            <h5 class="m-0" >{{$rating->review}}</h5>
                        </div>
                        @if($child)
                            <div class="feed_vard_inner px-4 py-2" style="background-color: whitesmoke;">
                                <h6 class="text-muted">Aouther's Response :</h6>
                                <p class="m-0">{{$child->review}}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="seller-add d-flex justify-content-between align-items-center py-4 px-4 bg-white mt-5">
            <div class="">
                <h4 class="fw-bold m-0">{{ __('messages.seller_ads')}}</h4>
            </div>
            <div class="">
                {{-- <input type="email" class="form-control border-0 border-bottom" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search for..."> --}}
            </div>
        </div>
        
        <div class="row mt-4 ">
            @foreach ($products as $pr)
                <div class="col-md-6 col-lg-4 col-xl-3 col-xxl-2 ">
                    <div class="card-box shadow ">
                        <img src="{{ asset($pr->image) }}" class="img-fluid" alt="card-img">
                        <div class="card-inner bg-white">
                            <div class="d-flex justify-content-between pt-3 pb-2 text-muted">
                                <span><i class="fa-solid fa-bullseye pe-2"></i>Appareils elec..</span>
                                <span><i class="fa-solid fa-location-dot pe-2"></i>{{ $pr->city }}</span>
                            </div>
                            <a href="{{ route('product', $pr->slug) }}">
                                <p class="m-0 fw-bold pb-2">{{ $pr->name }}</p>
                            </a>
                            <div class="d-flex flex-wrap justify-content-between pb-2">
                                <p class="m-0 text-danger fw-bold">{{ $pr->price }}</p>
                                <div class="icon">
                                    <a class="wishlist-btn" href="javascript:;" data-id="{{ $pr->id }}"><i
                                            class="fa-regular fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </section>
@endsection
