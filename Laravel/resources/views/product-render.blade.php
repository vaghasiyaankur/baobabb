<section class="category-card py_5">
    <div class="row" id="category_product">
        @foreach ($products as $product)
            <?php 
            if(auth()->user())
            {
                $wishlist = App\Models\Wishlist::where('product_id',$product->id)->where('user_id',auth()->user()->id)->first();
            }
            else{
                $wishlist = null;
            }
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 card_w_4">
                <div class="card-box ">
                    <a href="{{ route('product', $product->slug) }}">
                    @if(count($product->pictures) != 0)
                    <img src="{{ asset($product->pictures[0]->filename) }}" class="img-fluid w-100 card-img_height" alt="card-img"
                        style="height: 220px;">
                        @endif
                    <div class="card-inner bg-white">
                            <div class="d-flex justify-content-between pt-3 pb-2">
                                <span><i class="fa-solid fa-bullseye pe-1"></i>{{ $product->category->name }}</span>
                                <span><i class="fa-solid fa-location-dot pe-1"></i>{{ $product->city }}</span>
                            </div>
                            <p class="m-0 fw-bold pb-2">{{ $product->name }}</p>
                            <div class="d-flex flex-wrap justify-content-between pb-2">
                                @if ($product->sale_price != null)
                                    <div class="d-flex">
                                        <span class="price-abs">{{ $product->currency->symbol }} {{ $product->price }}</span>
                                        {{-- <h4 class=" fw-bold m-0">{{ $product->currency->symbol }} {{ $product->sale_price }}</h4> --}}
                                        <p class="m-0 text-danger fw-bold">{{ $product->currency->symbol }}
                                            {{ $product->sale_price }}
                                        </p>
                                    </div>
                                @else
                                    <p class="m-0 text-danger fw-bold">{{ $product->currency->symbol }}
                                        {{ $product->price }}
                                    </p>
                                @endif
                                @if(auth()->user())
                                    <div class="icon">
                                        <a class="wishlist-btn" href="javascript:;" data-id="{{ $product->id }}"><i
                                                class="fa-<?php if($wishlist){echo 'solid text-danger';}else{echo 'regular';}?> fa-heart"></i></a>
                                    </div>
                                @else
                                <div class="icon">
                                    <a class="wishlist-btn" href="javascript:;" data-bs-toggle="modal" data-bs-target="#loginModel"><i
                                            class="fa-regular fa-heart"></i></a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>

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
