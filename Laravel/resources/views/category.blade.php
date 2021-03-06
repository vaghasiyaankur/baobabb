@extends('layouts.app')
@section('content')
    <!-- ALL-CATEGORY SECTION START -->
    <section class="all-categories py_5 all-categoriess_">
        <h3 class="fw-bold">
            Consulter les announces </h3>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('allcategory') }}"
                        class="text-decoration-none text-muted">Categories</a>
                </li>
                <li class="breadcrumb-item">@if($category == 'all')All @else{{$category->name}}@endif</li>
            </ol>
        </nav>
        <div class="row">
            <div class=" col-lg-2 col-md-6">
                <div class="bg-white px-4 py-5 mb-5">
                    <div class="d-flex justify-content-between align-items-center pb-4">
                        <h4 class="fw-bold">{{ __('messages.tries_les_announce')}}</h4>
                        <a href="javascript:;" id="refresh"><i class="fa-solid fa-arrow-rotate-left text-muted fs-5"
                                style="cursor: pointer;"></i></a>
                    </div>
                    {{-- <div class="mb-4">
                        <h5 class="text-muted fw-bold">Mot cle`</h5>
                        <input type="email" class="form-control border-0 border-bottom ps-0" id="keyword"
                            aria-describedby="emailHelp" placeholder="Recherch de...">
                    </div> --}}

                    <!-- CATEGORY CHECK LIST -->
                    <h5 class="pb-2">{{ __('messages.categories')}}</h5>
                    <div class="form-check pb-1">
                        <input class="form-check-input rounded-pill fs-6 filter-data" type="radio" name="category" value="all"
                            id="all-cat" @if($category == 'all')checked @endif>
                        <label class="form-check-label" for="all-cat"> All </label>
                    </div>
                    @foreach ($categories as $cat)
                        <div class="form-check pb-1">
                            <input class="form-check-input rounded-pill fs-6 filter-data" type="radio" name="category"
                                value="{{ $cat->slug }}" id="category-{{ $cat->id }}"
                                @if ($cat == $category) checked @endif>
                            <label class="form-check-label" for="category-{{ $cat->id }}">
                                {{ $cat->name }}
                            </label>
                        </div>
                    @endforeach
                    <div class="mb-4 mt-3">
                        <h5 class="pb-2">{{ __('messages.price')}}</h5>
                        <div class="range-slider">
                            <input id="min-price" value="{{ $min_price }}" min="{{ $priceMin }}"
                                max="{{ $priceMax }}" step="{{fileterSliderStep()}}" type="range">
                            <input id="max-price" value="{{ $max_price }}" min="{{ $priceMin }}"
                                max="{{ $priceMax }}" step="{{fileterSliderStep()}}" type="range">
                            <span class="rangeValues p-3 d-flex justify-content-start"></span>
                        </div>
                    </div>
                    <div class="input-group pe-2 pb-3">
                        <h5 class="pb-2">{{ __('messages.cash')}}</h5>
                        <select class="w-100 border-0" name="" id="">
                            <option value="">CFA (CFA)</option>
                            <option value="">USD ($)</option>
                            <option value="">USD (???)</option>
                        </select>
                        {{-- <button class="btn btn-outline-secondary dropdown-toggle w-100" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">CFA (CFA)</button>
                        <ul class="dropdown-menu dropdown-menu-end w-100 ms-2">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul> --}}
                    </div>

                    <!-- TYPE CHECK LIST -->
                    <h5 class="pb-2 pt-3">{{ __('messages.type')}}</h5>
                    <div class="form-check pb-1">
                        <input class="form-check-input rounded-pill fs-6 filter-data" id="all" name="type" type="radio"
                            value="all" @if ($type == null) checked @endif>
                        <label class="form-check-label" for="all">All</label>
                    </div>
                    <div class="form-check pb-1">
                        <input class="form-check-input rounded-pill fs-6 filter-data" id="sell" name="type" type="radio"
                            value="sell" @if ($type == 'sell') checked @endif>
                        <label class="form-check-label" for="sell">Sell</label>
                    </div>
                    <div class="form-check pb-1">
                        <input class="form-check-input rounded-pill fs-6 filter-data" id="buy" name="type" type="radio"
                            value="buy" @if ($type == 'buy') checked @endif>
                        <label class="form-check-label" for="buy">Buy</label>
                    </div>
                    <div class="form-check pb-1">
                        <input class="form-check-input rounded-pill fs-6 filter-data" id="exchange" name="type" type="radio"
                            value="exchange" @if ($type == 'exchange') checked @endif>
                        <label class="form-check-label" for="exchange">Exchange</label>
                    </div>
                    <div class="form-check pb-1">
                        <input class="form-check-input rounded-pill fs-6 filter-data" id="gift" name="type" type="radio"
                            value="gift" @if ($type == 'gift') checked @endif>
                        <label class="form-check-label" for="gift">Gift</label>
                    </div>
                    <div class="form-check pb-1">
                        <input class="form-check-input rounded-pill fs-6 filter-data" id="rental" name="type" type="radio"
                            value="rental" @if ($type == 'rental') checked @endif>
                        <label class="form-check-label" for="rental">Rental </label>
                    </div>
                    <div class="form-check pb-1">
                        <input class="form-check-input rounded-pill fs-6 filter-data" id="services" name="type" type="radio"
                            value="services" @if ($type == 'services') checked @endif>
                        <label class="form-check-label" for="services">Services</label>
                    </div>

                    <!-- CONDITION CHECK LIST -->
                    <h5 class="pb-2 pt-3">{{ __('messages.condition_applicable')}}</h5>
                    <div class="form-check pb-1">
                        <input class="form-check-input rounded-pill fs-6 filter-data" id="codition" name="condition"
                            type="radio" value="all" @if ($condition == null) checked @endif>
                        <label class="form-check-label" for="codition">All</label>
                    </div>
                    <div class="form-check pb-1">
                        <input class="form-check-input rounded-pill fs-6 filter-data" id="new" name="condition" type="radio"
                            value="new" @if ($condition == 'new') checked @endif>
                        <label class="form-check-label" for="new">New</label>
                    </div>
                    <div class="form-check pb-1">
                        <input class="form-check-input rounded-pill fs-6 filter-data" id="refurbished" name="condition"
                            type="radio" value="refurbished" @if ($condition == 'refurbished') checked @endif>
                        <label class="form-check-label" for="refurbished">Refurbished</label>
                    </div>
                    <div class="form-check pb-1">
                        <input class="form-check-input rounded-pill fs-6 filter-data" id="second_hand" name="condition"
                            type="radio" value="second_hand" @if ($condition == 'second_hand') checked @endif>
                        <label class="form-check-label" for="second_hand">Second Hand</label>
                    </div>
                    <div class="form-check pb-1">
                        <input class="form-check-input rounded-pill fs-6 filter-data" id="opportunity" name="condition"
                            type="radio" value="opportunity" @if ($condition == 'opportunity') checked @endif>
                        <label class="form-check-label" for="opportunity">Opportunity</label>
                    </div>
                    <div class="form-check pb-1">
                        <input class="form-check-input rounded-pill fs-6 filter-data" id="part" name="condition"
                            type="radio" value="part" @if ($condition == 'part') checked @endif>
                        <label class="form-check-label" for="part">Part </label>
                    </div>
                    <div class="form-check pb-4 pt-3">
                        <input class="form-check-input fs-6" type="checkbox" value="">
                        <label class="form-check-label" for="">Afficher uniquement les <br> pieces ou hors
                            service</label>
                    </div>
                    <button type="button" class="btn btn-secondary btn-md w-100">{{ __('messages.app_les_filter')}}</button>
                </div>
            </div>
            <!------ RIGHT SIDE SECTION -------------->
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-12 bg-white ">
                        <div class="search-title d-flex flex-wrap justify-content-between align-items-center py-4 px-3">
                            <div>
                                <h4 class="m-0 fw-bold">{{ __('messages.showing')}}
                                    {{ ($products->currentpage() - 1) * $products->perpage() + 1 }} {{ __('messages.to')}}
                                    {{ $products->currentpage() * $products->perpage() }}
                                    {{ __('messages.of')}} {{ $products->total() }} {{ __('messages.entries')}}</h4>
                            </div>
                            <div class="d-flex pt-4 pt-md-0">
                                {{-- <div class="input-group pe-2">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">Trier par date</button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div> --}}
                                {{-- <div class="-title-icon d-flex justify-content-between pt-1">
                                    <i class="fa-solid fa-grip fs-4 pe-2"></i>
                                    <i class="fa-solid fa-bars fs-4 pe-2 text-muted"></i>
                                    <i class="fa-solid fa-border-all fs-4 text-muted"></i>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- card start -->
                    <div id="product-data">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-{{addListCol()}}">
                                    @include('product-block')
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}

                </div>
            </div>
        </div>
    </section>
    <!-- ALL-CATEGORY SECTION END -->


    <script>
        $(document).ready(function() {

            $('#keyword').on('change', function() {
                console.log(window.location)
                keyword = $('#keyword').val()
                var type = $('input[name=type]:checked').val()
                var condition = $('input[name=condition]:checked').val()
                var category = $('input[name=category]:checked').val()
                var url = window.location.origin + '' + '/category/' + category
                var peram = 0
                if (type != 'all' && condition != 'all') {
                    url = url + '?type=' + type + '&condition=' + condition
                    peram = 1
                } else {
                    if (condition != 'all') {
                        peram = 1
                        url = url + '?condition=' + condition
                    }
                    if (type != 'all') {
                        peram = 1
                        url = url + '?type=' + type
                    }
                }
                if (peram == 0) {
                    url += '?keyword=' + keyword
                } else {
                    url += '&keyword=' + keyword
                }
                window.location.href = url
            });

            $('#refresh').on('click', function() {
                var category = $('input[name=category]:checked').val()
                var url = window.location.origin + '' + '/category/' + category
                window.location.href = url
            })
            // alert()
            // $('.category').on('click', function() {
            //     var slug = $(this).val()
            //     console.log(window.location.origin)
            //     window.location.href = window.location.origin +'/category/'+slug;
            //     // $.ajax({
            //     //     url: '/category/' + slug,
            //     //     type: "GET",
            //     //     // data: {
            //     //     //     _token: '{{ csrf_token() }}'
            //     //     // },
            //     //     error: function($err) {
            //     //         console.log($err)
            //     //     },
            //     //     success: function(result) {
            //     //         $('#product-data').replaceWith(result);
            //     //         console.log(result);
            //     //     }
            //     // });
            // })
            $('.filter-data').on('click', function() {
                // var slug = $(this).val()
                var type = $('input[name=type]:checked').val()
                var condition = $('input[name=condition]:checked').val()
                var category = $('input[name=category]:checked').val()
                var keyword = $('#keyword').val()
                var url = window.location.origin + '' + '/category/' + category
                if (type != 'all' && condition != 'all') {
                    var url = url + '?type=' + type + '&condition=' + condition
                } else {
                    if (condition != 'all') {
                        url = url + '?condition=' + condition
                    }
                    if (type != 'all') {
                        url = url + '?type=' + type
                    }
                }
                console.log(url)
                window.location.href = url
                // alert()
            })
            $('input[type=range]').on('change', function() {
                var minPrice = $('#min-price').val()
                var maxPrice = $('#max-price').val()
                // console.log(minPrice);
                var type = $('input[name=type]:checked').val()
                // var keyword = $('#keyword').val()
                var condition = $('input[name=condition]:checked').val()
                var category = $('input[name=category]:checked').val()
                var url = window.location.origin + '' + '/category/' + category
                var peram = 0
                if (type != 'all' && condition != 'all') {
                    var url = url + '?type=' + type + '&condition=' + condition
                    peram = 1
                } else {
                    if (condition != 'all') {
                        peram = 1
                        url = url + '?condition=' + condition
                    }
                    if (type != 'all') {
                        peram = 1
                        url = url + '?type=' + type
                    }
                }
                if (peram == 0) {
                    url += '?price=' + minPrice + ',' + maxPrice
                } else {
                    url += '&price=' + minPrice + ',' + maxPrice
                }
                window.location.href = url
            })
        })
    </script>
@endsection
