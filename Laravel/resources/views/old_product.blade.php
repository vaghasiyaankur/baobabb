@extends('layouts.app')
@section('content')
    <!-- LISTING SECTION START-->
    <section class="search-listing py_5">
        <h3 class="fw-bold pt-4 ">Je recherch un electricien (Example d`annonces) </h3>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb  mb-4 ">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Accueil</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('category', $product->category->slug) }}"
                        class="text-decoration-none text-muted">{{ $product->category->name }}</a></li>
                {{-- <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Artisant / Metieers
                        specialises </a></li> --}}
            </ol>
        </nav>

        <!-------------- LEFT SECTION START ------------------->
        <div class="row">
            <div class="col-xl-9 mb-5">
                <!-- <img src="https://sl.baobabb.co/wp-content/uploads/2021/12/Electric-1-500x350.jpeg" class="img-fluid listing-img" alt=""> -->
                <div class="main overflow-hidden">
                    <div class="slider slider-for">
                        <div><img src="{{ asset($product->image) }}" class="img-fluid listing-img" alt="">
                        </div>
                        @foreach ($gallery as $img)
                            <div>
                                <img src="{{ asset($img) }}" class="img-fluid listing-img" alt="">
                            </div>
                        @endforeach
                    </div>
                    <div class="slider slider-nav">
                        <div>
                            <img src="{{ asset($product->image) }}" class="img-fluid listing-img" alt="">
                        </div>
                        @foreach ($gallery as $img)
                            <div>
                                <img src="{{ asset($img) }}" class="img-fluid listing-img" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <!---------------SWIPER SLIERD END---------------->

                <div class="left-side-pera mt-5 bg-white py-4 px-4">
                    <h4 class="fw-bold pb-4">{{ $product->name }} (Example d`annonces) </h4>
                    <h5 class="fw-bold pb-3 fs-3">Ce n`est pas une vriae annonce</h5>
                    <p>{{ $product->description }}</p>
                    {{-- <p class="border-left ps-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam,
                        explicabo fugiat enim impedit aut itaque doloribus incidunt tenetur deleniti recusandae
                        voluptates, quas quidem libero</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium necessitatibus suscipit
                        veritatis illo quo quos quisquam temporibus a minima, aliquam perspiciatis magni dolor quasi,
                        cupiditate ducimus dolore rerum, cum natus.</p> --}}
                    {{-- <a href="javascript:;"class="text-decoration-none"style="color: black;"><i class="fa-solid fa-pen-to-square pe-2 mt-4 text-muted"></i>
                    <span class="text-muted">Modifier cette annonce</span></a> --}}
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
                <div class="cfa-bg-text mb-5">
                    @if ($product->sale_price != null)
                        <span class="price-abs">{{ $product->currency->symbol }} {{ $product->price }}</span>
                        <h4 class="text-white fw-bold m-0">{{ $product->currency->symbol }} {{ $product->sale_price }}</h4>
                    @else
                        <h4 class="text-white fw-bold m-0">{{ $product->currency->symbol }} {{ $product->price }}</h4>
                    @endif
                </div>

                <!-- AVTAR RATEING TEXT -->
                <div class="avtar-rateing bg-white py-4 px-4 mb-5">
                    <h4 class="pb-4">Proprietaire de l'annonce</h4>
                    <div class="d-flex align-items-center justify-content-evenly ">
                        <div class="avtar">
                            <a href="javascript:;" class="text-dection-none"><img src="{{ asset($seller->avatar) }}" alt=""></a>
                        </div>
                        <div class="avtar-text">
                            <a href="{{route('singleSeller',$seller->id)}}"><h5>{{ $seller->name }}</h5></a>
                            <i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i
                                class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star"></i>
                            <h6 class="text-success pt-2"><i class="fa-solid fa-circle text-success fs-6"></i> EN LIGNE
                            </h6>
                        </div>
                    </div>
                    <div class="avtar-tel py-3 px-3 mt-5 ">
                        <span class="text-white">
                            <span>+232 00 000XXX</span>
                            <p class="m-0">Click to reveal phone number</p>
                        </span>
                    </div>
                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#messageModel">
                    <div class="avtar-tel py-3 px-3 mt-5 ">
                        <span class="text-white">
                            <span>Contect ad owner</span>
                            <p class="m-0">Ask about the offer</p>
                        </span>
                    </div>
                    </a>
                    <!-- Message Modal -->
                    <div class="modal fade " id="messageModel" tabindex="-1" aria-labelledby="messageModel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Contact ad owner</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="message" >
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Send</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- SECURE CHECK LIST -->
                <div class="secure-text mb-5">
                    <div class="title py-3 px-3">
                        <h5 class="text-white ps-3 m-0">Conseils de securrite</h5>
                    </div>
                    <div class="secure-list bg-white py-3 px-3">
                        <p><i class="fa-solid fa-check pe-2"></i>Rendeez-vous dans un lieu public</p>
                        <p><i class="fa-solid fa-check pe-2"></i>Verifer I`object de la transaction</p>
                        <p><i class="fa-solid fa-check pe-2"></i>Rendeez-vous dans un lieu public inconnu</p>
                        <p><i class="fa-solid fa-check pe-2"></i>Soyez accomepage un lieu</p>
                        <p class="m-0"><i class="fa-solid fa-check pe-2 mb-4"></i>Faites preuve d`intution</p>
                        <a href="javascript:;" class="text-decoration-none" style="color: black;">
                            <h6 class="ps-xl-5 ms-xl-2">PLUS DE CONSEILS DE SECURITE ICI<i
                                    class="fa-solid fa-arrow-right-long ps-3"></i></h6>
                        </a>
                    </div>
                </div>

                <!-- ACTION ICON -->
                <div class="action-icon bg-white px-sm-3 py-3 ">
                    <h5 class="fw-bold pb-3 ps-4">Action publicitaire</h5>
                    <div class="d-flex justify-content-evenly">
                        <div class="a_icon">
                            <a href="javascript:;" class="text-decoration-none" style="color: black;"><i
                                    class="fa-solid fa-timeline ps-3"></i>
                                <p class="m-0">Partager</p>
                            </a>
                        </div>
                        <div class="a_icon">
                            <a href="javascript:;" class="text-decoration-none" style="color: black;" onclick="window.print()"><i
                                    class="fa-solid fa-print ps-3"></i>
                                <p class="m-0">Imprimer</p>
                            </a>
                        </div>
                        <div class="a_icon">
                            <a href="javascript:;" class="text-decoration-none wishlist-btn" style="color: black;" data-id="{{ $product->id }}"><i
                                    class="fa-solid fa-heart ps-3"></i>
                                <p class="m-0">Favoris</p>
                            </a>
                        </div>
                        <div class="a_icon">
                            <a href="javascript:;" class="text-decoration-none" style="color: black;"><i
                                    class="fa-solid fa-flag ps-3"></i>
                                <p class="m-0">Signaler</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="map w-100 overflow-hidden pt-5 mb-5 text-center text-xl-start">
                    {{-- <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14877.469711075995!2d72.8869815!3d21.21727375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f6f08f9b693%3A0xd2f4780e70330cb0!2sMatrushree%20Ramuba%20Tejani%20and%20Matrushree%20Shantaba%20Vidiya%20Hospital!5e0!3m2!1sen!2sin!4v1651694646219!5m2!1sen!2sin"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                        <?php
                            $map_url = 'https://maps.google.com/maps?q='.$product->lat.','.$product->long.'&z=15&output=embed'
                        ?>
                    <iframe src="{{$map_url}}" width="500"
                        height="350" frameborder="0" style="border:0"></iframe>
                </div>
            </div>
        </div>

        <!----------- MORE ADD SECTION START ----------->
        <div class="more-add py-3 px-3">
            <div class="add-title">
                <h4 class="fw-bold">More Ads From This User</h4>
            </div>
            <div class="row">
                @foreach ($user_products as $pr)
                    @if ($pr->id != $product->id)
                        <div class="col-md-6 col-lg-4 col-xl-3 col-xxl-2 ">
                            <div class="card-box shadow ">
                                <img src="{{ asset($pr->image) }}" class="img-fluid" alt="card-img">
                                <div class="card-inner bg-white">
                                    <div class="d-flex justify-content-between pt-3 pb-2 text-muted">
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
                            </div>
                        </div>
                    @endif
                @endforeach

                <h4 class="fw-bold">Smilar Ads</h4>
                @foreach ($s_products as $pr)
                    @if ($pr->id != $product->id)
                        <div class="col-md-6 col-lg-4 col-xl-3 col-xxl-2 ">
                            <div class="card-box">
                                <img src="{{ asset($pr->image) }}" class="img-fluid" alt="card-img">
                                <div class="card-inner bg-white">
                                    <div class="d-flex justify-content-between pt-3 pb-2 text-muted">
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
                            </div>
                        </div>
                    @endif
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
@endsection
