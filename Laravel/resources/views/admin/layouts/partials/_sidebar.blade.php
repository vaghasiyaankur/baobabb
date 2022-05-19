<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="22">
            </span>
        </a>

        <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="22">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm-light.png') }}" alt="" height="22">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu3">
                <li class="menu-title" data-key="t-dashboards">Dashboards</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="icon nav-icon" data-feather="monitor"></i>
                        <span class="menu-item" data-key="t-sales">Dashboard</span>
                    </a>
                </li>

            </ul>
            <ul class="metismenu list-unstyled" id="side-menu34">
                <li class="menu-title" data-key="t-dashboards">CATELOG</li>
                <li>
                    <a href="{{ route('admin.category.index') }}">
                        <i class="icon nav-icon" data-feather="monitor"></i>
                        <span class="menu-item" data-key="t-sales">Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.product.index') }}">
                        <i class="icon nav-icon" data-feather="monitor"></i>
                        <span class="menu-item" data-key="t-sales">Product</span>
                    </a>
                </li>
            </ul>
            <ul class="metismenu list-unstyled" id="side-menu34">
                <li class="menu-title" data-key="t-dashboards">USER</li>
                <li>
                    <a href="{{ route('admin.user.index') }}">
                        <i class="icon nav-icon" data-feather="monitor"></i>
                        <span class="menu-item" data-key="t-sales">User</span>
                    </a>
                </li>
            </ul>
            <ul class="metismenu list-unstyled" id="side-menu34">
                <li class="menu-title" data-key="t-dashboards">GEO</li>
                <li>
                    <a href="{{ route('admin.country.index') }}">
                        <i class="icon nav-icon" data-feather="monitor"></i>
                        <span class="menu-item" data-key="t-sales">Country</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.currency.index') }}">
                        <i class="icon nav-icon" data-feather="monitor"></i>
                        <span class="menu-item" data-key="t-sales">Currency</span>
                    </a>
                </li>
            </ul>
            {{-- <ul class="metismenu list-unstyled" id="side-menu22">
                        <li class="menu-title" data-key="t-dashboards">PRODUCTS MANAGEMENT</li>
                        <li>
                            <a href="{{route('admin.brand.list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Brands</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.attribute.list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Attribute</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.product.list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Product</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.banner.list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Banner</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.coupons.list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Coupons</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.notification.list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Push notification</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.deal.index')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Flash deals</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.deal.index_deal')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Deal of the Day</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.deal.add-new')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Featured Deal</span>
                            </a>
                        </li>
                    </ul> --}}
            {{-- <ul class="metismenu list-unstyled" id="side-menu1">
                        <li class="menu-title" data-key="t-dashboards">BUSINESS SECTION</li>
                        <li>
                            <a href="{{route('admin.stock.product-stock')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Product Stock</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.review.review-list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Customer Reviews</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.stock.product-wishlist')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Product In Wish List</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.transaction.transaction-list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Order Transactions</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.transaction.refund-list')}}">
                                <i class="icon nav-icon" data-feather="monitor"></i>
                                <span class="menu-item" data-key="t-sales">Refund Transactions</span>
                            </a>
                        </li>
                  </ul> --}}
            {{-- <ul class="metismenu list-unstyled" id="side-menu">
                       <li class="menu-title" data-key="t-dashboards">USER SECTION</li>
                       <li>
                            <a href="javascript: void(0);" class="has-arrow">
                            <i class="fas fa-users me-2"></i>
                                <span class="menu-item" data-key="t-error-pages">Seller</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{route('admin.seller.seller-list')}}" data-key="t-error-404-basic">List</a></li>
                                <li><a href="{{route('admin.seller.withdraw-list')}}" data-key="t-error-404-cover">Withdraws</a></li>
                            </ul>
                        </li>
                   </ul> --}}
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
