@extends('user.layouts.app')
@section('content')
    <div class="p-3">
        @if(count($products) > 0)
        <section class="category-card py_5">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3 m-2">
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
                                            <p class="m-0 text-danger fw-bold">{{ $product->currency->symbol }}
                                                {{ $product->price }}
                                            </p>
                                            <div class="icon">
                                                <a href="{{ route('user.wishlist.destroy', $product->id) }}" onclick="event.preventDefault();
                                                        document.getElementById('delete-wishlist').submit();">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
    
                                                <form id="delete-wishlist" action="{{ route('user.wishlist.destroy', $product->id) }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            @else
            <section class="d-flex justify-content-center align-items-center details-box">
                <div class="text-center">
                    <a href="{{route('home')}}" style="color:#364b5a;"><i class="fa-solid fa-circle-plus" style="font-size: 55px;"></i></a>
                    <h3>Currently you don't have any favorite ads, please add some.</h3>
                </div>
            </section>
            @endif
    </div>
@endsection


@push('script')
@endpush
