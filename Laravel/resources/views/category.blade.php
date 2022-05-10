@extends('layouts.app')
@section('content')

    <!-- ALL-CATEGORY SECTION START -->
    <section class="all-categories py_5">
        <h3 class="fw-bold pt-4 ps-lg-5">
            Consulter les announces </h3>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb ps-lg-5">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Accueil</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Consulter les
                        annonces</a></li>
            </ol>
        </nav>
        <div class="row">
            <div class=" col-lg-3 collg-3 6col-md-6">
               <div class="bg-white px-4 py-5 mb-5">
                <div class="d-flex justify-content-between align-items-center pb-4">
                    <h4 class="fw-bold">Trier les annonces</h4>
                    <i class="fa-solid fa-arrow-rotate-left text-muted fs-5" style="cursor: pointer;"></i>
                </div>
                <div class="mb-4">
                    <h5 class="text-muted fw-bold">Mot cle`</h5>
                    <input type="email" class="form-control border-0 border-bottom ps-0" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Recherch de...">
                </div>
            
                <!-- CATEGORY CHECK LIST -->
                <h5 class="pb-2">Categories</h5>
                <div class="form-check pb-1">
                    <input class="form-check-input rounded-pill fs-6" type="checkbox" value="" id="flexCheck" checked>
                    <label class="form-check-label" for="flexCheck">
                        Tous
                    </label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input rounded-pill fs-6" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Cellulair & Tablettes
                    </label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input rounded-pill fs-6" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Espace de bureu louer
                    </label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input rounded-pill fs-6" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Maison a vendre
                    </label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input rounded-pill fs-6" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Maison a louer
                    </label>
                </div>
                <div class="mb-4 mt-3">
                    <h5 class="text-muted fw-bold">Emplacement</h5>
                    <input type="email" class="form-control border-0 border-bottom ps-0" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Commencez a taper..">
                </div>
                <div class="mb-4 mt-3">
                    <!-- slider -->
                    <div class="price-range-slider">

                        <p class="range-value">
                            <input type="text" id="amount" readonly>
                        </p>
                        <div id="slider-range" class="range-bar"></div>
                
                    </div>
                </div>
                <div class="input-group pe-2 pb-3">
                    <button class="btn btn-outline-secondary dropdown-toggle w-100" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">CFA (CFA)</button>
                    <ul class="dropdown-menu dropdown-menu-end w-100 ms-2">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>

                <!-- TYPE CHECK LIST -->
                <h5 class="pb-2 pt-3">Type</h5>
                <div class="form-check pb-1">
                    <input class="form-check-input rounded-pill fs-6" type="checkbox" value="" id="flexCheck" checked>
                    <label class="form-check-label" for="flexCheck">Tous</label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input rounded-pill fs-6" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">vendre</label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input rounded-pill fs-6" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">Acheter</label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input rounded-pill fs-6" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">Echanger </label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input rounded-pill fs-6" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">Location</label>
                </div>

                <!-- CONDITION CHECK LIST -->
                <h5 class="pb-2 pt-3">Conditions (Si applicable)</h5>
                <div class="form-check pb-1">
                    <input class="form-check-input rounded-pill fs-6" type="checkbox" value="" id="flexCheck" checked>
                    <label class="form-check-label" for="flexCheck">Tous</label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input rounded-pill fs-6" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">Nouveau</label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input rounded-pill fs-6" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">Reconditionne</label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input rounded-pill fs-6" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">Occasion </label>
                </div>
                <div class="form-check pb-1">
                    <input class="form-check-input rounded-pill fs-6" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">Pour pieces ou hors service</label>
                </div>
                <div class="form-check pb-4 pt-3">
                    <input class="form-check-input fs-6" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">Afficher uniquement les <br> pieces ou hors
                        service</label>
                </div>
                <button type="button" class="btn btn-secondary btn-md w-100">APPLIQ LES FILTRES</button>
            </div>
            </div>
            <!------ RIGHT SIDE SECTION -------------->
            <div class=" col-lg-9  ">
                <div class="row">
                    <div class="col-12 bg-white ">
                        <div class="search-title d-flex flex-wrap justify-content-between align-items-center py-4 px-3">
                            <div>
                                <h4 class="m-0 fw-bold">Affichage de 1-8 de 8 annonces trouvees </h4>
                            </div>
                            <div class="d-flex pt-4 pt-md-0">
                                <div class="input-group pe-2">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">Trier par date</button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                                <div class="-title-icon d-flex justify-content-between pt-1">
                                    <i class="fa-solid fa-grip fs-4 pe-2"></i>
                                    <i class="fa-solid fa-bars fs-4 pe-2 text-muted"></i>
                                    <i class="fa-solid fa-border-all fs-4 text-muted"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card start -->
                    @foreach($products as $product)
                        <div class="col-md-6 col-lg-6 col-xl-4 col-xxl-3 ">
                            <div class="card-box ">
                                <img src="asset/img/category-card.jpg" class="img-fluid w-100" alt="card-img">
                                <div class="card-inner bg-white">
                                    <a href="{{route('product',$product->slug)}}">
                                        <div class="d-flex justify-content-between pt-3 pb-2">
                                            <span><i class="fa-solid fa-bullseye pe-2"></i>Appareils elec..</span>
                                            <span><i class="fa-solid fa-location-dot pe-2"></i>{{$product->city}}</span>
                                        </div>
                                        <p class="m-0 fw-bold pb-2">{{$product->name}}</p>
                                        <div class="d-flex flex-wrap justify-content-between pb-2">
                                            <p class="m-0 text-danger fw-bold">{{$product->cash}} {{$product->price}}</p>
                                            <div class="icon">
                                                <i class="fa-regular fa-heart"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!-- ALL-CATEGORY SECTION END -->
@endsection