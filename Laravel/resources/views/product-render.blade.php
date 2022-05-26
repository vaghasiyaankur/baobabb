<section class="category-card py_5">
    <div class="row" id="category_product">
        @foreach ($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                <div class="card-box ">
                    <img src="{{ asset($product->image) }}" class="img-fluid w-100" alt="card-img"
                        style="height: 220px;">
                    <div class="card-inner bg-white">
                        <a href="{{ route('product', $product->slug) }}">
                            <div class="d-flex justify-content-between pt-3 pb-2">
                                <span><i class="fa-solid fa-bullseye pe-2"></i>{{ $product->category->name }}</span>
                                <span><i class="fa-solid fa-location-dot pe-2"></i>{{ $product->city }}</span>
                            </div>
                            <p class="m-0 fw-bold pb-2">{{ $product->name }}</p>
                            <div class="d-flex flex-wrap justify-content-between pb-2">
                                <p class="m-0 text-danger fw-bold">{{ $product->currency->symbol }}
                                    {{ $product->price }}
                                </p>
                                <div class="icon">
                                    <a class="wishlist-btn" href="javascript:;" data-id="{{ $product->id }}"><i
                                            class="fa-regular fa-heart"></i></a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>