@extends('user.layouts.app')
@section('content')
        <main class="right-side-content">
            <div class="listing-box_with_text mb-5 mt-3">
                <div class="right-title d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold">{{ __('messages.dashboard')}}</h4>
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb fs-5 ">
                            <li class="breadcrumb-item"><a href="#">{{ __('messages.baobab')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('messages.dashboard')}}</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-lg-3 mb-3 mb-lg-0">
                        <div class="details-panel">
                            <div class="details-box d-flex justify-content-between align-items-center">
                                <div class="details-text fw-bold">
                                    <h2 class="fw-bold mb-0">{{ __('messages.free')}}</h2>
                                    <span>{{ __('messages.account_type')}}</span>
                                </div>
                                <div class="details-img">
                                    <i class="fa-solid fa-user fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-3 mb-lg-0">
                        <div class="details-panel">
                            <div class="details-box d-flex justify-content-between align-items-center">
                                <div class="details-text fw-bold">
                                    <h2 class="fw-bold mb-0">{{$products}}</h2>
                                    <span>{{ __('messages.add_on_platform')}}</span>
                                </div>
                                <div class="details-img">
                                    <i class="fa-solid fa-square-plus fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-3 mb-lg-0">
                        <div class="details-panel">
                            <div class="details-box d-flex justify-content-between align-items-center">
                                <div class="details-text fw-bold">
                                    <h2 class="fw-bold mb-0">{{$rating}} / 5</h2>
                                    <span>{{ __('messages.your_rating')}}</span>
                                </div>
                                <div class="details-img">
                                    <i class="fa-solid fa-star fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-3 mb-lg-0">
                        <div class="details-panel">
                            <div class="details-box d-flex justify-content-between align-items-center">
                                <div class="details-text fw-bold">
                                    <h2 class="fw-bold mb-0">{{$wishlist}}</h2>
                                    <span>{{ __('messages.favourite_ads')}}</span>
                                </div>
                                <div class="details-img">
                                    <i class="fa-solid fa-bookmark fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="visit-cart-section">
                <div class="chart-title">
                    <h4 class="fw-bold">{{ __('messages.visit_chart')}}</h4>
                </div>
            </div>
        </main>
@endsection
