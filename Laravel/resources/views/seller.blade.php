@extends('layouts.app')
@section('content')
<section class="seller-section py_5">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb pt-4 pb-2 m-0">
            <li class="breadcrumb-item fs-5"><a href="#" class="text-decoration-none text-muted">Home</a></li>
            <li class="breadcrumb-item fs-5"><a href="#" class="text-decoration-none text-muted">Our seller </a>
            </li>
        </ol>
    </nav>
    <div class="seller-add d-flex flex-wrap justify-content-between align-items-center py-4 px-4 bg-white mt-4">
        <div>
            <h4 class="fw-bold m-0 ps-lg-4">Showing 1 - 1 of 1 users</h4>
        </div>
        <div>
            <input type="email" class="form-control border-0 border-bottom text-muted pt-4 pt-md-0"
                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Filter users...">
        </div>
    </div>
    <div class="row py-3">
        @foreach($sellers as $seller)
            <div class="col-md-6 col-lg-4">
                <div
                    class="d-flex flex-wrap justify-content-evenly justify-content-lg-start align-items-center bg-white mt-4 mb-4 py-4">
                    <div class="avtar p-left">
                        <img src="https://sl.baobabb.co/wp-content/uploads/2021/06/avatar-publicity_still-h_2019-150x150.jpeg"
                            alt="">
                    </div>
                    <a href="{{route('singleSeller',$seller->name)}}">
                        <div class="avtar-text p-left">
                            <h5>baobab</h5>
                            <i class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-warning"></i><i
                            class="fa-solid fa-star text-warning"></i><i class="fa-solid fa-star text-light"></i>
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