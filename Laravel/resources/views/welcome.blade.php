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
                    <h2 class="header-title">Rechercher tout ce don't vous avez besoin</h2>
                    <p class="header-text pb-lg-5">Votre communaute` en lignr ou` vous pouvez trouver tout ce que vous
                        cherchez,sans difficulte`.</p>
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
                                <p class="text-white text-center mb-0">All other <br> Categories</p>
                                <i class="fa-solid fa-arrow-right-long text-white ps-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pt-4 pt-lg-0">
                    <div class="header-form">
                        <form action="{{ route('search.product') }}" method="POST">
                            @csrf
                            <h3 class="text-black mb-4">I'm interested in...</h3>
                            <div class="mb-4">
                                <input type="name" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                                    placeholder="Search for..." required>
                            </div>
                            <div class="mb-4">
                                {{-- <input type="text" class="form-control" id="exampleInputPassword1"
                                placeholder="Located in..."> --}}
                                <input type="text" name="autocomplete" id="autocomplete" class="form-control"
                                    placeholder="Select Location">
                                <input type="hidden" name="latitude" id="latitude" class="form-control">
                                <input type="hidden" name="longitude" id="longitude" class="form-control">

                            </div>
                            <div class="mb-4 ">
                                <select class="form-control " name="category_id" id="">
                                    <option>In Category...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" class="form-control" id="category"
                                placeholder="In Category..."> --}}
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!------CATEGORY CARD SECTION START----->
    <section class="category-card py_5">
        <div class="row" id="category-product">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                    <div class="card-box">
                        <img src="{{ asset($product->image) }}" class="img-fluid" alt="card-img">
                        <div class="card-inner">
                            <div class="d-flex justify-content-between pt-1 pb-2">
                                <span><i class="fa-solid fa-bullseye pe-2"></i>{{ $product->category->name }}</span>
                                <span><i class="fa-solid fa-location-dot pe-2"></i>{{ $product->city }}</span>
                            </div>
                            <a href="{{ route('product', $product->slug) }}">
                                <p class="m-0 fw-bold pb-2">{{ $product->name }}</p>
                            </a>
                            <div class="d-flex flex-wrap justify-content-between">
                                <p class="m-0 text-danger">{{ $product->currency->symbol }} {{ $product->price }}</p>
                                <div class="icon">
                                    <i class="fa-solid fa-arrows-rotate"></i>
                                    <a class="wishlist-btn" href="javascript:;" data-id="{{ $product->id }}"><i
                                            class="fa-regular fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!------CATEGORY CARD SECTION END----->


    {{-- <script>
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
    </script> --}}

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
@endsection
