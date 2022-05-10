@extends('layouts.app')
@section('content')
<section class="seller-section py_5">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb pt-4 pb-4 m-0">
            <li class="breadcrumb-item fs-5"><a href="#" class="text-decoration-none text-muted">Home</a></li>
            <li class="breadcrumb-item fs-5"><a href="#" class="text-decoration-none text-muted">Profile of
                    Baobab</a></li>
        </ol>
    </nav>
    <div class="avtar-seller bg-white py-3 px-3">
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="d-flex justify-content-evenly align-items-center border-right">
                    <div class="avtar pe-lg-5">
                        <img src="https://sl.baobabb.co/wp-content/uploads/2021/06/avatar-publicity_still-h_2019-150x150.jpeg"
                            alt="">
                    </div>
                    <div class="avtar-text">
                        <h5>baobab</h5>
                        <i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i
                            class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-light"></i>
                        <h6 class="text-secondary pt-2"><i class="fa-solid fa-circle text-light fs-6"></i> OFFLINE
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="py-3 px-3 border-right text-center text-md-start">
                    <h5><i class="fa-solid fa-location-dot pe-2"></i>Location :</h5>
                    <h5>Freetown,Western Area,Sierra Leone</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="avtar-tel py-3 px-3 ">
                    <span class="text-white">
                        <span>+232 00 000XXX</span>
                        <p class="m-0">Click to reveal phone number</p>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="seller-about bg-white py-4 px-4 mt-5">
        <div class="seller-title d-flex justify-content-between  ">
            <div class="">
                <h4 class="fw-bold">About Seller</h4>
            </div>
            <div class="fs-5 justify-content-evenly align-items-center">
                <span><i class="fa-brands fa-twitter"></i></span>
                <span><i class="fa-brands fa-youtube"></i></span>
                <span><i class="fa-brands fa-linkedin-in pe-1"></i></span>
                <span><i class="fa-brands fa-instagram"></i></span>
                <span><i class="fa-solid fa-crop"></i></span>
            </div>
        </div>
        <h5 class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit blanditiis, accusantium
            nesciunt autem qui in saepe voluptatem reprehenderit adipisci. Ipsam suscipit quas facilis quod totam
            ipsum voluptate quos tempora pariatur.
            Sit corporis, exercitationem id ex mollitia non deleniti ab laborum velit voluptatibus aliquam ratione
            autem iusto aperiam odit cum veniam. Ullam consequatur tempore qui cupiditate provident, ipsa animi.
            Error, dolor.
            Maiores dolorem suscipit soluta debitis doloribus sint voluptas, ipsam quibusdam facilis. Magnam, nihil
            quisquam? Reiciendis nisi tempora, aspernatur harum natus commodi nam molestiae qui! Modi saepe
            quibusdam suscipit minus dolor?</h5>
    </div>
    <div class="seller-add d-flex justify-content-between align-items-center py-4 px-4 bg-white mt-5">
        <div class="">
            <h4 class="fw-bold m-0">Seller's Ads</h4>
        </div>
        <div class="">
            <input type="email" class="form-control border-0 border-bottom" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="Search for...">
        </div>
    </div>
    <div class="row mt-4 ">
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Job</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Bristol</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">CDL A OTR Company Driver ...</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold">Call for salary</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card-2.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Seattle</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">Little Harbor Yacht 38' whi ...</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold">Call for price</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card-3.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Job</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Zurich</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">Yamaha 2017 RD350 R5 Wit ..</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold"><span class="text-muted">2bids</span> 16.000.000.00</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Job</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Bristol</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">Camera</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold">GNF 100.000</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card-3.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Appareils elec..</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Mamou</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">Camera</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold">GNF 100.000</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Appareils elec..</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Mamou</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">Camera</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold">GNF 100.000</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card-2.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Job</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Bristol</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">CDL A OTR Company Driver ...</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold">Call for salary</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card-3.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Seattle</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">Little Harbor Yacht 38' whi ...</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold">Call for price</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Job</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Zurich</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">Yamaha 2017 RD350 R5 Wit ..</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold"><span class="text-muted">2bids</span> 16.000.000.00</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card-2.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Job</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Bristol</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">Camera</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold">GNF 100.000</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card-3.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Appareils elec..</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Mamou</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">Camera</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold">GNF 100.000</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Appareils elec..</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Mamou</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">Camera</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold">GNF 100.000</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card-3.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Job</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Bristol</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">CDL A OTR Company Driver ...</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold">Call for salary</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card-2.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Jobs</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Seattle</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">Little Harbor Yacht 38' whi ...</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold">Call for price</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Job</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Zurich</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">Yamaha 2017 RD350 R5 Wit ..</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold"><span class="text-muted">2bids</span> 16.000.000.00</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card-3.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Job</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Bristol</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">Camera</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold">GNF 100.000</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Appareils elec..</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Mamou</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">Camera</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold">GNF 100.000</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 col-xxl-2">
            <div class="card-box">
                <img src="asset/img/category-card.jpg" class="img-fluid" alt="card-img">
                <div class="card-inner bg-white">
                    <div class="d-flex justify-content-between text-muted pt-3 pb-2">
                        <span><i class="fa-solid fa-bullseye pe-2"></i>Appareils elec..</span>
                        <span><i class="fa-solid fa-location-dot pe-2"></i>Mamou</span>
                    </div>
                    <p class="m-0 fw-bold pb-2">Camera</p>
                    <div class="d-flex flex-wrap justify-content-between pb-2">
                        <p class="m-0 text-danger fw-bold">GNF 100.000</p>
                        <div class="icon">
                            <i class="fa-solid fa-arrows-rotate pe-1"></i>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
@endsection