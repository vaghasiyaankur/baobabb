@extends('user.layouts.app')
@section('content')
        <main class="right-side-content">
            <div class="listing-box_with_text mb-5 mt-3">
                <div class="right-title d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold">Dashboard</h4>
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb fs-5 ">
                            <li class="breadcrumb-item"><a href="#">Baobab</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-lg-3 mb-3 mb-lg-0">
                        <div class="details-panel">
                            <div class="details-box d-flex justify-content-between align-items-center">
                                <div class="details-text fw-bold">
                                    <h2 class="fw-bold mb-0">Free</h2>
                                    <span>Account Type</span>
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
                                    <h2 class="fw-bold mb-0">18</h2>
                                    <span>Ads on the platform</span>
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
                                    <h2 class="fw-bold mb-0">3.5 / 5</h2>
                                    <span>Your rating</span>
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
                                    <h2 class="fw-bold mb-0">6</h2>
                                    <span>Favorite Ads</span>
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
                    <h4 class="fw-bold">Visit Chart</h4>
                </div>
            </div>
        </main>
@endsection
