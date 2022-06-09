@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@push('styles_after_assets')
    <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Sales Analytics</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-sm-6">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="font-size-xs text-uppercase">Total Categories</h6>
                                <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">
                                    {{App\Models\Category::count()}}
                                </h4>
                            </div>
                        </div>
                        <div class="apex-charts mt-3" id="sparkline-chart-1"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="font-size-xs text-uppercase">Total Listings</h6>
                                <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">
                                    {{App\Models\Product::count()}}
                                </h4>
                            </div>
                        </div>
                        <div class="apex-charts mt-3" id="sparkline-chart-2"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="font-size-xs text-uppercase">Active Users</h6>
                                <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">
                                    {{App\Models\User::where('email_verified_at','!=', null)->count()}}
                                </h4>
                            </div>
                        </div>
                        <div class="apex-charts mt-3" id="sparkline-chart-3"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="font-size-xs text-uppercase">Unactive Users</h6>
                                <h4 class="mt-4 font-weight-bold mb-2 d-flex align-items-center">
                                    {{App\Models\User::where('email_verified_at', null)->count()}}
                                </h4>
                            </div>
                        </div>
                        <div class="apex-charts mt-3" id="sparkline-chart-4"></div>
                    </div>
                </div>
            </div>
        </div> <!-- end row-->

        {{-- <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-warning border-0 d-flex align-items-center" role="alert">
                        <i class="uil uil-exclamation-triangle font-size-16 text-warning me-2"></i>
                        <div class="flex-grow-1 text-truncate">
                            Your free trial expired in <b>21</b> days.
                        </div>
                        <div class="flex-shrink-0">
                            <a href="pricing-basic.html" class="text-reset text-decoration-underline"><b>Upgrade</b></a>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-sm-7">
                            <p class="font-size-18">Upgrade your plan from a <span class="fw-semibold">Free
                                    trial</span>, to ‘Premium Plan’ <i class="mdi mdi-arrow-right"></i></p>
                            <div class="mt-4">
                                <a href="pricing-basic.html" class="btn btn-primary">Upgrade Account!</a>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <img src="assets/images/illustrator/2.png" class="img-fluid" alt="">
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div>
            <!-- end card -->

            <div class="card">
                <div class="card-body">
                    <div class="float-end">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-reset" href="#"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fw-semibold">Report By:</span> <span
                                    class="text-muted">Monthly<i
                                        class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Yearly</a>
                                <a class="dropdown-item" href="#">Monthly</a>
                                <a class="dropdown-item" href="#">Weekly</a>
                                <a class="dropdown-item" href="#">Today</a>
                            </div>
                        </div>
                    </div>

                    <h4 class="card-title mb-4">Earning Reports</h4>

                    <div class="row align-items-center">
                        <div class="col-sm-7">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <p class="text-muted mb-2">This Month</p>
                                    <h5>$12,582<small
                                            class="badge badge-soft-success font-13 ms-2">+15%</small></h5>
                                </div>

                                <div class="col-6">
                                    <p class="text-muted mb-2">Last Month</p>
                                    <h5>$98,741</h5>
                                </div>
                            </div>
                            <p class="text-muted"><span class="text-success me-1"> 25.2%<i
                                        class="mdi mdi-arrow-up"></i></span>From previous period</p>

                            <div class="mt-4">
                                <a href="#" class="btn btn-soft-secondary btn-sm">Generate Reports <i
                                        class="mdi mdi-arrow-right ms-1"></i></a>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-sm-5">
                            <div class="mt-4 mt-0">
                                <div id="donut_chart" class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card -->
        </div> <!-- end col-->

        <div class="col-xl-8">
            <div class="card card-h-100">
                <div class="card-body">
                    <div class="float-end">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-reset" href="#" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="fw-semibold">Sort By:</span> <span class="text-muted">Yearly<i
                                        class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Yearly</a>
                                <a class="dropdown-item" href="#">Monthly</a>
                                <a class="dropdown-item" href="#">Weekly</a>
                                <a class="dropdown-item" href="#">Today</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title mb-4">Sales Analytics</h4>

                    <div class="mt-1">
                        <ul class="list-inline main-chart mb-0 text-center">
                            <li class="list-inline-item chart-border-left me-0 border-0">
                                <h3 class="text-primary">$<span data-plugin="counterup">3.85k</span><span
                                        class="text-muted d-inline-block fw-normal font-size-15 ms-2">Income</span>
                                </h3>
                            </li>
                            <li class="list-inline-item chart-border-left me-0">
                                <h3><span data-plugin="counterup">258</span><span
                                        class="text-muted d-inline-block fw-normal font-size-15 ms-2">Sales</span>
                                </h3>
                            </li>
                            <li class="list-inline-item chart-border-left me-0">
                                <h3><span data-plugin="counterup">52</span>k<span
                                        class="text-muted d-inline-block fw-normal font-size-15 ms-2">Users</span>
                                </h3>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-3">
                        <div id="sales-analytics-chart" class="apex-charts" dir="ltr"></div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> --}}
        <!-- end row -->

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mb-4">Latest Listings</h4>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap mb-0 align-middle table-check">
                                <thead class="bg-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Date</th>
                                    </tr>
                                    <!-- end tr -->
                                </thead>
                                <!-- end thead -->
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td class="fw-medium">{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2">
                                                        <img src="{{asset($product->image)}}" class="avatar-sm h-auto" alt="Error">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{date($product->created_at)}}</td>
                                        </tr>
                                    @endforeach
                                    <!-- end /tr -->
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mb-4">Latest Users</h4>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap mb-0 align-middle table-check">
                                <thead class="bg-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Country</th>
                                        <th>Date</th>
                                    </tr>
                                    <!-- end tr -->
                                </thead>
                                <!-- end thead -->
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="fw-medium">{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2">
                                                        @if($user->country )
                                                        <i class="flag-icon flag-icon-{{strtolower($user->countries->code)}}"></i>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$user->created_at}}</td>
                                        </tr>
                                    @endforeach

                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-4">Sales by County</h4>
                        <div class="dropdown">
                            <a class="dropdown-toggle text-reset" href="#"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fw-semibold">Report By:</span> <span
                                    class="text-muted">Monthly<i
                                        class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Yearly</a>
                                <a class="dropdown-item" href="#">Monthly</a>
                                <a class="dropdown-item" href="#">Weekly</a>
                                <a class="dropdown-item" href="#">Today</a>
                            </div>
                        </div>
                    </div>

                    <div id="world-map-markers" style="height: 242px;"></div>

                    <div class="pt-3 px-2 pb-2">
                        <p class="mb-1 fw-medium">USA <span class="float-end">75%</span></p>
                        <div class="progress animated-progess custom-progress mt-2">
                            <div class="progress-bar" role="progressbar"
                                style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75">
                            </div>
                        </div>

                        <p class="mt-4 mb-1 fw-medium">Russia <span class="float-end">55%</span></p>
                        <div class="progress animated-progess custom-progress mt-2">
                            <div class="progress-bar" role="progressbar"
                                style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="55">
                            </div>
                        </div>

                        <p class="mt-4 mb-1 fw-medium">Australia <span class="float-end">85%</span></p>
                        <div class="progress animated-progess custom-progress mt-2">
                            <div class="progress-bar" role="progressbar"
                                style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="85">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}
        </div>
        <!-- end row -->

    </div>
@endsection
@push('script')
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>
    <script src="assets/js/pages/dashboard-sales.init.js"></script>
@endpush
