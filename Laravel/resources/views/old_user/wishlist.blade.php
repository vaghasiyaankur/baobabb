@extends('user.layouts.app')

@section('title')
    Wishlist
@endsection

@push('styles_after_assets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom-table.css') }}">
@endpush

@section('content')
    <div class="p-3">
        <section class="category-card py_5">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 card m-2">
                        <div class="card-box">
                            <img src="{{ asset($product->image) }}"  alt="card-img" height="175" >
                            <div class="card-inner">
                                <div class="d-flex justify-content-between pt-1 pb-2">
                                    <span><i class="fa-solid fa-bullseye pe-2"></i>{{$product->category->name}}</span>
                                    <span><i class="fa-solid fa-location-dot pe-2"></i>{{ $product->city }}</span>
                                </div>
                                <a href="{{ route('product', $product->slug) }}">
                                    <p class="m-0 fw-bold pb-2">{{ $product->name }}</p>
                                </a>
                                <div class="d-flex flex-wrap justify-content-between">
                                    <p class="m-0 text-danger">{{ $product->cash }} {{ $product->price }}</p>
                                    <div class="icon">
                                        <i class="fa-solid fa-arrows-rotate"></i>

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
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection


@push('script')
@endpush
