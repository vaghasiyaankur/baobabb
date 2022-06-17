@extends('layouts.app')
@section('content')
<section class="seller-section py_5 all-categoriess_">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb pt-4 pb-2 m-0">
            <li class="breadcrumb-item fs-5"><a href="{{route('home')}}" class="text-decoration-none text-muted">{{ __('messages.home')}}</a></li>
            <li class="breadcrumb-item fs-5">{{ __('messages.our_seller')}}</li>
        </ol>
    </nav>
    <div class="seller-add d-flex flex-wrap justify-content-between align-items-center py-4 px-4 bg-white mt-4">
        <div>
            <h4 class="fw-bold m-0 ps-lg-4">{{ __('messages.showing')}} 1 - 1 of 1 {{ __('messages.user')}}</h4>
        </div>
        <div>
            <input type="email" class="form-control border-0 border-bottom text-muted pt-4 pt-md-0"
                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{ __('messages.filter_user')}}">
        </div>
    </div>
    <div class="row py-3">
        @foreach($sellers as $seller)
            <div class="col-md-6 col-lg-4 card_w_4">
                <div
                    class="d-flex flex-wrap justify-content-evenly justify-content-lg-start align-items-center bg-white mt-4 mb-4 py-4">
                    <div class="avtar p-left">
                        <img src="{{asset($seller->avatar)}}" alt="">
                    </div>
                    <a href="{{route('singleSeller',$seller->id)}}">
                        <div class="avtar-text p-left">
                            <h5>{{$seller->name}}</h5>
                            <?php $rating = round(App\Models\Rating::where('user_to',$seller->id)->where('parent_id',null)->avg('rate'),1); ?>
                            <div class="ratting">
                                <span class="fa-star fa-regular @if($rating >= 1) checked @endif"></span>
                                <span class="fa-star fa-regular @if($rating >= 2) checked @endif"></span>
                                <span class="fa-star fa-regular @if($rating >= 3) checked @endif"></span>
                                <span class="fa-star fa-regular @if($rating >= 4) checked @endif"></span>
                                <span class="fa-star fa-regular @if($rating >= 5) checked @endif"></span>
                            </div>
                            <h6 class="text-secondary pt-2"><i class="fa-solid fa-circle text-light fs-6"></i> HORSLIGNE
                            </h6>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection