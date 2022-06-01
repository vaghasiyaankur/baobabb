@extends('layouts.app')
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <!---------- SUB TITLE SWIPER --------->
    <section class="main-header">
        <div class="container-fluid py_5 ">
            <div class="row align-items-center">
                <div class="col-lg-8 ">
                    <h2 class="header-title">{{ __('messages.main_title')}}</h2>
                    <p class="header-text pb-lg-5">{{ __('messages.main_title_2')}}</p>
                    <div class="categorie pt-lg-5 d-flex flex-wrap justify-content-between align-items-center">
                        <div class="categorie-box mt-3">
                            <a href="javascript:;" class="text-decoration-none"><img
                                    src="https://sl.baobabb.co/wp-content/uploads/2021/08/Apartment.png"
                                    class="img-fluid w-100" alt=""></a>
                        </div>
                        <div class="categorie-box mt-3">
                            <a href="javascript:;" class="text-decoration-none"><img
                                    src="https://sl.baobabb.co/wp-content/uploads/2021/06/Household-electronics.png"
                                    class="img-fluid w-100" alt=""></a>
                        </div>
                        <div class="categorie-box mt-3">
                            <a href="javascript:;" class="text-decoration-none"><img
                                    src="https://sl.baobabb.co/wp-content/uploads/2021/08/Beauty-products.png"
                                    class="img-fluid w-100" alt=""></a>
                        </div>
                        <div class="categorie-box mt-3">
                            <a href="javascript:;" class="text-decoration-none"><img
                                    src="https://sl.baobabb.co/wp-content/uploads/2021/08/House.png" class="img-fluid w-100"
                                    alt=""></a>
                        </div>
                        <div class="categorie-box mt-3">
                            <a href="javascript:;" class="text-decoration-none"><img
                                    src="https://sl.baobabb.co/wp-content/uploads/2021/06/Household-electronics.png"
                                    class="img-fluid w-100" alt=""></a>
                        </div>
                        <div class="categorie-box mt-3">
                            <a href="{{ route('allcategory') }}" class="text-decoration-none">
                                <p class="text-white text-center mb-0">{{ __('messages.allOther')}} <br> {{ __('messages.categories')}}</p>
                                <i class="fa-solid fa-arrow-right-long text-white ps-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pt-4 pt-lg-0">
                    <div class="header-form">
                        <form action="{{ route('search.product') }}" method="POST">
                            @csrf
                            <h3 class="text-black mb-4">{{ __('messages.searchformheader')}}</h3>
                            <div class="mb-4">
                                <input type="name" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                                    placeholder="{{ __('messages.searchplaceholder')}}" required>
                            </div>
                            <div class="mb-4">
                                {{-- <input type="text" class="form-control" id="exampleInputPassword1"
                                placeholder="Located in..."> --}}
                                <input type="text" name="autocomplete" id="autocomplete" class="form-control"
                                    placeholder="{{ __('messages.selectlocation')}}">
                                <input type="hidden" name="latitude" id="latitude" class="form-control">
                                <input type="hidden" name="longitude" id="longitude" class="form-control">

                            </div>
                            <div class="mb-4 ">
                                <select class="form-control " name="category_id" id="">
                                    <option>{{ __('messages.incategory')}}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" class="form-control" id="category"
                                placeholder="In Category..."> --}}
                            </div>
                            <button type="submit" class="btn btn-primary w-100">{{ __('messages.search')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <div class="wlcm-heder-swiper">                               
         <div class="bg-light ">
                <div class="swiper-container p-3">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper" style="height: auto">
                        <!-- Slides -->
                        @foreach ($categories as $category)
                        <div class="swiper-slide">
                            <a href="{{route('category',$category->slug)}}" class="change-category" data-id="{{ $category->slug }}">
                                <p class="m-0">{{ $category->name }}</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
       </div>                            
    <div id="data-wrapper" class="swiper__padding">
        <!-- Results -->
    </div>
    <!-- Data Loader -->
    <div class="auto-load text-center">
        <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
            <path fill="#000"
                d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                    from="0 50 50" to="360 50 50" repeatCount="indefinite" />
            </path>
        </svg>
    </div>
    <!------CATEGORY CARD SECTION END----->


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
        $(document).ready(function() {
            $('.change-category').on('click', function() {
                slug = $(this).attr('data-id')
                $.ajax({
                    url: "/category/change/" + slug,
                    type: "GET",
                    error: function($err) {
                        console.log($err)
                    },
                    success: function(result) {
                        $('#category-product').replaceWith(result)
                        console.log(result)
                    }
                });
            })
        })
    </script>

<script>
    var ENDPOINT = "{{ url('/') }}";
    var page = 1;
    infinteLoadMore(page);
    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            infinteLoadMore(page);
        }
    });
    function infinteLoadMore(page) {
        $.ajax({
                url: ENDPOINT + "?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('.auto-load').show();
                }
            })
            .done(function (response) {
                if (response.length == 0) {
                    $('.auto-load').html("");
                    return;
                }
                $('.auto-load').hide();
                $("#data-wrapper").append(response);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }
</script>
@endsection
