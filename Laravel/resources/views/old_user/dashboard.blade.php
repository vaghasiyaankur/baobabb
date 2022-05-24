@extends('user.layouts.app')

@section('title')
    Dashboard
@endsection

@push('styles_after_assets')
    <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="user-dashboard-box dashboard-box-1">
                    <div class="user-white-block-content">
                        <img src="{{asset('assets/img/time.png')}}">
                        <div class="dashboard-body">
                            <h5>Soumission gratuite</h5>
                            <h5 class="dash-value infinity"><i class="aficon-repeat"></i></h5>
                        </div>

                        <h5 class="dash-footer">
                            Type de soumission du compte </h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="user-dashboard-box dashboard-box-2">
                    <div class="user-white-block-content">
                        <img src="{{asset('assets/img/speaker.png')}}">
                        <div class="dashboard-body">
                            <h5>Annonces soumises</h5>
                            <h5 class="dash-value">0</h5>
                        </div>
                        <h5 class="dash-footer">
                            Le nombre d'annonces soumises </h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="user-dashboard-box dashboard-box-3">
                    <div class="user-white-block-content">
                        <img src="{{asset('assets/img/like.png')}}">
                        <div class="dashboard-body">
                            <h5>Votre évaluation</h5>
                            <h5 class="dash-value">0.00 / 5.00</h5>
                        </div>
                        <h5 class="dash-footer">
                            Sur la base de toutes vos annonces </h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="user-dashboard-box dashboard-box-4">
                    <div class="user-white-block-content">
                        <img src="{{asset('assets/img/wishlist.png')}}">
                        <div class="dashboard-body">
                            <h5>Annonces préférées</h5>
                            <h5 class="dash-value">1</h5>
                        </div>
                        <h5 class="dash-footer">
                            Nombre de publicités que vous aimez </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>
    <script src="assets/js/pages/dashboard-sales.init.js"></script>
@endpush
