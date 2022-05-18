<?php
    $user = App\Models\User::find(auth()->user()->id);
?>
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu ">

    <!-- LOGO -->
    <div class="navbar-brand-box bg-main">
                <a href="/" class="logo logo-dark">
                    {{-- <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                    </span> --}}
                    <span class="logo-lg">
                        <img src="{{ asset('assets/img/Baobab-Logo.png') }}" alt="" height="40">
                    </span>
                </a>

                {{-- <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm-light.png') }}" alt="" height="22">
                    </span>
                </a> --}}
            </div>

    {{-- <div class="user-details text-center">
        <img alt="" src="{{asset($user->avatar)}}"
            srcset="https://secure.gravatar.com/avatar/94a02683e54bae57ea90c2308d5249fd?s=140&amp;d=mm&amp;r=g 2x"
            class="avatar avatar-70 photo" height="200" width="200">
        <div class="author-details">
            <h5>{{$user->name}}</h5>
            <a href="https://ci.baobabb.co/author/laraveldev/?preview=1" target="_blank">Voir le profil</a>
        </div>
        <div class="text-center user-details-list d-flex justify-content-center">
            <a href="{{route('user.profile')}}" title="Réglages">
                <i class="fa-solid fa-gear"></i>
                <span class="icon-caption text-center">Réglages</span>
            </a>
            <a href="https://ci.baobabb.co/author/laraveldev/?screen=messages" title="Messages">
                <i class="fa-solid fa-envelope-open"></i>
                <div class="messages-unread-count">
                </div>
                <span class="icon-caption text-center">Messages</span>
            </a>
            <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                             <i class="fa-solid fa-right-from-bracket"></i>
                <span class="icon-caption text-center">Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div> --}}

    {{-- <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button> --}}

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu3">
                <li class="menu-title" data-key="t-dashboards"><b>Dashboards</b></li>

                <li>
                    <a  href="{{ route('user.dashboard') }}">
                        <i class="icon nav-icon" data-feather="monitor"></i>
                        <span class="menu-item " data-key="t-sales">Dashboard</span>
                    </a>
                </li>

            </ul>
            <ul class="metismenu list-unstyled" id="side-menu34">
                <li class="menu-title " data-key="t-dashboards">ADVERTISEMENT</li>
                <li>
                    <a  href="{{ route('user.product.index') }}">
                        <i class="icon nav-icon" data-feather="monitor"></i>
                        <span class="menu-item" data-key="t-sales">Your Ads</span>
                    </a>
                </li>
                <li>
                    <a  href="{{ route('user.wishlist.index') }}">
                        <i class="icon nav-icon" data-feather="monitor"></i>
                        <span class="menu-item" data-key="t-sales">Favorite Ads</span>
                    </a>
                </li>
            </ul>
            <ul class="metismenu list-unstyled" id="side-menu34">
                <li class="menu-title text-white" data-key="t-dashboards">FEEDBACK</li>
                <li>
                    <a  href="#">
                        <i class="icon nav-icon" data-feather="monitor"></i>
                        <span class="menu-item" data-key="t-sales">testimonials</span>
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
