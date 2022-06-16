<?php 
 if(auth()->user())
 {
     $wishlist = App\Models\Wishlist::where('product_id',$product->id)->where('user_id',auth()->user()->id)->first();
 }
 else{
     $wishlist = null;
 }
 ?>
<div class="card-box">
    {{-- @dd($product->pictures[0]->filename) --}}
    <a href="{{ route('product', $product->slug) }}">
    <img src="{{asset($product->pictures[0]->filename)}}" class="img-fluid w-100 card-img_height" alt="card-img" style="height: 220px;">
    <div class="card-inner bg-white">
            <div class="flex-wrap d-flex justify-content-between pt-3 pb-2">
                <span><i class="fa-solid fa-bullseye pe-2"></i>{{$product->category->name}}</span>
                <span><i class="fa-solid fa-location-dot pe-2"></i>{{ $product->city }}</span>
            </div>
            <p class="m-0 fw-bold pb-2">{{ $product->name }}</p>
            <div class="d-flex justify-content-between pb-2">
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
