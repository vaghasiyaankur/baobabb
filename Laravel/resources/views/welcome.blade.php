@extends('layouts.app')

@section('content')
    <section class="main-header">
        <div class="container-fluid py_5 ">
            <div class="row align-items-center">
                <div class="col-lg-8 ">
                    <h2 class="header-title">Rechercher tout ce don't vous avez besoin</h2>
                    <p class="header-text pb-lg-5">Votre communaute` en lignr ou` vous pouvez trouver tout ce que vous
                        cherchez,sans difficulte`.</p>
                    <div class="categorie pt-lg-5 d-flex flex-wrap justify-content-between align-items-center">
                        <div class="categorie-box mt-3">
                            <img src="https://sl.baobabb.co/wp-content/uploads/2021/08/Apartment.png" class="img-fluid"
                                alt="">
                        </div>
                        <div class="categorie-box mt-3">
                            <img src="https://sl.baobabb.co/wp-content/uploads/2021/06/Household-electronics.png"
                                class="img-fluid" alt="">
                        </div>
                        <div class="categorie-box mt-3">
                            <img src="https://sl.baobabb.co/wp-content/uploads/2021/08/Beauty-products.png"
                                class="img-fluid" alt="">
                        </div>
                        <div class="categorie-box mt-3">
                            <img src="https://sl.baobabb.co/wp-content/uploads/2021/08/House.png" class="img-fluid"
                                alt="">
                        </div>
                        <div class="categorie-box mt-3">
                            <img src="https://sl.baobabb.co/wp-content/uploads/2021/06/Household-electronics.png"
                                class="img-fluid" alt="">
                        </div>
                        <div class="categorie-box mt-3">
                            <p class="text-white text-center mb-0">All other <br> Categories</p>
                            <i class="fa-solid fa-arrow-right-long text-white ps-4"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pt-4 pt-lg-0">
                    <div class="header-form">
                        <form>
                            <h3 class="text-black mb-4">I'm interested in...</h3>
                            <div class="mb-4">
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Search for...">
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Located in...">
                            </div>
                            <div class="mb-4 ">
                                <input type="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="In Category...">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---------- SUB TITLE SWIPER --------->

    <div class="swiper-container pt-3">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper" style="height: auto">
            <!-- Slides -->
            @foreach($categories as $category)
            <div class="swiper-slide">
                <a href="{{route('category',$category->slug)}}"><p class="m-0">{{$category->name}}</p></a>
            </div>
            @endforeach
        </div>
    </div>

    <!------CATEGORY CARD SECTION START----->
    <section class="category-card py_5">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card-2.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card-3.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card-2.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card-3.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card-3.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card-2.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card-3.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card-2.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card-2.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card-3.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card-2.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex  flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card-3.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card-3.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card-2.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card-3.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card-2.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 ">
                <div class="card-box">
                    <img src="asset/img/category-card.jpg" class="img-fluid" alt="card-img">
                    <div class="card-inner">
                        <div class="d-flex justify-content-between pt-1 pb-2">
                            <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                            <span><i class="fa-solid fa-location-dot pe-2"></i>B-stoal</span>
                        </div>
                        <p class="m-0 fw-bold pb-2">CDL A OTR Company Drive...</p>
                        <div class="d-flex flex-wrap justify-content-between">
                            <p class="m-0 text-danger">Call for salary</p>
                            <div class="icon">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <!------CATEGORY CARD SECTION END----->
@endsection
